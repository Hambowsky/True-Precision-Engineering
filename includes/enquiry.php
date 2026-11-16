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
