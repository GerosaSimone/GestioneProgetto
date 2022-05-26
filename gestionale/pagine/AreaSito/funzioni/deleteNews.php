<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
try {
    $id = $_POST['idEliminaNews'];
    $sql = "SELECT foto FROM news WHERE id='" . $id . "'";
    $foto = 0;
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $foto = $row['foto'];
    }
    try {
        if (file_exists('../../../img/uploadsNews/' . $foto)) {
            unlink('../../../img/uploadsNews/' . $foto);
        }
    } catch (Exception $e) {
    }
    $sql = "DELETE FROM news WHERE news.id = '" . $id . "';";
    mysqli_query($link, $sql);
} catch (Exception $e) {
}
header("Location: ../../../index.php");
