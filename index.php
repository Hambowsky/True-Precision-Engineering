<?php
require_once __DIR__ . '/includes/config.php';

$faqs = [
    ['What precision engineering services does True Precision Engineering offer?',
     'We provide sub-contract CNC turning (with live tooling), CNC milling, manual turning and milling, jig boring, slotting, surface and cylindrical grinding, toolmaking (jigs, fixtures, press tools and mould tools), light fabrication and full mechanical assembly.'],
    ['Where is True Precision Engineering based?',
     'Our 12,500 sq. ft. machine shop is on Ryton Industrial Estate, Newburn Bridge Road, Blaydon-on-Tyne, NE21 4SQ, close to Newcastle upon Tyne and Gateshead. We supply customers across the North East, the rest of the UK and beyond.'],
    ['Are you ISO 9001 certified?',
     'Yes. Our quality management system is certified to ISO 9001 by NQA, a UKAS-accredited certification body, and all work is carried out under those procedures.'],
    ['Do you take on one-off jobs as well as production runs?',
     'Yes. We machine prototypes, one-off parts and replacement components as well as large and small production batches.'],
    ['What size of parts can you machine?',
     'CNC turning up to 700 mm swing and 2,000 mm between centres, centre lathes up to 550 mm swing and 2,000 mm between centres, CNC milling on a 750 × 500 mm table, and surface grinding up to 200 × 450 mm.'],
    ['Can you help with urgent breakdown or maintenance work?',
     'Our office is open Monday to Friday, 8am to 4:30pm, and the workshop is on call 24 hours a day by phone or email. Working hours can be extended to suit customer requirements.'],
];

$page = [
    'path' => '/',
    'title' => 'Precision Engineering & CNC Machining in Tyne and Wear | True Precision Engineering',
    'description' => 'ISO 9001 certified sub-contract precision engineers in Blaydon-on-Tyne, near Newcastle. CNC turning, milling, grinding, toolmaking, fabrication and assembly since 1989. Call 0191 414 2959.',
    'schema' => [[
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array_map(fn($f) => ['@type' => 'Question', 'name' => $f[0], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]]], $faqs),
    ]],
];
require __DIR__ . '/includes/header.php';
?>
<section class="hero">
  <div class="wrap hero-inner">
    <p class="eyebrow">ISO 9001 certified · Established 1989</p>
    <h1><span class="nw">Sub-contract</span> precision machining services</h1>
    <p class="lead">CNC turning, milling, grinding, toolmaking and assembly from our 12,500 sq. ft. workshop in Blaydon-on-Tyne. One-off parts to production batches, made right first time for UK industry.</p>
    <div class="hero-actions">
      <a class="btn" href="/contact#enquiry">Request a quote</a>
      <a class="btn btn-ghost" href="tel:<?= PHONE_INTL ?>">Call <?= PHONE ?></a>
    </div>
  </div>
</section>

<section class="facts" aria-label="Key facts">
  <div class="wrap facts-grid">
    <div><strong>1989</strong><span>Family-run since</span></div>
    <div><strong>12,500 <small>sq. ft.</small></strong><span>Production &amp; assembly space</span></div>
    <div><strong>ISO 9001</strong><span>NQA certified, UKAS accredited</span></div>
    <div><strong>24 hr</strong><span>Workshop on call</span></div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head">
      <p class="eyebrow">Capabilities</p>
      <h2>Plant list &amp; capacity</h2>
      <p>Everything under one roof, from raw bar to finished assembly.</p>
    </div>
    <?php include __DIR__ . '/includes/plant-list.php'; ?>
    <p class="more"><a class="link-arrow" href="/services">See all services and capacity</a></p>
  </div>
</section>

<section class="section dark">
  <div class="wrap split">
    <div>
      <p class="eyebrow">What we make</p>
      <h2>Service levels that exceed customer expectations</h2>
      <p>From a single replacement part that gets a production line running again to repeat batches of components, every job is planned, machined and inspected in-house. You deal directly with the people making your parts.</p>
      <?php include __DIR__ . '/includes/products.php'; ?>
    </div>
    <div class="collage">
      <img src="/assets/img/gallery-24.webp" width="500" height="500" alt="Large CNC turned stainless steel ring" loading="lazy">
      <img src="/assets/img/gallery-4.webp" width="500" height="500" alt="Complex multi-axis machined aluminium housing" loading="lazy">
      <img src="/assets/img/gallery-12.webp" width="500" height="500" alt="Knurled brass components with threaded holes" loading="lazy">
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head">
      <p class="eyebrow">How it works</p>
      <h2>From drawing to delivery</h2>
    </div>
    <?php include __DIR__ . '/includes/process.php'; ?>
  </div>
</section>

<section class="section soft">
  <div class="wrap">
    <div class="section-head">
      <p class="eyebrow">Recent work</p>
      <h2>Made in Blaydon-on-Tyne</h2>
    </div>
    <div class="work-strip">
      <?php foreach ([2 => 'CNC turned shaft with machined gears', 23 => 'Machined and assembled rotary housing', 17 => 'Machined brass pipe fittings', 13 => 'Machined steel flange ring', 22 => 'Turned aluminium pulley and threaded spigot', 15 => 'CNC machined stainless steel crank components'] as $n => $alt): ?>
      <img src="/assets/img/gallery-<?= $n ?>.webp" width="500" height="500" alt="<?= $alt ?>" loading="lazy">
      <?php endforeach; ?>
    </div>
    <p class="more"><a class="link-arrow" href="/about#work">View the full gallery</a></p>
  </div>
</section>

<section class="section">
  <div class="wrap narrow">
    <div class="section-head"><p class="eyebrow">FAQ</p><h2>Frequently asked questions</h2></div>
    <?php foreach ($faqs as [$q, $a]): ?>
    <details class="faq"><summary><?= e($q) ?></summary><p><?= e($a) ?></p></details>
    <?php endforeach; ?>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
