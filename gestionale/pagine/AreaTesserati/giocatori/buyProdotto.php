<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$idTesserato = $_POST['idTesserato'];
$idProdotto = strtok($_POST['city'], ")");
$taglia = $_POST['taglia'];
$dataAcquisto = date("Y-m-d");
echo $idTesserato . " " . $idProdotto . " " . $taglia . " " . $dataAcquisto;
try {
    $sql = "SELECT tesserato.daPagare,prodotto.costoUnitario FROM tesserato,prodotto WHERE tesserato.id='$idTesserato' and prodotto.id='$idProdotto'";
    //echo "$sql<br>";
    $daPagare = 0;
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $daPagare = $row['daPagare'] + $row['costoUnitario'];
        //echo $daPagare . "<br>";
    }
    $sql = "UPDATE tesserato SET daPagare='" . $daPagare . "' WHERE id='" . $idTesserato . "'";
    mysqli_query($link, $sql);
    $sql = "SELECT quantita FROM magazzino WHERE idProdotto='$idProdotto'";
    $quantita = 0;
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $quantita = $row['quantita'] - 1;
    }
    $sql = "UPDATE magazzino SET quantita='" . $quantita . "' WHERE idProdotto='$idProdotto' AND taglia='$taglia'";
    mysqli_query($link, $sql);
    $sql = "INSERT INTO acquistigiocatori (idTesserato, idProdotto, taglia, dataAcquisto) VALUES ('$idTesserato', '$idProdotto', '$taglia','$dataAcquisto')";
    mysqli_query($link, $sql);
} catch (Exception $e) {
    //echo $e->getMessage() . "<br/>";
    while ($e = $e->getPrevious()) {
        //echo 'Previous exception: ' . $e->getMessage() . "<br/>";
    }
}
header("Location: ../../../index.php");
