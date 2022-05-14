<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
try {
    $id = $_POST['idEliminaAcquisto'];    
    $sql = "SELECT costoUnitario, idTesserato from acquistigiocatori inner join prodotto on acquistigiocatori.idProdotto=prodotto.id WHERE acquistigiocatori.id = '" . $id . "';";
    //echo $sql . "<br>";
    $costo;
    $idTesserato;
    $daPagare;
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $costo = $row['costoUnitario'];        
        $idTesserato=$row['idTesserato'];
    }
    $sql = "SELECT daPagare from tesserato WHERE id = '" . $idTesserato . "';";
    //echo $sql . "<br>";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $daPagare = $row['daPagare'] - $costo;
    }
    $sql = "UPDATE tesserato set daPagare='" . $daPagare . "' WHERE id = '" . $idTesserato . "';";
    mysqli_query($link, $sql);
    //echo $sql . "<br>";
    $sql = "DELETE FROM acquistigiocatori WHERE id = '" . $id . "';";
    mysqli_query($link, $sql);
} catch (Exception $e) {
    //echo $e->getMessage() . "<br/>";
    while ($e = $e->getPrevious()) {
        //echo 'Previous exception: ' . $e->getMessage() . "<br/>";
    }
}
header("Location: ../../index.php");
