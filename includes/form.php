<?php
/** Enquiry form. $formId = 'callback' (name + phone) or 'enquiry' (full). Posts to /contact which handles it. */
$full = $formId === 'enquiry';
$old  = $formOld ?? [];
$v = fn($k) => e($old[$k] ?? '');
?>
<form class="form" method="post" action="/contact#<?= $formId ?>" id="<?= $formId ?>">
  <input type="hidden" name="form" value="<?= $formId ?>">
  <input type="hidden" name="t" value="<?= time() ?>">
  <div class="hp" aria-hidden="true"><label>Leave this empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
  <label><span>Your name</span><input type="text" name="name" required maxlength="100" autocomplete="name" value="<?= $v('name') ?>"></label>
  <?php if ($full): ?>
  <label><span>Email</span><input type="email" name="email" required maxlength="150" autocomplete="email" value="<?= $v('email') ?>"></label>
  <?php endif; ?>
  <label><span>Contact number</span><input type="tel" name="phone" <?= $full ? '' : 'required' ?> maxlength="30" autocomplete="tel" value="<?= $v('phone') ?>"></label>
  <?php if ($full): ?>
  <label><span>Message</span><textarea name="message" rows="5" required maxlength="5000"><?= $v('message') ?></textarea></label>
  <?php endif; ?>
  <p class="form-note">By sending this form you agree to us contacting you about your enquiry. See our <a href="/privacy">privacy notice</a>.</p>
  <button class="btn" type="submit"><?= $full ? 'Send enquiry' : 'Send request' ?></button>
</form>
