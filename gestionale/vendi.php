<?php
require_once 'config.php';
$sql = "DELETE FROM carte WHERE `carte`.`anno` = ? AND `carte`.`progressivo`= ?";
if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "ii", $a, $b);
    $a = $_GET["anno"];
    $b = $_GET["progressivo"];
    if (mysqli_stmt_execute($stmt)) {
        header("location: index.php");
        exit();
    } else
        echo "Oops! Something went wrong. Please try again later.";
}
mysqli_stmt_close($stmt);
