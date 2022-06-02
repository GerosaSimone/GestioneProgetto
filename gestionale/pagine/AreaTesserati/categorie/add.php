<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$nome = $_POST["nome"];
try {
    $stmt = $link->prepare("INSERT INTO categoria (`nome`) VALUES (?)");
    $stmt->bind_param("s", $a);
    $a = $nome;   
    $stmt->execute();
    $stmt->close();
} catch (Exception $e) {
}
header("Location: ../../../index.php");
