<?php





$path = 'test.txt';

file_put_contents($path, 'salut ',FILE_APPEND);

$content = file_get_contents($path);
echo $content;