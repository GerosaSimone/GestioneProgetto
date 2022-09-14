<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$nome;
$tipoTaglie;
$costo;
$foto;
$id = $_GET["idProdotto"];
?>

<div class="form-group mt-2" style="max-height:45%">
<label class="text-dark font-weight-bold">Nome</label>
<?php
$sql = "SELECT categoria.nome FROM `categoria` WHERE categoria.id='" . $id . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        echo "<input type='text' name='nome' class='form-control form-control-sm mb-2' required value='" . $row['nome'] . "'>";
    }
}
?>
</div>