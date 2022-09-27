<!--Elimina-->
<div class="modal fade" id="elimina" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h3 style="color:white" class="modal-title" id="eliminaLabel"><b>ELIMINA TRANSAZIONE</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="pagine/AreaSponsor/delete.php" method="post">
                <div class="modal-body">
                    Sei sicuro di voler eliminare definitivamente la trasazione?
                    <input type="text" name="idElimina" id="idElimina" hidden="true">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-danger" value="Elimina" data-bs-dismiss="modal">
                </div>
            </form>
        </div>
    </div>
</div>
<!--Aggiungi-->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title text-light" id="addLabel"><b>AGGIUNGI SPONSOR</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="pagine/AreaSponsor/add.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mt-2" style="max-height:45%">
                        <label class="text-dark font-weight-bold">Nome</label>
                        <input type="text" name="nome" class="form-control form-control-sm mb-2" required>
                        <label class="text-dark font-weight-bold">Importo</label>
                        <input type='currency' name="entrata" value="0,00€" placeholder='Type a number & click outside' class="form-control form-control-sm mb-2" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Salva" style="background-color:#007bff !important">
                </div>
            </form>
        </div>
    </div>
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