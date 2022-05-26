<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
function getVisita($id, $link)
{
    $idVisita = null;
    $sql = "SELECT idVisita FROM tesserato WHERE tesserato.id = '" . $id . "';";
    $result = mysqli_query($link, $sql);
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $idVisita = $row['idVisita'];
    }
    return $idVisita;
}

try {
    $id = $_POST['idElimina'];
    $sql = "UPDATE `visita` SET `nascosto`='1' WHERE id='" . getVisita($id, $link) . "';";
    $sql .= "UPDATE `tesserato` SET `nascosto`='1' WHERE id=' $id ';";
    mysqli_multi_query($link, $sql);
} catch (Exception $e) {
}
header("Location: ../../index.php");
