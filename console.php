<?php

require_once './functions.php';

$namedParams = [];

$path = $argv[1];

foreach ($argv as $arg) {
    if (strpos($arg, '--') === 0) {
        $param = substr($arg, 2);
        $parts = explode('=', $param, 2);

        if (count($parts) === 2) {
           $namedParams[$parts[0]] = $parts[1];
        } else {
            $namedParams[$parts[0]] = true;
        }
    }
}


if (strlen($path) - 4 !== strpos($path, '.php')) {
    $path .= '.php';
}

require_once $path;