<?php
function trovaX($text, $temp1, $grandezza, $spazio)
{
    // Impostazione carattere
    $bbox = imagettfbbox($grandezza, 0, $temp1, $text);
    // trovo la dimensione finale del testo
    $dim = $bbox[2] - $bbox[0];
    // trovo quanto spazio avanza
    $dim = $spazio - $dim;
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
//categoria
$size = 20;
$x = 570;
$y = 157;
imagettftext($img, $size, $angle, $x, $y, $color, $font, $_SESSION['ultimaPage']);
//squadre
$size = 22;
$x = trovaX($casa, $font, 22, 370) + 235;
$y = 190;
imagettftext($img, $size, $angle, $x, $y, $color, $font, $casa);
$x = trovaX($ospite, $font, 22, 370) + 235;
$y = 230;
imagettftext($img, $size, $angle, $x, $y, $color, $font, $ospite);
//in casa o no
if (strtolower($casa) == "canzese")
    $y = 190;
else
    $y = 240;
$x = 575;
imagettftext($img, $size, $angle, $x, $y, $color, $font, "X");

//RitrovoPartita
$font = '../../../../img/distinta/regular.ttf';
$size = 20;
$x = 380;
$y = 380;
imagettftext($img, $size, $angle, $x, $y, $color, $font, $oraRitrovo);
$x = 980;
imagettftext($img, $size, $angle, $x, $y, $color, $font, $oraPartita);
$x = 900;
$y = 330;
imagettftext($img, $size, $angle, $x, $y, $color, $font, $luogoPartita);

//Data
$font = '../../../../img/distinta/bold.ttf';
$size = 22;
$x = 340;
$y = 330;
$nuovo = str_replace("-", "/", $data);
$newDate = date('d/m/Y', strtotime($nuovo));
imagettftext($img, $size, $angle, $x, $y, $color, $font, $newDate);

//convocati 
$font = '../../../../img/distinta/regular.ttf';
$y = 435;
$size = 18;
for ($i = 0; $i < count($idTesserato); $i++) {
    $sql = "    SELECT tesserato.nome,tesserato.cognome
                FROM `tesserato`
                WHERE tesserato.id='" . $idTesserato[$i] . "'";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            if ($idTesserato[$i] == $idTesserato[$i + 1]) {
                //convocato
                $x = 38;
                $y = $y + 36.5;
                imagettftext($img, $size, $angle, $x, $y, $color, $font, $row['nome']);
                $x = 310;
                imagettftext($img, $size, $angle, $x, $y, $color, $font, $row['cognome']);
                $x = 575;
                imagettftext($img, $size, $angle, $x, $y, $color, $font, "X");
                $i++;
            } else {
                //non convocato
                $x = 38;
                $y = $y + 36.5;
                imagettftext($img, $size, $angle, $x, $y, $color, $font, $row['nome']);
                $x = 310;
                imagettftext($img, $size, $angle, $x, $y, $color, $font, $row['cognome']);
                $x = 660;
                imagettftext($img, $size, $angle, $x, $y, $color, $font, "X");
                $i + 1;
            }
        }
    }
}

header("Content-type: image/jpg");
header("Content-Disposition:attachment;filename=distinta1.jpg");
imagejpeg($img, NULL, 100);
