<?php
require_once('../../../../config.php');

function get_city($link, $term)
{
    $query = "  SELECT prodotto.id, prodotto.nome, prodotto.tipoTaglie, prodotto.costoUnitario 
                FROM prodotto 
                WHERE (prodotto.nome LIKE '%" . $term . "%') and prodotto.nascosto='0' 
                ORDER BY prodotto.nome ASC LIMIT 5";
    $result = mysqli_query($link, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $data;
}

if (isset($_GET['term'])) {
    $getCity = get_city($link, $_GET['term']);
    $cityList = array();
    foreach ($getCity as $city) {
        $tipo = "";
        if ($city['tipoTaglie'] == '1')
            $tipo = "Taglie Adulto";
        else
            $tipo = "Taglie Bambino";
        $cityList[] = $city['id'] . ")  " . $city['nome'] . " | " .  $tipo . "  | "  . $city['costoUnitario'] . " €";
    }
    echo json_encode($cityList);
}
