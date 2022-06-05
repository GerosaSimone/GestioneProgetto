<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../../config.php';
$casa = $_POST["casa"];
$ospite = $_POST["ospite"];
$data = $_POST["data"];
$oraRitrovo = $_POST["oraRitrovo"];
$oraPartita = $_POST["oraPartita"];
$luogoRitrovo = $_POST["luogoRitrovo"];
$luogoPartita = $_POST["luogoPartita"];
$idTesserato = $_POST['idTesserato'];
echo $casa . "<br>" . $ospite . "<br>" . $data . "<br>" . $oraRitrovo . "<br>" . $oraPartita . "<br>" . $luogoRitrovo . "<br>" . $luogoPartita . "<br>";
for ($i = 0; $i < count($idTesserato); $i++) {
    echo ($idTesserato[$i] . " ");
}
//header("Location: ../../../../index.php");
