<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';

try {
    $id = $_POST['idModifica'];
    $titolo = null;
    $foto = "";
    $titolo = "";
    $sql = "SELECT foto FROM prodotto WHERE id='" . $id . "';";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $titolo = $row['foto'];
        $foto = strtok($row['foto'], '.');
    }
    if (!empty($_FILES['fileToUpload']['tmp_name'])) {
        if (file_exists('../../../img/uploadsProdotti/' . $titolo)) {
            unlink('../../../img/uploadsProdotti/' . $titolo);
        }
        $target_dir = "../../../img/uploadsProdotti/";
        $target_file = $target_dir . $foto;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
        $titolo =  $foto . ".$imageFileType";
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
        if ($uploadOk != 0) {            
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        }
    }
    $stmt = $link->prepare("UPDATE prodotto SET nome = ?, costoUnitario = ?, foto = ? WHERE id = ?");
    $stmt->bind_param("ssss", $a, $b, $c, $d);
    $a = $_POST['nome'];
    $b = $daPagare = str_replace("€", "", str_replace(",", ".", str_replace(" ", "", $_POST['costo'])));
    $c = $titolo;
    $d = $id;
    $stmt->execute();
    $stmt->close();
} catch (Exception $e) {
}
header("Location: ../../../index.php");