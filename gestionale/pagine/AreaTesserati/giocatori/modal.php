<?php function prova()
{
    echo "
    <div class='col-sm-8'>
        <input type='tel' name='tel1' class='form-control form-control-sm mb-2' minlength='9' maxlength='14'>
    </div>
    <div class='col-sm-4'>
        <input type='text' name='contatto1' class='form-control form-control-sm mb-2'>
    </div>";
} ?>
<!--Aggiungi Giocatore-->
<div class="modal fade" id="addGiocatore" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addGiocatoreLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pl-3" id="addGiocatoreLabel">Aggiungi nuovo Giocatore</h5>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="addGiocatore.php" method="post">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <h4 style="color:dark">DATI ANAGRAFICI</h4>
                                <div class="form-group mt-2" style="max-height:45%">
                                    <label for="exampleFormControlFile1">Foto</label>
                                    <input type="file" class="form-control-file" id="foto" onchange="readFotoProfilo(this);" style="margin-left:-2%">
                                    <img id="fotoProfilo" src="" />
                                </div>
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control form-control-sm mb-2">
                                <label>Cognome</label>
                                <input type="text" name="cognome" class="form-control form-control-sm mb-2">
                                <label>Codice Fiscale</label>
                                <input type="text" name="cf" class="form-control form-control-sm mb-2">
                                <label>Data di Nascita</label>
                                <input type="date" data-date-format="mm/dd/yyyy" style="width:100%" class="form-control form-control-sm mb-2">
                                <label>Luogo di Nascita</label>
                                <input type="text" name="dataNascita" class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-4 border-right">
                                <h4 style="color:dark">VISITA</h4>
                                <label>Visita Medica</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipoVisita" id="normale" value="normale">
                                    <label class="form-check-label" for="inlineRadio1">Normale</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipoVisita" id="agonistica" value="agonistica">
                                    <label class="form-check-label" for="inlineRadio2">Agonistica</label>
                                </div><br>
                                <div class="form-group mt-2">
                                    <label for="exampleFormControlFile1">Foto Visita</label>
                                    <input type="file" class="form-control-file" id="foto1" onchange="readFotoVisita(this);" style="margin-left:-2%">
                                    <img id="fotoVisita" src="" />
                                </div>
                                <h4 style="color:dark">CONTATTI</h4>
                                <div class="container" style="margin-left:-4%">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            Telefono
                                        </div>
                                        <div class="col-sm-4">
                                            Contatto
                                        </div>
                                    </div>
                                    <div class="row" id="telefoni">
                                        <div class="col-sm-8">
                                            <input type="tel" name="tel1" class="form-control form-control-sm mb-2" minlength="9" maxlength="14">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" name="contatto1" class="form-control form-control-sm mb-2">
                                        </div>
                                        <button type="button" onclick="aggiungiTel()" class="btn btn-secondary" style="margin-left:5%">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <h4 style="color:dark">RESIDENZA</h4>
                                <label>Indirizzo</label>
                                <input type="text" name="indirizzo" class="form-control form-control-sm mb-2">
                                <label>Citta </label>
                                <input type="text" name="citta" class="form-control form-control-sm mb-2">
                                <label>Provincia </label>
                                <input type="text" name="provincia" class="form-control form-control-sm mb-2">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Ruolo</label>
                                        <select class="custom-select custom-select-sm" id="inlineFormCustomSelectPref">
                                            <option selected>Choose...</option>
                                            <option value="P">Portiere</option>
                                            <option value="D">Difensore</option>
                                            <option value="C">Centrocampista</option>
                                            <option value="A">Attaccante</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Categoria</label>
                                        <select class="custom-select custom-select-sm" id="inlineFormCustomSelectPref">
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
                                <div class="container" style="margin-left:-4%">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Da Pagare</label>
                                            <input type='currency' value="123" placeholder='Type a number & click outside' class="form-control form-control-sm mb-2"/>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Pagato</label>
                                            <input type='currency' value="123" placeholder='Type a number & click outside' class="form-control form-control-sm mb-2"/>
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
            <div class="modal-body">
                <input type="text" id="tempElimina">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
<!--Modifica-->
<div class="modal fade" id="modifica" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modificaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modificaLabel">Modifica Giocatore</h5>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="text" id="tempModifica">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>
<!--Visualizza-->
<div class="modal fade" id="visualizza" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="visualizzaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visualizzaLabel">visualizza Giocatore</h5>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="text" id="tempVisualizza">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<!--Modifica Giocatore-->
<div class="modal fade" id="editGiocatore" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editGiocatoreLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pl-3" id="editGiocatoreLabel">Modifica Giocatore</h5>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="editGiocatore.php" method="post">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 border-right">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control form-control-sm mb-2">
                                <label>Cognome</label>
                                <input type="text" name="cognome" class="form-control form-control-sm mb-2">
                                <label>Codice Fiscale</label>
                                <input type="text" name="cf" class="form-control form-control-sm mb-2">
                                <label>Data di Nascita</label>
                                <input type="date" data-date-format="mm/dd/yyyy" style="width:100%" class="form-control form-control-sm mb-2">
                                <label>Luogo di Nascita</label>
                                <input type="text" name="dataNascita" class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-6">
                                <label>Indirizzo</label>
                                <input type="text" name="indirizzo" class="form-control form-control-sm mb-2">
                                <label>Citta</label>
                                <input type="text" name="citta" class="form-control form-control-sm mb-2">
                                <label>Provincia</label>
                                <input type="text" name="provincia" class="form-control form-control-sm mb-2">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Ruolo</label>
                                        <select class="custom-select custom-select-sm" id="inlineFormCustomSelectPref">
                                            <option selected>Choose...</option>
                                            <option value="P">Portiere</option>
                                            <option value="D">Difensore</option>
                                            <option value="C">Centrocampista</option>
                                            <option value="A">Attaccante</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Categoria</label>
                                        <select class="custom-select custom-select-sm" id="inlineFormCustomSelectPref">
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
                                </div>
                                <div class="form-group mt-2">
                                    <label for="exampleFormControlFile1">Foto</label>
                                    <input type="file" class="form-control-file" id="foto">
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


<script>
    function readFotoProfilo(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#fotoProfilo')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
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
        alert("ciao");
        var tag = document.createElement("p");
        var text = document.createTextNode("Tutorix is the best e-learning platform");
        tag.appendChild(text);
        var element = document.getElementById("#telefoni");
        element.appendChild(tag);
    }

    var currencyInput = document.querySelector('input[type="currency"]')
    var currency = 'EUR' // https://www.currency-iso.org/dam/downloads/lists/list_one.xml

    // format inital value
    onBlur({
        target: currencyInput
    })

    // bind event listeners
    currencyInput.addEventListener('focus', onFocus)
    currencyInput.addEventListener('blur', onBlur)


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