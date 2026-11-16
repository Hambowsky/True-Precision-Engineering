<?php
// Capability cards, shared by home and services pages. Icons are simple inline SVG paths.
$plant = [
    'Turning' => ['M3 12h4m10 0h4M7 7h10v10H7zM10 7v10M14 7v10', ['CNC turning with live tooling', 'Up to <b>700 mm</b> swing, <b>2,000 mm</b> between centres', 'Centre lathes up to <b>550 mm</b> swing']],
    'Milling' => ['M12 3v6m-3 0h6l-1 5h-4zM4 18h16v3H4zM7 14h10v4H7z', ['CNC milling, 21-station turret', '<b>750 × 500 mm</b> table', 'Turret &amp; universal milling, jig boring, slotting']],
    'Grinding' => ['M12 12m-7 0a7 7 0 1 0 14 0a7 7 0 1 0-14 0M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0-4 0M3 21h18', ['Surface grinding up to <b>200 × 450 mm</b>', 'Cylindrical grinding', 'Fine finishes and tight tolerances']],
    'Fabrication' => ['M4 20l6-6m0 0l3-7 4 4-7 3zM15 4l5 5', ['Light fabrication in-house', 'Larger fabrications and surface coating through trusted partners']],
    'Assembly' => ['M10 3h4v4h-4zM4 10h4v4H4zM16 10h4v4h-4zM10 17h4v4h-4zM12 7v10M8 12h8', ['Design, manufacture and assembly', 'Final or part assembly on request']],
];
?>
<div class="cap-grid">
  <?php foreach ($plant as $title => [$icon, $items]): ?>
  <article class="cap-card">
    <svg viewBox="0 0 24 24" width="28" height="28" aria-hidden="true"><path d="<?= $icon ?>" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
    <h3><?= $title ?></h3>
    <ul class="plain"><?php foreach ($items as $i): ?><li><?= $i ?></li><?php endforeach; ?></ul>
  </article>
  <?php endforeach; ?>
</div>
