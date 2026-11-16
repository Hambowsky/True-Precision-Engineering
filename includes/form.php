<?php
/** Enquiry form. $formId = 'callback' (name + phone) or 'enquiry' (full). Posts to /contact which handles it. */
$full = $formId === 'enquiry';
$mine = ($formOld['form'] ?? '') === $formId;
$old  = $mine ? $formOld : [];
$v = fn($k) => e($old[$k] ?? '');
?>
<form class="form form-<?= $formId ?>" method="post" action="/contact#<?= $formId ?>" id="<?= $formId ?>">
  <?php if (($_GET['sent'] ?? '') === $formId): ?>
  <p class="notice ok" role="status">Thank you, your message has been sent. We'll be in touch shortly.</p>
  <?php endif; ?>
  <?php if ($mine && !empty($errors)): ?>
  <div class="notice err" role="alert"><?php foreach ($errors as $m): ?><p><?= e($m) ?></p><?php endforeach; ?></div>
  <?php endif; ?>
  <input type="hidden" name="form" value="<?= $formId ?>">
  <input type="hidden" name="t" value="<?= time() ?>">
  <div class="hp" aria-hidden="true"><label>Leave this empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
  <label><span>Your name</span><input type="text" name="name" required maxlength="100" autocomplete="name" value="<?= $v('name') ?>"></label>
  <?php if ($full): ?>
  <label><span>Email</span><input type="email" name="email" required maxlength="150" autocomplete="email" value="<?= $v('email') ?>"></label>
  <?php endif; ?>
  <label><span>Contact number<?= $full ? ' <small>(optional)</small>' : '' ?></span><input type="tel" name="phone" <?= $full ? '' : 'required' ?> maxlength="30" autocomplete="tel" value="<?= $v('phone') ?>"></label>
  <?php if ($full): ?>
  <label><span>Message</span><textarea name="message" rows="5" required maxlength="5000"><?= $v('message') ?></textarea></label>
  <?php endif; ?>
  <button class="btn" type="submit"><?= $full ? 'Send enquiry' : 'Call me back' ?></button>
  <p class="form-note">We only use your details to reply. <a href="/privacy">Privacy notice</a></p>
</form>
