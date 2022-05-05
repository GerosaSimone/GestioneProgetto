<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';

$id=$_GET['id'];
$descrizione = "";



$_SESSION['ultimaPage'] = $_POST['squadra'];
header("Location: ../../../index.php");
