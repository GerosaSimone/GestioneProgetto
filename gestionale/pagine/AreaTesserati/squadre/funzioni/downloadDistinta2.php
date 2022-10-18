
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
$squadra = $_GET['squadra'];
require_once '../../../../config.php';


$filename = 'demo.doc';
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=" . basename($filename));
header("Content-Description: File Transfer");
@readfile($filename);

$content = '<html xmlns:v="urn:schemas-microsoft-com:vml" '
    . 'xmlns:o="urn:schemas-microsoft-com:office:office" '
    . 'xmlns:w="urn:schemas-microsoft-com:office:word" '
    . 'xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"= '
    . 'xmlns="http://www.w3.org/TR/REC-html40">'
    . '<head><meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">'
    . '<title></title>'
    . '<!--[if gte mso 9]>'
    . '<xml>'
    . '<w:WordDocument>'
    . '<w:View>Print'
    . '<w:Zoom>100'
    . '<w:DoNotOptimizeForBrowser/>'
    . '</w:WordDocument>'
    . '</xml>'
    . '<![endif]-->'
    . '<style>
        @page
        {
            font-family: Arial;
            size:215.9mm 279.4mm;  
            margin:14.2mm 17.5mm 14.2mm 16mm; 
        }
        h2 { font-family: Arial; font-size: 18px; text-align:center; }
        p.para {font-family: Arial; font-size: 13.5px; text-align: justify;}
        </style>'
    . '</head>'
    . '<body>'
    . '<h2>' . $squadra . '</h2>'
    . '<p>';




$sql = "    SELECT tesserato.nome, tesserato.cognome, tesserato.dataNascita
            FROM `tesserato`          
            INNER JOIN categoria 
            on idCategoria=categoria.id
            WHERE categoria.nome='$squadra' and tesserato.nascosto='0' and tesserato.tipo='0'   
            ORDER BY tesserato.nome, tesserato.cognome";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $date1 = $row['dataNascita'];
            $dataOggi = date("Y/m/d");
            $differenza = floor((strtotime($date1) - strtotime($dataOggi)) / 86400);
            $date = str_replace('-', '/', $row['dataNascita']);
            $dataNascita = date("d/m/Y", strtotime($date));
            $content .= $row['nome'] . " &#09 " . $row['cognome'] . " &#09 " . $dataNascita . "<br/>";
        }
    }
}
$content .= '</p>'
    . '</body>'
    . '</html>';
echo $content;
