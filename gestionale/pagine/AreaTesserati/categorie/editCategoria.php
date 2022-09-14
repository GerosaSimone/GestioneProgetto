<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';

try {
    $id = $_POST['idModifica'];
    
    $stmt = $link->prepare("UPDATE prodotto SET nome = ?, costoUnitario = ?, foto = ? WHERE id = ?");
    $stmt->bind_param("ssss", $a, $b, $c, $d);
    $a = $_POST['nome'];
    $b = str_replace('.', '', strtok($_POST['costo'], ','));
    $c = $titolo;
    $d = $id;    
    $stmt->execute();
    $stmt->close();
} catch (Exception $e) {
}
header("Location: ../../../index.php");