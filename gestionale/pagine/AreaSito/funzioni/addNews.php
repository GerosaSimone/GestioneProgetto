<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
try {
    if (!empty($_FILES['fileToUpload']['tmp_name'])) {
        $sql = "SELECT count(news.id) AS numRighe FROM news";
        $number = 0;
        if ($result = mysqli_query($link, $sql)) {
            $row = mysqli_fetch_array($result);
            $number = $row['numRighe'] + 1;
        }
        $target_dir = "../../../img/uploadsNews/";
        $target_file = $target_dir . "fotoNews" . $number;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
        $foto =  "fotoNews" . $number . ".$imageFileType";
        $target_file .= "." . $imageFileType;
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 50000000) {
            $uploadOk = 0;
        }
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $uploadOk = 0;
        }
        if ($uploadOk != 0) {
            $titolo = $_POST['titolo'];
            $descrizione = $_POST['descrizione'];
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO news (`titolo`, `descrizione`, `foto`) VALUES ('$titolo', '$descrizione', '$foto');";
                mysqli_query($link, $sql);
            }
        }
    }
} catch (Exception $e) {   
}
header("Location: ../../../index.php");
