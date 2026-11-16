<?php
require_once __DIR__ . '/includes/config.php';
$page = [
    'path' => '/services',
    'title' => 'CNC Turning, Milling, Grinding & Toolmaking Services | True Precision Engineering',
    'description' => 'Sub-contract CNC turning, CNC milling, surface and cylindrical grinding, jigs, fixtures, press and mould tools, light fabrication and assembly from our ISO 9001 machine shop near Newcastle.',
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
                ['CNC turning', 'CNC milling', 'Surface grinding', 'Cylindrical grinding', 'Jig boring', 'Toolmaking – jigs, fixtures, press and mould tools', 'Light fabrication', 'Mechanical assembly']),
        ],
    ]],
];
require __DIR__ . '/includes/header.php';
?>
<section class="page-head"><div class="wrap"><h1>Our services</h1>
  <p>Sub-contract precision machining, toolmaking, fabrication and assembly from one ISO 9001 certified site in Blaydon-on-Tyne.</p></div></section>

<?php include __DIR__ . '/includes/plant-list.php'; ?>

<section class="section alt">
  <div class="wrap split">
    <div class="prose">
      <h2>Products we produce</h2>
      <p>The list below is a guide to the work produced in our sub-contract toolroom. We also have facilities for light fabrication, and fitting and assembly work is carried out on request.</p>
      <p>Whether you need a single replacement part to get a production line running again, tooling for a new product, or repeat batches of machined components, we can quote from your drawing, sample or CAD model.</p>
    </div>
    <div class="card"><?php include __DIR__ . '/includes/products.php'; ?></div>
  </div>
</section>

<section class="section">
  <div class="wrap narrow prose">
    <h2>Industries and customers</h2>
    <p>We work with manufacturers, maintenance teams and engineering companies who need accurate parts delivered on time. Typical work includes production line components, machine spares, tooling and fixtures, and precision components for assemblies.</p>
    <p class="center"><a class="btn" href="/contact">Send a request</a></p>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
