<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
$nome = $_POST["user"];
$tipo = $_POST["tipo"];
$categoria = $_POST["categoria"];
$password = md5($_POST["password"]);
try {
    $sql = "INSERT INTO utenti (`user`, `password`, `tipo`,idCategoria) VALUES ('$nome', '$password', '$tipo',$categoria);";
    mysqli_query($link, $sql);
} catch (Exception $e) {
}
header("Location: ../../index.php");
