<?php

/**
 * @var array $namedParams
*/

$pdo = getPdo();

$file = $namedParams['file'];

if (empty($file)) {
    throw new Exception('Empty file');
}


$sql = file_get_contents(ROOT_PATH . '/db/sql/' . $file);
$pdo->exec($sql);