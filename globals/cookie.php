<?php

$date = new DateTime();
$date->modify('+2 hours');



setcookie('tigr', 'Barsik', $date->getTimestamp(), '/');

?>

