<?php
require_once 'config.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["anno"]) && !empty($_POST["progressivo"]) && !empty($_POST["tipo"])) {
        $sql = "INSERT INTO carte (anno, progressivo, tipo, idUtente) VALUES (?, ?, ?,?)";
        $a = $_POST["anno"];
        $b = $_POST["progressivo"];
        $c = false;
        if ($_POST["tipo"] != "comune")
            $c = true;
        $d = $_SESSION['user_id'];
        echo $c;
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssbs", $a, $b, $c, $d);
            if (mysqli_stmt_execute($stmt)) {
                header("location: index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>