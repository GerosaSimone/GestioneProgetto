<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
function getVisita($id, $link)
{
    $idVisita = null;
    $sql = "SELECT idVisita FROM tesserato WHERE tesserato.id = '" . $id . "';";
    $result = mysqli_query($link, $sql);
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $idVisita = $row['idVisita'];
    }
    return $idVisita;
}
try {
    $id = $_POST['idElimina'];
    $sql = "UPDATE `visita` SET `nascosto`='1' WHERE id='" . getVisita($id, $link) . "';";
    $sql .= "UPDATE `tesserato` SET `nascosto`='1' WHERE id=' $id ';";
    mysqli_multi_query($link, $sql);
} catch (Exception $e) {
    echo "  <script>
                console.log(" . $e->getMessage() . "\n" . ");
            </script>";
    while ($e = $e->getPrevious()) {
        echo "  <script>
                console.log('Previous exception:'" . $e->getMessage() . "\n" . ");
            </script>";
    }
}
header("Location: ../../index.php");

/**
 * DIRIGENTE
    //prendo visita
    $idVisita = null;
    $sql = "SELECT idVisita FROM tesserato WHERE tesserato.id = '" . $id . "';";
    $result = mysqli_query($link, $sql);
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $idVisita = $row['idVisita'];
    }    
    ina linkFoto
    $sql = "SELECT linkFoto FROM tesserato WHERE tesserato.id = '" . $id . "';";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $foto = $row['linkFoto'];
            if (file_exists('../../../img/uploadsProfilo/' . $foto)) {
                unlink('../../../img/uploadsProfilo/' . $foto);
            }
        }
    }
    //telefono
    $sql = "DELETE FROM telefono WHERE telefono.idTesserato = '" . $id . "';";
    mysqli_query($link, $sql);
    //mail
    $sql = "DELETE FROM mail WHERE mail.idTesserato = '" . $id . "';";
    mysqli_query($link, $sql);
    //tesserato
    $sql = "DELETE FROM tesserato WHERE tesserato.id = '" . $id . "';";
    mysqli_query($link, $sql);
    //visita
    if ($idVisita != null) {
        $sql = "SELECT foto FROM visita WHERE visita.id = '" . $idVisita . "';";
        if ($result = mysqli_query($link, $sql)) {
            $row = mysqli_fetch_array($result);
            $foto = $row['foto'];
            if (file_exists('../../../img/uploadsVisita/' . $foto)) {
                unlink('../../../img/uploadsVisita/' . $foto);
            }
        }
        $sql = "DELETE FROM visita WHERE visita.id = '" . $idVisita . "';";
        mysqli_query($link, $sql);
    }
    GIOCATORE
    <?php

    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: pagine/login/login.html");
    }
    require_once '../../../config.php';
    try {
        $id = $_POST['idElimina'];
        //prendo visita
        $idVisita = null;
        $sql = "SELECT idVisita FROM tesserato WHERE tesserato.id = '" . $id . "';";
        $result = mysqli_query($link, $sql);
        if ($result = mysqli_query($link, $sql)) {
            $row = mysqli_fetch_array($result);
            $idVisita = $row['idVisita'];
        }
        //elimina linkFoto
        $sql = "SELECT linkFoto FROM tesserato WHERE tesserato.id = '" . $id . "';";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $foto = $row['linkFoto'];
                if (file_exists('../../../img/uploadsProfilo/' . $foto)) {
                    unlink('../../../img/uploadsProfilo/' . $foto);
                }
            }
        }
        //telefono
        $sql = "DELETE FROM telefono WHERE telefono.idTesserato = '" . $id . "';";
        mysqli_query($link, $sql);
        //mail
        $sql = "DELETE FROM mail WHERE mail.idTesserato = '" . $id . "';";
        mysqli_query($link, $sql);
        //tesserato
        $sql = "DELETE FROM tesserato WHERE tesserato.id = '" . $id . "';";
        mysqli_query($link, $sql);
        //visita
        if ($idVisita != null) {
            $sql = "SELECT foto FROM visita WHERE visita.id = '" . $idVisita . "';";
            if ($result = mysqli_query($link, $sql)) {
                $row = mysqli_fetch_array($result);
                $foto = $row['foto'];
                if (file_exists('../../../img/uploadsVisita/' . $foto)) {
                    unlink('../../../img/uploadsVisita/' . $foto);
                }
            }
            $sql = "DELETE FROM visita WHERE visita.id = '" . $idVisita . "';";
            mysqli_query($link, $sql);
        }
    } catch (Exception $e) {
        //echo $e->getMessage() . "<br/>";
        while ($e = $e->getPrevious()) {
            //echo 'Previous exception: ' . $e->getMessage() . "<br/>";
        }
    }
    header("Location: ../../../index.php");
    SQUADRE
 */