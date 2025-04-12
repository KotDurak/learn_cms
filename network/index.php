<?php
setTextPlain();
$ftpContent = file_get_contents('file:///etc/hosts');

echo $ftpContent;