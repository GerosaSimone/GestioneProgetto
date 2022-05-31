<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}

require_once '../config.php';

$sql = "UPDATE categoria  SET pettorine=" . $_GET["pettorine"] . ", palloni=" . $_GET["palloni"] . " WHERE categoria.nome='" . $_GET['squadra'] . "'";
mysqli_query($link, $sql);
$_SESSION['ultimaPage']=$_GET['squadra'];
header("Location: ../../../index.php");
