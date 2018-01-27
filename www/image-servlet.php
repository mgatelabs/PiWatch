<?php
    require_once('customize.php');

    $imageId = $_GET['id'];

    $url = $image_servlets[$imageId];

    $content = file_get_contents($url);

    header("content-type: image/jpeg");

    echo $content;
?>