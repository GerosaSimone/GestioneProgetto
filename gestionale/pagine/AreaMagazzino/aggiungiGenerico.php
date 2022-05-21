<div class="form-group mt-2" style="max-height:45%">
    <label class="text-dark font-weight-bold">Foto</label>
    <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" onchange="readFoto(this);" style="margin-left:-2%">
    <div><img id="fotoProdotto" class="mt-3" src="" /></div>
    <label class="mt-2 text-dark font-weight-bold">Nome</label>
    <input type="text" name="nome" class="form-control form-control-sm mb-2" required>
    <label class="mt-2 text-dark font-weight-bold">Descrizione</label>
    <input type="text" name="descrizione" class="form-control form-control-sm mb-2" required>
    <label class="mt-2 text-dark font-weight-bold">Prezzo</label>
    <input type='currency' name="costo" value="0,00€" placeholder='Type a number & click outside' class="form-control form-control-sm mb-2" required />
</div>


<script>
    function readFoto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#fotoProdotto')
                    .attr('src', e.target.result);
                $('#fotoProdotto')
                    .attr('style', " width: 100%;height: auto; object-fit: cover;max-height:300px");
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