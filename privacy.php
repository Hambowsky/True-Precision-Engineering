<?php
require_once __DIR__ . '/includes/config.php';
$page = [
    'path' => '/privacy',
    'title' => 'Privacy Notice | True Precision Engineering',
    'description' => 'How True Precision Engineering Ltd uses the personal information you send us through this website.',
];
require __DIR__ . '/includes/header.php';
?>
<section class="page-head"><div class="wrap"><h1>Privacy notice</h1></div></section>
<section class="section">
  <div class="wrap narrow prose">
    <p><?= LEGAL_NAME ?>, <?= e(implode(', ', ADDRESS)) ?>, is the controller of personal information sent to us through this website.</p>
    <h2>What we collect and why</h2>
    <p>When you use our enquiry or callback forms we receive the name, email address, phone number and message you enter, and any drawings or files you attach. We use these only to respond to your enquiry and, if you become a customer, to manage our business relationship with you. Our lawful basis is our legitimate interest in replying to enquiries you have made.</p>
    <h2>How long we keep it</h2>
    <p>Attached files are sent straight to our email and are not stored on the website. Enquiries are kept in our email system for as long as needed to deal with them and for our normal business records, and are then deleted.</p>
    <h2>Sharing</h2>
    <p>We do not sell or share your information for marketing. It is processed by our website host and email provider only so that your message reaches us.</p>
    <h2>Cookies</h2>
    <p>This website does not set its own cookies. The map on our contact page is provided by Google and may set cookies when it loads; see Google's privacy policy for details.</p>
    <h2>Your rights</h2>
    <p>You can ask to see, correct or delete the information we hold about you by emailing <a href="mailto:<?= EMAIL ?>"><?= EMAIL ?></a> or calling <?= PHONE ?>. You can also complain to the Information Commissioner's Office at <a href="https://ico.org.uk" rel="noopener">ico.org.uk</a>.</p>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
