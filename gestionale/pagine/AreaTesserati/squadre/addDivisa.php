<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';


$descrizione = "";
if (isset($_GET['descrizione']))
    $descrizione = $_GET['descrizione'];
//fotoprofilo
if (!empty($_FILES['fileToUpload']['tmp_name']) && !empty($_GET['titolo'])) {
    $target_dir = "../../../img/uploadsDivise/";
    $target_file = $target_dir . "fotoDivisa" . $_GET['squadra'] . $_GET['titolo'];
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
    $titolo = "fotoDivisa" . $_GET['squadra'] . $_GET['titolo'] . ".$imageFileType ";
    $target_file .= "." . $imageFileType;
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
        //echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {           
            $sql = "INSERT INTO maglia (titolo, descrizione, foto) VALUES ('" . $_POST['titolo'] . "', '$descrizione', '$titolo');";
            mysqli_query($link, $sql);  
            echo $sql;          
        } else {
            //echo "Sorry, there was an error uploading your file.";
        }
    }
}


$_SESSION['ultimaPage'] = $_GET['squadra'];
//header("Location: ../../../index.php");