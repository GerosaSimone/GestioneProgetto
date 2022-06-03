<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';

try {
    $sql = "DELETE FROM tesserato WHERE idCategoria='" . $_POST['idElimina'] . "';";
    mysqli_query($link, $sql);
    echo$sql;
    $sql = "DELETE FROM `categoria` WHERE id='" . $_POST['idElimina'] . "';";
    mysqli_query($link, $sql);
} catch (Exception $e) {
}
header("Location: ../../../index.php");
