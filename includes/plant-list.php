<?php
// Shared by home and services pages.
$plant = [
    'Turning' => ['CNC turning with live tooling – up to 700 mm swing, 2,000 mm between centres', 'Centre lathes – up to 550 mm swing, 2,000 mm between centres'],
    'Milling' => ['CNC milling, 21-station turret – 750 × 500 mm table', 'Turret milling', 'Universal milling', 'Jig boring & drilling', 'Slotting'],
    'Grinding' => ['Surface grinding – up to 200 × 450 mm', 'Cylindrical grinding'],
    'Fabrication' => ['All types of light fabrication undertaken in-house', 'Larger fabrications with surface coating completed through our trusted supply partners'],
    'Assembly' => ['Complete design, manufacture and assembly service', 'Final or part assembly available on request'],
];
?>
<section class="section plant">
  <div class="wrap">
    <h2 class="section-title">Plant list</h2>
    <div class="plant-grid">
      <?php foreach ($plant as $title => $items): ?>
      <div class="plant-item">
        <svg class="tick" viewBox="0 0 24 24" width="40" height="40" aria-hidden="true"><circle cx="12" cy="12" r="12" fill="currentColor"/><path d="M6.5 12.5l3.5 3.5 7.5-7.5" stroke="#fff" stroke-width="2.6" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
        <h3><?= $title ?></h3>
        <ul class="plain"><?php foreach ($items as $i): ?><li><?= e($i) ?></li><?php endforeach; ?></ul>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
