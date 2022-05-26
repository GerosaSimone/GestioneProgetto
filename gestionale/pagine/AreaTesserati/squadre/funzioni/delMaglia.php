<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../../config.php';
try {
    $id = $_GET['idMaglia'];
    $sql = "SELECT foto FROM maglia WHERE id='" . $id . "'";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $path = '../../../../img/uploadsDivise/' . $row['foto'];
            if (file_exists($path))
                unlink($path);
        }
    }
    $sql = "DELETE FROM usa WHERE `usa`.`idMaglia` = '$id';";
    $sql .= "DELETE FROM maglia WHERE `maglia`.`id` = '$id'";
    mysqli_multi_query($link, $sql);
} catch (Exception $e) {
}
header("Location: ../../../../index.php");
