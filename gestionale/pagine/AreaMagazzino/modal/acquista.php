<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$nome;
$tipoTaglie;
$bambino = ['XXS', 'XS', 'S', 'M', 'L'];
$adulto = ['S', 'M', 'L', 'XL', 'XXL'];
$id = $_GET["idProdotto"];
$sql = "SELECT * FROM prodotto WHERE id=?";
if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $id);
    if ($result = $stmt->get_result()) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $nome = $row['nome'];
            $tipoTaglie = $row['tipoTaglie'];
        }
    }
}
?>

<input type="text" name="idProdotto" id="idProdotto" hidden="true" value="<?php echo $_GET["idProdotto"]; ?>">
<div>
    <label class=" text-dark font-weight-bold">Articolo Selezionato </label>
</div>
<label><?php echo $nome; ?></label>
<?php
if (!$tipoTaglie)
    echo "<div class='mt-3' style='width: 100%'><label class='text-dark font-weight-bold'>Rifornisci Taglie Bambino</label></div>";
else
    echo "<div class='mt-3' style='width: 100%'><label class='text-dark font-weight-bold'>Rifornisci Taglie Adulto</label></div>";

?>
<div class="container mt-2" style="margin-left:-10px">
    <div class="row">
        <div class="col-2 text-center">
            <label>Taglia</label>
        </div>
        <div class="col-5">
            <label>Quantita</label>
        </div>
        <div class="col-5">
            <label>Totale</label>
        </div>
    </div>
    <?php
    if (!$tipoTaglie) {
        for ($i = 0; $i < count($bambino); $i++) {
            echo "  <div class='row mt-1'>
                        <div class='col-2 text-center'>
                            <label>" . $bambino[$i] . "</label>
                        </div>
                        <div class='col-5'>
                            <input type='number' name='quantita" . $bambino[$i] . "' id='quantita" . $bambino[$i] . "' value='0' class='form-control' required>
                        </div>
                        <div class='col-5'>
                            <input type='currency' value='0,00€' name='totale" . $bambino[$i] . "' id='totale" . $bambino[$i] . "' value='0' min='0' class='form-control' required>
                        </div>
                    </div>";
        }
    } else {
        for ($i = 0; $i < count($adulto); $i++) {
            echo "  <div class='row mt-1'>
                        <div class='col-2 text-center'>
                            <label>" . $adulto[$i] . "</label>
                        </div>
                        <div class='col-5'>
                            <input type='number' name='quantita" . $adulto[$i] . "' id='quantita" . $adulto[$i] . "' value='0' class='form-control' required>
                        </div>
                        <div class='col-5'>                            
                            <input type='currency' value='0,00€' name='totale" . $adulto[$i] . "' id='totale" . $adulto[$i] . "' value='0' min='0' class='form-control' required>
                        </div>
                    </div>";
        }
    }
    ?>
</div>

<script>
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