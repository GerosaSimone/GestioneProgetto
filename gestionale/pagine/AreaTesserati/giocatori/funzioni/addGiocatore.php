<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../../config.php';
try {
    //ruolo
    $ruolo = null;
    if (!empty($_POST['ruolo'])) {
        $ruolo = $_POST['ruolo'];
    }
    //daPagare e pagato
    $daPagare = 0;
    if (!empty($_POST['daPagare'])) {
        $daPagare = str_replace("€", "", str_replace(",", ".", str_replace(" ", "", $_POST['daPagare'])));
    }
    $pagato = 0;
    if (!empty($_POST['pagato'])) {
        $pagato = str_replace("€", "", str_replace(",", ".", str_replace(" ", "", $_POST['pagato'])));
    }
    //crea visita
    $idVisita = null;
    if (isset($_POST['tipoVisita']) && isset($_POST['scadenza'])) {
        if (!empty($_FILES['fileToUpload1']['tmp_name'])) {
            $target_dir = "../../../../img/uploadsVisita/";
            $target_file = $target_dir . "fotoVisita" . $_POST['cf'];
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["fileToUpload1"]["name"]), PATHINFO_EXTENSION));
            $target_file .= "." . $imageFileType;
            $check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            if ($_FILES["fileToUpload1"]["size"] > 500000) {
                $uploadOk = 0;
            }
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                $uploadOk = 0;
            }
            if ($uploadOk != 0) {
                move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file);
            }
            $stmt = $link->prepare("INSERT INTO visita (tipo, scadenza, foto) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $a, $b, $c);
            $a = $_POST['tipoVisita'];
            $b = $_POST['scadenza'];
            $c = "fotoVisita" . $_POST['cf'] . "." . $imageFileType;
            $stmt->execute();
            $stmt->close();
            $sql = "SELECT id FROM visita WHERE tipo='" . $_POST['tipoVisita'] . "'AND scadenza='" . $_POST['scadenza'] . "'AND foto='" . "fotoVisita" . $_POST['cf'] . "." . $imageFileType . "'";
            $result = mysqli_query($link, $sql);
            if ($result = mysqli_query($link, $sql)) {
                $row = mysqli_fetch_array($result);
                $idVisita = $row['id'];
            }
        } else {
            $stmt = $link->prepare("INSERT INTO visita (tipo, scadenza) VALUES (?, ?)");
            $stmt->bind_param("ss", $a, $b);
            $a = $_POST['tipoVisita'];
            $b = $_POST['scadenza'];
            $stmt->execute();
            $stmt->close();
            $sql = "SELECT id FROM visita ORDER BY id DESC LIMIT 1";
            if ($result = mysqli_query($link, $sql)) {
                $row = mysqli_fetch_array($result);
                $idVisita = $row['id'];
            }
        }
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
                $foto .= "fotoProfilo" . $_POST['cf'] . "." . $imageFileType;
            }
        }
    }
    $stmt = $link->prepare("INSERT INTO tesserato (cf, nome, cognome, dataNascita, luogoNascita, tipo, via, provincia, citta, idCategoria, ruolo, linkFoto,idVisita,daPagare,pagato,matricola) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssssssssss", $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p);
    $a = $_POST['cf'];
    $b = $_POST['nome'];
    $c = $_POST['cognome'];
    $d = $_POST['dataNascita'];
    $e = $_POST['luogoNascita'];
    $f = "0";
    $g = $_POST['via'];
    $h = $_POST['provincia'];
    $i = $_POST['citta'];
    $j = $_POST['categoria'];
    $k = $ruolo;
    $l = $foto;
    $m = $idVisita;
    $n = $daPagare;
    $o = $pagato;
    $p = $_POST['matricola'];
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
//header("Location: ../../../../index.php");
