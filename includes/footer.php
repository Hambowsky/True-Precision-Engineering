</main>

<section class="cta-band">
  <div class="wrap cta-inner">
    <h2>For enquiries about our production services, contact us today</h2>
    <a class="btn btn-light" href="/contact">Contact us</a>
  </div>
</section>

<footer class="site-footer">
  <div class="wrap footer-grid">
    <div>
      <img src="/assets/img/favicon.png" width="60" height="60" alt="" loading="lazy">
      <address>
        <strong>Address:</strong><br>
        <?= implode('<br>', array_map('e', ADDRESS)) ?>
      </address>
    </div>
    <div>
      <h3>Request a callback</h3>
      <?php $formId = 'callback'; include __DIR__ . '/form.php'; ?>
      <a class="social" href="<?= LINKEDIN ?>" rel="noopener" target="_blank" aria-label="True Precision Engineering on LinkedIn">
        <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path fill="currentColor" d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2.05 3.77-2.05C20.6 8.65 21 11.2 21 14.5V21h-4v-5.8c0-1.4 0-3.2-1.95-3.2S12.8 13.5 12.8 15.1V21H9z"/></svg>
      </a>
    </div>
    <div>
      <h3>Quick links</h3>
      <ul class="plain">
        <li><a href="/about">Company information</a></li>
        <li><a href="/services">Our services</a></li>
        <li><a href="/contact">Contact us</a></li>
        <li><a href="/privacy">Privacy notice</a></li>
      </ul>
      <img src="/assets/img/iso-9001-ukas.webp" width="160" height="120" alt="NQA ISO 9001 Quality Management certified, UKAS accredited" loading="lazy" class="iso-small">
    </div>
    <div>
      <h3>Get in touch</h3>
      <p class="footer-phone"><a href="tel:<?= PHONE_INTL ?>"><?= PHONE ?></a></p>
      <p><a href="mailto:<?= EMAIL_2 ?>"><?= EMAIL_2 ?></a><br><a href="mailto:<?= EMAIL ?>"><?= EMAIL ?></a></p>
      <p><strong>Office hours:</strong> Mon–Fri, 8am – 4:30pm<br>
      <strong>Workshop:</strong> 24-hour on-call via email or telephone<br>
      <small>Working hours may vary to suit customer requirements.</small></p>
    </div>
  </div>
  <p class="copyright">Copyright © <?= date('Y') ?> <?= LEGAL_NAME ?> | Designed by <a href="https://redcherryit.com/" rel="noopener">Red Cherry IT</a></p>
</footer>
</body>
</html>
