<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 border-right">
                <h4 class="text-dark font-weight-bold">DATI ANAGRAFICI</h4>
                <div class="form-group mt-2" style="max-height:45%">
                    <label class="text-dark font-weight-bold">Foto</label>
                    <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" onchange="readFotoProfiloDirigente(this);" style="margin-left:-2%">
                    <img id="fotoProfilo" src="" />
                </div>
                <label class="text-dark font-weight-bold">Nome</label>
                <input type="text" name="nome" class="form-control form-control-sm mb-2" required>
                <label class="text-dark font-weight-bold">Cognome</label>
                <input type="text" name="cognome" class="form-control form-control-sm mb-2" required>
                <label class="text-dark font-weight-bold">Codice Fiscale</label>
                <input type="text" name="cf" class="form-control form-control-sm mb-2" minlength="16" maxlength="16" required autocomplete="rutjfkde">
                <label class="text-dark font-weight-bold">Matricola</label>
                <input type="text" name="matricola" class="form-control form-control-sm mb-2" required autocomplete="rutjfkde">
                <label class="text-dark font-weight-bold">Data di Nascita</label>
                <input type="date" data-date-format="yyyy-mm-dd" style="width:100%" class="form-control form-control-sm mb-2" name="dataNascita" required>
                <label class="text-dark font-weight-bold">Luogo di Nascita</label>
                <input type="text" name="luogoNascita" class="form-control form-control-sm" required>
            </div>
            <div class="col-sm-6">
                <h4 class="text-dark font-weight-bold">RESIDENZA</h4>
                <label class="text-dark font-weight-bold">Indirizzo</label>
                <input type="text" name="via" class="form-control form-control-sm mb-2" required>
                <label class="text-dark font-weight-bold">Citta </label>
                <input type="text" name="citta" class="form-control form-control-sm mb-2" required>
                <label class="text-dark font-weight-bold">Provincia </label>
                <input type="text" name="provincia" class="form-control form-control-sm mb-2" minlength="2" maxlength="2" required autocomplete="rutjfkde">
                <div class="row" style="margin-left:-2%">
                    <div class="col-sm-6">
                        <label class="text-dark font-weight-bold">Ruolo</label>
                        <select class="custom-select custom-select-sm" name="ruolo">
                            <option selected value="N">Nessun ruolo</option>
                            <option value="M">Mister</option>
                            <option value="D">Dirigente</option>
                            <option value="P">Presidente</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label class="text-dark font-weight-bold">Categoria</label>
                        <select class="custom-select custom-select-sm" name="categoria" required>
                            <?php
                            require_once "../../../../config.php";
                            $idCategoria = 0;
                            $sql = "SELECT id FROM categoria WHERE nome='" . $_GET['squadra'] . "';";
                            if ($result = mysqli_query($link, $sql)) {
                                $row = mysqli_fetch_array($result);
                                $idCategoria = $row["id"];
                            }
                            ?>
                            <option value="<?php echo $idCategoria; ?>"><?php echo $_GET['squadra'] ?></option>
                        </select>
                    </div>
                </div>
                <h4 class="text-dark font-weight-bold" style="margin-top:4%">CONTATTI</h4>
                <div class="container" style="margin-left:-2%">
                    <div class="row">
                        <div class="col-sm-7 text-dark font-weight-bold">
                            Telefono
                        </div>
                        <div class="col-sm-4 text-dark font-weight-bold">
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
                        <div class="col-sm-7 text-dark font-weight-bold">
                            Mail
                        </div>
                        <div class="col-sm-4 text-dark font-weight-bold">
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
</body>
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