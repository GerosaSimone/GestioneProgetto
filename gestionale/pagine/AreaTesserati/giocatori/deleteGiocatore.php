<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$id = $_POST['idElimina'];
//elimina
//telefono
$sql = "DELETE FROM telefono WHERE telefono.idTesserato = '" . $id . "';";
mysqli_query($link, $sql);
//mail
$sql = "DELETE FROM mail WHERE mail.idTesserato = '" . $id . "';";
mysqli_query($link, $sql);
//prendo visita
$idVisita = 0;
$sql = "SELECT idVisita FROM tesserato WHERE tesserato.id = '" . $id . "';";
$result = mysqli_query($link, $sql);
if ($result = mysqli_query($link, $sql)) {
    $row = mysqli_fetch_array($result);
    $idVisita = $row['idVisita'];
}
//tesserato
$sql = "DELETE FROM tesserato WHERE tesserato.id = '" . $id . "';";
mysqli_query($link, $sql);
//visita
if ($idVisita != 0) {
    $sql = "DELETE FROM visita WHERE visita.id = '" . $idVisita . "';";
    mysqli_query($link, $sql);
}

$_SESSION['ultimaPage'] = "giocatori";
header("Location: ../../../index.php");
