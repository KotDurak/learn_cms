<?php

require_once './functions.php';
//setTextPlain();
if (!empty($_POST['name'])) {
    redirect('/');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="" method="post">
            <label for="">Name</label>
            <input name="name" type="text">
            <br>

            <label for="mbstring">mb_sttring</label>
            <input id="mbstring" type="checkbox" name="php[mbstrimg]" value="1">
            <br>
            <label for="mysql">mysql</label>
            <input type="checkbox" name="php[mysql]" value="1" id="mysql">
            <br>

            <input type="submit" value="send">
        </form>
    </div>
</body>
</html>
