<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
$idProdotto = $_POST['idProdotto'];
$idGiocatore = strtok($_POST['city'],")");
//fotoprofilo
try {
    $sql = "SELECT count(prodotto.id) AS numRighe FROM prodotto";
    //echo "$sql<br>";
    $number = 0;
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $number = $row['numRighe'] + 1;
    }
} catch (Exception $e) {
    //echo $e->getMessage() . "<br/>";
    while ($e = $e->getPrevious()) {
        //echo 'Previous exception: ' . $e->getMessage() . "<br/>";
    }
}
//header("Location: ../../index.php");
