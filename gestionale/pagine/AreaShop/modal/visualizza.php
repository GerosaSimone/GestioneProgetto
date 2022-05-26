<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once "../../../config.php";
$nome = "";
$tipoTaglie = 0;
$vett = [];

$sql = "SELECT * FROM prodotto WHERE id='" . $_POST['id'] . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $nome = $row['nome'];
        $tipoTaglie = $row['tipoTaglie'];
        $foto = $row['foto'];
        $costo = $row['costoUnitario'];
    }
}
?>
<div class="form-group mt-2" style="max-height:45%">
    <label class='text-dark font-weight-bold'>Foto</label>
    <div><img id="fotoProdotto" class="mt-3" src="img/uploadsProdotti/<?php echo $foto; ?>" required style="height: 250px; width: auto; object-fit: cover;max-width:470px" /></div>
    <label class='text-dark font-weight-bold mt-2'>Nome</label><br>
    <label value=""><?php echo $nome; ?></label> <br>
    <label class='text-dark font-weight-bold'>Costo Unitario</label><br>
    <label> <?php echo $costo; ?>,00€</label> <br>
</div>
<hr>
<?php
if (!$tipoTaglie) {
    echo "<div class='mt-3' style='width: 100%'><label class='text-dark font-weight-bold'>Taglie Bambino</label></div>";
    $vett = ['XXS', 'XS', 'S', 'M', 'L'];
} else {
    echo "<div class='mt-3' style='width: 100%'><label class='text-dark font-weight-bold'>Taglie Adulto</label></div>";
    $vett = ['S', 'M', 'L', 'XL', 'XXL'];
}
?>

<div class="container mt-2" style="margin-left:-10px">
    <div class="row">
        <div class="col-2 text-center">
            <label><?php echo $vett[0]; ?></label>
        </div>
        <div class="col-2 text-center">
            <label><?php echo $vett[1]; ?></label>
        </div>
        <div class="col-2 text-center">
            <label><?php echo $vett[2]; ?></label>
        </div>
        <div class="col-2 text-center">
            <label><?php echo $vett[3]; ?></label>
        </div>
        <div class="col-2 text-center">
            <label><?php echo $vett[4]; ?></label>
        </div>
    </div>
</div>