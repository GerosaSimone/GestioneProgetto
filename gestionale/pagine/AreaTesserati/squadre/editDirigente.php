<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';

try {
    //inizializzo query update con param default
    $idTesserato = $_POST['id'];
    $query = "UPDATE tesserato SET cf='" . $_POST['cf'] . "',nome='" . $_POST['nome'] . "',cognome='" . $_POST['cognome'] . "', dataNascita='" . $_POST['dataNascita'] . "', luogoNascita='" . $_POST['luogoNascita'] .  "',via='" . $_POST['via'] . "',provincia='" . $_POST['provincia'] . "', citta='" . $_POST['citta'] . "',idCategoria='" . $_POST['categoria'] . "'";
    //aggiungo ruolo
    if (!empty($_POST['ruolo'])) {
        $query .= ", ruolo" . "='" . $_POST['ruolo'] . "'";
    }
    //controllo se va modificata la fotoProfilo
    $nomeFoto = "";
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
            } else {
                //echo "Sorry, there was an error uploading your file.";
            }
        }
        $nomeFoto = "fotoProfilo" . $_POST['cf'] . ".$imageFileType";
        $query .= ", linkFoto" . "='$nomeFoto'";
    } else 
    if ($_POST['presenzaFotoProfilo']) {
        //se e' stata cancellata la foto dal modal
        $sql = "SELECT linkFoto FROM tesserato WHERE id='" . $idTesserato . "'";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $nomeFoto = $row['linkFoto'];
            }
        }
        //echo $nomeFoto;
        try {
            if (!is_dir('../../../img/uploadsVisita/' . $nomeFoto)) {
                if (file_exists('../../../img/uploadsProfilo/' . $nomeFoto)) {
                    unlink('../../../img/uploadsProfilo/' . $nomeFoto);
                }
            }
        } catch (Exception $e) {
            //echo "<br/>" . "Errore eliminazione foto Profilo" . "<br/>";
        }
        $query .= ", linkFoto" . "=null";
    }
    //eseguo query tesserato
    $query .= " WHERE tesserato.id = '" . $idTesserato . "'";
    mysqli_query($link, $query);
    //echo " $query<br>";
    //associo tel e mail
    $numTel = $_POST['numTelefoni'];
    $numMail = $_POST['numMail'];
    $telefoniId = array();
    $mailId = array();
    if (isset($_POST["contatto1"]) && isset($_POST["tel1"])) {
        $sql = "SELECT id FROM telefono WHERE idTesserato='" . $idTesserato . "'";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    array_push($telefoniId, $row['id']);
                }
            }
        }
        for ($i = 1; $i <= count($telefoniId); $i++) {
            $contatto = "contatto" . $i;
            $tel = "tel" . $i;
            if (isset($_POST[$contatto]) && isset($_POST[$tel])) {
                $sql = "UPDATE telefono SET nome='" . $_POST[$contatto] . "', telefono='" . $_POST[$tel] . "'  WHERE id='" . $telefoniId[$i - 1] . "'";
                mysqli_query($link, $sql);
            }
        }
    }
    if (isset($_POST["cont1"]) && isset($_POST["mail1"])) {
        $sql = "SELECT id FROM mail WHERE idTesserato='" . $idTesserato . "'";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    array_push($mailId, $row['id']);
                }
            }
        }
        for ($i = 1; $i <= count($mailId); $i++) {
            $contatto = "cont" . $i;
            $mail = "mail" . $i;
            if (isset($_POST[$contatto]) && isset($_POST[$mail])) {
                $sql = "UPDATE mail SET nome='" . $_POST[$contatto] . "', mail='" . $_POST[$mail] . "' WHERE id='" . $mailId[$i - 1] . "'";
                mysqli_query($link, $sql);
            }
        }
    }
    for ($i = count($telefoniId); $i < $numTel; $i++) {
        $contatto = $_POST["contatto" . ($i + 1)];
        $tel = $_POST["tel" . ($i + 1)];
        $sql = "INSERT INTO telefono (nome, telefono, idTesserato) VALUES ('$contatto', '$tel', '$idTesserato');";
        mysqli_query($link, $sql);
    }
    for ($i = count($mailId); $i < $numMail; $i++) {
        $contatto = $_POST["cont" . ($i + 1)];
        $mail = $_POST["mail" . ($i + 1)];
        $sql = "INSERT INTO mail (nome, mail, idTesserato) VALUES ('$contatto', '$mail', '$idTesserato');";
        mysqli_query($link, $sql);
    }
    $sql = "DELETE FROM telefono WHERE telefono.telefono = '';";
    mysqli_query($link, $sql);
    $sql = "DELETE FROM mail WHERE mail.mail = '';";
    mysqli_query($link, $sql);
} catch (Exception $e) {
    //echo "<br/>" . $e->getMessage() . "<br/>";
    while ($e = $e->getPrevious()) {
        //echo 'Previous exception: ' . $e->getMessage() . "<br/>";
    }
}
header("Location: ../../../index.php");
