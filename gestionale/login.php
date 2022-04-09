<?php
session_start();
require_once 'pagine/config.php';
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
if (!empty($_POST['nome']) && !empty($_POST['password'])) {
    $sql = "SELECT * from utenti where user='" . $_POST['nome'] . "' and password='" . md5($_POST['password']) . "'";
    if (!($result = mysqli_query($link, $sql))) {
        mysqli_close($link);
        header("Location: login.html");
        exit();
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['user_id'] = $row["user"];
            mysqli_close($link);
            header("Location: index.php");
            exit();
        }
    }
}
header("Location: login.html");
