<?php
//STMT

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../../config.php';

try {
    //ruolo
    $ruolo = "N";
    if (!empty($_POST['ruolo'])) {
        $ruolo = $_POST['ruolo'];
    }
    //fotoprofilo
    $foto = null;
    if (!empty($_FILES['fileToUpload']['tmp_name'])) {
        $target_dir = "../../../../img/uploadsProfilo/";
        $target_file = $target_dir . "fotoProfilo" . $_POST['cf'];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
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
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $foto = "fotoProfilo" . $_POST['cf'] . "." . $imageFileType;
            }
        }
    }
    //creazione tesserato
    $stmt = $link->prepare("INSERT INTO tesserato (cf, nome, cognome, dataNascita, luogoNascita, tipo, via, provincia, citta, idCategoria, ruolo, linkFoto,matricola ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssssss", $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m);
    $a = $_POST['cf'];
    $b = $_POST['nome'];
    $c = $_POST['cognome'];
    $d = $_POST['dataNascita'];
    $e = $_POST['luogoNascita'];
    $f = "1";
    $g = $_POST['via'];
    $h = $_POST['provincia'];
    $i = $_POST['citta'];
    $j = $_POST['categoria'];
    $k = $ruolo;
    $l = $foto;
    $m = $_POST['matricola'];
    // set parameters and execute
    $stmt->execute();
    $stmt->close();

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
                $stmt = $link->prepare("INSERT INTO telefono (nome, telefono, idTesserato) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $a, $b, $c);
                // set parameters and execute
                $a = $_POST[$contatto];
                $b = $_POST[$tel];
                $c = $idTesserato;
                $stmt->execute();
                $stmt->close();
            }
        }
    if (isset($_POST["cont1"]) && isset($_POST["mail1"]))
        for ($i = 1; $i <= $numMail; $i++) {
            $contatto = "cont" . $i;
            $mail = "mail" . $i;
            if (isset($_POST[$contatto]) && isset($_POST[$mail])) {
                $stmt = $link->prepare("INSERT INTO mail (nome, mail, idTesserato) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $a, $b, $c);
                // set parameters and execute
                $a = $_POST[$contatto];
                $b = $_POST[$mail];
                $c = $idTesserato;
                $stmt->execute();
                $stmt->close();
            }
        }
} catch (Exception $e) {
}
header("Location: ../../../../index.php");
