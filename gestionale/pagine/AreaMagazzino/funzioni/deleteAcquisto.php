<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
try {
    $id = $_POST['idEliminaAcquisto'];
    $quantita;
    $idMagazzino;
    $sql = "SELECT quantita,idMagazzino FROM acquistimagazzino WHERE id='" . $id . "'";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $quantita = $row['quantita'];
            $idMagazzino = $row['idMagazzino'];
        }
    }
    $sql = "SELECT quantita FROM magazzino WHERE id='" . $idMagazzino . "'";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $quantita = $row['quantita'] - $quantita;
        }
    }
    $sql = "UPDATE `magazzino` SET `quantita`='$quantita' WHERE id='$idMagazzino';";
    $sql .= "DELETE FROM `acquistimagazzino`  WHERE id='$id'";
    mysqli_multi_query($link, $sql);
} catch (Exception $e) {
}
header("Location: ../../../index.php");
