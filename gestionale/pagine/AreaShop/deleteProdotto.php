<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
try {
    $id = $_POST['idElimina'];
    $sql = "UPDATE `prodotto` SET `nascosto`='1' WHERE id='$id'";
    mysqli_query($link, $sql);
} catch (Exception $e) {
    //echo $e->getMessage() . "<br/>";
    while ($e = $e->getPrevious()) {
        //echo 'Previous exception: ' . $e->getMessage() . "<br/>";
    }
}
header("Location: ../../index.php");


/*
$sql = "DELETE FROM magazzino WHERE idProdotto = '" . $id . "';";
    //echo $sql;
    mysqli_query($link, $sql);

    $sql = "SELECT foto FROM prodotto WHERE id='" . $id . "'";
    //echo "$sql<br>";
    $foto = 0;
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $foto = $row['foto'];
    }
    try {
        if (file_exists('../../img/uploadsProdotti/' . $foto)) {
            unlink('../../img/uploadsProdotti/' . $foto);
        }
    } catch (Exception $e) {
        //echo "<br/>" . "Errore eliminazione foto Profilo" . "<br/>";
    }
    $sql = "DELETE FROM prodotto WHERE prodotto.id = '" . $id . "';";
    mysqli_query($link, $sql);
} catch (Exception $e) {
    //echo $e->getMessage() . "<br/>";
    while ($e = $e->getPrevious()) {
        //echo 'Previous exception: ' . $e->getMessage() . "<br/>";
    }
}
//header("Location: ../../index.php");
=======
*/
