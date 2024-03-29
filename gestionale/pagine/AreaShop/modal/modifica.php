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
$sql = "SELECT * FROM prodotto WHERE id='" . $id . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $nome = $row['nome'];
        $tipoTaglie = $row['tipoTaglie'];
        $costo = $row['costoUnitario'];
        $foto = $row['foto'];
    }
}
?>
<div class="form-group mt-2" style="max-height:45%">
    <label class="text-dark font-weight-bold">Foto</label>
    <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" onchange="readFoto(this);" style="margin-left:-2%">
    <div><img id="fotoProdotto" class="mt-3" src="img/uploadsProdotti/<?php echo $foto; ?>" required style="height: 90%; width: auto; object-fit: cover;max-width:100%" /></div>
    <input type='text' name='presenzaFotoProdotto' id="presenzaFotoProdotto" hidden=true value='0'>
    <label class="mt-2 text-dark font-weight-bold">Nome</label>
    <input type="text" name="nome" class="form-control form-control-sm mb-2" required value="<?php echo $nome; ?>">
    <label class="text-dark font-weight-bold">Costo Unitario</label>
    <input type='currency' name="costo" class="form-control form-control-sm mb-2" value="<?php echo $costo; ?>" required />
    <input type="text" name="idModifica" value="<?php echo $id; ?>" hidden="true">
</div>

<script>
    function readFoto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#fotoProdotto')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>