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
  <div class="wrap">
    <p class="eyebrow">Providing quality</p>
    <h1><span class="nw">Sub-contract</span> precision machining services</h1>
    <p class="lead">An ISO 9001 certified machine shop in Blaydon-on-Tyne, Tyne and Wear, producing precision engineered components, tooling and assemblies for UK industry since 1989 — backed by more than 50 years of engineering experience.</p>
    <div class="hero-badges">
      <img src="/assets/img/iso-9001-ukas.webp" width="200" height="150" alt="NQA ISO 9001 Quality Management certified, UKAS accredited">
      <img src="/assets/img/favicon.png" width="70" height="70" alt="TPE monogram">
    </div>
    <p class="hero-contact">
      <a href="tel:<?= PHONE_INTL ?>"><?= PHONE ?></a><br>
      <a href="mailto:<?= EMAIL_2 ?>"><?= EMAIL_2 ?></a><br>
      <a href="mailto:<?= EMAIL ?>"><?= EMAIL ?></a>
    </p>
    <a class="btn" href="/about">Find out more</a>
  </div>
</section>

<?php include __DIR__ . '/includes/plant-list.php'; ?>
<p class="center pad-b plant"><a class="btn" href="/contact">Contact us today</a></p>

<section class="dark">
  <div class="wrap split">
    <div class="card">
      <h2 class="sr-only">What we make</h2>
      <?php include __DIR__ . '/includes/products.php'; ?>
    </div>
    <div>
      <h2 class="display">Service levels that exceed customer expectations</h2>
      <p>From a single replacement part to repeat production runs, every job is planned, machined and inspected in-house under our ISO 9001 quality system. Our flexible, family-run approach means you deal directly with the people making your parts.</p>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap narrow">
    <h2 class="section-title">Frequently asked questions</h2>
    <?php foreach ($faqs as [$q, $a]): ?>
    <details class="faq"><summary><?= e($q) ?></summary><p><?= e($a) ?></p></details>
    <?php endforeach; ?>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
