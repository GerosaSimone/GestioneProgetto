<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$nome = $_POST["user"];
$tipo = $_POST["tipo"];
$categoria = null;
if ($tipo == 1)
    $categoria = $_POST["categoria"];
$password = md5($_POST["password"]);
try {
    $stmt = $link->prepare("INSERT INTO utenti (`user`, `password`, `tipo`,idCategoria) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $a, $b, $c, $d);
    $a = $nome;
    $b = $password;
    $c = $tipo;
    $d = $categoria;
    $stmt->execute();
    $stmt->close();
} catch (Exception $e) {
}
header("Location: ../../../index.php");
