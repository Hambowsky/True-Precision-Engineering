<?php
/** Validate an enquiry. Returns [errors[], clean data[]]. Pure function so it can be tested. */
function validate_enquiry(array $in, int $now): array
{
    $form = ($in['form'] ?? '') === 'enquiry' ? 'enquiry' : 'callback';
    $d = ['form' => $form];
    foreach (['name' => 100, 'email' => 150, 'phone' => 30, 'message' => 5000] as $k => $max) {
        $val = trim((string)($in[$k] ?? ''));
        $d[$k] = $k === 'message' ? $val : preg_replace('/[\r\n\t]+/', ' ', $val); // no header injection
        if (mb_strlen($d[$k]) > $max) $d[$k] = mb_substr($d[$k], 0, $max);
    }
    $err = [];
    // Bots: filled honeypot or submitted faster than a human could.
    if (($in['website'] ?? '') !== '' || $now - (int)($in['t'] ?? 0) < 3) $err[] = 'Sorry, your message could not be sent. Please call us instead.';
    if ($d['name'] === '') $err[] = 'Please enter your name.';
    if ($form === 'enquiry') {
        if (!filter_var($d['email'], FILTER_VALIDATE_EMAIL)) $err[] = 'Please enter a valid email address.';
        if ($d['message'] === '') $err[] = 'Please enter a message.';
    } elseif (!preg_match('/^[0-9 +()\-]{7,30}$/', $d['phone'])) {
        $err[] = 'Please enter a valid contact number.';
    }
    if ($d['email'] !== '' && !filter_var($d['email'], FILTER_VALIDATE_EMAIL)) $d['email'] = '';
    return [$err, $d];
}

const UPLOAD_EXT = ['pdf', 'dxf', 'dwg', 'step', 'stp', 'igs', 'iges', 'jpg', 'jpeg', 'png'];
const UPLOAD_MAX_FILES = 5;
const UPLOAD_MAX_BYTES = 10 * 1024 * 1024; // total; keep in step with .user.ini / .htaccess limits

/**
 * Validate drawing uploads from $_FILES['drawings'] (multiple input).
 * Returns [errors[], files[] of ['name' => safe name, 'path' => tmp path]]. Nothing is stored on disk.
 */
function validate_files(array $f, ?callable $isUploaded = null): array
{
    $isUploaded ??= 'is_uploaded_file';
    $err = [];
    $out = [];
    $total = 0;
    foreach ((array)($f['name'] ?? []) as $i => $name) {
        $code = (int)((array)$f['error'])[$i];
        if ($code === UPLOAD_ERR_NO_FILE) continue;
        $label = mb_substr(basename((string)$name), 0, 80);
        if ($code === UPLOAD_ERR_INI_SIZE || $code === UPLOAD_ERR_FORM_SIZE) { $err[] = "$label is too large."; continue; }
        if ($code !== UPLOAD_ERR_OK) { $err[] = "$label could not be uploaded. Please try again."; continue; }
        $ext = strtolower(pathinfo($label, PATHINFO_EXTENSION));
        if (!in_array($ext, UPLOAD_EXT, true)) { $err[] = "$label is not an accepted file type."; continue; }
        $tmp = (string)((array)$f['tmp_name'])[$i];
        if (!$isUploaded($tmp)) { $err[] = "$label could not be uploaded. Please try again."; continue; }
        $total += (int)((array)$f['size'])[$i];
        $safe = trim(preg_replace('/[^A-Za-z0-9._-]+/', '_', pathinfo($label, PATHINFO_FILENAME)), '._');
        $out[] = ['name' => substr($safe !== '' ? $safe : 'drawing', 0, 80) . ".$ext", 'path' => $tmp];
    }
    if (count($out) > UPLOAD_MAX_FILES) $err[] = 'Please attach no more than ' . UPLOAD_MAX_FILES . ' files.';
    if ($total > UPLOAD_MAX_BYTES) $err[] = 'Attachments must be ' . (UPLOAD_MAX_BYTES >> 20) . ' MB or less in total.';
    return [$err, $err ? [] : $out];
}

/** Build a mail body, adding attachments as multipart/mixed. Returns [content-type header, body]. */
function build_mail(string $text, array $files, string $boundary): array
{
    if (!$files) return ['text/plain; charset=UTF-8', $text];
    $b = "--$boundary\r\nContent-Type: text/plain; charset=UTF-8\r\nContent-Transfer-Encoding: 8bit\r\n\r\n$text\r\n";
    foreach ($files as $f) {
        $b .= "--$boundary\r\nContent-Type: application/octet-stream; name=\"{$f['name']}\"\r\n"
            . "Content-Transfer-Encoding: base64\r\nContent-Disposition: attachment; filename=\"{$f['name']}\"\r\n\r\n"
            . chunk_split(base64_encode((string)file_get_contents($f['path']))) ;
    }
    return ["multipart/mixed; boundary=\"$boundary\"", $b . "--$boundary--\r\n"];
}
