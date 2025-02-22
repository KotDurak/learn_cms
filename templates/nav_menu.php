<?php
$menu = [
    [
        'title' => 'Главная',
        'href' => '/',
    ],
    [
        'title' => 'Сессии',
        'href' => '/globals/sessions.php',
    ],
    [
        'title' => 'Функции',

        'children' => [
            [
                'title' => 'Математические',
                'href' => '/functions/math',
            ],
            [
                'title' => 'Работа с файлами',
                'href' => '/functions/files',
            ],
            [
                'title' => 'Работа с каталогами',
                'href' => '/functions/catalogs',
            ]
        ]
    ]
];

?>

<nav>
    <?php renderMenu($menu); ?>
</nav>