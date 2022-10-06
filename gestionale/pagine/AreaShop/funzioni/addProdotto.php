<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
try {
    if (!empty($_FILES['fileToUpload']['tmp_name'])) {
        $bambino = ['XXXS', 'XXS', 'XS', 'S', 'M', 'L'];
        $adulto = ['S', 'M', 'L', 'XL', 'XXL'];
        $number = 0;
        $sql = "SELECT MAX(prodotto.id) AS numRighe FROM prodotto";
        if ($result = mysqli_query($link, $sql)) {
            $row = mysqli_fetch_array($result);
            $number = $row['numRighe'] + 1;
        }
        $target_dir = "../../../img/uploadsProdotti/";
        $target_file = $target_dir . "fotoProdotto" . $number;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
        $titolo =  "fotoProdotto" . $number . ".$imageFileType";
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
            $nome = $_POST['nome'];
            $tipoTaglie = $_POST['tipoTaglie'];
            $costo = str_replace("€", "", str_replace(",", ".", str_replace(" ", "", $_POST['costo'])));
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $stmt = $link->prepare("INSERT INTO prodotto (id,`nome`, `tipoTaglie`, `costoUnitario`, `foto`) VALUES (?,?, ?, ?, ?)");
                $stmt->bind_param("sssss", $a, $b, $c, $d, $e);
                $a = $number;
                $b = $nome;
                $c = $tipoTaglie;
                $d = $costo;
                $e = $titolo;
                $stmt->execute();
                $stmt->close();
            }
        }
        if ($tipoTaglie) {
            for ($i = 0; $i < count($adulto); $i++) {
                $stmt = $link->prepare("INSERT INTO magazzino (`idProdotto`, `quantita`, `taglia`) VALUES (?,?,?)");
                $stmt->bind_param("sss", $a, $b, $c);
                $a = $number;
                $b = 0;
                $c = $adulto[$i];
                $stmt->execute();
                $stmt->close();
            }
        } else {
            for ($i = 0; $i < count($bambino); $i++) {
                $stmt = $link->prepare("INSERT INTO magazzino (`idProdotto`, `quantita`, `taglia`) VALUES (?,?,?)");
                $stmt->bind_param("sss", $a, $b, $c);
                $a = $number;
                $b = 0;
                $c = $bambino[$i];
                $stmt->execute();
                $stmt->close();
            }
        }
    }
} catch (Exception $e) {
}
header("Location: ../../../index.php");
