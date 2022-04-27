<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';

$id = $_GET['idTesserato'];
$fotoProfilo;
$nome = "simone";
$cognome;
$cf;
$dataNascita;
$luogoNascita;
$tipo;
$scadenza;
$fotoVisita;
$telefoni=array();
$mail=array();
$indirizzo;
$citta;
$provincia;
$ruolo;
$categoria;
$daPagare;
$pagato;

//mancano i telefoni da aggiungere con i for

//select
?>

<div class="container">
    <div class="row">
        <div class="col-sm-4 border-right">
            <h4 style="color:dark">DATI ANAGRAFICI</h4>
            <div class="form-group mt-2" style="max-height:45%">
                <label>Foto</label>
                <img id="fotoProfilo" src="" />
            </div>
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label>Nome</label>
                    <input type="text" name="nome" value="<?php echo $nome?>"class="form-control-plaintext form-control-sm mb-2">
                </div>
                <div class="col">
                    <label>Cognome</label>
                    <input type="text" name="cognome" value="<?php echo $cognome?>" class="form-control-plaintext form-control-sm mb-2">
                </div>
            </div>
            <label>Codice Fiscale</label>
            <input type="text" name="cf" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $cf?>">
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label>Data Nascita</label>
                    <input type="text" name="dataNascita" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $dataNascita?>">
                </div>
                <div class="col">
                    <label>Luogo di Nascita</label>
                    <input type="text" name="luogoNascita" class="form-control-plaintext form-control-sm" value="<?php echo $luogoNascita?>">
                </div>
            </div>
        </div>
        <div class="col-sm-4 border-right">
            <h4 style="color:dark">VISITA</h4>
            <label>Tipo</label>
            <input type="text" name="tipoVisita" class="form-control-plaintext form-control-sm" value="<?php echo $tipo?>">
            <label>Scadenza</label><br>
            <input type="text" name="scadenza" class="form-control-plaintext form-control-sm" value="<?php echo $scadenza?>">
            <label>Foto</label>
            <img id="fotoVisita" src="" />
            <h4 style="color:dark; margin-left:-2%">CONTATTI</h4>
            <div class="container" style="margin-left:-4%">
                <div class="row">
                    <div class="col-sm-8">
                        Telefono
                    </div>
                    <div class="col-sm-4">
                        Contatto
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
                        Mail
                    </div>
                    <div class="col-sm-4">
                        Contatto
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
            <label>Indirizzo</label>
            <input type="text" name="via" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $indirizzo?>">
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label>Citta </label>
                    <input type="text" name="citta" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $citta?>">
                </div>
                <div class="col">
                    <label>Provincia </label>
                    <input type="text" name="provincia" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $provincia?>">
                </div>
            </div>
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label>Ruolo </label>
                    <input type="text" name="ruolo" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $ruolo?>">
                </div>
                <div class="col">
                    <label>Categoria </label>
                    <input type="text" name="categoria" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $categoria?>">
                </div>
            </div>
            <h4 style="color:dark">CONTABILITA'</h4>
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label>Da Pagare </label>
                    <input type="text" name="Da Pagare" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $daPagare?>">
                </div>
                <div class="col">
                    <label>Pagato </label>
                    <input type="text" name="Pagato" class="form-control-plaintext form-control-sm mb-2" value="<?php echo $pagato?>">
                </div>
            </div>
        </div>
    </div>
</div>