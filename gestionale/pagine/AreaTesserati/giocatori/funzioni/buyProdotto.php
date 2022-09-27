<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../../config.php';
try {
    $idTesserato = $_POST['idTesserato'];
    $idProdotto = strtok($_POST['city'], ")");
    $taglia = $_POST['taglia'];
    $dataAcquisto = date("Y-m-d");
    $daPagare = 0;
    $quantita = 0;
    $sql = "SELECT tesserato.daPagare,prodotto.costoUnitario 
            FROM tesserato,prodotto 
            WHERE tesserato.id='$idTesserato' and prodotto.id='$idProdotto'";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $daPagare = $row['daPagare'] + $row['costoUnitario'];
    }
    $sql = "UPDATE tesserato SET daPagare='" . $daPagare . "' WHERE id='" . $idTesserato . "'";
    mysqli_query($link, $sql);
    $sql = "SELECT quantita FROM magazzino WHERE idProdotto='$idProdotto' and taglia='$taglia'";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $quantita = $row['quantita'] - 1;
    }
    $sql = "UPDATE magazzino SET quantita='" . $quantita . "' WHERE idProdotto='$idProdotto' AND taglia='$taglia';";
    $sql .= "INSERT INTO acquistigiocatori (idTesserato, idProdotto, taglia, dataAcquisto) VALUES ('$idTesserato', '$idProdotto', '$taglia','$dataAcquisto')";
    mysqli_multi_query($link, $sql);
} catch (Exception $e) {
}
header("Location: ../../../../index.php");
