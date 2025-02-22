<?php

loadClass(PhotoAlbum::class);

if ($_REQUEST['doUpload'] ?? false) {
    $file = new PhotoAlbum($_FILES['file']);

    if (!is_uploaded_file($file->tempFileName())) {
        echo "<h2>Error upload file</h2>";
    } elseif (!$file->isImage()) {
        echo "<h2>File is not image</h2>";
    } else {
        move_uploaded_file($file->tempFileName(), $file->fileName());
    }

    redirect('/forms/file.php');
}


?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file">

    <input type="submit" name="doUpload" value="send">
</form>

<?php foreach (PhotoAlbum::list() as $img): ?>
    <img src="<?php echo $img['url'] ?>" width="200" alt="">
<?php endforeach; ?>
