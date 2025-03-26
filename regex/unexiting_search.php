<?php
setTextPlain();
//Позитивый просмотр вперед (?=expression)
$re = '|(\S+)(?=</)|';
$str = 'word</b>';
preg_match($re, $str, $match);

//Негативный просмотр вперед (?!expr)

$str = 'test.?:)';
$re = '/
    (?![.,])
    ([[:punct:]])
/x';

preg_match($re, $str, $match);

//Позитивный просмотр назад (?<=expr)
$re = '/
   (?<=\\?)
  (\w+)
 /x';
$str  = 'test  ?word text ';
preg_match_all($re, $str, $match);
vde($match);