<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
try {
    $id = $_POST['idElimina'];
    $sql = "UPDATE `prodotto` SET `nascosto`='1' WHERE id='$id'";
    mysqli_query($link, $sql);
} catch (Exception $e) {
}
header("Location: ../../../index.php");
