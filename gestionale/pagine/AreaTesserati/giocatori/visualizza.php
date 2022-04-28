<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$fotoProfilo = "nessuna foto";
$nome = "nessun simone";
$cognome = "nessun cognome";
$cf = "nessun codicefFiscale";
$dataNascita = "nessuna data di nascita";
$luogoNascita = "nessun luogo di nascita";
$tipo = "nessuna visita";
$scadenza = "nessuna data di scadenza";
$fotoVisita = "nessuna foto visita";
$telefoni = array();
$mail = array();
$indirizzo = "nessun indirizzo";
$citta = "nessuna citta";
$provincia = "nessuna provincia";
$ruolo = "nessun ruolo";
$categoria = "nessuna categoraia";
$daPagare = "0€";
$pagato = "0€";
$id = $_GET['idTesserato'];

//select
$sql = "SELECT tesserato.nome, tesserato.cognome, tesserato.cf, tesserato.dataNascita, tesserato.luogoNascita, tesserato.tipo, tesserato.ruolo, tesserato.via,tesserato.provincia,tesserato.citta,tesserato.linkFoto as fotoProfilo,tesserato.daPagare,tesserato.pagato, categoria.nome as cat , visita.scadenza, visita.tipo as tipoVisita, visita.foto as fotoVisita 
                FROM (`tesserato`          
                INNER JOIN categoria 
                on idCategoria=categoria.id)
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

        if (!empty($row['tipo']))
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

        if (!empty($row['ruolo']))
            $ruolo = $row['ruolo'];

        if (!empty($row['categoria']))
            $categoria = $row['categoria'];

        if (!empty($row['daPagare']))
            $daPagare = $row['daPagare'];

        if (!empty($row['pagato']))
            $pagato = $row['pagato'];
    }
}

//select telefoni

//mancano i telefoni da aggiungere con i for


?>
<style>
    .titoliBlu {
        color: rgb(33, 164, 245);
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-4 border-right">
            <h4 style="color:dark ">DATI ANAGRAFICI</h4>
            <div class="form-group mt-2" style="max-height:45%">
                <label class="titoliBlu">Foto</label>
                <img id="fotoProfilo" src="" />
            </div>
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label class="titoliBlu">Nome</label>
                    <p><?php echo $nome ?></p>
                   
                </div>
                <div class="col">
                    <label class="titoliBlu">Cognome</label>
                    <input type="text" name="cognome" value="<?php echo $cognome ?>" class="form-control-plaintext form-control-sm mb-2">
                </div>
            </div>
            <label class="titoliBlu">Codice Fiscale</label>
            <input type="text" name="cf" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $cf ?>">
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label class="titoliBlu">Data Nascita</label>
                    <input type="text" name="dataNascita" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $dataNascita ?>">
                </div>
                <div class="col">
                    <label class="titoliBlu">Luogo di Nascita</label>
                    <input type="text" name="luogoNascita" class="form-control-plaintext form-control-sm" value="<?php echo $luogoNascita ?>">
                </div>
            </div>
        </div>
        <div class="col-sm-4 border-right">
            <h4 style="color:dark">VISITA</h4>
            <label class="titoliBlu">Tipo</label>
            <input type="text" name="tipoVisita" class="form-control-plaintext form-control-sm" value="<?php echo $tipo ?>">
            <label class="titoliBlu">Scadenza</label><br>
            <input type="text" name="scadenza" class="form-control-plaintext form-control-sm" value="<?php echo $scadenza ?>">
            <label class="titoliBlu">Foto</label>
            <img id="fotoVisita" src="" />
            <h4 style="color:dark; margin-left:-2%">CONTATTI</h4>
            <div class="container" style="margin-left:-4%">
                <div class="row">
                    <div class="col-sm-8">
                    <label class="titoliBlu">Telefono</label>
                    </div>
                    <div class="col-sm-4">
                    <label class="titoliBlu">Contatto</label>
                    </div>
                </div>
                <div class="row telefoni" id="telefoni">
                    <div class="col-sm-8">
                        <input type="tel" name="tel1" class="form-control form-control-sm mb-2" minlength="9" maxlength="14">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="contatto1" class="form-control form-control-sm mb-2">
                    </div>
                </div>
            </div>
            <div class="container" style="margin-left:-4%; margin-top:2%">
                <div class="row">
                    <div class="col-sm-8">
                        <label class="titoliBlu">Mail</label>
                    </div>
                    <div class="col-sm-4">
                    <label class="titoliBlu">Contatto</label>
                    </div>
                </div>
                <div class="row mail" id="mail">
                    <div class="col-sm-8">
                        <input type="email" name="mail1" class="form-control form-control-sm mb-2">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="cont1" class="form-control form-control-sm mb-2">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <h4 style="color:dark">RESIDENZA</h4>
            <label class="titoliBlu">Indirizzo</label>
            <input type="text" name="via" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $indirizzo ?>">
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label class="titoliBlu">Citta </label>
                    <input type="text" name="citta" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $citta ?>">
                </div>
                <div class="col">
                    <label class="titoliBlu">Provincia </label>
                    <input type="text" name="provincia" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $provincia ?>">
                </div>
            </div>
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label class="titoliBlu">Ruolo </label>
                    <input type="text" name="ruolo" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $ruolo ?>">
                </div>
                <div class="col">
                    <label class="titoliBlu">Categoria </label>
                    <input type="text" name="categoria" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $categoria ?>">
                </div>
            </div>
            <h4 style="color:dark">CONTABILITA'</h4>
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label class="titoliBlu">Da Pagare </label>
                    <input type="text" name="Da Pagare" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $daPagare ?>">
                </div>
                <div class="col">
                    <label class="titoliBlu">Pagato </label>
                    <input type="text" name="Pagato" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $pagato ?>">
                </div>
            </div>
        </div>
    </div>
</div>