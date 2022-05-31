<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
try {
    $id = $_POST['idElimina'];
    $sql = "DELETE FROM `utenti` WHERE id=?;";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);        
    mysqli_query($link, $sql);
    }
} catch (Exception $e) {
}
header("Location: ../../index.php");
