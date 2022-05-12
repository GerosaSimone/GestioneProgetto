<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
$nome;
$descrizione;
$costo;
$foto;
$id = $_GET["idProdotto"];
$sql = "SELECT * FROM prodotto WHERE id='" . $id . "'";
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
    <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" onchange="readFoto(this);" style="margin-left:-2%">
    <div><img id="fotoProdotto" class="mt-3" src="img/uploadsProdotti/<?php echo $foto; ?>" required style="height: 250px; width: auto; object-fit: cover;max-width:470px" /></div>
    <input type='text' name='presenzaFotoProdotto' id="presenzaFotoProdotto" hidden=true value='0'>
    <label class="mt-2">Nome</label>
    <input type="text" name="nome" class="form-control form-control-sm mb-2" required value="<?php echo $nome; ?>">
    <label>Descrizione</label>
    <input type="text" name="descrizione" class="form-control form-control-sm mb-2" required value="<?php echo $descrizione; ?>">
    <label>Costo Unitario</label>
    <input type='currency' name="costo" value="0,00€" placeholder='Type a number & click outside' class="form-control form-control-sm mb-2" required value="<?php echo $costo; ?>" />
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
    //valuta 
    var currencyInput = document.querySelectorAll('input[type="currency"]')
    var currency = 'EUR' // https://www.currency-iso.org/dam/downloads/lists/list_one.xml
    currencyInput.forEach(function(userItem) {
        userItem.addEventListener('focus', onFocus)
        userItem.addEventListener('blur', onBlur)
    });

    function localStringToNumber(s) {
        return Number(String(s).replace(/[^0-9.-]+/g, ""))
    }

    function onFocus(e) {
        var value = e.target.value;
        e.target.value = value ? localStringToNumber(value) : ''
    }

    function onBlur(e) {
        var value = e.target.value
        var options = {
            maximumFractionDigits: 2,
            currency: currency,
            style: "currency",
            currencyDisplay: "symbol"
        }
        e.target.value = (value || value === 0) ?
            localStringToNumber(value).toLocaleString(undefined, options) :
            ''
    }
</script>