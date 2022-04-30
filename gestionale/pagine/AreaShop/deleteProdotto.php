<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
$id = $_POST['idElimina'];
//elimina

$sql = "DELETE FROM prodotto WHERE prodotto.id = '" . $id . "';";
mysqli_query($link, $sql);

$_SESSION['ultimaPage'] = "prodotti";
header("Location: ../../index.php");
