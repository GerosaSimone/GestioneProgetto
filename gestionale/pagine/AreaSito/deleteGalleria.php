<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
try {
    $id = $_GET['id'];
    $foto = "";
    //prendo foto   
    $sql = "SELECT foto FROM galleria WHERE id = '" . $id . "';";
    $result = mysqli_query($link, $sql);
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $foto = $row['foto'];
    }
    //elimina linkFoto    
    if (file_exists('../../img/uploadsGalleria/' . $foto)) {
        unlink('../../img/uploadsGalleria/' . $foto);
    }
    $sql = "DELETE FROM galleria WHERE id = '" . $id . "';";
    mysqli_query($link, $sql);
} catch (Exception $e) {
    //echo $e->getMessage() . "<br/>";
    while ($e = $e->getPrevious()) {
        //echo 'Previous exception: ' . $e->getMessage() . "<br/>";
    }
}
header("Location: ../../index.php");
