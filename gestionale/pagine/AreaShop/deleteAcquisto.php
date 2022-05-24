<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
try {
    $id = $_POST['idEliminaAcquisto'];
    $sql = "SELECT costoUnitario, idTesserato, acquistigiocatori.taglia, acquistigiocatori.idProdotto from acquistigiocatori inner join prodotto on acquistigiocatori.idProdotto=prodotto.id WHERE acquistigiocatori.id = '" . $id . "';";
    //echo $sql . "<br>";
    $costo;
    $idTesserato;
    $daPagare;
    $taglia;
    $idProdotto;
    $quantita;
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $costo = $row['costoUnitario'];
        $idTesserato = $row['idTesserato'];
        $taglia = $row['taglia'];
        $idProdotto = $row['idProdotto'];
    }
    $sql = "SELECT daPagare from tesserato WHERE id = '" . $idTesserato . "';";
    //echo $sql . "<br>";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $daPagare = $row['daPagare'] - $costo;
    }
    $sql = "SELECT quantita from magazzino WHERE idProdotto = '" . $idProdotto . "' and taglia='$taglia';";
    //echo $sql . "<br>";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $quantita = $row['quantita'] + 1;
    }
    $sql = "UPDATE tesserato set daPagare='" . $daPagare . "' WHERE id = '" . $idTesserato . "';";
    mysqli_query($link, $sql);
    $sql = "UPDATE magazzino set quantita='" . $quantita . "' WHERE idProdotto = '" . $idProdotto . "' and taglia='$taglia';";
    mysqli_query($link, $sql);
    $sql = "DELETE FROM acquistigiocatori WHERE id = '" . $id . "';";
    mysqli_query($link, $sql);
} catch (Exception $e) {
    //echo $e->getMessage() . "<br/>";
    while ($e = $e->getPrevious()) {
        //echo 'Previous exception: ' . $e->getMessage() . "<br/>";
    }
}
header("Location: ../../index.php");
