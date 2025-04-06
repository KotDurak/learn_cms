<?php

function openTest(string $name, bool $edit = false) {
    if ($edit) {
        $name .= '-edit';
    }

    return "Open {$name}";
}

$function = new ReflectionFunction('openTest');
$result = $function->invoke('tigr');

$param = new ReflectionParameter('openTest', 1);

$allParams = $function->getParameters();

printf('<p>Параметры функции %s</p>', $function->getName());
foreach ($allParams as $param) {
    echo $param->getName() . ': ' . $param->getType() . '<br>';
}

$cls = new ReflectionClass('DateTime');
/*
echo '<pre>';
echo $cls;
echo '</pre>';*/