<?php
require_once('../../config.php');

function get_city($link, $term)
{
    $query = "SELECT tesserato.id, tesserato.dataNascita, tesserato.nome as nomeTesserato,cognome,categoria.nome as nomeCategoria FROM tesserato inner join categoria on tesserato.idCategoria= categoria.id WHERE tesserato.nome LIKE '%" . $term . "%' or cognome LIKE '%" . $term . "%' ORDER BY tesserato.nome,cognome ASC LIMIT 5";
    $result = mysqli_query($link, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $data;
}

if (isset($_GET['term'])) {
    $getCity = get_city($link, $_GET['term']);
    $cityList = array();
    foreach ($getCity as $city) {
        $cityList[] = $city['id'] . ")  " . $city['nomeTesserato'] . " " . $city['cognome'] . "  | ". date("d/m/Y", strtotime($city['dataNascita'])) . "  | " . $city['nomeCategoria'];
    }
    echo json_encode($cityList);
}
