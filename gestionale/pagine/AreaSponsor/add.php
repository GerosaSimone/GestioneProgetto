<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
$data = date("Y-m-d");
$nome = $_POST["nome"];
$entrata = str_replace("€", "", str_replace(",", ".", str_replace(" ", "", $_POST['entrata'])));
try {
    $stmt = $link->prepare("INSERT INTO sponsor (`nome`, `entrata`, `data`) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $a, $b, $c);
    $a = $nome;
    $b = $entrata;
    $c = $data;
    $stmt->execute();
    $stmt->close();
} catch (Exception $e) {
}
header("Location: ../../index.php");
