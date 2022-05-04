<?php
function caricaImmagine()
{
    //echo "entro tempppp";
    $target_dir = "../../../img/uploadsVisita/";
    $target_file = $target_dir . "fotoVisita" . $_POST['cf'];
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["fileToUpload1"]["name"]), PATHINFO_EXTENSION));
    $target_file .= "." . $imageFileType;
    $check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
    if ($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload1"]["size"] > 5000000) {
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
        if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
            //echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload1"]["name"])) . " has been uploaded.";
        } else {
            //echo "Sorry, there was an error uploading your file.";
        }
    }
    return "fotoVisita" . $_POST['cf'] . "." . $imageFileType;
}
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';

$idTesserato = $_POST['id'];
//echo "cf:" . $_POST['cf'] .    " <br>nome: " . $_POST['nome'] .  " <br>cognome: " .  $_POST['cognome']   . " <br>dataNascita: " . $_POST['dataNascita']   . " <br>luogoNascita: " . $_POST['luogoNascita'] . " <br>ruolo: " . $_POST['ruolo']    . " <br>via: " . $_POST['via']   . " <br>provincia: " . $_POST['provincia'] . " <br>citta: " . $_POST['citta']   . " <br>foto1: " . $_POST['foto1']  . " <br>daPagare: " . $_POST['daPagare']  . " <br>Pagato: " . $_POST['pagato']  . " <br>categoria: " . $_POST['categoria'];
//echo "tipoVisita: " . $_POST['tipoVisita'] . " <br>scadenza: "  . $_POST['scadenza'] . " <br>foto2: " . $_POST['foto2'];
$query = "UPDATE tesserato SET cf='" . $_POST['cf'] . "',nome='" . $_POST['nome'] . "',cognome='" . $_POST['cognome'] . "', dataNascita='" . $_POST['dataNascita'] . "', luogoNascita='" . $_POST['luogoNascita'] .  "',via='" . $_POST['via'] . "',provincia='" . $_POST['provincia'] . "', citta='" . $_POST['citta'] . "',idCategoria='" . $_POST['categoria'] . "'";

//ruolo
if (!empty($_POST['ruolo'])) {
    $query .= ", ruolo" . "='" . $_POST['ruolo'] . "'";
}
//echo $_POST['daPagare'] . $_POST['pagato'];
//daPagare e pagato
if (!empty($_POST['daPagare'])) {
    $query .= ", daPagare" . "='" . $_POST['daPagare'] . "'";
}
if (!empty($_POST['pagato'])) {
    $query .= ", pagato" . "='" . $_POST['pagato'] . "'";
}

//crea visita
$idVisita = null;
$sql = "SELECT idVisita FROM tesserato WHERE id='" . $idTesserato . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $idVisita = $row['idVisita'];
    }
}

echo "<br> id Visita:" . $idVisita;
if ($idVisita != null) {
    echo "entro1";
    echo $_POST['tipoVisita'] . " " . $_POST['scadenza'];
    if (!isset($_POST['tipoVisita']) || !isset($_POST['scadenza'])) {
        //se nel modal non c'e' nulla cancello anche dal db
        echo "entro2";
        $sql = "SELECT foto FROM visita WHERE id='" . $idVisita . "'";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                if (file_exists('../../../img/uploadsVisita/' . $row['foto'])) {
                    unlink('../../../img/uploadsVisita/' . $row['foto']);
                }
            }
        }
        $sql = "DELETE FROM visita WHERE `visita`.`id` = $idVisita";
        mysqli_query($link, $sql);
        $sql = "UPDATE tesserato SET idVisita=null WHERE id=$idTesserato";
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
    echo "entro 1111111";
    if (isset($_POST['tipoVisita']) && isset($_POST['scadenza'])) {
        if (!empty($_FILES['fileToUpload1']['tmp_name'])) {
            $tmp = caricaImmagine();
            echo $tmp;
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
        $query .= ", idVisita" . "='$idVisita'";
    }
}

//fotoprofilo
echo $_POST['presenzaFotoProfilo'];
if (!empty($_FILES['fileToUpload']['tmp_name'])) {
    echo "<br> entro1111111";
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
    $query .= ", linkFoto" . "='fotoProfilo" . $_POST['cf'] . ".$imageFileType'";
} else 
    if ($_POST['presenzaFotoProfilo'])
    $query .= ", linkFoto" . "=null";

//creazione query
$query .= " WHERE tesserato.id = '" . $idTesserato . "'";
mysqli_query($link, $query);
//associo tel 
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
//echo "count" . count($telefoniId);
//echo "<br>num:" . $numTel . "<br>";
for ($i = count($telefoniId); $i < $numTel; $i++) {
    //echo $i;
    $contatto = $_POST["contatto" . ($i + 1)];
    //echo $contatto;

    $tel = $_POST["tel" . ($i + 1)];
    //echo $tel;
    $sql = "INSERT INTO telefono (nome, telefono, idTesserato) VALUES ('$contatto', '$tel', '$idTesserato');";
    // echo "<br> " . $sql;
    mysqli_query($link, $sql);
}
for ($i = count($mailId); $i < $numMail; $i++) {
    $contatto = $_POST["cont" . ($i + 1)];
    $mail = $_POST["mail" . ($i + 1)];
    $sql = "INSERT INTO mail (nome, mail, idTesserato) VALUES ('$contatto', '$mail', '$idTesserato');";
    //echo "<br> " . $sql;
    mysqli_query($link, $sql);
}
$sql = "DELETE FROM telefono WHERE telefono.telefono = '';";
mysqli_query($link, $sql);
$sql = "DELETE FROM mail WHERE mail.mail = '';";
mysqli_query($link, $sql);
$_SESSION['ultimaPage'] = "giocatori";
header("Location: ../../../index.php");
