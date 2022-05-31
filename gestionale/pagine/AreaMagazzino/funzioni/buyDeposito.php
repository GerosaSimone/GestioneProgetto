<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$dataAcquisto = date("Y-m-d");
$tipoTaglie;
$id = $_POST["idProdotto"];
$sql = "SELECT * FROM prodotto WHERE id='" . $id . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $tipoTaglie = $row['tipoTaglie'];
    }
}
$quantita = [];
if (!$tipoTaglie) {
    $vett = ['XXS', 'XS', 'S', 'M', 'L'];
} else {
    $vett = ['S', 'M', 'L', 'XL', 'XXL'];
}
$sql = "SELECT quantita,taglia from magazzino where idProdotto='$id'";
if ($result = mysqli_query($link, $sql))
    if (mysqli_num_rows($result) > 0)
        while ($row = mysqli_fetch_array($result))
            array_push($quantita, $row['quantita']);
$sql = "";
for ($i = 0; $i < count($quantita); $i++) {
    if ($_POST['quantita' . $vett[$i]] != '0') {
        $somma = $quantita[$i] + $_POST['quantita' . $vett[$i]];
        if ($_POST['quantita' . $vett[$i]]  > 0) {
            $sql .= "UPDATE `magazzino` SET `quantita`='" . $somma . "' WHERE idProdotto=$id and taglia='" . $vett[$i] . "';";
            $query = "SELECT id FROM magazzino  WHERE idProdotto=$id and taglia='" . $vett[$i] . "';";
            if ($result = mysqli_query($link, $query))
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $sql .= "INSERT INTO `acquistimagazzino` (idMagazzino, quantita, prezzototale,data) VALUES ('" . $row['id'] . "','" . $_POST['quantita' . $vett[$i]] . "' ,'" . strtok($_POST['totale' . $vett[$i]], ',') . "','$dataAcquisto');";
                }
        }
    }
}
if ($sql != "")
    mysqli_multi_query($link, $sql);

//totale aggiungi transazione
header("Location: ../../../index.php");
