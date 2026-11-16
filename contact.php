<?php
require_once __DIR__ . '/includes/config.php';

require_once __DIR__ . '/includes/enquiry.php';

$errors = [];
$formOld = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    [$errors, $d] = validate_enquiry($_POST, time());
    if (!$errors) {
        $subject = ($d['form'] === 'enquiry' ? 'Website enquiry from ' : 'Callback request from ') . $d['name'];
        $body = "Name: {$d['name']}\nEmail: {$d['email']}\nPhone: {$d['phone']}\n\n{$d['message']}\n\n-- Sent from " . SITE_URL . '/contact';
        $headers = ['From' => SITE_NAME . ' <' . MAIL_FROM . '>', 'Content-Type' => 'text/plain; charset=UTF-8'];
        if ($d['email'] !== '') $headers['Reply-To'] = $d['email'];
        if (mail(MAIL_TO, '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, $headers)) {
            header('Location: /contact?sent=1#' . $d['form'], true, 303);
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
<section class="page-head"><div class="wrap"><h1>Contact us &amp; let's talk</h1></div></section>

<section class="section">
  <div class="wrap split">
    <div>
      <h2>Schedule a call</h2>
      <p>Got an enquiry, a drawing to quote, or a production or maintenance problem? Get in touch and we'll call you back.</p>
      <?php if (isset($_GET['sent'])): ?>
        <p class="notice ok" role="status">Thank you — your message has been sent. We'll be in touch shortly.</p>
      <?php endif; ?>
      <?php if ($errors): ?>
        <div class="notice err" role="alert"><?php foreach ($errors as $m): ?><p><?= e($m) ?></p><?php endforeach; ?></div>
      <?php endif; ?>
      <?php $formId = 'enquiry'; include __DIR__ . '/includes/form.php'; ?>
    </div>
    <div class="contact-details">
      <h3>Address</h3>
      <address><?= implode(', ', array_map('e', ADDRESS)) ?></address>
      <h3>Telephone</h3>
      <p><a href="tel:<?= PHONE_INTL ?>"><?= PHONE ?></a></p>
      <h3>Email</h3>
      <p><a href="mailto:<?= EMAIL_2 ?>"><?= EMAIL_2 ?></a><br><a href="mailto:<?= EMAIL ?>"><?= EMAIL ?></a></p>
      <p><a href="<?= LINKEDIN ?>" rel="noopener" target="_blank">LinkedIn</a></p>
      <iframe class="map" title="Map showing True Precision Engineering, Blaydon-on-Tyne" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
        src="https://maps.google.com/maps?q=<?= urlencode(MAP_QUERY) ?>&amp;z=15&amp;output=embed"></iframe>
      <h3>Business hours</h3>
      <p><strong>Office:</strong> Monday – Friday, 8am – 4:30pm<br>
      <strong>Workshop:</strong> 24-hour on-call via email or telephone<br>
      Working hours may vary to suit customer requirements.</p>
    </div>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
