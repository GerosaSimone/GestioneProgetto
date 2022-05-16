<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';


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
    $sql = "SELECT quantita,taglia from magazzino where idProdotto='$id'";
    if ($result = mysqli_query($link, $sql))
        if (mysqli_num_rows($result) > 0)
            while ($row = mysqli_fetch_array($result))
                array_push($quantita, $row['quantita']);
} else
    $vett = ['S', 'M', 'L', 'XL', 'XXL'];
for ($i = 0; $i < count($quantita); $i++) {

    if ($_POST['quantita' . $vett[$i]] != '0') {
        $somma = 0;
        $somma = $quantita[$i] + $_POST['quantita' . $vett[$i]];
        $sql = "UPDATE `magazzino` SET `quantita`='" . $somma . "' WHERE idProdotto=$id and taglia='" . $vett[$i] . "'";
        mysqli_query($link, $sql);
        
        $sql = "INSERT INTO `acquistimagazzino`( `idProdotto`, `quantita`, `prezzototale`, `taglia`, `data`) VALUES ('$id','".$_POST['quantita' . $vett[$i]]."','".strtok($_POST['totale' . $vett[$i]], ',')."','".$vett[$i]."','".date('Y-m-d')."')";
        mysqli_query($link, $sql);
    }
}

//totale aggiungi transazione
header("Location: ../../index.php");