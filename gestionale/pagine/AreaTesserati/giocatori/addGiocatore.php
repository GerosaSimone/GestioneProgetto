<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../config.php';
echo "cf:" . $_POST['cf'] .    " <br>nome: " . $_POST['nome'] .  " <br>cognome: " .  $_POST['cognome']   . " <br>dataNascita: " . $_POST['dataNascita']   . " <br>luogoNascita: " . $_POST['luogoNascita'] . " <br>ruolo: " . $_POST['ruolo']    . " <br>via: " . $_POST['via']   . " <br>provincia: " . $_POST['provincia'] . " <br>citta: " . $_POST['citta']   . " <br>foto1: " . $_POST['foto1']  . " <br>daPagare: " . $_POST['daPagare']  . " <br>Pagato: " . $_POST['pagato']  . " <br>categoria: " . $_POST['categoria'];
//echo "tipoVisita: " . $_POST['tipoVisita'] . " <br>scadenza: "  . $_POST['scadenza'] . " <br>foto2: " . $_POST['foto2'];
$mancanze = "Mancano le seguenti informazioni\n";
//tesserato
$campi = "";
$param = "";
//anagrafica
if (!empty($_POST['cf']) && !empty($_POST['nome']) && !empty($_POST['cognome']) && !empty($_POST['dataNascita']) && !empty($_POST['luogoNascita'])) {
    echo "entro anagrafica";
    $campi = "cf, nome, cognome, dataNascita, luogoNascita, tipo";
    $param = "'" . $_POST['cf'] . "','" . $_POST['nome'] . "','" . $_POST['cognome'] . "','" . $_POST['dataNascita'] . "','" . $_POST['luogoNascita'] . "','0'";
} else
    $mancanze .= "- Campi anagrafica\n";
//categoria
if (!empty($_POST['categoria'])) {
    $campi .= ", idCategoria";
    $param .= ",'" . $_POST['categoria'] . "'";
} else
    $mancanze .= "- Campi anagrafica\n";
//ruolo
if (!empty($_POST['ruolo'])) {
    $campi .= ", ruolo";
    $param .= ",'" . $_POST['ruolo'] . "'";
}
//residenza
if (!empty($_POST['via']) && !empty($_POST['provincia']) && !empty($_POST['citta'])) {
    echo "entro residenza";
    $campi .= ", via, provincia, Citta";
    $param .= ",'" . $_POST['via'] . "','" . $_POST['provincia'] . "','" . $_POST['citta'] . "'";
} else
    $mancanze .= "- Campi residenza\n";
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
}
//crea visita
$idVisita = -1;
if (isset($_POST['tipoVisita']) && isset($_POST['scadenza'])) {
    echo "entro";
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
} else {
    $mancanze .= "- Campi visita\n";
}
if ($idVisita != -1) {
    $campi .= ",idVisita";
    $param .= ",'" . $idVisita . "'";
}
echo $mancanze;
//creazione query
if ($mancanze != "Mancano le seguenti informazioni\n") {
} else {
    $sql = "INSERT INTO tesserato ($campi) VALUES ($param);";
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
    echo $numTel . "<br>" . $numMail;
    for ($i = 1; $i <= $numTel; $i++) {
        $contatto = "contatto" . $i;
        $tel = "tel" . $i;
        if (isset($_POST[$contatto]) && isset($_POST[$tel])) {
            $sql = "INSERT INTO telefono (nome, telefono, idTesserato) VALUES ('" . $_POST[$contatto] . "', '" . $_POST[$tel] . "', '$idTesserato');";
            mysqli_query($link, $sql);
        }
    }
    for ($i = 1; $i <= $numMail; $i++) {
        $contatto = "contatto" . $i;
        $mail = "mail" . $i;
        if (isset($_POST[$contatto]) && isset($_POST[$mail])) {
            $sql = "INSERT INTO mail (nome, mail, idTesserato) VALUES ('" . $_POST[$contatto] . "', '" . $_POST[$mail] . "', '$idTesserato');";
            mysqli_query($link, $sql);
        }
    }
}
$_SESSION['ultimaPage'] = "giocatori";
header("Location: ../../../index.php");
