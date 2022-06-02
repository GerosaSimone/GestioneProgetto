<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$bambino = ['XXS', 'XS', 'S', 'M', 'L'];
$adulto = ['S', 'M', 'L', 'XL', 'XXL'];
try {
    $dataAcquisto = date("Y-m-d");
    $nome = $_POST['nome'];
    $descrizione = $_POST['descrizione'];
    $quantita = $_POST['quantita'];
    $nascosto = $_POST['nascosto'];
    $costo = str_replace('.', '', strtok($_POST['costo'], ','));
    $titolo = null;
    if (!empty($_FILES['fileToUpload']['tmp_name'])) {
        $sql = "SELECT MAX(id) AS numRighe FROM acquistiMateriale";
        $number = 0;
        if ($result = mysqli_query($link, $sql)) {
            $row = mysqli_fetch_array($result);
            $number = $row['numRighe'] + 1;
        }
        $target_dir = "../../../img/uploadsProdotti/";
        $target_file = $target_dir . "fotoGenerico" . $number;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
        $titolo =  "fotoGenerico" . $number . ".$imageFileType";
        $target_file .= "." . $imageFileType;
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 50000000) {
            $uploadOk = 0;
        }
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $uploadOk = 0;
        }
        if ($uploadOk != 0)
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    } 
    $stmt = $link->prepare("INSERT INTO acquistimateriale (`nome`, `descrizione`, `quantita`, `prezzo`, foto, data, nascosto) VALUES (?,?,?,?,?,?,?);");
    $stmt->bind_param("sssssss", $a, $b, $c, $d, $e, $f, $g);
    $a = $nome;
    $b = $descrizione;
    $c = $quantita;
    $d = $costo;
    $e = $titolo;
    $f = $dataAcquisto;
    $g = $nascosto;
    $stmt->execute();
    $stmt->close();
} catch (Exception $e) {
}
header("Location: ../../../index.php");
