<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../config.php';
//elimina
$id = $_POST['idElimina'];
$sql = "DELETE FROM tesserato WHERE tesserato.id = '" . $id . "';";
mysqli_query($link, $sql);

$_SESSION['ultimaPage'] = "giocatori";
header("Location: ../../../index.php");
