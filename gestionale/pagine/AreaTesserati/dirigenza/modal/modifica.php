<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../../config.php';
try {
    $fotoProfilo = null;
    $nome = "nessun nome";
    $cognome = "nessun cognome";
    $cf = "nessun codicefFiscale";
    $matricola = "nessuna matricola";
    $dataNascita = "nessuna data di nascita";
    $luogoNascita = "nessun luogo di nascita";
    $telefoniTel = array();
    $telefoniCont = array();
    $mailMail = array();
    $mailCont = array();
    $indirizzo = "nessun indirizzo";
    $citta = "nessuna citta";
    $provincia = "nessuna provincia";
    $ruolo = "nessun ruolo";
    $categoria = "nessuna categoria";
    $id = $_GET['idTesserato'];
    $sql = "    SELECT tesserato.idCategoria, tesserato.matricola, tesserato.nome, tesserato.cognome, tesserato.cf, tesserato.dataNascita, tesserato.luogoNascita, tesserato.ruolo, tesserato.via,tesserato.provincia,tesserato.citta,tesserato.linkFoto as fotoProfilo,tesserato.daPagare,tesserato.pagato 
                FROM `tesserato`                
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
            if (!empty($row['via']))
                $indirizzo = $row['via'];
            if (!empty($row['provincia']))
                $provincia = $row['provincia'];
            if (!empty($row['citta']))
                $citta = $row['citta'];
            if (!empty($row['ruolo'])) {
                if ($row['ruolo'] == "M")
                    $ruolo = "Mister";
                if ($row['ruolo'] == "D")
                    $ruolo = "Dirigente";
                if ($row['ruolo'] == "P")
                    $ruolo = "Presidente";
                if ($row['ruolo'] == "N")
                    $ruolo = "Nessun ruolo";
            }
            if (!empty($row['idCategoria']))
                $categoria = $row['idCategoria'];
        }
    }
    //select telefoni    
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
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 border-right">
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
            <input type="text" name="matricola" class="form-control form-control-sm mb-2" required value="<?php echo $matricola ?>" autocomplete="rutjfkde">
            <label class="text-dark font-weight-bold">Data di Nascita</label>
            <input type="date" data-date-format="yyyy-mm-dd" style="width:100%" class="form-control form-control-sm mb-2" name="dataNascita" value="<?php echo $dataNascita ?>" required>
            <label class="text-dark font-weight-bold">Luogo di Nascita</label>
            <input type="text" name="luogoNascita" class="form-control form-control-sm" value="<?php echo $luogoNascita ?>" required>
        </div>
        <div class="col-sm-6">
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
                        <option value="M" <?php if ($ruolo == "Mister") echo "selected"; ?>>Mister</option>
                        <option value="D" <?php if ($ruolo == "Dirigente") echo "selected"; ?>>Dirigente</option>
                        <option value="P" <?php if ($ruolo == "Presidente") echo "selected"; ?>>Presidente</option>
                        <option value="N" <?php if ($ruolo == "Nessun ruolo") echo "selected"; ?>>Nessun ruolo</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label class="text-dark font-weight-bold">Categoria</label>
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
            </div>
            <h4 style="color:dark; margin-top:4%">CONTATTI</h4>
            <div class="container" style="margin-left:-2%">
                <div class="row">
                    <div class="col-sm-7">
                        <label class="text-dark font-weight-bold">Telefono</label>
                    </div>
                    <div class="col-sm-4">
                        <label class="text-dark font-weight-bold">Contatto</label>
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
            <div class="container" style="margin-left:-2%; margin-top:2%">
                <div class="row">
                    <div class="col-sm-7">
                        <label class="text-dark font-weight-bold">Mail</label>
                    </div>
                    <div class="col-sm-4">
                        <label class="text-dark font-weight-bold">Contatto</label>
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
    </div>
</div>
</div>

<script>
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
</script>