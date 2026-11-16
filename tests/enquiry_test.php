<?php
// Run: php tests/enquiry_test.php
require __DIR__ . '/../includes/enquiry.php';
$t = 1000;
[$e] = validate_enquiry(['form' => 'callback', 'name' => 'Ann', 'phone' => '0191 414 2959', 't' => 990], $t);
assert($e === [], 'valid callback passes');
[$e] = validate_enquiry(['form' => 'enquiry', 'name' => 'Ann', 'email' => 'a@b.co', 'message' => 'Hi', 't' => 990], $t);
assert($e === [], 'valid enquiry passes');
[$e] = validate_enquiry(['form' => 'enquiry', 'name' => 'Ann', 'email' => 'nope', 'message' => 'Hi', 't' => 990], $t);
assert(count($e) === 1, 'bad email rejected');
[$e] = validate_enquiry(['form' => 'callback', 'name' => 'Ann', 'phone' => '0191', 'website' => 'x', 't' => 990], $t);
assert(count($e) === 2, 'honeypot + short phone rejected');
[$e] = validate_enquiry(['form' => 'callback', 'name' => 'Ann', 'phone' => '0191 414 2959', 't' => 999], $t);
assert(count($e) === 1, 'too-fast submit rejected');
[, $d] = validate_enquiry(['name' => "Ann\r\nBcc: x@y.z", 'phone' => '0191 414 2959', 't' => 990], $t);
assert(!str_contains($d['name'], "\n"), 'newlines stripped from header-bound fields');
echo "ok\n";
