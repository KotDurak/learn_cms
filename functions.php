<?php

define('ROOT_PATH', __DIR__);


function setTextPlain() {
    global $isTextPlain;
    $isTextPlain = true;

    header("Content-type: text/plain; charset=utf-8");
}

function setContentJson() {
    global $isContentJson;
    $isContentJson = true;
    header('Content-type: application/json');
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

function addJs(string $script, $head = false) {
    global $jsHead;
    global $jsBody;

    if ($head) {
        $jsHead[] = $script;
    } else {
        $jsBody[] = $script;
    }
}

function addCss(string $style) {
    global $cssHead;
    $cssHead[] = $style;
}

function renderJsHead() {
    global $jsHead;

    if (!$jsHead) {
        return;
    }


    foreach ($jsHead as $script) {
        echo '<script src="' . $script . '"></script>';
    }
}

function renderJsBody() {
    global $jsBody;

    if (!$jsBody) {
        return;
    }

    foreach ($jsBody as $script) {
        echo '<script src="' . $script . '"></script>';
    }
}

function renderCssHead() {
    global $cssHead;

    if (!$cssHead) {
        return;
    }

    foreach ($cssHead as $style) {
        echo '<link rel="stylesheet" href="' . $style . '">';
    }
}

function renderJsonContent($content, $status = 200) {
    setContentJson();
    http_response_code($status);

    if (is_array($content)) {
        echo json_encode($content);
    }

    if (is_string($content) && json_decode($content)) {
        return $content;
    }
}

function isLocal() {
    return preg_match('/^localhost(?<port>:\d+)?$/', $_SERVER['HTTP_HOST']);
}

function getPdo(string $type = 'pgsql'): \PDO {
    static $pdo = null;

    if (!empty($pdo)) {
        return $pdo;
    }

    if ($dbUrl = getenv('DATABASE_URL')) {
        $dbInfo = parse_url($dbUrl);
        $dsn = sprintf(
            'pgsql:host=%s;port=%s;dbname=%s',
            $dbInfo['host'],
            $dbInfo['port'],
            ltrim($dbInfo['path'] ,'/')
        );
        $pdo = new PDO(
            $dsn,
            $dbInfo['user'],
            $dbInfo['pass']
        );

        return $pdo;
    }

    switch ($type) {
        case 'pgsql':
            $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=Tigr', 'Tigr', 'root');
            break;
        default:
            throw new DomainException('Не настроена БД');
    }

    return $pdo;
}