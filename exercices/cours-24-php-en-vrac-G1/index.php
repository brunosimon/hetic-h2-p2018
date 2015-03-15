<?php

$dir = dirname(__FILE__);
$files = glob($dir.'/*');

file_put_contents('test.txt', 'lorem ipsum',FILE_APPEND);

$content = file_get_contents('test.txt');

echo $content;

unlink('test.txt');

// echo '<pre>';
// print_r($files);
// echo '</pre>';