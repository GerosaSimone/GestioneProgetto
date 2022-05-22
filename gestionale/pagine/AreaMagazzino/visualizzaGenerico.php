<?php
require_once "../../config.php";
$nome;
$descrizione;
$quantita;
$foto;
$prezzo;
$sql = "SELECT * FROM acquistiMateriale where id='" . $_POST['id'] . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $titolo = $row['nome'];
        $descrizione = $row['descrizione'];
        $quantita = $row['quantita'];
        $prezzo = $row['prezzo'];
        $foto = $row['foto'];
    }
}

?>

<div class="form-group mt-2" style="max-height:45%">
    <?php if ($foto != "")
        echo "  <label>Foto</label>
            <div><img id='fotoNews' class='mt-3' src='img/uploadsProdotti/$foto' style='height: 250px; width: auto; object-fit: cover;max-width:470px' /></div>"; ?>
    <label class="mt-2 mt-2 text-dark font-weight-bold">Nome</label><br>
    <label class="mb-2"><?php echo $titolo; ?></label><br>
    <label class="mt-2 mt-2 text-dark font-weight-bold">Descrizione</label>
    <textarea class="form-control" name="descrizione" rows="4" cols="50" readonly><?php echo $descrizione; ?></textarea>
    <div class="row" style="margin-left:-2%;margin-right:-2%">
        <div class="col-6">
            <label class="mt-2 text-dark font-weight-bold">Quantita</label><br>
            <label class="mb-2"><?php echo $quantita; ?></label>
        </div>
        <div class="col-6">
            <label class="mt-2 text-dark font-weight-bold">Prezzo</label><br>
            <label class="mb-2"><?php echo $prezzo; ?> €</label>
        </div>
    </div>
</div>