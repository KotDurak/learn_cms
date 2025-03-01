<?php
setTextPlain();

$st = '<b>bold text</b>';
$regex = '|<(\w+).*?>(.*?)</\1>|s';

preg_match($regex, $st, $matches, PREG_OFFSET_CAPTURE);
//print_r($matches);

$flags = [
    'PREG_PATTERN_ORDER'    => PREG_PATTERN_ORDER,
    'PREG_SET_ORDER'        => PREG_SET_ORDER,
    'PREG_SET_ORDER|PREG_OFFSET_CAPTURE'    => PREG_SET_ORDER|PREG_OFFSET_CAPTURE,
];

$re = '|<(\w+).*?>(.*?)</\1>|s';
$text = '<b>text</b> and <i>oder text</i>';

echo "str: $text";
echo PHP_EOL;
echo "regex: $re";
echo PHP_EOL . PHP_EOL;

foreach ($flags as $name => $flag) {
    preg_match_all($re, $text, $matches, $flag);
    echo "Flag $name";
    echo PHP_EOL;
    print_r($matches);
    echo PHP_EOL;
}
