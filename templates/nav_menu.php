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
    ],
    [
            'title' => 'Основы регулярных выражений',
            'href' => '/regex',
            'children'  => [
                    [
                            'title' => 'Оператор альтренативы',
                            'href'  => '/regex/alternative',
                    ]
            ]
    ]
];

?>

<nav>
    <?php renderMenu($menu); ?>
</nav>