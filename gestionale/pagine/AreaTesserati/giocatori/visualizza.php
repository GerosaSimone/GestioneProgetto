<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$fotoProfilo;
$nome = "nessun simone";
$cognome = "nessun cognome";
$cf = "nessun codicefFiscale";
$dataNascita = "nessuna data di nascita";
$luogoNascita = "nessun luogo di nascita";
$tipo = "nessuna visita";
$scadenza = "nessuna data di scadenza";
$fotoVisita = "nessuna foto visita";
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
$sql = "SELECT tesserato.nome, tesserato.cognome, tesserato.cf, tesserato.dataNascita, tesserato.luogoNascita, tesserato.tipo, tesserato.ruolo, tesserato.via,tesserato.provincia,tesserato.citta,tesserato.linkFoto as fotoProfilo,tesserato.daPagare,tesserato.pagato, categoria.nome as cat , visita.scadenza, visita.tipo as tipoVisita, visita.foto as fotoVisita 
                FROM (`tesserato`          
                INNER JOIN categoria 
                on idCategoria=categoria.id)
                LEFT JOIN visita ON visita.id=tesserato.idVisita
                WHERE tesserato.id='" . $id . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
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

        if (isset($row['tipoVisita']))
            $tipo = $row['tipoVisita'];

        if (!empty($row['scadenza']))
            $scadenza = $row['scadenza'];


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

        if (!empty($row['cat']))
            $categoria = $row['cat'];

        if (!empty($row['daPagare']))
            $daPagare = $row['daPagare'];

        if (!empty($row['pagato']))
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
?>
<style>
    .titoliBlu {
        color: rgb(0, 0, 0);
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-4 border-right">
            <h4 style="color:dark ">DATI ANAGRAFICI</h4>
            <div class="form-group mt-2" style="max-height:45%">
                <label class="titoliBlu">Foto</label><br>
                <?php
                if ($fotoProfilo != null)
                    echo "<img id='fotoProfilo' src='img/uploadsProfilo/$fotoProfilo' /> ";
                else
                    echo "<img id='fotoProfilo' src='img/avatar.svg' /> ";
                ?>
            </div>
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label class="titoliBlu">Nome</label>
                    <p><?php echo $nome ?></p>
                </div>
                <div class="col">
                    <label class="titoliBlu">Cognome</label>
                    <p><?php echo $cognome ?></p>
                </div>
            </div>
            <label class="titoliBlu">Codice Fiscale</label>
            <p><?php echo $cf ?></p>
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label class="titoliBlu">Data Nascita</label>
                    <p><?php echo $dataNascita ?></p>
                </div>
                <div class="col">
                    <label class="titoliBlu">Luogo di Nascita</label>
                    <p><?php echo $luogoNascita ?></p>
                </div>
            </div>
        </div>
        <div class="col-sm-4 border-right">
            <h4 style="color:dark">VISITA</h4>
            <label class="titoliBlu">Tipo</label>
            <p><?php 
            
            if ($tipo==0) echo "Normale";
                else if($tipo==1) echo "Agonistica";
                else echo "Nessuna Visita" ?></p>
            <label class="titoliBlu">Scadenza</label><br>
            <p><?php echo $scadenza ?></p>
            <?php
            if ($fotoVisita != null) {
                echo "<label class='titoliBlu'>Foto</label><br>";
                echo "<img id='fotoVisita' src='img/uploadsVisita/$fotoVisita' /> ";
            }
            ?>
            <h4 style="color:dark">CONTATTI</h4>
            <div class="container" style="margin-left:-2%">
                <div class="row">
                    <div class="col-sm-9">
                        <label class="titoliBlu">Telefono</label>
                    </div>
                    <div class="col-sm-3">
                        <label class="titoliBlu">Contatto</label>
                    </div>
                </div>
                <?php
                for ($i = 0; $i < count($telefoniCont); $i++) {
                    echo "  <div class='row telefoni'>
                                <div class='col-sm-9'>
                                    <p>" . $telefoniTel[$i] . "</p>
                                </div>
                                <div class='col-sm-3'>
                                    <p>" . $telefoniCont[$i] . "</p>
                                </div>
                            </div>";
                }
                ?>
            </div>
            <div class="container" style="margin-left:-2%; margin-top:2%">
                <div class="row">
                    <div class="col-sm-9">
                        <label class="titoliBlu">Mail</label>
                    </div>
                    <div class="col-sm-3">
                        <label class="titoliBlu">Contatto</label>
                    </div>
                </div>
                <?php
                for ($i = 0; $i < count($mailCont); $i++) {
                    echo "  <div class='row mail'>
                                <div class='col-sm-9'>
                                    <p>" . $mailMail[$i] . " </p>
                                </div>
                                <div class='col-sm-3'>
                                    <p>" . $mailCont[$i] . " </p>
                                </div>
                            </div>";
                }
                ?>
            </div>
        </div>
        <div class="col-sm-4">
            <h4 style="color:dark">RESIDENZA</h4>
            <label class="titoliBlu">Indirizzo</label>
            <p><?php echo $indirizzo ?></p>
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label class="titoliBlu">Citta </label>
                    <p><?php echo $citta ?></p>
                </div>
                <div class="col">
                    <label class="titoliBlu">Provincia </label>
                    <p><?php echo $provincia ?></p>
                </div>
            </div>
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label class="titoliBlu">Ruolo </label>
                    <p><?php echo $ruolo ?></p>
                </div>
                <div class="col">
                    <label class="titoliBlu">Categoria </label>
                    <p><?php echo $categoria ?></p>
                </div>
            </div>
            <h4 style="color:dark">CONTABILITA'</h4>
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label class="titoliBlu">Da Pagare </label>
                    <p><?php echo $daPagare . " " ?> €</p>
                </div>
                <div class="col">
                    <label class="titoliBlu">Pagato </label>
                    <p><?php echo $pagato . " " ?> €</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>