<?php
require_once("../../config.php");

$FileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
if ($FileType == "sql") {
    $query = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
    $sql="drop database dbcanzese";
    //mysqli_query($link,$sql);
    $sql="create database dbcanzese";
    //mysqli_query($link,$sql);
    echo $query;
    mysqli_multi_query($link,$query);
}else{
    echo "<script type='text/javascript'>alert('file backup tipo errato');</script>";
}
header("Location: ../../index.php");

