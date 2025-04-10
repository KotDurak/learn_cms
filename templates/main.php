<?php
/**
 * @var string $content
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/templates/styles/main.css">
    <title><?php echo getTitle(); ?></title>
    <?php renderCssHead(); ?>
    <?php renderJsHead(); ?>
</head>
<body>
    <?php require_once  ROOT_PATH . '/templates/nav_menu.php'; ?>
    <?php echo $content ?>
    <?php renderJsBody(); ?>
</body>
</html>