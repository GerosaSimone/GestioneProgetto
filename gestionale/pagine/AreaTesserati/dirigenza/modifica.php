<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
try {
    $fotoProfilo = null;
    $nome = "nessun simone";
    $cognome = "nessun cognome";
    $cf = "nessun codicefFiscale";
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
    $sql = "SELECT tesserato.idCategoria, tesserato.nome, tesserato.cognome, tesserato.cf, tesserato.dataNascita, tesserato.luogoNascita, tesserato.ruolo, tesserato.via,tesserato.provincia,tesserato.citta,tesserato.linkFoto as fotoProfilo,tesserato.daPagare,tesserato.pagato, visita.scadenza, visita.tipo, visita.foto as fotoVisita 
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
<div class="container">
    <div class="row">
        <div class="col-sm-4 border-right">
            <h4 style="color:dark">DATI ANAGRAFICI</h4>
            <div class="form-group mt-2" style="max-height:45%">
                <button type="button" class="close" aria-label="Close" style="color:red" id="eliminaProfilo"><span aria-hidden="true">&times;</span></button>
                <label>Foto</label>
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
            <label>Nome</label>
            <input type=" text" name="nome" class="form-control form-control-sm mb-2" value="<?php echo $nome ?>" required>
            <label>Cognome</label>
            <input type="text" name="cognome" class="form-control form-control-sm mb-2" value="<?php echo $cognome ?>" required>
            <label>Codice Fiscale</label>
            <input type="text" name="cf" class="form-control form-control-sm mb-2" minlength="16" maxlength="16" value="<?php echo $cf ?>" required autocomplete="rutjfkde">
            <label>Data di Nascita</label>
            <input type="date" data-date-format="yyyy-mm-dd" style="width:100%" class="form-control form-control-sm mb-2" name="dataNascita" value="<?php echo $dataNascita ?>" required>
            <label>Luogo di Nascita</label>
            <input type="text" name="luogoNascita" class="form-control form-control-sm" value="<?php echo $luogoNascita ?>" required>
        </div>
        <div class="col-sm-4 border-right">
            <h4 style="color:dark">VISITA</h4>
            <label>Tipo</label><button type="button" id="eliminaVisita" class="close" aria-label="Close" style="color:red"><span aria-hidden="true">&times;</span></button><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipoVisita" id="tipo0" value="0" <?php if ($tipo == 0) echo "checked"; ?>>
                <label class="form-check-label" for="inlineRadio1">Normale</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipoVisita" id="tipo1" value="1" <?php if ($tipo == 1) echo "checked"; ?>>
                <label class="form-check-label" for="inlineRadio2">Agonistica</label>
            </div><br>
            <label>Scadenza</label>
            <input type="date" data-date-format="yyyy-mm-dd" style="width:100%" class="form-control form-control-sm mb-2" name="scadenza" id="scadenza" value="<?php echo $scadenza ?>">
            <div class="form-group mt-2">
                <label>Foto</label>
                <input type="file" class="form-control-file" name="fileToUpload1" id="fileToUpload1" onchange="modificaFotoVisita(this);" style="margin-left:-2%; color:transparent">
                <?php
                if ($fotoVisita != null) {
                    echo "<img id='fotoVisita' src='img/uploadsVisita/$fotoVisita' /> ";
                } else {
                    echo "<img id='fotoVisita' src='' /> ";
                }
                ?>
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
                        <input type="tel" name="tel1" class="form-control form-control-sm mb-2" minlength="9" maxlength="14" value="<?php if (count($telefoniTel) > 0) echo $telefoniTel[0]; ?>">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="contatto1" class="form-control form-control-sm mb-2" value="<?php if (count($telefoniCont) > 0) echo $telefoniCont[0]; ?>">
                    </div>
                    <div class="col-sm-1">
                        <button type="button" onclick="modificaTel()" class="btn btn-secondary btn-sm" style="margin-left:5%">+</button>
                    </div>
                    <?php
                    for ($i = 1; $i < count($telefoniTel); $i++) {
                        echo "  <div class='col-sm-7 telefoni'>
                                    <input type='tel' name='tel" . ($i + 1) . "' class='form-control form-control-sm mb-2' value='" . $telefoniTel[$i] . "' minlength='9' maxlength='14'>
                                </div>
                                <div class='col-sm-4'>
                                    <input type='text' name='contatto" . ($i + 1) . "' class='form-control form-control-sm mb-2' value='" . $telefoniCont[$i] . "'>
                                </div>";
                    } ?>
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
                        <input type="email" name="mail1" class="form-control form-control-sm mb-2" value="<?php if (count($mailMail) > 0) echo $mailMail[0]; ?>">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="cont1" class="form-control form-control-sm mb-2" value="<?php if (count($mailCont) > 0) echo $mailCont[0]; ?>">
                    </div>
                    <div class="col-sm-1">
                        <button type="button" onclick="modificaMail()" class="btn btn-secondary btn-sm" style="margin-left:5%">+</button>
                    </div>

                    <?php
                    for ($i = 1; $i < count($mailMail); $i++) {
                        echo "  <div class='col-sm-7 mail'>
                                <input type='mail' name='mail" . ($i + 1) . "' class='form-control form-control-sm mb-2' value='" . $mailMail[$i] . "'>
                            </div>
                            <div class='col-sm-4'>
                                <input type='text' name='cont" . ($i + 1) . "' class='form-control form-control-sm mb-2' value='" . $mailCont[$i] . "'>
                            </div>";
                    } ?>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <h4 style="color:dark">RESIDENZA</h4>
            <label>Indirizzo</label>
            <input type="text" name="via" class="form-control form-control-sm mb-2" value="<?php echo $indirizzo ?>" required>
            <label>Citta </label>
            <input type="text" name="citta" class="form-control form-control-sm mb-2" value="<?php echo $citta ?>" required>
            <label>Provincia </label>
            <input type="text" name="provincia" class="form-control form-control-sm mb-2" minlength="2" maxlength="2" value="<?php echo $provincia ?>" required autocomplete="rutjfkde">
            <input type="text" name="id" value="<?php echo $id ?>" hidden="true">
            <div class="row" style="margin-left:-2%">
                <div class="col-sm-6">
                    <label>Ruolo</label>
                    <select class="custom-select custom-select-sm" name="ruolo">
                        <option value="P" <?php if ($ruolo == "Portiere") echo "selected"; ?>>Portiere</option>
                        <option value="D" <?php if ($ruolo == "Difensore") echo "selected"; ?>>Difensore</option>
                        <option value="C" <?php if ($ruolo == "Centrocampista") echo "selected"; ?>>Centrocampista</option>
                        <option value="A" <?php if ($ruolo == "Attaccante") echo "selected"; ?>>Attaccante</option>
                        <option value="N" <?php if ($ruolo == "Nessun ruolo") echo "selected"; ?>>Nessun ruolo</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label>Categoria</label>
                    <select class="custom-select custom-select-sm" name="categoria">
                        <option value="1" <?php if ($categoria == "1") echo "selected"; ?>>Prima Squadra</option>
                        <option value="2" <?php if ($categoria == "2") echo "selected"; ?>>Juniores</option>
                        <option value="3" <?php if ($categoria == "3") echo "selected"; ?>>Allievi</option>
                        <option value="4" <?php if ($categoria == "4") echo "selected"; ?>>Giovanissimi</option>
                        <option value="5" <?php if ($categoria == "5") echo "selected"; ?>>Esordienti</option>
                        <option value="6" <?php if ($categoria == "6") echo "selected"; ?>>Pulcini</option>
                        <option value="7" <?php if ($categoria == "7") echo "selected"; ?>>Piccoli Amici</option>
                    </select>
                </div>
            </div><br>
            <h4 style="color:dark">CONTABILITA'</h4>
            <div class="container" style="margin-left:-2%">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Da Pagare</label>
                        <input type='currency' name="daPagare" placeholder='Type a number & click outside' value="<?php echo $daPagare ?> €" class="form-control form-control-sm mb-2" />
                    </div>
                    <div class="col-sm-6">
                        <label>Pagato</label>
                        <input type='currency' name="pagato" placeholder='Type a number & click outside' value="<?php echo $pagato ?> €" class="form-control form-control-sm mb-2" />
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
        $("#scadenza").val('');
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
        var a = $(".telefoni").length;
        var cell = "<div class='col-sm-7 telefoni'><input type='tel' name='tel" + (a + 1) + "' class='form-control form-control-sm mb-2' minlength='9' maxlength='14'></div><div class='col-sm-4'><input type='text' name='contatto" + (a + 1) + "' class='form-control form-control-sm mb-2'></div>";
        $("#telefoni").append(cell);
        $("#numTelefoni").attr('value', (a + 1));
    }

    function modificaMail() {
        var a = $(".mail").length;
        var ml = '<div class="col-sm-7 mail"><input type="email" name="mail' + (a + 1) + '" class="form-control form-control-sm mb-2"></div><div class="col-sm-4"><input type="text" name="cont' + (a + 1) + '" class="form-control form-control-sm mb-2"></div>';
        $("#mail").append(ml);
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
</script>