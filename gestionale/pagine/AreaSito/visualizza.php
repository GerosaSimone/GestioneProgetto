<?php
require_once "../../config.php";
$titolo;
$descrizione;
$foto;
$sql = "SELECT * FROM news where id='" . $_POST['id'] . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $titolo = $row['titolo'];
        $descrizione = $row['descrizione'];
        $foto = $row['foto'];
    }
}

?>

<div class="form-group mt-2" style="max-height:45%">
    <label class="text-dark font-weight-bold">Foto</label>
    <div><img id="fotoNews" class="mt-3" src="img/uploadsNews/<?php echo $foto; ?>" style="height: 250px; width: auto; object-fit: cover;max-width:470px" />
    </div><label class="mt-2 text-dark font-weight-bold">Titolo</label>
    <input type="text" name="titolo" class="form-control form-control-sm mb-2" value="<?php echo $titolo; ?>" readonly>
    <label class="text-dark font-weight-bold">Descrizione</label>
    <textarea class="form-control" name="descrizione" rows="4" cols="50" readonly><?php echo $descrizione; ?></textarea>

</div>