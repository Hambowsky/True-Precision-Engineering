<?php
require_once __DIR__ . '/includes/config.php';

require_once __DIR__ . '/includes/enquiry.php';

$errors = [];
$formOld = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    [$errors, $d] = validate_enquiry($_POST, time());
    $files = [];
    if (!$_POST && (int)($_SERVER['CONTENT_LENGTH'] ?? 0) > 0) {
        // Upload bigger than post_max_size: PHP drops the whole form.
        $errors = ['Your attachments were too large to send. Please keep them under ' . (UPLOAD_MAX_BYTES >> 20) . ' MB in total, or email them to ' . EMAIL . '.'];
        $d['form'] = 'enquiry';
    } elseif ($d['form'] === 'enquiry') {
        [$fileErrors, $files] = validate_files($_FILES['drawings'] ?? []);
        $errors = array_merge($errors, $fileErrors);
    }
    if (!$errors) {
        $subject = (IS_LIVE ? '' : '[Test site] ') . ($d['form'] === 'enquiry' ? 'Website enquiry from ' : 'Callback request from ') . $d['name'];
        $body = "Name: {$d['name']}\nEmail: {$d['email']}\nPhone: {$d['phone']}\n\n{$d['message']}\n\n"
            . ($files ? 'Attached: ' . implode(', ', array_column($files, 'name')) . "\n\n" : '')
            . '-- Sent from ' . SITE_URL . '/contact';
        [$type, $body] = build_mail($body, $files, 'tpe-' . bin2hex(random_bytes(12)));
        $headers = ['From' => SITE_NAME . ' <' . MAIL_FROM . '>', 'MIME-Version' => '1.0', 'Content-Type' => $type];
        if ($d['email'] !== '') $headers['Reply-To'] = $d['email'];
        if (mail(MAIL_TO, '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, $headers)) {
            header('Location: /contact?sent=' . $d['form'] . '#' . $d['form'], true, 303);
            exit;
        }
        $errors[] = 'Sorry, something went wrong sending your message. Please call ' . PHONE . ' or email ' . EMAIL . '.';
    }
    $formOld = $d;
}

$page = [
    'path' => '/contact',
    'title' => 'Contact Us | Precision Engineers in Blaydon-on-Tyne | True Precision Engineering',
    'description' => 'Contact True Precision Engineering on 0191 414 2959 or request a callback. Ryton Industrial Estate, Newburn Bridge Road, Blaydon-on-Tyne NE21 4SQ. Workshop on call 24 hours.',
];
require __DIR__ . '/includes/header.php';
?>
<section class="page-head">
  <div class="wrap">
    <p class="eyebrow">Contact</p>
    <h1>Let's talk about your parts</h1>
    <p>Got an enquiry, a drawing to quote, or a production or maintenance problem? We'll get back to you.</p>
  </div>
</section>

<section class="section">
  <div class="wrap contact-grid">
    <div class="form-card">
      <h2>Send an enquiry</h2>
      <p class="muted">Tell us what you need and attach your drawings. Large files can also be emailed to <a href="mailto:<?= EMAIL ?>"><?= EMAIL ?></a>.</p>
      <?php $formId = 'enquiry'; include __DIR__ . '/includes/form.php'; ?>
    </div>
    <div class="info-stack">
      <div class="info-card">
        <h3>Call</h3>
        <p><a class="big-link" href="tel:<?= PHONE_INTL ?>"><?= PHONE ?></a></p>
        <p class="muted">Office Mon–Fri, 8am–4:30pm. Workshop on call 24 hours by phone or email.</p>
      </div>
      <div class="info-card">
        <h3>Email</h3>
        <p><a href="mailto:<?= EMAIL ?>"><?= EMAIL ?></a><br><a href="mailto:<?= EMAIL_2 ?>"><?= EMAIL_2 ?></a></p>
      </div>
      <div class="info-card">
        <h3>Visit</h3>
        <address><?= implode(', ', array_map('e', ADDRESS)) ?></address>
        <iframe class="map" title="Map showing True Precision Engineering, Blaydon-on-Tyne" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
          src="https://maps.google.com/maps?q=<?= urlencode(MAP_QUERY) ?>&amp;z=15&amp;output=embed"></iframe>
      </div>
    </div>
  </div>
</section>

<section class="section soft">
  <div class="wrap">
    <div class="section-head"><p class="eyebrow">What happens next</p><h2>From enquiry to delivery</h2></div>
    <?php include __DIR__ . '/includes/process.php'; ?>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
