<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';

echo "cf:" . $_POST['cf'] .    " <br>nome: " . $_POST['nome'] .  " <br>cognome: " .  $_POST['cognome']   . " <br>dataNascita: " . $_POST['dataNascita']   . " <br>luogoNascita: " . $_POST['luogoNascita'] . " <br>ruolo: " . $_POST['ruolo']    . " <br>via: " . $_POST['via']   . " <br>provincia: " . $_POST['provincia'] . " <br>citta: " . $_POST['citta']   . " <br>foto1: " . $_POST['foto1']  . " <br>daPagare: " . $_POST['daPagare']  . " <br>Pagato: " . $_POST['pagato']  . " <br>categoria: " . $_POST['categoria'];
echo "tipoVisita: " . $_POST['tipoVisita'] . " <br>scadenza: "  . $_POST['scadenza'] . " <br>foto2: " . $_POST['foto2'];

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
    $param .= ",'" . $_POST['daPagare'] . "'";
}
if (!empty($_POST['pagato'])) {
    $campi .= ", pagato";
    $param .= ",'" . $_POST['pagato'] . "'";
}
//foto
if (!empty($_POST['foto1'])) {
    $campi .= ", linkFoto";
    $param .= ",'" . $_POST['foto1'] . "'";
    print_r($_FILES);
}
//crea visita
$idVisita = -1;
if (isset($_POST['tipoVisita']) && isset($_POST['scadenza'])) {
    //echo "entro";
    if (isset($_POST['foto2'])) {
        $sql = "INSERT INTO visita (tipo, scadenza, foto) VALUES ('" . $_POST['tipoVisita'] . "', '" . $_POST['scadenza'] . "', '" . $_POST['foto2'] . "');";
        mysqli_query($link, $sql);
        $sql = "SELECT id FROM visita WHERE tipo='" . $_POST['tipoVisita'] . "'AND scadenza='" . $_POST['scadenza'] . "'AND foto='" . $_POST['foto2'] . "'";
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
                $sql = "INSERT INTO visita (tipo, scadenza, foto) VALUES ('" . $_POST['tipoVisita'] . "', '" . $_POST['scadenza'] . "');";
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
if ($idVisita != -1) {
    $campi .= ",idVisita";
    $param .= ",'" . $idVisita . "'";
}
//creazione query
$sql = "INSERT INTO tesserato ($campi) VALUES ($param);";
echo $sql;
mysqli_query($link, $sql);
//prendo idTesserato
$idTesserato = -1;
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
    //echo $numTel . "<br>" . $numMail;
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
$_SESSION['ultimaPage'] = "giocatori";
//header("Location: ../../../index.php");
