<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}

require_once '../config.php';
//echo "cf:" . $_POST['cf'] .    " <br>nome: " . $_POST['nome'] .  " <br>cognome: " .  $_POST['cognome']   . " <br>dataNascita: " . $_POST['dataNascita']   . " <br>luogoNascita: " . $_POST['luogoNascita'] . " <br>ruolo: " . $_POST['ruolo']    . " <br>via: " . $_POST['via']   . " <br>provincia: " . $_POST['provincia'] . " <br>citta: " . $_POST['citta']   . " <br>foto1: " . $_POST['foto1']  . " <br>daPagare: " . $_POST['daPagare']  . " <br>Pagato: " . $_POST['pagato']  . " <br>categoria: " . $_POST['categoria'];
//echo "tipoVisita: " . $_POST['tipoVisita'] . " <br>scadenza: "  . $_POST['scadenza'] . " <br>foto2: " . $_POST['foto2'];

//crea visita
$idVisita = -1;
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
$sql = "INSERT INTO tesserato (cf, nome, cognome, dataNascita, luogoNascita, tipo, ruolo, idVisita, via, provincia, Citta, linkFoto,daPagare, pagato, idCategoria) VALUES ('" . $_POST['cf'] . "','" . $_POST['nome'] . "','" . $_POST['cognome'] . "','" . $_POST['dataNascita'] . "','" . $_POST['luogoNascita'] . "','0','" . $_POST['ruolo'] . "','" . $idVisita . "','" . $_POST['via'] . "','" . $_POST['provincia'] . "','" . $_POST['citta'] . "','" . $_POST['foto1'] . "','" . $_POST['daPagare'] . "','" . $_POST['pagato'] . "','" . $_POST['categoria'] . "');";
mysqli_query($link, $sql);


$_SESSION['ultimaPage'] = "giocatori";
header("Location: ../../../index.php");
