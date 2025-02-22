<?php
    if (!empty($_POST['doUpload'])) {
        redirect('/index.php');
    }
?>

<form action="" method="POST" enctype="multipart/form-data">
    <h3>Select file types:</h3>
    <input type="file" name="input[a][text]">
    <br>
    <input type="file" name="input[a][bin]">
    <br>
    <input type="submit" name="doUpload">
</form>
