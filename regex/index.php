<?php
setTextPlain();

function printRegex(string $regex, string $str) {
    preg_match($regex, $str, $matches);
    print_r($matches);
}

$mail = "DarkProkuror@yandex.ru";

//preg_match('/(\S+)@([a-z0-9.]+)/is', $mail, $matches);

$text = "Привет от DarkProkuror@mail.ru";

$html = preg_replace(
    '/(\S+)@([a-z0-9.]+)/is',
    '<a href="mailto:$0">$0</a>',
    $text
);

$text = 'a*b';

preg_match('/a\\*b/', $text, $match);
//print_r($match);

$str = '15-16/2000    ';

$regex = '{
    ^\s*(
       (\d+)
       \s* [[:punct:]] \s*
       (\d+)
       \s* [[:punct:]] \s*
       (\d+)
       )\s*$
}xs';

preg_match($regex, $str, $matches);

//print_r($matches);die();

$text = htmlspecialchars(file_get_contents(__FILE__));
$html = preg_replace('/(\$[a-z]\w*)/is', '<b>$1</b>', $text);

//echo $html;

$str = 'Hello, this <b>word</b> is bold';
$re = '|<(\w+) [^>]* > (.*?) </\1>|xs';
preg_match($re,$str, $matches);
//print_r($matches);die();

$str = '2022-07-15';
$re = '|^(?:\d{4}) - (?:\d{2}) - (\d{2}) $|xs';
//printRegex($re, $str);

$str = '2025-01-07';
$re = '|^(?<year>\d{4}) - (?<month>\d{2}) - (?<day>\d{2})$|xs';
//printRegex($re, $str);

//Позитивный просмотр вперед
$str = '<a>Tigr</a>';
$re = '|(\S+)(?=\s*</)|';
//printRegex($re, $str);

//