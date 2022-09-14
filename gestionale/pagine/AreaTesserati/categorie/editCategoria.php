<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';

try {
    $id = $_POST['idModifica'];
    $stmt = $link->prepare("UPDATE categoria SET nome=? WHERE id=?");
    $stmt->bind_param("si", $a, $b);
    $a = $_POST['nome'];
    $b =  $id;
    $stmt->execute();
    $stmt->close();
} catch (Exception $e) {
}
header("Location: ../../../index.php");
