<?php
setTextPlain();
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
print_r($match);