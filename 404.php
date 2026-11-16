<?php
require_once __DIR__ . '/includes/config.php';
http_response_code(404);
$page = ['path' => '/404', 'title' => 'Page not found | True Precision Engineering', 'description' => 'The page you were looking for could not be found.'];
require __DIR__ . '/includes/header.php';
?>
<section class="page-head"><div class="wrap"><h1>Page not found</h1>
  <p>Sorry, that page doesn't exist. Try our <a href="/services">services</a>, <a href="/about">about us</a> or <a href="/contact">contact</a> pages.</p></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
