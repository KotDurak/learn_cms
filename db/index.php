<?php

$pdo = getPdo();
$ver = $pdo->query('SELECT VERSION() as version');
$ver = $ver->fetch();

vde($ver);