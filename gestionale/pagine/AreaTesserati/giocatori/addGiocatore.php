<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
try {
    $campi = "cf, nome, cognome, dataNascita, luogoNascita, tipo, via, provincia, Citta, idCategoria";
    $param = "'" . $_POST['cf'] . "','" . $_POST['nome'] . "','" . $_POST['cognome'] . "','" . $_POST['dataNascita'] . "','" . $_POST['luogoNascita'] . "','0','" . $_POST['via'] . "','" . $_POST['provincia'] . "','" . $_POST['citta'] . "','" . $_POST['categoria'] . "'";
    //ruolo
    if (!empty($_POST['ruolo'])) {
        $campi .= ", ruolo";
        $param .= ",'" . $_POST['ruolo'] . "'";
    }
    //daPagare e pagato
    if (!empty($_POST['daPagare'])) {
        $campi .= ", daPagare";
        $param .= ",'" . substr($_POST['daPagare'], 0, -6) . "'";
    }
    if (!empty($_POST['pagato'])) {
        $campi .= ", pagato";
        $param .= ",'" . substr($_POST['pagato'], 0, -6) . "'";
    }
    //crea visita
    $idVisita = null;
    if (isset($_POST['tipoVisita']) && isset($_POST['scadenza'])) {
        if (!empty($_FILES['fileToUpload1']['tmp_name'])) {
            $target_dir = "../../../img/uploadsVisita/";
            $target_file = $target_dir . "fotoVisita" . $_POST['cf'];
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["fileToUpload1"]["name"]), PATHINFO_EXTENSION));
            $target_file .= "." . $imageFileType;
            $check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            if ($_FILES["fileToUpload1"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload1"]["name"])) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            $sql = "INSERT INTO visita (tipo, scadenza, foto) VALUES ('" . $_POST['tipoVisita'] . "', '" . $_POST['scadenza'] . "', '" . "fotoVisita" . $_POST['cf'] . "." . $imageFileType . "');";
            mysqli_query($link, $sql);
            $sql = "SELECT id FROM visita WHERE tipo='" . $_POST['tipoVisita'] . "'AND scadenza='" . $_POST['scadenza'] . "'AND foto='" . "fotoVisita" . $_POST['cf'] . "." . $imageFileType . "'";
            $result = mysqli_query($link, $sql);
            if ($result = mysqli_query($link, $sql)) {
                $row = mysqli_fetch_array($result);
                $idVisita = $row['id'];
            }
        } else {
            $sql = "SELECT id FROM visita WHERE tipo='" . $_POST['tipoVisita'] . "'AND scadenza='" . $_POST['scadenza'] . "'";
            $result = mysqli_query($link, $sql);
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $idVisita = $row['id'];
                } else {
                    $sql = "INSERT INTO visita (tipo, scadenza) VALUES ('" . $_POST['tipoVisita'] . "', '" . $_POST['scadenza'] . "');";
                    mysqli_query($link, $sql);
                    $sql = "SELECT id FROM visita WHERE tipo='" . $_POST['tipoVisita'] . "'AND scadenza='" . $_POST['scadenza'] . "'";
                    if ($result = mysqli_query($link, $sql)) {
                        $row = mysqli_fetch_array($result);
                        $idVisita = $row['id'];
                    }
                }
            }
        }
    }
    if ($idVisita != null) {
        $campi .= ",idVisita";
        $param .= ",'" . $idVisita . "'";
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
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                $campi .= ", linkFoto";
                $param .= ",'" . "fotoProfilo" . $_POST['cf'] . "." . $imageFileType . "'";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    //creazione tesserato
    $sql = "INSERT INTO tesserato ($campi) VALUES ($param);";
    mysqli_query($link, $sql);
    echo "$sql<br>";
    echo "Insert eseguita con successo!<br>";
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
    echo $e->getMessage() . "<br/>";
    while ($e = $e->getPrevious()) {
        echo 'Previous exception: ' . $e->getMessage() . "<br/>";
    }
}
$_SESSION['ultimaPage'] = "giocatori";
header("Location: ../../../index.php");
