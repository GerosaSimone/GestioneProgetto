<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../config.php';

$sql = "UPDATE categoria  SET pettorine=" . $_GET["pettorine"] . ", palloni=" . $_GET["palloni"] . " WHERE categoria.nome='" . $_GET['squadra'] . "'";
mysqli_query($link, $sql);
?>
<script>
    $.post("pagine/AreaTesserati/squadre/squadre.php?squadra=<?php $_GET['squadra'] ?>", true, function(data, status) {
        $("#pagina").html(data);
    });
</script>

<a href="javascript:onClick=self.close();">ciao</a>