<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}

require_once '../../../config.php';
$id1 = -1;
$id2 = -1;
$sql = "SELECT allenamento.id FROM allenamento INNER JOIN categoria on allenamento.idCategoria=categoria.id WHERE categoria.nome='" . $_GET['squadra'] . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) == 0) {
        $sql = "SELECT categoria.id FROM categoria WHERE categoria.nome = '" . $_GET['squadra'] . "'";
        if ($result = mysqli_query($link, $sql)) {
            $row = mysqli_fetch_array($result);
            $cat = $row['id'];
        }
        $sql = "INSERT INTO allenamento (id, oraInizio, oraFine, giorno, idCategoria) VALUES (NULL, '" . $_GET['oraInizio1'] . "', '" . $_GET['oraFine1'] . "', '" . $_GET['giorno1'] . "', '" . $cat . "')";
        mysqli_query($link, $sql);
        $sql = "INSERT INTO allenamento (id, oraInizio, oraFine, giorno, idCategoria) VALUES (NULL, '" . $_GET['oraInizio2'] . "', '" . $_GET['oraFine2'] . "', '" . $_GET['giorno2'] . "', '" . $cat . "')";
        mysqli_query($link, $sql);
    } else if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id1 = $row['id'];
        $sql = "UPDATE allenamento  SET oraInizio='" . $_GET["oraInizio1"] . "', oraFine='" . $_GET["oraFine1"] . "', giorno='" . $_GET["giorno1"] ."' WHERE allenamento.id='" . $id1 . "'";
        mysqli_query($link, $sql);
        $sql = "INSERT INTO allenamento (id, oraInizio, oraFine, giorno, idCategoria) VALUES (NULL, '" . $_GET['oraInizio2'] . "', '" . $_GET['oraFine2'] . "', '" . $_GET['giorno2'] . "', '" . $cat . "')";
        mysqli_query($link, $sql);
    } else {

        $row = mysqli_fetch_array($result);
        $id1 = $row['id'];
        $sql = "UPDATE allenamento  SET oraInizio='" . $_GET["oraInizio1"] . "', oraFine='" . $_GET["oraFine1"] . "', giorno='" . $_GET["giorno1"] ."' WHERE allenamento.id='" . $id1 . "'";
        //echo $sql;
        mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        $id2 = $row['id'];
        $sql = "UPDATE allenamento  SET oraInizio='" . $_GET["oraInizio2"] . "', oraFine='" . $_GET["oraFine2"] . "', giorno='" . $_GET["giorno2"] . "' WHERE allenamento.id='" . $id2 . "'";
        mysqli_query($link, $sql);
        //echo $sql;
    }
}
header("Location: ../../../index.php");
