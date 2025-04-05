<?php

use iterator\User;

$users = [
    [
        'id' => 1,
        'name' => 'John Doe'
    ],
    [
        'id' => 2,
        'name' => 'Tiger'
    ],
    [
        'id' => 3,
        'name' => 'Jim'
    ]
];

$coolect = new User($users);
$aagregator = new \iterator\UserAggregator($users);

/*foreach ($aagregator as $index => $user) {
    echo "{$user['id']}: {$user['name']} <br>";
}*/

$dir = new DirectoryIterator('.');
$recursive = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator('.'),
);


$page = $_GET['page'] ?? 1;
$count = $_GET['count'] ?? 10;

$limited = new LimitIterator($recursive, ($page -1 ) * $count , $count);