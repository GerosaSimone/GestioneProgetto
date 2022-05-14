<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
try {
    $campi = "cf, nome, cognome, dataNascita, luogoNascita, tipo, via, provincia, Citta, idCategoria";
    $param = "'" . $_POST['cf'] . "','" . $_POST['nome'] . "','" . $_POST['cognome'] . "','" . $_POST['dataNascita'] . "','" . $_POST['luogoNascita'] . "','1','" . $_POST['via'] . "','" . $_POST['provincia'] . "','" . $_POST['citta'] . "','" . $_POST['categoria'] . "'";
    //ruolo
    if (!empty($_POST['ruolo'])) {
        $campi .= ", ruolo";
        $param .= ",'" . $_POST['ruolo'] . "'";
    }
    //fotoprofilo
    if (!empty($_FILES['fileToUpload']['tmp_name'])) {
        $target_dir = "../../../img/uploadsProfilo/";
        $target_file = $target_dir . "fotoProfilo" . $_POST['cf'];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
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
                //echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                $campi .= ", linkFoto";
                $param .= ",'" . "fotoProfilo" . $_POST['cf'] . "." . $imageFileType . "'";
            } else {
                //echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    //creazione tesserato
    $sql = "INSERT INTO tesserato ($campi) VALUES ($param);";
    mysqli_query($link, $sql);
    //echo "$sql<br>";
    //echo "Insert eseguita con successo!<br>";
    //prendo idTesserato
    $idTesserato = null;
    $sql = "SELECT id FROM `tesserato` WHERE cf='" . $_POST['cf'] . "'";
    $result = mysqli_query($link, $sql);
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $idTesserato = $row['id'];
    }
    //associo tel mail
    $numTel = $_POST['numTelefoni'];
    $numMail = $_POST['numMail'];
    if (isset($_POST["contatto1"]) && isset($_POST["tel1"]))
        for ($i = 1; $i <= $numTel; $i++) {
            $contatto = "contatto" . $i;
            $tel = "tel" . $i;
            if (isset($_POST[$contatto]) && isset($_POST[$tel])) {
                $sql = "INSERT INTO telefono (nome, telefono, idTesserato) VALUES ('" . $_POST[$contatto] . "', '" . $_POST[$tel] . "', '$idTesserato');";
                mysqli_query($link, $sql);
            }
        }
    if (isset($_POST["cont1"]) && isset($_POST["mail1"]))
        for ($i = 1; $i <= $numMail; $i++) {
            $contatto = "cont" . $i;
            $mail = "mail" . $i;
            if (isset($_POST[$contatto]) && isset($_POST[$mail])) {
                $sql = "INSERT INTO mail (nome, mail, idTesserato) VALUES ('" . $_POST[$contatto] . "', '" . $_POST[$mail] . "', '$idTesserato');";
                mysqli_query($link, $sql);
            }
        }
} catch (Exception $e) {
    //echo $e->getMessage() . "<br/>";
    while ($e = $e->getPrevious()) {
        //echo 'Previous exception: ' . $e->getMessage() . "<br/>";
    }
}
header("Location: ../../../index.php");
