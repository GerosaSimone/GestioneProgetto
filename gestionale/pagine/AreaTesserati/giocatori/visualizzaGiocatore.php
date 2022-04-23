<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../config.php';

$sql = "SELECT tesserato.id, tesserato.daPagare, tesserato.nome, tesserato.cognome, tesserato.dataNascita, categoria.nome as prova, visita.scadenza FROM `tesserato` 
                INNER JOIN visita 
                on idVisita=visita.id
                INNER JOIN categoria 
                on idCategoria=categoria.id 
                WHERE tesserato.tipo='0' AND categoria.nome='" . $_GET['squadra'] . "'";


$cf=$row['cf'];
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
    }
}
