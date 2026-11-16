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
<section class="page-head"><div class="wrap"><h1>About us</h1></div></section>

<section class="section">
  <div class="wrap split">
    <div>
      <img class="rounded" src="/assets/img/workshop.webp" width="1080" height="608" alt="True Precision Engineering workshop on Ryton Industrial Estate, Blaydon-on-Tyne">
      <h2 class="h4">True Precision Engineering</h2>
      <address><?= implode('<br>', array_map('e', ADDRESS)) ?></address>
      <p><a href="tel:<?= PHONE_INTL ?>"><?= PHONE ?></a><br>
      <a href="mailto:<?= EMAIL_2 ?>"><?= EMAIL_2 ?></a><br>
      <a href="mailto:<?= EMAIL ?>"><?= EMAIL ?></a><br>
      <a href="<?= LINKEDIN ?>" rel="noopener" target="_blank">Follow us on LinkedIn</a></p>
    </div>
    <div class="prose">
      <h2>A family-run engineering business, established 1989</h2>
      <p>True Precision Engineering was founded in 1989 as a small, family-run business. Over more than three decades it has grown into a well-established and respected sub-contract engineering company, providing toolmaking and precision machining services to customers across the North East, nationwide and beyond.</p>
      <h3>12,500 sq. ft. of production space</h3>
      <p>Our factory space of more than 12,500 sq. ft. at Ryton Industrial Estate, Blaydon-on-Tyne, houses CNC turning and milling, conventional machining, grinding, fabrication and assembly facilities under one roof — so components can go from raw material to finished assembly without leaving the building.</p>
      <h3>Quality you can rely on</h3>
      <p>All of our operating procedures follow our ISO 9001 quality management system, certified by NQA (UKAS accredited). Our ethos is simple: give every customer service levels that exceed their expectations.</p>
      <h3>A flexible partner</h3>
      <p>Our friendly, flexible approach has allowed us to build long-term supply partnerships with a varied and diverse customer base — from one-off repairs and prototypes to repeat production batches.</p>
      <img src="/assets/img/iso-9001-ukas.webp" width="200" height="150" alt="NQA ISO 9001 Quality Management certified, UKAS accredited" loading="lazy">
    </div>
  </div>
</section>

<section class="section alt">
  <div class="wrap">
    <h2 class="section-title">Examples of our work</h2>
    <div class="gallery">
      <?php foreach ($gallery as $n => $alt): ?>
      <figure><img src="/assets/img/gallery-<?= $n ?>.webp" width="500" height="500" alt="<?= e($alt) ?>" loading="lazy"></figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
