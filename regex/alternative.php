<?php

$path = 'C:/users/home/';
$path2 = '/root/bin';

$pattern = '#^\w:|^\\\\|^/#';

echo preg_match($pattern, $path) . '<br>';
echo preg_match($pattern, $path2) . '<br>';