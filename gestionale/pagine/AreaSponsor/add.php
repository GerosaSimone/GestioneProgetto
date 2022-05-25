<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
$data = date("Y-m-d");
$nome = $_POST["nome"];
$entrata = str_replace('.', '', strtok($_POST['entrata'], ','));
//fotoprofilo
try {
    $sql = "INSERT INTO sponsor (`nome`, `entrata`, `data`) VALUES ('$nome', '$entrata', '$data');";
    mysqli_query($link, $sql);
} catch (Exception $e) {
    //echo $e->getMessage() . "<br/>";
    while ($e = $e->getPrevious()) {
        //echo 'Previous exception: ' . $e->getMessage() . "<br/>";
    }
}
header("Location: ../../index.php");
