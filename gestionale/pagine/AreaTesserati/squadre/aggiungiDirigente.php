<div class="container">
    <div class="row">
        <div class="col-sm-6 border-right">
            <h4 style="color:dark">DATI ANAGRAFICI</h4>
            <div class="form-group mt-2" style="max-height:45%">
                <label>Foto</label>
                <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" onchange="readFotoProfiloDirigente(this);" style="margin-left:-2%">
                <img id="fotoProfilo" src="" />
            </div>
            <label>Nome</label>
            <input type="text" name="nome" class="form-control form-control-sm mb-2" required>
            <label>Cognome</label>
            <input type="text" name="cognome" class="form-control form-control-sm mb-2" required>
            <label>Codice Fiscale</label>
            <input type="text" name="cf" class="form-control form-control-sm mb-2" minlength="16" maxlength="16" required autocomplete="rutjfkde">
            <label>Data di Nascita</label>
            <input type="date" data-date-format="yyyy-mm-dd" style="width:100%" class="form-control form-control-sm mb-2" name="dataNascita" required>
            <label>Luogo di Nascita</label>
            <input type="text" name="luogoNascita" class="form-control form-control-sm" required>
        </div>
        <div class="col-sm-6">
            <h4 style="color:dark">RESIDENZA</h4>
            <label>Indirizzo</label>
            <input type="text" name="via" class="form-control form-control-sm mb-2" required>
            <label>Citta </label>
            <input type="text" name="citta" class="form-control form-control-sm mb-2" required>
            <label>Provincia </label>
            <input type="text" name="provincia" class="form-control form-control-sm mb-2" minlength="2" maxlength="2" required autocomplete="rutjfkde">
            <div class="row" style="margin-left:-2%">
                <div class="col-sm-6">
                    <label>Ruolo</label>
                    <select class="custom-select custom-select-sm" name="ruolo">
                        <option selected value="N">Nessun ruolo</option>
                        <option value="M">Mister</option>
                        <option value="D">Dirigente</option>
                        <option value="P">Presidente</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label>Categoria</label>
                    <select class="custom-select custom-select-sm" name="categoria" required>
                        <option value="">Choose...</option>
                        <option value="1">Prima Squadra</option>
                        <option value="2">Juniores</option>
                        <option value="3">Allievi</option>
                        <option value="4">Giovanissimi</option>
                        <option value="5">Esordienti</option>
                        <option value="6">Pulcini</option>
                        <option value="7">Piccoli Amici</option>
                    </select>
                </div>
            </div>
            <h4 style="color:dark; margin-top:4%">CONTATTI</h4>
            <div class="container" style="margin-left:-2%">
                <div class="row">
                    <div class="col-sm-7">
                        Telefono
                    </div>
                    <div class="col-sm-4">
                        Contatto
                    </div>
                    <div class="col-sm-1">
                        <input type="text" id="numTelefoni" name="numTelefoni" hidden="true" value="1" class="form-control form-control-sm mb-2">
                    </div>
                </div>
                <div class="row telefoni" id="telefoni">
                    <div class="col-sm-7">
                        <input type="tel" name="tel1" class="form-control form-control-sm mb-2" minlength="9" maxlength="14">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="contatto1" class="form-control form-control-sm mb-2">
                    </div>
                    <div class="col-sm-1">
                        <button type="button" onclick="aggiungiTel()" class="btn btn-secondary btn-sm" style="margin-left:5%">+</button>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-left:-2%; margin-top:2%">
                <div class="row">
                    <div class="col-sm-7">
                        Mail
                    </div>
                    <div class="col-sm-4">
                        Contatto
                    </div>
                    <div class="col-sm-1">
                        <input type="text" id="numMail" name="numMail" hidden="true" value="1" class="form-control form-control-sm mb-2">
                    </div>
                </div>
                <div class="row mail" id="mail">
                    <div class="col-sm-7">
                        <input type="email" name="mail1" class="form-control form-control-sm mb-2">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="cont1" class="form-control form-control-sm mb-2">
                    </div>
                    <div class="col-sm-1">
                        <button type="button" onclick="aggiungiMail()" class="btn btn-secondary btn-sm" style="margin-left:5%">+</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function aggiungiTel() {
        var a = $(".telefoni").length;
        var cell = "<div class='col-sm-7 telefoni'><input type='tel' name='tel" + (a + 1) + "' class='form-control form-control-sm mb-2' minlength='9' maxlength='14'></div><div class='col-sm-4'><input type='text' name='contatto" + (a + 1) + "' class='form-control form-control-sm mb-2'></div>";
        $("#telefoni").append(cell);
        $("#numTelefoni").attr('value', (a + 1));
    }

    function aggiungiMail() {
        var a = $(".mail").length;
        var ml = '<div class="col-sm-7 mail"><input type="email" name="mail' + (a + 1) + '" class="form-control form-control-sm mb-2"></div><div class="col-sm-4"><input type="text" name="cont' + (a + 1) + '" class="form-control form-control-sm mb-2"></div>';
        $("#mail").append(ml);
        $("#numMail").attr('value', (a + 1));
    }

    function readFotoProfiloDirigente(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#fotoProfilo')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>