<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
$nome;
$tipoTaglie;

$id = $_GET["idProdotto"];
$sql = "SELECT * FROM prodotto WHERE id='" . $id . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $nome = $row['nome'];
        $tipoTaglie = $row['tipoTaglie'];
    }
}
?>

<input type="text" name="idProdotto" id="idProdotto" hidden="true" value="<?php echo $_GET["idProdotto"]; ?>">
<div class="container">
    <div class="row">
        <div style="width: 100%;"><label>Articolo Selezionato: <?php echo $nome; ?> </label>
        </div>
        <div class='mt-3' style='width: 100%;'><label>Rifornisci Taglie Bambino</label></div>
        <div class="container ml-2">
            <div class="row">
                <div class="col-3">
                    <label>Taglia</label>
                </div>
                <div class="col-3">
                    <label>Quantita</label>
                </div>
                <div class="col-3">
                    <label>Totale</label>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label>XL</label>
                </div>
                <div class="col-3">
                    <input type='number' name='quantita1' id='quantita1' value='0'>
                </div>
                <div class="col-3">
                    <input type='text' name='totale1' id='totale1' value='0' min='0'>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label>XL</label>
                </div>
                <div class="col-3">
                    <input type='number' name='quantita1' id='quantita1' value='0'>
                </div>
                <div class="col-3">
                    <input type='text' name='totale1' id='totale1' value='0' min='0'>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label>XL</label>
                </div>
                <div class="col-3">
                    <input type='number' name='quantita1' id='quantita1' value='0'>
                </div>
                <div class="col-3">
                    <input type='text' name='totale1' id='totale1' value='0' min='0'>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label>XL</label>
                </div>
                <div class="col-3">
                    <input type='number' name='quantita1' id='quantita1' value='0'>
                </div>
                <div class="col-3">
                    <input type='text' name='totale1' id='totale1' value='0' min='0'>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label>XL</label>
                </div>
                <div class="col-3">
                    <input type='number' name='quantita1' id='quantita1' value='0'>
                </div>
                <div class="col-3">
                    <input type='text' name='totale1' id='totale1' value='0' min='0'>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label>XL</label>
                </div>
                <div class="col-3">
                    <input type='number' name='quantita1' id='quantita1' value='0'>
                </div>
                <div class="col-3">
                    <input type='text' name='totale1' id='totale1' value='0' min='0'>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label>XL</label>
                </div>
                <div class="col-3">
                    <input type='number' name='quantita1' id='quantita1' value='0'>
                </div>
                <div class="col-3">
                    <input type='text' name='totale1' id='totale1' value='0' min='0'>
                </div>
            </div>
        </div>

        <?php
        if (!$tipoTaglie) {
        } else {
        }

        ?>

    </div>
</div>