<?php
/** Expects: $page = ['path','title','description', optional 'schema' => array, optional 'image'] */
require_once __DIR__ . '/config.php';
$canonical = SITE_URL . $page['path'];
$ogImage   = SITE_URL . ($page['image'] ?? '/assets/img/cnc-turning.jpg');

$org = [
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    '@id' => SITE_URL . '/#business',
    'name' => SITE_NAME,
    'legalName' => LEGAL_NAME,
    'description' => 'ISO 9001 certified sub-contract precision engineering company in Blaydon-on-Tyne, Tyne and Wear, providing CNC turning, CNC milling, grinding, toolmaking, light fabrication and assembly to UK industry since 1989.',
    'url' => SITE_URL . '/',
    'logo' => SITE_URL . '/assets/img/logo-1200.png',
    'image' => SITE_URL . '/assets/img/workshop.webp',
    'telephone' => PHONE_INTL,
    'email' => EMAIL,
    'foundingDate' => '1989',
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => 'Ryton Industrial Estate, Newburn Bridge Road',
        'addressLocality' => 'Blaydon-on-Tyne',
        'addressRegion' => 'Tyne and Wear',
        'postalCode' => 'NE21 4SQ',
        'addressCountry' => 'GB',
    ],
    'openingHoursSpecification' => [[
        '@type' => 'OpeningHoursSpecification',
        'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
        'opens' => '08:00', 'closes' => '16:30',
    ]],
    'areaServed' => ['North East England', 'United Kingdom'],
    'sameAs' => [LINKEDIN],
    'hasCredential' => ['@type' => 'EducationalOccupationalCredential', 'name' => 'ISO 9001 Quality Management System (NQA, UKAS accredited)'],
    'knowsAbout' => ['CNC turning', 'CNC milling', 'Precision machining', 'Toolmaking', 'Jigs and fixtures', 'Press tools', 'Mould tools', 'Surface grinding', 'Cylindrical grinding', 'Light fabrication', 'Mechanical assembly'],
];
$schemas = array_merge([$org], $page['schema'] ?? []);
?><!doctype html>
<html lang="en-GB">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($page['title']) ?></title>
<meta name="description" content="<?= e($page['description']) ?>">
<link rel="canonical" href="<?= e($canonical) ?>">
<meta property="og:type" content="website">
<meta property="og:locale" content="en_GB">
<meta property="og:site_name" content="<?= SITE_NAME ?>">
<meta property="og:title" content="<?= e($page['title']) ?>">
<meta property="og:description" content="<?= e($page['description']) ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta property="og:image" content="<?= e($ogImage) ?>">
<meta name="twitter:card" content="summary_large_image">
<link rel="icon" href="/assets/img/favicon.png" type="image/png">
<link rel="apple-touch-icon" href="/assets/img/icon.png">
<link rel="alternate" type="text/plain" title="LLM summary" href="/llms.txt">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Archivo:wdth,wght@100..125,500..800&family=Inter:wght@400;500;600&display=swap">
<link rel="stylesheet" href="/assets/css/style.css">
<?php foreach ($schemas as $s): ?>
<script type="application/ld+json"><?= json_encode($s, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?></script>
<?php endforeach; ?>
</head>
<body>
<a class="skip" href="#content">Skip to content</a>
<header class="site-header">
  <div class="wrap header-inner">
    <a href="/" class="logo"><img src="/assets/img/logo.png" srcset="/assets/img/logo.png 1x, /assets/img/logo-1200.png 2x" width="260" height="43" alt="True Precision Engineering Ltd"></a>
    <nav id="main-nav" aria-label="Main">
      <ul>
        <?php foreach (NAV as $href => $label): ?>
        <li><a href="<?= $href ?>"<?= $href === $page['path'] ? ' aria-current="page"' : '' ?>><?= $label ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>
    <a class="header-phone" href="tel:<?= PHONE_INTL ?>"><svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path fill="currentColor" d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1A17 17 0 0 1 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1z"/></svg><?= PHONE ?></a>
    <a class="btn btn-sm" href="/contact#enquiry">Get a quote</a>
    <button class="nav-toggle" aria-label="Menu" aria-expanded="false" aria-controls="main-nav"
      onclick="this.setAttribute('aria-expanded', document.getElementById('main-nav').classList.toggle('open'))"><span></span><span></span><span></span></button>
  </div>
</header>
<main id="content">
