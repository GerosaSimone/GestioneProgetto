<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';

//fotoprofilo
try {
    if (!empty($_FILES['fileToUpload']['tmp_name'])) {
        $sql = "SELECT count(prodotto.id) AS numRighe FROM prodotto";
        //echo "$sql<br>";
        $number = 0;
        if ($result = mysqli_query($link, $sql)) {
            $row = mysqli_fetch_array($result);
            $number = $row['numRighe'] + 1;
        }
        $target_dir = "../../img/uploadsProdotti/";
        $target_file = $target_dir . "fotoProdotto" . $number;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
        $titolo =  "fotoProdotto" . $number . ".$imageFileType";
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
            $nome = $_POST['nome'];
            $descrizione = $_POST['descrizione'];
            $costo = strtok( $_POST['costo'], ',' );
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO prodotto (`nome`, `descrizione`, `costoUnitario`, `foto`) VALUES ('$nome', '$descrizione', '$costo', '$titolo');";
                mysqli_query($link, $sql);
                //echo $sql . "<br>";
            } else {
                //echo "Sorry, there was an error uploading your file.";
            }
        }
    }
} catch (Exception $e) {
    //echo $e->getMessage() . "<br/>";
    while ($e = $e->getPrevious()) {
        //echo 'Previous exception: ' . $e->getMessage() . "<br/>";
    }
}
header("Location: ../../index.php");