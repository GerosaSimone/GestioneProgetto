<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
$nome;
$tipoTaglie;
$costo;
$id = $_GET["idProdotto"];
$sql = "SELECT * FROM prodotto WHERE id='" . $id . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $nome = $row['nome'];
        $tipoTaglie = $row['tipoTaglie'];
        $costo = $row['costoUnitario'];
    }
}
?>

<input type="text" name="idProdotto" id="idProdotto" hidden="true" value="<?php echo $_GET["idProdotto"]; ?>">
<div class="container">
    <div class="row">
        <div style="width: 100%;"><label>Articolo Selezionato: <?php echo $nome; ?> </label>
            <label class="pull-right mr-1">Prezzo: <?php echo $costo; ?> € </label>
        </div>
        <div style="width: 100%;" class="mt-2"><label>Giocatore</label>
            <button type="button" class="close pull-rigth" aria-label="close" style="color:red;" onclick="azzeraComplete();"><span aria-hidden="true">&times;</span></button>
        </div>
        <input type="text" name="city" id="search_city" placeholder="Type to search..." class="form-control"  aria-autocomplete="both" aria-haspopup="false" autocapitalize="off" autocomplete="off" autocorrect="off" autofocus="" required>
        <?php
        if (!$tipoTaglie) {
            echo "  <div class='mt-3' style='width: 100%;'><label>Taglie Bambini</label></div>";
            echo "  <div class='btn-group btn-group-toggle mb-3' data-toggle='buttons'>
                        <label class='btn btn-secondary'>
                            <input type='radio' name='taglia' id='XXS' value='XXS'> XXS
                        </label>
                        <label class='btn btn-secondary'>
                            <input type='radio' name='taglia' id='XS' value='XS'> XS
                        </label>
                        <label class='btn btn-secondary'>
                            <input type='radio' name='taglia' id='S' value='S' required> S
                        </label>
                        <label class='btn btn-secondary'>
                            <input type='radio' name='taglia' id='M' value='M'> M
                        </label>
                        <label class='btn btn-secondary'>
                            <input type='radio' name='taglia' id='L' value='L'> L
                        </label>
                    </div>";
        } else {
            echo "  <div class='mt-3' style='width: 100%;'><label>Taglie Adulto</label></div>";
            echo "  <div class='btn-group btn-group-toggle mb-3' data-toggle='buttons'>                        
                        <label class='btn btn-secondary'>
                            <input type='radio' name='taglia' id='S' value='S'> S
                        </label>
                        <label class='btn btn-secondary'>
                            <input type='radio' name='taglia' id='M' value='M'> M
                        </label>
                        <label class='btn btn-secondary'>
                            <input type='radio' name='taglia' id='L' value='L' required> L
                        </label>
                        <label class='btn btn-secondary'>
                            <input type='radio' name='taglia' id='XL' value='XL'> XL
                        </label>
                        <label class='btn btn-secondary'>
                            <input type='radio' name='taglia' id='XXL' value='XXL'> XXL
                        </label>
                    </div>";
        }

        ?>

    </div>
</div>
<script type="text/javascript">
    var uuid = '<some random UUID generated each page load>';    

    $("#search_city").autocomplete({
        source: 'pagine/AreaShop/giocatori-search.php',
        select: function(event, ui) {
            $("#search_city").prop('readonly', true);
            $("#btnSalva").prop('disabled', false);
            $("#search_city").attr("autocomplete", uuid);
        }
    });

    function azzeraComplete() {
        $("#search_city").prop('readonly', false);
        $("#btnSalva").prop('disabled', true);
        $("#search_city").val("");
        $("#search_city").attr("autocomplete", uuid);
    }
</script>