<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../../config.php';
try {
    $fotoProfilo = null;
    $nome = "nessun simone";
    $cognome = "nessun cognome";
    $cf = "nessun codicefFiscale";
    $matricola = "nessuna matricola";
    $dataNascita = "nessuna data di nascita";
    $luogoNascita = "nessun luogo di nascita";
    $tipo = -1;
    $scadenza = "nessuna data di scadenza";
    $fotoVisita = null;
    $telefoniTel = array();
    $telefoniCont = array();
    $mailMail = array();
    $mailCont = array();
    $indirizzo = "nessun indirizzo";
    $citta = "nessuna citta";
    $provincia = "nessuna provincia";
    $ruolo = "nessun ruolo";
    $categoria = "nessuna categoria";
    $daPagare = "0€";
    $pagato = "0€";
    $id = $_GET['idTesserato'];
    //select
    $sql = "    SELECT tesserato.idCategoria, tesserato.matricola,tesserato.nome, tesserato.cognome, tesserato.cf, tesserato.dataNascita, tesserato.luogoNascita, tesserato.ruolo, tesserato.via,tesserato.provincia,tesserato.citta,tesserato.linkFoto as fotoProfilo,tesserato.daPagare,tesserato.pagato, visita.scadenza, visita.tipo, visita.foto as fotoVisita 
                FROM `tesserato`
                LEFT JOIN visita ON visita.id=tesserato.idVisita
                WHERE tesserato.id='" . $id . "'";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            if (!empty($row['fotoProfilo']))
                $fotoProfilo = $row['fotoProfilo'];
            if (!empty($row['nome']))
                $nome = $row['nome'];
            if (!empty($row['cognome']))
                $cognome = $row['cognome'];
            if (!empty($row['cf']))
                $cf = $row['cf'];
            if (!empty($row['matricola']))
                $matricola = $row['matricola'];
            if (!empty($row['dataNascita']))
                $dataNascita = $row['dataNascita'];
            if (!empty($row['luogoNascita']))
                $luogoNascita = $row['luogoNascita'];
            if ($row['tipo'] == "0" || $row['tipo'] == "1")
                $tipo = $row['tipo'];
            if (!empty($row['scadenza']))
                $scadenza = $row['scadenza'];
            if (!empty($row['fotoVisita']))
                $fotoVisita = $row['fotoVisita'];
            if (!empty($row['via']))
                $indirizzo = $row['via'];
            if (!empty($row['provincia']))
                $provincia = $row['provincia'];
            if (!empty($row['citta']))
                $citta = $row['citta'];
            if (!empty($row['ruolo'])) {
                if ($row['ruolo'] == "A")
                    $ruolo = "Attaccante";
                if ($row['ruolo'] == "D")
                    $ruolo = "Difensore";
                if ($row['ruolo'] == "C")
                    $ruolo = "Centrocampista";
                if ($row['ruolo'] == "P")
                    $ruolo = "Portiere";
                if ($row['ruolo'] == "N")
                    $ruolo = "Nessun ruolo";
            }
            if (!empty($row['idCategoria']))
                $categoria = $row['idCategoria'];
            $daPagare = $row['daPagare'];
            $pagato = $row['pagato'];
        }
    }
    //select telefoni
    //mancano i telefoni da aggiungere con i for
    $sql = "SELECT telefono.nome,telefono.telefono FROM telefono WHERE idTesserato='" . $id . "'";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                array_push($telefoniCont, $row['nome']);
                array_push($telefoniTel, $row['telefono']);
            }
        }
    }
    $sql = "SELECT mail.nome,mail.mail FROM mail WHERE idTesserato='" . $id . "'";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                array_push($mailCont, $row['nome']);
                array_push($mailMail, $row['mail']);
            }
        }
    }
} catch (Exception $e) {
    echo $e->getMessage() . "<br/>";
    while ($e = $e->getPrevious()) {
        echo 'Previous exception: ' . $e->getMessage() . "<br/>";
    }
}
?>
<div>
    <div class="row">
        <div class="col-sm-4 border-right destra">
            <h4 class="text-dark font-weight-bold">DATI ANAGRAFICI</h4>
            <div class="form-group mt-2" style="max-height:45%">
                <button type="button" class="close" aria-label="Close" style="color:red" id="eliminaProfilo"><span aria-hidden="true">&times;</span></button>
                <label class="text-dark font-weight-bold">Foto</label>
                <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" onchange="modificaFotoProfilo(this);" style="margin-left:-2%;color:transparent">
                <?php
                if (isset($fotoProfilo)) {
                    echo "<img id='fotoProfilo' src='img/uploadsProfilo/$fotoProfilo' /> ";
                } else {
                    echo "<img id='fotoProfilo' src='img/avatar.svg' /> ";
                }
                ?>
                <input type='text' name='presenzaFotoProfilo' id="presenzaFotoProfilo" hidden=true value='0'>
            </div>
            <label class="text-dark font-weight-bold">Nome</label>
            <input type=" text" name="nome" class="form-control form-control-sm mb-2" value="<?php echo $nome ?>" required>
            <label class="text-dark font-weight-bold">Cognome</label>
            <input type="text" name="cognome" class="form-control form-control-sm mb-2" value="<?php echo $cognome ?>" required>
            <label class="text-dark font-weight-bold">Codice Fiscale</label>
            <input type="text" name="cf" class="form-control form-control-sm mb-2" minlength="16" maxlength="16" value="<?php echo $cf ?>" required autocomplete="rutjfkde">
            <label class="text-dark font-weight-bold">Matricola</label>
            <input type="text" name="matricola" class="form-control form-control-sm mb-2" value="<?php echo $matricola ?>" required autocomplete="rutjfkde">
            <label class="text-dark font-weight-bold">Data di Nascita</label>
            <input type="date" data-date-format="yyyy-mm-dd" style="width:100%" class="form-control form-control-sm mb-2" name="dataNascita" value="<?php echo $dataNascita ?>" required>
            <label class="text-dark font-weight-bold">Luogo di Nascita</label>
            <input type="text" name="luogoNascita" class="form-control form-control-sm" value="<?php echo $luogoNascita ?>" required>
        </div>
        <div class="col-sm-4 border-right destra">
            <h4 class="text-dark font-weight-bold">VISITA</h4>
            <label class="text-dark font-weight-bold">Tipo</label>
            <button type="button" id="eliminaVisita" class="close" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipoVisita" id="tipo0" value="0" <?php if ($tipo == 0) echo "checked"; ?>>
                <label class="form-check-label" for="inlineRadio1">Certificato Medico</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipoVisita" id="tipo1" value="1" <?php if ($tipo == 1) echo "checked"; ?>>
                <label class="form-check-label" for="inlineRadio2">Visita Agonistica</label>
            </div><br>
            <label class="text-dark font-weight-bold mt-1">Scadenza</label>
            <input type="date" data-date-format="yyyy-mm-dd" style="width:100%" class="form-control form-control-sm mb-2" name="scadenza" id="scadenza" value="<?php echo $scadenza ?>">
            <div class="form-group mt-2">
                <label class="text-dark font-weight-bold">Foto</label>
                <input type="file" class="form-control-file" name="fileToUpload1" id="fileToUpload1" onchange="modificaFotoVisita(this);" style="margin-left:-2%; color:transparent">
                <?php
                if ($fotoVisita != null) {
                    echo "<img id='fotoVisita' src='img/uploadsVisita/$fotoVisita' /> ";
                } else {
                    echo "<img id='fotoVisita' src='' /> ";
                }
                ?>
            </div>
            <h4 style="color:dark; margin-top:4%">CONTATTI</h4>
            <div style="margin-left:-2%" id="telefoni">
                    <div class="row">
                        <div class="col-7">
                            <label class="text-dark font-weight-bold">Telefono</label>
                        </div>
                        <div class="col-4">
                            <label class="text-dark font-weight-bold">Contatto</label>
                        </div>
                        <div class="col-1">
                            <input type="text" id="numTelefoni" name="numTelefoni" hidden="true" value="1" class="form-control form-control-sm mb-2">
                        </div>
                    </div>
                    <div class="row inputTelefoni">
                        <div class="col-7">
                            <input type="tel" name="tel1" class="form-control form-control-sm mb-2" minlength="9" maxlength="14" value="<?php if (count($telefoniTel) > 0) echo $telefoniTel[0]; ?>">
                        </div>
                        <div class="col-4">
                            <input type="text" name="contatto1" class="form-control form-control-sm mb-2" value="<?php if (count($telefoniCont) > 0) echo $telefoniCont[0]; ?>">
                        </div>
                        <div class="col-1">
                            <button type="button" onclick="modificaTel()" class="btn btn-secondary btn-sm" style="margin-left:5%">+</button>
                        </div>
                    </div>
                    <?php
                    for ($i = 1; $i < count($telefoniTel); $i++) {
                        echo "  
                            <div class='row inputTelefoni'>
                                <div class='col-7 telefoni'>
                                    <input type='tel' name='tel" . ($i + 1) . "' class='form-control form-control-sm mb-2' value='" . $telefoniTel[$i] . "' minlength='9' maxlength='14'>
                                </div>
                                <div class='col-4'>
                                    <input type='text' name='contatto" . ($i + 1) . "' class='form-control form-control-sm mb-2' value='" . $telefoniCont[$i] . "'>
                                </div>
                            </div>";
                    } ?>
                </div>
                <div style="margin-left:-2%; margin-top:2%" id="rowMail">
                    <div class="row">
                        <div class="col-7">
                            <label class="text-dark font-weight-bold">Mail</label>
                        </div>
                        <div class="col-4">
                            <label class="text-dark font-weight-bold">Contatto</label>
                        </div>
                        <div class="col-1">
                            <input type="text" id="numMail" name="numMail" hidden="true" value="1" class="form-control form-control-sm mb-2">
                        </div>
                    </div>
                    <div class="row inputMail">
                        <div class="col-7">
                            <input type="email" name="mail1" class="form-control form-control-sm mb-2" value="<?php if (count($mailMail) > 0) echo $mailMail[0]; ?>">
                        </div>
                        <div class="col-4">
                            <input type="text" name="cont1" class="form-control form-control-sm mb-2" value="<?php if (count($mailCont) > 0) echo $mailCont[0]; ?>">
                        </div>
                        <div class="col-1">
                            <button type="button" onclick="modificaMail()" class="btn btn-secondary btn-sm" style="margin-left:5%">+</button>
                        </div>
                    </div>
                    <?php
                    for ($i = 1; $i < count($mailMail); $i++) {
                        echo "  
                            <div class='row inputMail'>
                                <div class='col-7 mail'>
                                    <input type='mail' name='mail" . ($i + 1) . "' class='form-control form-control-sm mb-2' value='" . $mailMail[$i] . "'>
                                </div>
                                <div class='col-4'>
                                    <input type='text' name='cont" . ($i + 1) . "' class='form-control form-control-sm mb-2' value='" . $mailCont[$i] . "'>
                                </div>
                            </div>";
                    } ?>
                </div>
        </div>
        <div class="col-sm-4">
            <h4 class="text-dark font-weight-bold">RESIDENZA</h4>
            <label class="text-dark font-weight-bold">Indirizzo</label>
            <input type="text" name="via" class="form-control form-control-sm mb-2" value="<?php echo $indirizzo ?>" required>
            <label class="text-dark font-weight-bold">Citta </label>
            <input type="text" name="citta" class="form-control form-control-sm mb-2" value="<?php echo $citta ?>" required>
            <label class="text-dark font-weight-bold">Provincia </label>
            <input type="text" name="provincia" class="form-control form-control-sm mb-2" minlength="2" maxlength="2" value="<?php echo $provincia ?>" required autocomplete="rutjfkde">
            <input type="text" name="id" value="<?php echo $id ?>" hidden="true">
            <div class="row" style="margin-left:-2%">
                <div class="col-sm-6">
                    <label class="text-dark font-weight-bold">Ruolo</label>
                    <select class="custom-select custom-select-sm" name="ruolo">
                        <option value="P" <?php if ($ruolo == "Portiere") echo "selected"; ?>>Portiere</option>
                        <option value="D" <?php if ($ruolo == "Difensore") echo "selected"; ?>>Difensore</option>
                        <option value="C" <?php if ($ruolo == "Centrocampista") echo "selected"; ?>>Centrocampista</option>
                        <option value="A" <?php if ($ruolo == "Attaccante") echo "selected"; ?>>Attaccante</option>
                        <option value="N" <?php if ($ruolo == "Nessun ruolo") echo "selected"; ?>>Nessun ruolo</option>
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
            </div><br>
            <h4 class="text-dark font-weight-bold">CONTABILITA'</h4>
            <div style="margin-left:-2%">
                <div class="row">
                    <div class="col-sm-6">
                        <label class="text-dark font-weight-bold">Da Pagare</label>
                        <input type='text' id="daPagare" name="daPagare" placeholder='Type a number & click outside' value="<?php echo $daPagare ?>,00 €" class="form-control form-control-sm mb-2" readonly />
                        <button type="button" onclick="aggiungiPagare()" class="btn btn-secondary btn-sm d-inline mb-2"> +</button>
                        <button type="button" onclick="sottraiPagare()" class="btn btn-secondary btn-sm d-inline mb-2"> -</button>
                        <input type='currency' id="AggdaPagare" name="AggdaPagare" value="00,00 €" style class="form-control form-control-sm mb-2 d-inline" />
                    </div>
                    <div class="col-sm-6">
                        <label class="text-dark font-weight-bold">Pagato</label>
                        <input type='text' name="pagato" id="pagato" placeholder='Type a number & click outside' value="<?php echo $pagato ?>,00 €" class="form-control form-control-sm mb-2" readonly />
                        <button type="button" onclick="aggiungiPagato()" class="btn btn-secondary btn-sm d-inline mb-2"> +</button>
                        <button type="button" onclick="sottraiPagato()" class="btn btn-secondary btn-sm d-inline mb-2"> -</button>
                        <input type='currency' id="AggPagato" name="AggPagato" value="00,00 €" style class="form-control form-control-sm mb-2 d-inline" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#eliminaVisita").click(function() {
        $('#fotoVisita')
            .attr('src', '');
        $("#fileToUpload1").val('');
        $("#tipo0").prop('checked', false);
        $("#tipo1").prop('checked', false);
        $("#scadenza").val('ciao');
    });

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

    function modificaFotoVisita(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#fotoVisita')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function modificaTel() {
        var a = $(".inputTelefoni").length;
        var ml = '<div class="row inputTelefoni"><div class="col-7"><input type="tel" name="tel' + (a + 1) + '" class="form-control form-control-sm mb-2"></div><div class="col-4"><input type="text" name="contatto' + (a + 1) + '" class="form-control form-control-sm mb-2"></div></div>';
        $("#telefoni").append(ml);
        $("#numTelefoni").attr('value', (a + 1));
    }

    function modificaMail() {
        var a = $(".inputMail").length;
        var ml = '<div class="row inputMail"><div class="col-7 mail"><input type="email" name="mail' + (a + 1) + '" class="form-control form-control-sm mb-2"></div><div class="col-4"><input type="text" name="cont' + (a + 1) + '" class="form-control form-control-sm mb-2"></div></div>';
        $("#rowMail").append(ml);
        $("#numMail").attr('value', (a + 1));
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
    //aggiungi sottrai pagato dapagare
    function aggiungiPagare() {
        var num = $('#AggdaPagare').val();
        num = num.replace(".", "");
        var num = num.split(',', 1)[0]
        num = parseInt(num)

        var daPagare = $('#daPagare').val();
        daPagare = daPagare.replace(".", "");
        var daPagare = daPagare.split(',', 1)[0]
        daPagare = parseInt(daPagare)

        ris = num + daPagare;
        $('#daPagare').val(ris + ",00 €");
        $('#AggdaPagare').val("00,00 €");
    }

    function aggiungiPagato() {

        var num = $('#AggPagato').val();
        num = num.replace(".", "");
        var num = num.split(',', 1)[0]
        num = parseInt(num)

        var pagato = $('#pagato').val();
        pagato = pagato.replace(".", "");
        var pagato = pagato.split(',', 1)[0]
        pagato = parseInt(pagato)

        ris = num + pagato;
        $('#pagato').val(ris + ",00 €");
        $('#AggPagato').val("00,00 €");
        var pagare = $('#daPagare').val();
        pagare = pagare.replace(".", "");
        var pagare = pagare.split(',', 1)[0]
        pagare = parseInt(pagare);

        ris = pagare - num;
        $('#daPagare').val(ris + ",00 €");

    }

    function sottraiPagato() {

        var num = $('#AggPagato').val();
        num = num.replace(".", "");
        var num = num.split(',', 1)[0]
        num = parseInt(num)

        var pagato = $('#pagato').val();
        pagato = pagato.replace(".", "");
        var pagato = pagato.split(',', 1)[0]
        pagato = parseInt(pagato)

        ris = pagato - num;
        $('#pagato').val(ris + ",00 €");
        $('#AggPagato').val("00,00 €");

        var pagare = $('#daPagare').val();
        pagare = pagare.replace(".", "");
        var pagare = pagare.split(',', 1)[0]
        pagare = parseInt(pagare);

        ris = pagare + num;
        $('#daPagare').val(ris + ",00 €");

    }


    function sottraiPagare() {
        var num = $('#AggdaPagare').val();
        num = num.replace(".", "");
        var num = num.split(',', 1)[0]
        num = parseInt(num)

        var daPagare = $('#daPagare').val();
        daPagare = daPagare.replace(".", "");
        var daPagare = daPagare.split(',', 1)[0]
        daPagare = parseInt(daPagare)

        ris = daPagare - num;
        $('#daPagare').val(ris + ",00 €");
        $('#AggdaPagare').val("00,00 €");
    }
    if ($(window).width() < 501) {
        $(".destra").removeClass("border-right");
    } else {
        $(".destra").addClass("border-right");
    }
</script>