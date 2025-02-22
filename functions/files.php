<?php

setTextPlain();

/*function makeHex($st) {
    for ($i = 0; $i < strlen($st); $i++) {
        $hex[] = sprintf("%02X", ord($st[$i]));
    }

    return join(' ', $hex);
}


$f = fopen(__FILE__, "rb");
echo makeHex(fgets($f, 100));
echo PHP_EOL;

$f = fopen(__FILE__, "rt");
echo makeHex(fgets($f, 100));
echo PHP_EOL;

echo __DIR__ . PHP_EOL;
echo dirname(__DIR__) . PHP_EOL;

echo tempnam('/barsik', 'r');*/

$file = './counter.dat';
fclose(fopen($file, 'a+b'));
$f = fopen($file, 'r+t');
flock($f, LOCK_EX);
$count = (int)fread($f, 100);
$count = $count + 1;
ftruncate($f, 0);
fseek($f, 0, SEEK_SET);
fwrite($f, $count);
fclose($f);
echo $count;