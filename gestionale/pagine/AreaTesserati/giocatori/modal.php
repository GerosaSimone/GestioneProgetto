<!--Aggiungi Giocatore-->
<div class="modal fade" id="addGiocatore" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addGiocatoreLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title pl-3" id="addGiocatoreLabel" style="color:dark"><b>AGGIUNGI NUOVO GIOCATORE</b></h3>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="pagine/AreaTesserati/giocatori/addGiocatore.php" method="post">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <h4 style="color:dark">DATI ANAGRAFICI</h4>
                                <div class="form-group mt-2" style="max-height:45%">
                                    <label for="exampleFormControlFile1">Foto</label>
                                    <input type="file" class="form-control-file" name="foto1" onchange="readFotoProfilo(this);" style="margin-left:-2%">
                                    <img id="fotoProfilo" src="" />
                                </div>
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control form-control-sm mb-2">
                                <label>Cognome</label>
                                <input type="text" name="cognome" class="form-control form-control-sm mb-2">
                                <label>Codice Fiscale</label>
                                <input type="text" name="cf" class="form-control form-control-sm mb-2">
                                <label>Data di Nascita</label>
                                <input type="date" data-date-format="yyyy-mm-dd" style="width:100%" class="form-control form-control-sm mb-2" name="dataNascita">
                                <label>Luogo di Nascita</label>
                                <input type="text" name="luogoNascita" class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-4 border-right">
                                <h4 style="color:dark">VISITA</h4>
                                <label>Tipo</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipoVisita" value="0">
                                    <label class="form-check-label" for="inlineRadio1">Normale</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipoVisita" value="1">
                                    <label class="form-check-label" for="inlineRadio2">Agonistica</label>
                                </div><br>
                                <label>Scadenza</label>
                                <input type="date" data-date-format="yyyy-mm-dd" style="width:100%" class="form-control form-control-sm mb-2" name="scadenza">
                                <div class="form-group mt-2">
                                    <label for="exampleFormControlFile1">Foto</label>
                                    <input type="file" class="form-control-file" name="foto2" onchange="readFotoVisita(this);" style="margin-left:-2%">
                                    <img id="fotoVisita" src="" />
                                </div>
                                <h4 style="color:dark; margin-left:-2%">CONTATTI</h4>
                                <div class="container" style="margin-left:-4%">
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
                                <div class="container" style="margin-left:-4%; margin-top:2%">
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
                            <div class="col-sm-4">
                                <h4 style="color:dark">RESIDENZA</h4>
                                <label>Indirizzo</label>
                                <input type="text" name="via" class="form-control form-control-sm mb-2">
                                <label>Citta </label>
                                <input type="text" name="citta" class="form-control form-control-sm mb-2">
                                <label>Provincia </label>
                                <input type="text" name="provincia" class="form-control form-control-sm mb-2">
                                <div class="row" style="margin-left:-2%">
                                    <div class="col-sm-6">
                                        <label>Ruolo</label>
                                        <select class="custom-select custom-select-sm" name="ruolo">
                                            <option selected>Choose...</option>
                                            <option value="P">Portiere</option>
                                            <option value="D">Difensore</option>
                                            <option value="C">Centrocampista</option>
                                            <option value="A">Attaccante</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Categoria</label>
                                        <select class="custom-select custom-select-sm" name="categoria">
                                            <option selected>Choose...</option>
                                            <option value="1">Prima Squadra</option>
                                            <option value="2">Juniores</option>
                                            <option value="3">Allievi</option>
                                            <option value="4">Giovanissimi</option>
                                            <option value="5">Esordienti</option>
                                            <option value="6">Pulcini</option>
                                            <option value="7">Piccoli Amici</option>
                                        </select>
                                    </div>
                                </div><br>
                                <h4 style="color:dark">CONTABILITA'</h4>
                                <div class="container" style="margin-left:-2%">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Da Pagare</label>
                                            <input type='currency' name="daPagare" value="0,00€" placeholder='Type a number & click outside' class="form-control form-control-sm mb-2" />
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Pagato</label>
                                            <input type='currency' name="pagato" value="0,00€" placeholder='Type a number & click outside' class="form-control form-control-sm mb-2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Salva" data-bs-dismiss="modal">
                </div>
            </form>
        </div>
    </div>
</div>

<!--Elimina-->
<div class="modal fade" id="elimina" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminaLabel">Elimina Giocatore</h5>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="pagine/AreaTesserati/giocatori/deleteGiocatore.php" method="post">
                <div class="modal-body">

                    <?php /*$sql = "SELECT nome,cognome FROM tesserato WHERE id='" . $_GET . "';";
                    if ($result = mysqli_query($link, $sql)) {
                        $row = mysqli_fetch_array($result);
                        $nome = $row['nome'];
                        $cognome = $row['cognome'];
                       
                    */
                    echo "Sei sicuro di voler eliminare definitivamente il giocatore?"; ?>
                    <input type="text" hidden="true" name="idElimina" id="idElimina">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-danger" value="Elimina" data-bs-dismiss="modal">
                </div>
            </form>
        </div>
    </div>
</div>
<!--Modifica-->
<div class="modal fade" id="modifica" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modificaLabel" aria-hidden="true">
    < <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title pl-3" id="addGiocatoreLabel" style="color:dark"><b>AGGIUNGI NUOVO GIOCATORE</b></h3>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" name="idModifica" hidden="true">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <h4 style="color:dark">DATI ANAGRAFICI</h4>
                            <div class="form-group mt-2" style="max-height:45%">
                                <label for="exampleFormControlFile1">Foto</label>
                                <input type="file" class="form-control-file" name="foto1" onchange="readFotoProfilo(this);" style="margin-left:-2%">
                                <img id="fotoProfilo" src="" />
                            </div>
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control form-control-sm mb-2" readonly="readonly">
                            <label>Cognome</label>
                            <input type="text" name="cognome" class="form-control form-control-sm mb-2" readonly="readonly">
                            <label>Codice Fiscale</label>
                            <input type="text" name="cf" class="form-control form-control-sm mb-2" readonly="readonly">
                            <label>Data di Nascita</label>
                            <input type="date" data-date-format="yyyy-mm-dd" style="width:100%" class="form-control form-control-sm mb-2" name="dataNascita" readonly="readonly">
                            <label>Luogo di Nascita</label>
                            <input type="text" name="luogoNascita" class="form-control form-control-sm" readonly="readonly">
                        </div>
                        <div class="col-sm-4 border-right">
                            <h4 style="color:dark">VISITA</h4>
                            <label>Tipo</label><br>
                            <input type="text" name="tipo" class="form-control form-control-sm" readonly="readonly">
                            <label>Scadenza</label>
                            <input type="date" data-date-format="yyyy-mm-dd" style="width:100%" class="form-control form-control-sm mb-2" name="scadenza" readonly="readonly">
                            <div class="form-group mt-2">
                                <label for="exampleFormControlFile1">Foto</label>
                                <input type="file" class="form-control-file" name="foto2" style="margin-left:-2%" readonly="readonly"><!-- mettere sull onload che carica la foto -->
                                <img id="fotoVisita" src="" />
                            </div>
                            <h4 style="color:dark; margin-left:-2%">CONTATTI</h4>
                            <div class="container" style="margin-left:-4%">
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
                                <div class="row>
                                        <div class=" col-sm-7">
                                    <input type="tel" name="tel1" class="form-control form-control-sm mb-2" minlength="9" maxlength="14" readonly="readonly">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="contatto1" class="form-control form-control-sm mb-2" readonly="readonly">
                                </div>
                                <div class="col-sm-1">
                                </div>
                            </div>
                        </div>
                        <div class="container" style="margin-left:-4%; margin-top:2%">
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
                            <div class="row">
                                <div class="col-sm-7">
                                    <input type="email" name="mail1" class="form-control form-control-sm mb-2" readonly="readonly">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="cont1" class="form-control form-control-sm mb-2" readonly="readonly">
                                </div>
                                <div class="col-sm-1">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h4 style="color:dark">RESIDENZA</h4>
                        <label>Indirizzo</label>
                        <input type="text" name="via" class="form-control form-control-sm mb-2" readonly="readonly">
                        <label>Citta </label>
                        <input type="text" name="citta" class="form-control form-control-sm mb-2" readonly="readonly">
                        <label>Provincia </label>
                        <input type="text" name="provincia" class="form-control form-control-sm mb-2" readonly="readonly">
                        <div class="row" style="margin-left:-2%">
                            <div class="col-sm-6">
                                <label>Ruolo</label>
                                <input type="text" name="ruolo" class="form-control form-control-sm mb-2" readonly="readonly">
                            </div>
                            <div class="col-sm-6">
                                <label>Categoria</label>
                                <input type="text" name="categoria" class="form-control form-control-sm mb-2" readonly="readonly">
                            </div>
                        </div><br>
                        <h4 style="color:dark">CONTABILITA'</h4>
                        <div class="container" style="margin-left:-2%">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Da Pagare</label>
                                    <input type='currency' name="daPagare" value="0,00€" placeholder='Type a number & click outside' class="form-control form-control-sm mb-2" readonly="readonly" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Pagato</label>
                                    <input type='currency' name="pagato" value="0,00€" placeholder='Type a number & click outside' class="form-control form-control-sm mb-2" readonly="readonly" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

</div>
</div>
</div>
<!--Visualizza-->
<div class="modal fade" id="visualizza" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="visualizzaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title pl-3" id="addGiocatoreLabel" style="color:dark"><b>AGGIUNGI NUOVO GIOCATORE</b></h3>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body visualizza">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <h4 style="color:dark">DATI ANAGRAFICI</h4>
                            <div class="form-group mt-2" style="max-height:45%">
                                <label for="exampleFormControlFile1">Foto</label>
                                <input type="file" class="form-control-file" name="foto1" onchange="readFotoProfilo(this);" style="margin-left:-2%">
                                <img id="fotoProfilo" src="" />
                            </div>
                            
                            <label>Nome</label>
                            <input type="text" name="nomeVisualizza" id="nomeVisualizza" class="form-control form-control-sm mb-2" readonly="readonly">
                            <label>Cognome</label>
                            <input type="text" name="cognomeVisualizza" class="form-control form-control-sm mb-2" readonly="readonly">
                            <label>Codice Fiscale</label>
                            <input type="text" name="cfVisualizza" class="form-control form-control-sm mb-2" readonly="readonly">
                            <label>Data di Nascita</label>
                            <input type="date" data-date-format="yyyy-mm-dd" style="width:100%" class="form-control form-control-sm mb-2" name="dataNascitaVisualizza" readonly="readonly">
                            <label>Luogo di Nascita</label>
                            <input type="text" name="luogoNascitaVisualizza" class="form-control form-control-sm" readonly="readonly">
                        </div>
                        <div class="col-sm-4 border-right">
                            <h4 style="color:dark">VISITA</h4>
                            <label>Tipo</label><br>
                            <input type="text" name="tipo" class="form-control form-control-sm" readonly="readonly">
                            <label>Scadenza</label>
                            <input type="date" data-date-format="yyyy-mm-dd" style="width:100%" class="form-control form-control-sm mb-2" name="scadenza" readonly="readonly">
                            <div class="form-group mt-2">
                                <label for="exampleFormControlFile1">Foto</label>
                                <input type="file" class="form-control-file" name="foto2" style="margin-left:-2%" readonly="readonly"><!-- mettere sull onload che carica la foto -->
                                <img id="fotoVisita" src="" />
                            </div>
                            <h4 style="color:dark; margin-left:-2%">CONTATTI</h4>
                            <div class="container" style="margin-left:-4%">
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
                                <div class="row">
                                    <div class="col-sm-7">
                                        <input type="tel" class="form-control form-control-sm mb-2" minlength="9" maxlength="14" readonly="readonly">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm mb-2" readonly="readonly">
                                    </div>
                                    <div class="col-sm-1">
                                    </div>
                                </div>
                            </div>
                            <div class="container" style="margin-left:-4%; margin-top:2%">
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
                                <div class="row">
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control form-control-sm mb-2" readonly="readonly">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm mb-2" readonly="readonly">
                                    </div>
                                    <div class="col-sm-1">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <h4 style="color:dark">RESIDENZA</h4>
                            <label>Indirizzo</label>
                            <input type="text" name="via" class="form-control form-control-sm mb-2" readonly="readonly">
                            <label>Citta </label>
                            <input type="text" name="citta" class="form-control form-control-sm mb-2" readonly="readonly">
                            <label>Provincia </label>
                            <input type="text" name="provincia" class="form-control form-control-sm mb-2" readonly="readonly">
                            <div class="row" style="margin-left:-2%">
                                <div class="col-sm-6">
                                    <label>Ruolo</label>
                                    <input type="text" name="ruolo" class="form-control form-control-sm mb-2" readonly="readonly">
                                </div>
                                <div class="col-sm-6">
                                    <label>Categoria</label>
                                    <input type="text" name="categoria" class="form-control form-control-sm mb-2" readonly="readonly">
                                </div>
                            </div><br>
                            <h4 style="color:dark">CONTABILITA'</h4>
                            <div class="container" style="margin-left:-2%">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Da Pagare</label>
                                        <input type='currency' name="daPagare" value="0,00€" placeholder='Type a number & click outside' class="form-control form-control-sm mb-2" readonly="readonly" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Pagato</label>
                                        <input type='currency' name="pagato" value="0,00€" placeholder='Type a number & click outside' class="form-control form-control-sm mb-2" readonly="readonly" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


<script>
    function readFotoProfilo(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#fotoProfilo')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            //blob input.files[0]
        }
    }

    function readFotoVisita(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#fotoVisita')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function aggiungiTel() {
        var a = $(".telefoni").length; //parte da uno
        var cell = "<div class='col-sm-7 telefoni'><input type='tel' name='tel" + (a + 1) + "' class='form-control form-control-sm mb-2' minlength='9' maxlength='14'></div><div class='col-sm-4'><input type='text' name='contatto" + (a + 1) + "' class='form-control form-control-sm mb-2'></div>";
        $("#telefoni").append(cell);
        $("#numTelefoni").attr('value', (a + 1));
        alert($("#numTelefoni").attr('value'));

    }

    function aggiungiMail() {
        var a = $(".mail").length; //parte da uno
        var ml = '<div class="col-sm-7 mail"><input type="email" name="mail' + (a + 1) + '" class="form-control form-control-sm mb-2"></div><div class="col-sm-4"><input type="text" name="cont' + (a + 1) + '" class="form-control form-control-sm mb-2"></div>';
        $("#mail").append(ml);
        $("#numMail").attr('value', (a + 1));
        alert($("#numMail").attr('value'));
    }

    //valuta euro
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