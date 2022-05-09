<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}

require_once '../../../config.php';

$sql = "UPDATE categoria  SET pettorine=" . $_GET["pettorine"] . ", palloni=" . $_GET["palloni"] . " WHERE categoria.nome='" . $_GET['squadra'] . "'";
mysqli_query($link, $sql);
header("Location: ../../../index.php");
