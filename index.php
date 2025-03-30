<?php

require_once './functions.php';

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if (strpos($path, '.php')) {
    $path = substr($path, 1, -4);
}

spl_autoload_register(function($class) {
    $arr = explode('\\', $class);
    $path = implode('/', $arr);

    include ROOT_PATH . "/{$path}.php";
});

ob_start();

if (!in_array($path, ['/', '/index.php', 'index'])) {
    if (!file_exists("./{$path}.php")) {
        $path = "{$path}/index";
    }

    if (!file_exists("./{$path}.php")) {
        http_response_code(404);
        echo "<p style='color: red'>{$path} does not exist</p>";
    } else {
        require "./{$path}.php";
    }
} else {
    echo "<h1>Hello world</h1>";
}

if (!empty($_SESSION['name'])) {
    echo $_SESSION['name'];
}

$content = ob_get_clean();

if (!empty($GLOBALS['isTextPlain']) || !empty($GLOBALS['isContentJson'])) {
   echo $content;
} else {
    require_once ROOT_PATH . '/templates/main.php';
}



