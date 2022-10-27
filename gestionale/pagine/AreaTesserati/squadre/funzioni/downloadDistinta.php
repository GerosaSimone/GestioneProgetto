<?php
function trovaX($text, $temp1, $grandezza)
{
    // Impostazione carattere
    $bbox = imagettfbbox($grandezza, 0, $temp1, $text);
    // trovo la dimensione finale del testo
    $dim = $bbox[2] - $bbox[0];
    // trovo quanto spazio avanza
    $dim = 567 - $dim;
    // spazio che avanza diviso 2 : trovo la X dell'inizio del testo
    return  $dim / 2;
}

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../../config.php';
$casa = $_POST["casa"];
$ospite = $_POST["ospite"];
$data = $_POST["data"];
$oraRitrovo = $_POST["oraRitrovo"];
$oraPartita = $_POST["oraPartita"];
$luogoRitrovo = $_POST["luogoRitrovo"];
$luogoPartita = $_POST["luogoPartita"];
$idTesserato = $_POST['idTesserato'];
//echo $casa . "<br>" . $ospite . "<br>" . $data . "<br>" . $oraRitrovo . "<br>" . $oraPartita . "<br>" . $luogoRitrovo . "<br>" . $luogoPartita . "<br>";
/*print_r($idTesserato);
echo "<br>" . count($idTesserato);
for ($i = 0; $i < count($idTesserato); $i++) {
    echo  "<br>" . $idTesserato[$i];
}*/

$img = imagecreatefromjpeg("../../../../img/distinta/distinta.jpg");
$angle = 0;
$font = '../../../../img/distinta/bold.ttf';
$color = imagecolorallocate($img, 0, 33, 87);
//squadre
$size = 28;
$x = 100;
$y = 175;
imagettftext($img, $size, $angle, $x, $y, $color, $font, $casa);
$x = trovaX($ospite, $font, 28);
$y = 225;
imagettftext($img, $size, $angle, $x, $y, $color, $font, $ospite);
$x = trovaX("-", $font, 30) - 2;
$y = 200;
imagettftext($img, 30, $angle, $x, $y, $color, $font, "-");

//RitrovoPartita
$font = '../../../../img/distinta/regular.ttf';
$size = 18;
$x = 30;
$y = 260;
imagettftext($img, $size, $angle, $x, $y, $color, $font, "Ritrovo: " . $oraRitrovo . " -> " . $luogoRitrovo);
$y = 290;
imagettftext($img, $size, $angle, $x, $y, $color, $font, "Partita: " . $oraPartita . " -> " . $luogoPartita);

//Data
$font = '../../../../img/distinta/bold.ttf';
$size = 32;
$x = 280;
$y = 700;
$nuovo = str_replace("-", "/", $data);
$newDate = date('d/m/Y', strtotime($nuovo));
imagettftext($img, $size, $angle, $x, $y, $color, $font, $newDate);

//convocati Titolo
$size = 22;
$x = 30;
$y = 325;
imagettftext($img, $size, $angle, $x, $y, $color, $font, "Convocati");

//convocati 
$font = '../../../../img/distinta/regular.ttf';
$x = 30;
$y = 325;
$size = 18;
for ($i = 0; $i < count($idTesserato); $i++) {
    $sql = "    SELECT tesserato.nome,tesserato.cognome
                FROM `tesserato`
                WHERE tesserato.id='" . $idTesserato[$i] . "'";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $y = $y + 22;
            imagettftext($img, $size, $angle, $x, $y, $color, $font, $row['nome'] . " " . $row['cognome']);
        }
    }
}

header("Content-type: image/jpg");
header("Content-Disposition:attachment;filename=distinta1.jpg");
imagejpeg($img, NULL, 100);