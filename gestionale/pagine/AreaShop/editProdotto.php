<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';

$bambino = ['XXS', 'XS', 'S', 'M', 'L'];
$adulto = ['S', 'M', 'L', 'XL', 'XXL'];

try {
    //inizializzo query update con param default
    $id = $_POST['idModifica'];

    $sql = "DELETE FROM magazzino WHERE idProdotto = '" . $id . "';";
    //echo $sql;
    mysqli_query($link, $sql);

    

    
    $query = "UPDATE prodotto SET nome='" . $_POST['nome'] . "', tipoTaglie='" . $_POST['tipoTaglie'] . "', costoUnitario='" . strtok($_POST['costo'], ',') . "'";
    if (!empty($_FILES['fileToUpload']['tmp_name'])) {
        $sql = "SELECT foto FROM prodotto WHERE id='" . $id . "';";
        //echo "$sql<br>";
        $foto = 0;
        if ($result = mysqli_query($link, $sql)) {
            $row = mysqli_fetch_array($result);
            $foto = strtok($row['foto'], '.');
        }
        $target_dir = "../../img/uploadsProdotti/";
        $target_file = $target_dir . $foto;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
        $titolo =  $foto . ".$imageFileType";
        $target_file .= "." . $imageFileType;
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            //echo "File is not an image.";
            $uploadOk = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 50000000) {
            //echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            //echo "Sorry, your file was not uploaded.";
        } else {
            //echo $titolo;
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //echo "fatto";
            } else {
                //echo "Sorry, there was an error uploading your file.";
            }
        }
        $query .= ", foto" . "='$titolo'";
    }
    
    $query .= " WHERE id = '" . $id . "';";
   
    mysqli_query($link, $query);

    $sql = "";
    if ($_POST['tipoTaglie']) {
        for ($i = 0; $i < count($adulto); $i++)
            $sql .= "INSERT INTO magazzino (`idProdotto`, `quantita`, `taglia`) VALUES ('$id',0, '" . $adulto[$i] . "');";
    } else {
        for ($i = 0; $i < count($bambino); $i++)
            $sql .= "INSERT INTO magazzino (`idProdotto`, `quantita`, `taglia`) VALUES ('$id',0, '" . $bambino[$i] . "');";
    }

    mysqli_multi_query($link, $sql);
} catch (Exception $e) {
    //echo "<br/>" . $e->getMessage() . "<br/>";
    while ($e = $e->getPrevious()) {
        //echo 'Previous exception: ' . $e->getMessage() . "<br/>";
    }
}
header("Location: ../../index.php");
