<?php
session_start();
require_once '../../config.php';
if (isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
}
if (!empty($_POST['nome']) && !empty($_POST['password'])) {
    $stmt = $link->prepare("SELECT user from utenti where user=? and password=md5(?)");
    $stmt->bind_param("ss", $a, $b);
    $a = $_POST['nome'];
    $b = $_POST['password'];
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id);
    if (mysqli_stmt_fetch($stmt)) {
        $_SESSION['user_id'] = $id;
        mysqli_stmt_close($stmt);
        header("Location: ../../index.php");
        exit();
    } else {
        mysqli_stmt_close($stmt);
        header("Location: login.html");
        exit();
    }
}
header("Location: login.html");