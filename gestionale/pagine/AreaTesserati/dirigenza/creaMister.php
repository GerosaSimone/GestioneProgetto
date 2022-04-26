<?php
//controlli campi passati esistenti numeric ecc
session_start();
require_once "../config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $cf = $_POST["cf"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $dataNascita = $_POST["dataNascita"];
    $luogoNascita = $_POST["luogoNascita"];
    $tipo = 0;
    $ruolo = $_POST["ruolo"];
    $idVisita = $_POST["idVisita"];
    $via = $_POST["via"];
    $provincia = $_POST["provincia"];
    $Citta = $_POST["Citta"];
    $linkFoto = $_POST["linkFoto"];
    $linkFoto = 0;
    $linkFoto = 0;
    $idCategoria = $_POST["idCategoria"];

    $sql = "INSERT INTO tesserato (cf, nome, cognome, dataNascita, luogoNascita, tipo, ruolo, idVisita, via, provincia, Citta, linkFoto, daPagare, pagato, idCategoria) VALUES (cf, nome, cognome, dataNascita, luogoNascita, tipo, ruolo, idVisita, via, provincia, Citta, linkFoto, daPagare, pagato, idCategoria)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "sss",  $id, $username, MD5($psw));
        if (mysqli_stmt_execute($stmt)) {
            header("location: pagine/AreaTesserati/dirigenza/dirigenza.php");
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
}
