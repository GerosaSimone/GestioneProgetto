<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
try {
    $id = $_POST['idEliminaAcquisto'];
    $costo;
    $idTesserato;
    $daPagare;
    $taglia;
    $idProdotto;
    $quantita;
    $sql = "SELECT costoUnitario, idTesserato, acquistigiocatori.taglia, acquistigiocatori.idProdotto 
            FROM acquistigiocatori 
            inner join prodotto on acquistigiocatori.idProdotto=prodotto.id 
            WHERE acquistigiocatori.id = '" . $id . "';";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $costo = $row['costoUnitario'];
        $idTesserato = $row['idTesserato'];
        $taglia = $row['taglia'];
        $idProdotto = $row['idProdotto'];
    }
    $sql = "SELECT daPagare from tesserato WHERE id = '" . $idTesserato . "';";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $daPagare = $row['daPagare'] - $costo;
    }
    $sql = "SELECT quantita from magazzino WHERE idProdotto = '" . $idProdotto . "' and taglia='$taglia';";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $quantita = $row['quantita'] + 1;
    }
    $sql = "UPDATE tesserato set daPagare='" . $daPagare . "' WHERE id = '" . $idTesserato . "';";
    $sql .= "UPDATE magazzino set quantita='" . $quantita . "' WHERE idProdotto = '" . $idProdotto . "' and taglia='$taglia';";
    $sql .= "DELETE FROM acquistigiocatori WHERE id = '" . $id . "';";
    mysqli_multi_query($link, $sql);
} catch (Exception $e) {
}
header("Location: ../../../index.php");
