</main>

<section class="cta-band" aria-labelledby="cta-title">
  <div class="wrap cta-inner">
    <div>
      <p class="eyebrow">Need parts machined?</p>
      <h2 id="cta-title">Talk to an engineer today</h2>
      <p>Leave your number and we'll call you back, or ring <a href="tel:<?= PHONE_INTL ?>"><?= PHONE ?></a>.</p>
    </div>
    <?php $formId = 'callback'; include __DIR__ . '/form.php'; ?>
  </div>
</section>

<footer class="site-footer">
  <div class="wrap footer-grid">
    <div class="footer-brand">
      <img src="/assets/img/icon.png" width="64" height="64" alt="" loading="lazy">
      <p>Family-run, ISO 9001 certified sub-contract precision engineers serving UK industry since 1989.</p>
      <a class="social" href="<?= LINKEDIN ?>" rel="noopener" target="_blank" aria-label="True Precision Engineering on LinkedIn">
        <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2.05 3.77-2.05C20.6 8.65 21 11.2 21 14.5V21h-4v-5.8c0-1.4 0-3.2-1.95-3.2S12.8 13.5 12.8 15.1V21H9z"/></svg>
      </a>
    </div>
    <div>
      <h3>Company</h3>
      <ul class="plain">
        <li><a href="/about">About us</a></li>
        <li><a href="/services">Services &amp; capacity</a></li>
        <li><a href="/about#work">Our work</a></li>
        <li><a href="/contact">Contact</a></li>
        <li><a href="/privacy">Privacy notice</a></li>
      </ul>
    </div>
    <div>
      <h3>Visit</h3>
      <address><?= implode('<br>', array_map('e', ADDRESS)) ?></address>
    </div>
    <div>
      <h3>Contact</h3>
      <p><a class="footer-phone" href="tel:<?= PHONE_INTL ?>"><?= PHONE ?></a></p>
      <p><a href="mailto:<?= EMAIL ?>"><?= EMAIL ?></a><br><a href="mailto:<?= EMAIL_2 ?>"><?= EMAIL_2 ?></a></p>
      <p class="muted">Office Mon–Fri 8am–4:30pm<br>Workshop on call 24 hours</p>
    </div>
  </div>
  <div class="wrap footer-base">
    <img src="/assets/img/iso-9001-ukas.webp" width="96" height="72" alt="NQA ISO 9001 Quality Management certified, UKAS accredited" loading="lazy">
    <p>© <?= date('Y') ?> <?= LEGAL_NAME ?>. Designed by <a href="https://redcherryit.com/" rel="noopener">Red Cherry IT</a></p>
  </div>
</footer>

<nav class="mobile-bar" aria-label="Quick contact">
  <a href="tel:<?= PHONE_INTL ?>">Call us</a>
  <a href="/contact#enquiry" class="primary">Get a quote</a>
</nav>
</body>
</html>
