<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$id = $_POST['idElimina'];
//elimina
$sql = "SELECT linkFoto FROM tesserato WHERE tesserato.id = '" . $id . "';";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $foto = $row['linkFoto'];
    unlink('../../../img/uploadsProfilo/'. $foto);}
      
}
//telefono
$sql = "DELETE FROM telefono WHERE telefono.idTesserato = '" . $id . "';";
mysqli_query($link, $sql);
//mail
$sql = "DELETE FROM mail WHERE mail.idTesserato = '" . $id . "';";
mysqli_query($link, $sql);
//prendo visita
$idVisita = -1;
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
if ($idVisita != -1) {
    $sql = "SELECT foto FROM visita WHERE visita.id = '" . $idVisita . "';";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $foto = $row['foto'];
        unlink('../../../img/uploadsVisita/'. $foto);
    }
    $sql = "DELETE FROM visita WHERE visita.id = '" . $idVisita . "';";
    mysqli_query($link, $sql);
}

$_SESSION['ultimaPage'] = "giocatori";
header("Location: ../../../index.php");
