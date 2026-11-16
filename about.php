<?php
require_once __DIR__ . '/includes/config.php';
$page = [
    'path' => '/about',
    'title' => 'About Us | Family-Run Precision Engineers Since 1989 | True Precision Engineering',
    'description' => 'Established in 1989, True Precision Engineering is a family-run, ISO 9001 certified toolmaking and precision machining company with a 12,500 sq. ft. facility in Blaydon-on-Tyne.',
    'image' => '/assets/img/workshop.webp',
];
$gallery = [
    2 => 'CNC turned shaft with machined gears at both ends',
    4 => 'Complex multi-axis machined aluminium housing',
    5 => 'Precision turned steel flange with internal bore',
    6 => 'Turned and splined steel shaft component',
    9 => 'CNC milled steel cross-shaped brackets',
    10 => 'Batch of machined steel rings ready for dispatch',
    11 => 'Precision turned steel disc with milled slot',
    12 => 'Knurled brass components with threaded holes',
    13 => 'Machined steel flange ring with bolt-hole pattern',
    14 => 'Turned and milled steel drive shafts',
    15 => 'CNC machined stainless steel crank components',
    16 => 'Turned steel bosses with flanged mounts',
    17 => 'Machined brass pipe fittings with threaded connections',
    19 => 'Precision ground and milled tool steel blades',
    21 => 'Turned stainless steel sleeve and threaded plug',
    22 => 'Precision turned aluminium pulley and threaded spigot',
    23 => 'Machined and assembled rotary housing',
    24 => 'Large CNC turned stainless steel ring',
];
require __DIR__ . '/includes/header.php';
?>
<section class="page-head">
  <div class="wrap">
    <p class="eyebrow">About us</p>
    <h1>A family-run engineering business since 1989</h1>
    <p>Toolmaking and precision machining for customers across the North East, the UK and beyond.</p>
  </div>
</section>

<section class="section">
  <div class="wrap split">
    <img class="photo" src="/assets/img/workshop.webp" width="1080" height="608" alt="True Precision Engineering workshop on Ryton Industrial Estate, Blaydon-on-Tyne">
    <div class="prose">
      <h2>Our story</h2>
      <p>True Precision Engineering was founded in 1989 as a small, family-run business. Over more than three decades it has grown into a well-established and respected sub-contract engineering company.</p>
      <p>Our friendly, flexible approach has built long-term supply partnerships with a varied and diverse customer base, from one-off repairs and prototypes to repeat production batches.</p>
    </div>
  </div>
</section>

<section class="section soft">
  <div class="wrap feature-grid">
    <div><h3>12,500 sq. ft. facility</h3><p>CNC and conventional machining, grinding, fabrication and assembly under one roof, so parts go from raw material to finished assembly without leaving the building.</p></div>
    <div><h3>ISO 9001 quality</h3><p>Every job follows our ISO 9001 quality management system, certified by NQA (UKAS accredited).</p><img src="/assets/img/iso-9001-ukas.webp" width="120" height="90" alt="NQA ISO 9001 Quality Management certified, UKAS accredited" loading="lazy"></div>
    <div><h3>Flexible service</h3><p>Office hours Monday to Friday, with the workshop on call 24 hours a day. Working hours can be extended to suit your deadlines.</p></div>
  </div>
</section>

<section class="section" id="work">
  <div class="wrap">
    <div class="section-head"><p class="eyebrow">Gallery</p><h2>Examples of our work</h2><p>Tap any photo to enlarge it.</p></div>
    <div class="gallery">
      <?php foreach ($gallery as $n => $alt): ?>
      <button type="button" class="gallery-item" data-src="/assets/img/gallery-<?= $n ?>.webp" data-alt="<?= e($alt) ?>"><img src="/assets/img/gallery-<?= $n ?>.webp" width="500" height="500" alt="<?= e($alt) ?>" loading="lazy"></button>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<dialog id="lightbox" class="lightbox" aria-label="Enlarged photo">
  <form method="dialog"><button class="lightbox-close" aria-label="Close">×</button></form>
  <img src="" alt="">
  <p></p>
</dialog>
<script>
(() => {
  const d = document.getElementById('lightbox'), img = d.querySelector('img'), cap = d.querySelector('p');
  document.querySelectorAll('.gallery-item').forEach(b => b.addEventListener('click', () => {
    img.src = b.dataset.src; img.alt = cap.textContent = b.dataset.alt; d.showModal();
  }));
  d.addEventListener('click', e => { if (e.target === d) d.close(); });
})();
</script>
<?php require __DIR__ . '/includes/footer.php'; ?>
