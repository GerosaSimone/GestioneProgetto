<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
$nome;
$descrizione;
$costo;
$foto;
$sql = "SELECT * FROM prodotto WHERE id='" . $_GET["idProdotto"] . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $nome = $row['nome'];
        $descrizione = $row['descrizione'];
        $costo = $row['costoUnitario'];
        $foto = $row['foto'];
    }
}
?>
<div class="form-group mt-2" style="max-height:45%">
    <label>Foto</label>
    <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" onchange="readFoto(this);" style="margin-left:-2%" required>
    <div><img id="fotoProdotto" class="mt-3" src="../../img/uploadsProdotti/<?php echo $foto; ?>" required /></div>
    <label class="mt-2">Nome</label>
    <input type="text" name="nome" class="form-control form-control-sm mb-2" required value="<?php echo $nome; ?>">
    <label>Descrizione</label>
    <input type="text" name="descrizione" class="form-control form-control-sm mb-2" required value="<?php echo $descrizione; ?>">
    <label>Costo Unitario</label>
    <input type='currency' name="costo" value="0,00€" placeholder='Type a number & click outside' class="form-control form-control-sm mb-2" required value="<?php echo $costo; ?>" />
</div>


<script>
    $("#eliminaProfilo").click(function() {
        $('#fotoProfilo')
            .attr('src', '');
        $("#fileToUpload").val('');
        $('#presenzaFotoProfilo').val('1');
    });

    function modificaFotoProfilo(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#fotoProfilo')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function modificaTel() {
        var a = $(".telefoni").length;
        var cell = "<div class='col-sm-7 telefoni'><input type='tel' name='tel" + (a + 1) + "' class='form-control form-control-sm mb-2' minlength='9' maxlength='14'></div><div class='col-sm-4'><input type='text' name='contatto" + (a + 1) + "' class='form-control form-control-sm mb-2'></div>";
        $("#telefoni").append(cell);
        $("#numTelefoni").attr('value', (a + 1));
    }

    function modificaMail() {
        var a = $(".mail").length;
        var ml = '<div class="col-sm-7 mail"><input type="email" name="mail' + (a + 1) + '" class="form-control form-control-sm mb-2"></div><div class="col-sm-4"><input type="text" name="cont' + (a + 1) + '" class="form-control form-control-sm mb-2"></div>';
        $("#mail").append(ml);
        $("#numMail").attr('value', (a + 1));
    }
</script>