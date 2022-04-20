<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../config.php';
echo $_GET["pettorine"];
echo $_GET["palloni"];
echo $_GET["squadra"];

$sql = "UPDATE categoria  SET pettorine=".$_GET["pettorine"].", palloni=".$_GET["palloni"]." WHERE categoria.nome='" . $_GET['squadra'] . "'";
mysqli_query($link, $sql);

header("Location: index.php");
?>
<script>
     $.post("pagine/AreaTesserati/squadre/squadre.php?squadra=<?php $_GET['squadra']?>", true, function (data, status) {
            $("#pagina").html(data);
        });
    </script>