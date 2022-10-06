<?php
require_once "../../../config.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}

$nome = "";
$tipoTaglie = 0;
$vett = [];
$quantita = [];
$sql = "SELECT * FROM magazzino INNER JOIN prodotto ON magazzino.idProdotto=prodotto.id where magazzino.idProdotto='" . $_POST['id'] . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $nome = $row['nome'];
            array_push($quantita, $row['quantita']);
            $tipoTaglie = $row['tipoTaglie'];
        }
    }
}
?>
<div>
    <label class=" text-dark font-weight-bold">Articolo </label>
</div>
<label><?php echo $nome; ?></label>
<hr>
<?php
if (!$tipoTaglie) {
    echo "<div class='mt-3' style='width: 100%'><label class='text-dark font-weight-bold'>Taglie Bambino</label></div>";
    $vett = ['XXXS', 'XXS', 'XS', 'S', 'M', 'L'];
} else {
    echo "<div class='mt-3' style='width: 100%'><label class='text-dark font-weight-bold'>Taglie Adulto</label></div>";
    $vett = ['S', 'M', 'L', 'XL', 'XXL', ''];
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
        <div class="col-2 text-center">
            <label><?php echo $vett[5]; ?></label>
        </div>
    </div>

    <div class="row">
        <div class="col-2 text-center">
            <label><?php echo $quantita[0]; ?></label>
        </div>
        <div class="col-2 text-center">
            <label><?php echo $quantita[1]; ?></label>
        </div>
        <div class="col-2 text-center">
            <label><?php echo $quantita[2]; ?></label>
        </div>
        <div class="col-2 text-center">
            <label><?php echo $quantita[3]; ?></label>
        </div>
        <div class="col-2 text-center">
            <label><?php echo $quantita[4]; ?></label>
        </div>
        <div class="col-2 text-center">
            <label><?php if (count($quantita) > 5) {
                        echo $quantita[5];
                    } ?></label>
        </div>
    </div>

</div>