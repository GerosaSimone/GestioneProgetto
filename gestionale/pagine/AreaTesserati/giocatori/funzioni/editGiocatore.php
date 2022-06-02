<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../../config.php';

try {
    function caricaImmagine()
    {
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
        if ($_FILES["fileToUpload1"]["size"] > 5000000) {
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
        return "fotoVisita" . $_POST['cf'] . "." . $imageFileType;
    }
    //inizializzo query update con param default
    $idTesserato = $_POST['id'];
    //aggiungo ruolo
    $ruolo = null;
    if (!empty($_POST['ruolo'])) {
        $ruolo = $_POST['ruolo'];
    }
    //aggiungo daPagare e pagato
    $daPagare = 0;
    if (!empty($_POST['daPagare'])) {
        $daPagare = str_replace('.', '', strtok($_POST['daPagare'], ','));
    }
    $pagato = 0;
    if (!empty($_POST['pagato'])) {
        $pagato = str_replace('.', '', strtok($_POST['pagato'], ','));
    }
    //cerca visita
    $idVisita = null;
    $sql = "SELECT idVisita FROM tesserato WHERE id='" . $idTesserato . "'";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $idVisita = $row['idVisita'];
        }
    }
    if ($idVisita != null) {
        if (!isset($_POST['tipoVisita']) || !isset($_POST['scadenza'])) {
            //se nel modal non c'e' nulla cancello anche dal db
            $sql = "SELECT foto FROM visita WHERE id='" . $idVisita . "'";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    if (file_exists('../../../../img/uploadsVisita/' . $row['foto'])) {
                        unlink('../../../../img/uploadsVisita/' . $row['foto']);
                    }
                }
            }
            $sql = "UPDATE tesserato SET idVisita=null WHERE id=$idTesserato";
            mysqli_query($link, $sql);
            $sql = "DELETE FROM visita WHERE `visita`.`id` = $idVisita";
            mysqli_query($link, $sql);
        } else {
            if (!empty($_FILES['fileToUpload1']['tmp_name'])) {
                $tmp = caricaImmagine();
                $tipo = $_POST['tipoVisita'];
                $scadenza = $_POST['scadenza'];
                $sql = "UPDATE visita SET tipo='$tipo',scadenza='$scadenza', foto='$tmp' WHERE id=$idVisita";
                mysqli_query($link, $sql);
            } else {
                $tipo = $_POST['tipoVisita'];
                $scadenza = $_POST['scadenza'];
                $sql = "UPDATE visita SET tipo='$tipo',scadenza='$scadenza' WHERE id=$idVisita";
                mysqli_query($link, $sql);
            }
        }
    } else {
        if (isset($_POST['tipoVisita']) && isset($_POST['scadenza'])) {
            if (!empty($_FILES['fileToUpload1']['tmp_name'])) {
                $tmp = caricaImmagine();
                $tipo = $_POST['tipoVisita'];
                $scadenza = $_POST['scadenza'];
                $sql = "INSERT INTO visita (tipo, scadenza, foto) VALUES ('" . $_POST['tipoVisita'] . "', '" . $_POST['scadenza'] . "', '$tmp');";
                mysqli_query($link, $sql);
                $sql = "SELECT id FROM visita WHERE tipo='" . $_POST['tipoVisita'] . "'AND scadenza='" . $_POST['scadenza'] . "'AND foto='$tmp'";
                $result = mysqli_query($link, $sql);
                if ($result = mysqli_query($link, $sql)) {
                    $row = mysqli_fetch_array($result);
                    $idVisita = $row['id'];
                }
            } else {
                $tipo = $_POST['tipoVisita'];
                $scadenza = $_POST['scadenza'];
                $sql = "INSERT INTO visita (tipo, scadenza) VALUES ('" . $_POST['tipoVisita'] . "', '" . $_POST['scadenza'] . "');";
                mysqli_query($link, $sql);
                $sql = "SELECT id FROM visita WHERE tipo='" . $_POST['tipoVisita'] . "'AND scadenza='" . $_POST['scadenza'] . "';";
                $result = mysqli_query($link, $sql);
                if ($result = mysqli_query($link, $sql)) {
                    $row = mysqli_fetch_array($result);
                    $idVisita = $row['id'];
                }
            }
        }
    }
    //controllo se va modificata la fotoProfilo
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
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        }
        $foto = "fotoProfilo" . $_POST['cf'] . ".$imageFileType";
    } else 
    if ($_POST['presenzaFotoProfilo']) {
        //se e' stata cancellata la foto dal modal
        $sql = "SELECT linkFoto FROM tesserato WHERE id='" . $idTesserato . "'";
        if ($result = mysqli_query($link, $sql))
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $foto = $row['linkFoto'];
            }
        try {
            if (file_exists('../../../../img/uploadsProfilo/' . $foto))
                unlink('../../../../img/uploadsProfilo/' . $foto);
        } catch (Exception $e) {
        }
        $foto = null;
    }
    //eseguo query tesserato
    $stmt = $link->prepare("UPDATE tesserato SET cf=?, nome=?, cognome=?, dataNascita=?, luogoNascita=?, tipo=?, via=?, provincia=?, citta=?, idCategoria=?, ruolo=?, linkFoto=?, idVisita=?, daPagare=?, pagato=?,matricola=? WHERE id=?");
    $stmt->bind_param("sssssssssssssssss", $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $n, $o, $p, $q, $m);
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
    $n = $idVisita;
    $o = $daPagare;
    $p = $pagato;
    $m = $idTesserato;
    $q = $_POST['matricola'];
    // set parameters and execute
    $stmt->execute();
    $stmt->close();
    //associo tel e mail
    $numTel = $_POST['numTelefoni'];
    $numMail = $_POST['numMail'];
    $telefoniId = array();
    $mailId = array();
    if (isset($_POST["contatto1"]) && isset($_POST["tel1"])) {
        $sql = "SELECT id FROM telefono WHERE idTesserato='" . $idTesserato . "'";
        if ($result = mysqli_query($link, $sql))
            if (mysqli_num_rows($result) > 0)
                while ($row = mysqli_fetch_array($result))
                    array_push($telefoniId, $row['id']);
        for ($i = 1; $i <= count($telefoniId); $i++) {
            $contatto = "contatto" . $i;
            $tel = "tel" . $i;
            if (isset($_POST[$contatto]) && isset($_POST[$tel])) {
                $stmt = $link->prepare("UPDATE telefono SET nome=?, telefono=?  WHERE id=?");
                $stmt->bind_param("sss", $a, $b, $c);
                $a = $_POST[$contatto];
                $b = $_POST[$tel];
                $c = $telefoniId[$i - 1];
                $stmt->execute();
                $stmt->close();
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
                $stmt = $link->prepare("UPDATE mail SET nome=?, mail=?  WHERE id=?");
                $stmt->bind_param("sss", $a, $b, $c);
                $a = $_POST[$contatto];
                $b = $_POST[$mail];
                $c = $mailId[$i - 1];
                $stmt->execute();
                $stmt->close();
            }
        }
    }
    for ($i = count($telefoniId); $i < $numTel; $i++) {
        $contatto = $_POST["contatto" . ($i + 1)];
        $tel = $_POST["tel" . ($i + 1)];
        $stmt = $link->prepare("INSERT INTO telefono (nome, telefono, idTesserato) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $a, $b, $c);
        $a = $contatto;
        $b = $tel;
        $c = $idTesserato;
        $stmt->execute();
        $stmt->close();
    }
    for ($i = count($mailId); $i < $numMail; $i++) {
        $contatto = $_POST["cont" . ($i + 1)];
        $mail = $_POST["mail" . ($i + 1)];
        $stmt = $link->prepare("INSERT INTO mail (nome, mail, idTesserato) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $a, $b, $c);
        $a = $contatto;
        $b = $mail;
        $c = $idTesserato;
        $stmt->execute();
        $stmt->close();
    }
} catch (Exception $e) {
}
header("Location: ../../../../index.php");
