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

// Drawing uploads
$up = fn() => true;
$files = fn(array $names, array $sizes, array $errors = null) => ['name' => $names, 'tmp_name' => array_map(fn($n) => "/tmp/$n", $names),
    'size' => $sizes, 'error' => $errors ?? array_fill(0, count($names), UPLOAD_ERR_OK)];
[$e, $f] = validate_files([], $up);
assert($e === [] && $f === [], 'no upload is fine');
[$e, $f] = validate_files($files(['a.pdf'], [0], [UPLOAD_ERR_NO_FILE]), $up);
assert($e === [] && $f === [], 'empty file input is fine');
[$e, $f] = validate_files($files(['Part 12 rev B.STEP', 'x.dwg'], [1000, 2000]), $up);
assert($e === [] && $f[0]['name'] === 'Part_12_rev_B.step', 'accepted, name made header-safe');
[$e] = validate_files($files(['evil.php'], [10]), $up);
assert(count($e) === 1, 'disallowed type rejected');
[$e] = validate_files($files(['"a\r\nb".pdf'], [10]), $up);
assert($e === [], 'odd names allowed but sanitised');
[, $f] = validate_files($files(['"a\r\nb".pdf'], [10]), $up);
assert(!preg_match('/["\r\n]/', $f[0]['name']), 'no quotes/newlines in attachment name');
[$e] = validate_files($files(['a.pdf', 'b.pdf'], [6 << 20, 6 << 20]), $up);
assert(count($e) === 1, 'total size limit');
[$e] = validate_files($files(array_map(fn($i) => "$i.pdf", range(1, 6)), array_fill(0, 6, 10)), $up);
assert(count($e) === 1, 'file count limit');
[$e] = validate_files($files(['a.pdf'], [10]), fn() => false);
assert(count($e) === 1, 'non-uploaded path rejected');
[$e] = validate_files($files(['a.pdf'], [0], [UPLOAD_ERR_INI_SIZE]), $up);
assert(count($e) === 1, 'php size error reported');

file_put_contents($tmp = tempnam(sys_get_temp_dir(), 'tpe'), 'DRAWING');
[$type, $body] = build_mail('hello', [['name' => 'p.pdf', 'path' => $tmp]], 'BND');
unlink($tmp);
assert(str_starts_with($type, 'multipart/mixed') && str_contains($body, base64_encode('DRAWING')) && str_ends_with($body, "--BND--\r\n"), 'attachment encoded');
assert(build_mail('hi', [], 'B') === ['text/plain; charset=UTF-8', 'hi'], 'plain mail without files');
echo "uploads ok\n";
