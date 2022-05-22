<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
try {
    $id = $_POST['idEliminaGenerico'];
    //elimina linkFoto
    $sql = "SELECT foto FROM acquistimateriale WHERE id = '" . $id . "';";
    echo $sql;
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $foto = $row['foto'];            
            if (file_exists('../../img/uploadsProdotti/' . $foto)) {
                unlink('../../img/uploadsProdotti/' . $foto);
            }
        }
    }
    $sql = "DELETE FROM `acquistimateriale` WHERE id='$id';";
    mysqli_query($link, $sql);
} catch (Exception $e) {
    //echo $e->getMessage() . "<br/>";
    while ($e = $e->getPrevious()) {
        //echo 'Previous exception: ' . $e->getMessage() . "<br/>";
    }
}
header("Location: ../../index.php");
