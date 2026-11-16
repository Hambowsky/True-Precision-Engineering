<?php
require_once __DIR__ . '/includes/config.php';
$page = [
    'path' => '/services',
    'title' => 'CNC Turning, Milling, Grinding & Toolmaking Services | True Precision Engineering',
    'description' => 'Sub-contract CNC turning, CNC milling, surface grinding, jigs, fixtures, press and mould tools, light fabrication and assembly from our ISO 9001 machine shop near Newcastle.',
    'schema' => [[
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'serviceType' => 'Sub-contract precision machining',
        'provider' => ['@id' => SITE_URL . '/#business'],
        'areaServed' => 'United Kingdom',
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => 'Precision engineering services',
            'itemListElement' => array_map(fn($s) => ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => $s]],
                ['CNC turning', 'CNC milling', 'Surface grinding', 'Jig boring', 'Toolmaking – jigs, fixtures, press and mould tools', 'Light fabrication', 'Mechanical assembly']),
        ],
    ]],
];
require __DIR__ . '/includes/header.php';
?>
<section class="page-head">
  <div class="wrap">
    <p class="eyebrow">Services</p>
    <h1>Precision machining, toolmaking &amp; assembly</h1>
    <p>Sub-contract engineering from one ISO 9001 certified site in Blaydon-on-Tyne. Send us a drawing and we'll handle the rest.</p>
  </div>
</section>

<section class="section">
  <div class="wrap"><?php include __DIR__ . '/includes/plant-list.php'; ?></div>
</section>

<section class="section soft">
  <div class="wrap split split-top">
    <div>
      <p class="eyebrow">Capacity</p>
      <h2>Machine capacity at a glance</h2>
      <p>Maximum work sizes on our main machines. Not sure if your part fits? Call us and we'll tell you straight away.</p>
    </div>
    <div class="table-wrap">
      <table class="spec">
        <thead><tr><th scope="col">Process</th><th scope="col">Machine</th><th scope="col">Max size</th></tr></thead>
        <tbody>
          <tr><td>Turning</td><td>CNC lathe with live tooling</td><td>700 mm swing × 2,000 mm between centres</td></tr>
          <tr><td>Turning</td><td>Centre lathes</td><td>550 mm swing × 2,000 mm between centres</td></tr>
          <tr><td>Milling</td><td>CNC mill, 21-station turret</td><td>750 × 500 mm table</td></tr>
          <tr><td>Milling</td><td>Turret &amp; universal mills, jig borer, slotter</td><td class="muted">Ask us</td></tr>
          <tr><td>Grinding</td><td>Surface grinder</td><td>200 × 450 mm</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap split split-top">
    <div>
      <p class="eyebrow">Products</p>
      <h2>What we produce</h2>
      <p>A guide to the work that goes through our sub-contract toolroom. Light fabrication, fitting and assembly are also available on request.</p>
      <p>Whether you need one replacement part to get a line running again, tooling for a new product, or repeat batches of components, we can quote from your drawing, sample or CAD model.</p>
    </div>
    <?php include __DIR__ . '/includes/products.php'; ?>
  </div>
</section>

<section class="section soft">
  <div class="wrap">
    <div class="section-head"><p class="eyebrow">How it works</p><h2>From drawing to delivery</h2></div>
    <?php include __DIR__ . '/includes/process.php'; ?>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
