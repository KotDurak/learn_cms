<?php

define('ROOT_PATH', __DIR__);


function setTextPlain() {
    global $isTextPlain;
    $isTextPlain = true;

    header("Content-type: text/plain; charset=utf-8");
}

function vde(...$args) {
    global $isTextPlain;

    if ($isTextPlain) {
        array_walk($args, fn($a) => print_r($a));
        die();
    }

    echo '<pre style="background: #d1cfcf">';
    array_walk($args, fn($a) => print_r($a));
    echo  '</pre>';
    die();
}

function redirect(string $url) {
    header('Location: ' . $url);
}

function loadClass(string $class) {
    $className = explode('\\', $class);
    $newClassName = implode('/', $className);

    require_once ROOT_PATH . '/' . $newClassName . '.php';
}

function setTitle(string $title) {
    global $title_val;

    $title_val = $title;
}

function getTitle() {
    global $title_val;
    return $title_val ?? 'Котеров PHP 8';
}

function renderMenu(array $menu, string $menuCLass = 'nav-menu') {
    echo "<ul class='{$menuCLass}'>";

    foreach ($menu as $item) {
        echo '<li class="nav-item">';

        if (array_key_exists('href', $item)) {
            echo '<a href="' . $item['href'] . '">' . $item['title'] . '</a>';
        } else {
            echo $item['title'];
        }

        if (!empty($item['children'])) {
            renderMenu($item['children'], 'child-menu');
        }

        echo '</li>';
    }

    echo '</ul>';
}


function isPost(): bool {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function isGet(): bool {
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function getPostVal(string $name, $default = null) {
    if (!isPost()) {
        return null;
    }

    return $_POST[$name] ?? $default;
}