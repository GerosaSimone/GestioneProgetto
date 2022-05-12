<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
try {
    $id = $_POST['idElimina'];
    $sql = "DELETE FROM prodotto WHERE prodotto.id = '" . $id . "';";
    echo $sql;
    mysqli_query($link, $sql);
} catch (Exception $e) {
    ////echo $e->getMessage() . "<br/>";
    while ($e = $e->getPrevious()) {
        ////echo 'Previous exception: ' . $e->getMessage() . "<br/>";
    }
}
header("Location: ../../index.php");
