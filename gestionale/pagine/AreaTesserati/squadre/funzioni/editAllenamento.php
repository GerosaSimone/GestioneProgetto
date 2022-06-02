<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../../config.php';
$id1 = -1;
$id2 = -1;
$cat = "";
$sql = "SELECT categoria.id FROM categoria WHERE categoria.nome = '" . $_GET['squadra'] . "'";
if ($result = mysqli_query($link, $sql)) {
    $row = mysqli_fetch_array($result);
    $cat = $row['id'];
}
$sql = "SELECT allenamento.id FROM allenamento INNER JOIN categoria on allenamento.idCategoria=categoria.id WHERE categoria.nome='" . $_GET['squadra'] . "'";
$query = "";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO allenamento (id, oraInizio, oraFine, giorno, idCategoria,spogliatoio) VALUES (NULL, '" . $_GET['oraInizio1'] . "', '" . $_GET['oraFine1'] . "', '" . $_GET['giorno1'] . "', '" . $cat . "', '" . $_GET['spogliatoio1'] . "');";
        $query .= "INSERT INTO allenamento (id, oraInizio, oraFine, giorno, idCategoria,spogliatoio) VALUES (NULL, '" . $_GET['oraInizio2'] . "', '" . $_GET['oraFine2'] . "', '" . $_GET['giorno2'] . "', '" . $cat . "', '" . $_GET['spogliatoio2'] . "');";
    } else if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id1 = $row['id'];
        $query = "UPDATE allenamento  SET oraInizio='" . $_GET["oraInizio1"] . "', oraFine='" . $_GET["oraFine1"] . "', giorno='" . $_GET["giorno1"] . "', spogliatoio='" . $_GET["spogliatoio1"] . "' WHERE allenamento.id='" . $id1 . "';";
        $query .= "INSERT INTO allenamento (id, oraInizio, oraFine, giorno, idCategoria,spogliatoio) VALUES (NULL, '" . $_GET['oraInizio2'] . "', '" . $_GET['oraFine2'] . "', '" . $_GET['giorno2'] . "', '" . $cat . "');";
    } else {
        $row = mysqli_fetch_array($result);
        $id1 = $row['id'];
        $query = "UPDATE allenamento  SET oraInizio='" . $_GET["oraInizio1"] . "', oraFine='" . $_GET["oraFine1"] . "', giorno='" . $_GET["giorno1"] . "', spogliatoio='" . $_GET["spogliatoio1"] . "' WHERE allenamento.id='" . $id1 . "';";
        $row = mysqli_fetch_array($result);
        $id2 = $row['id'];
        $query .= "UPDATE allenamento  SET oraInizio='" . $_GET["oraInizio2"] . "', oraFine='" . $_GET["oraFine2"] . "', giorno='" . $_GET["giorno2"] . "', spogliatoio='" . $_GET["spogliatoio2"] . "' WHERE allenamento.id='" . $id2 . "';";
    }
    mysqli_multi_query($link, $query);
}
header("Location: ../../../../index.php");
