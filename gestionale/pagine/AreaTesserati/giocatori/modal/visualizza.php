<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../../config.php';
try {
    $fotoProfilo;
    $nome = "nessun simone";
    $cognome = "nessun cognome";
    $cf = "nessun codicefFiscale";
    $matricola = "nessuna matricola";
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
    $daPagare = "0";
    $pagato = "0";
    $id = $_GET['idTesserato'];
    //select e set dei valori
    $sql = "    SELECT tesserato.nome, tesserato.matricola,tesserato.cognome, tesserato.cf, tesserato.dataNascita, tesserato.luogoNascita, tesserato.tipo, tesserato.ruolo, tesserato.via,tesserato.provincia,tesserato.citta,tesserato.linkFoto as fotoProfilo,tesserato.daPagare,tesserato.pagato, categoria.nome as cat , visita.scadenza, visita.tipo as tipoVisita, visita.foto as fotoVisita 
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
            if (!empty($row['matricola']))
                $matricola = $row['matricola'];
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
    $sql = "SELECT telefono.nome,telefono.telefono FROM telefono WHERE idTesserato='" . $id . "'";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                array_push($telefoniCont, $row['nome']);
                array_push($telefoniTel, $row['telefono']);
            }
        }
    }
    //select mail  
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
<div>
    <div class="row">
        <div class="col-sm-4 border-right destra" >
            <h4 class="text-dark font-weight-bold">DATI ANAGRAFICI</h4>
            <div class="form-group mt-2" style="max-height:45%">
                <label class="text-dark font-weight-bold">Foto</label><br>
                <?php
                if ($fotoProfilo != null)
                    echo "<img id='fotoProfilo' src='img/uploadsProfilo/$fotoProfilo' /> ";
                else
                    echo "<img id='fotoProfilo' src='img/avatar.svg' /> ";
                ?>
            </div>
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label class="text-dark font-weight-bold">Nome</label>
                    <p><?php echo $nome ?></p>
                </div>
                <div class="col">
                    <label class="text-dark font-weight-bold">Cognome</label>
                    <p><?php echo $cognome ?></p>
                </div>
            </div>
            <label class="text-dark font-weight-bold">Codice Fiscale</label>
            <p><?php echo $cf ?></p>
            <label class="text-dark font-weight-bold">Matricola</label>
            <p><?php echo $matricola ?></p>
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label class="text-dark font-weight-bold">Data Nascita</label>
                    <p><?php $date = str_replace('-', '/', $dataNascita);
                        $newDate = date("d/m/Y", strtotime($date));
                        echo "$newDate"; ?></p>
                </div>
                <div class="col">
                    <label class="text-dark font-weight-bold">Luogo di Nascita</label>
                    <p><?php echo $luogoNascita ?></p>
                </div>
            </div>
        </div>
        <div class="col-sm-4 border-right destra">
            <h4 class="text-dark font-weight-bold">VISITA</h4>
            <p><?php
                $visita = true;
                if ($tipo == 0) echo " <label class='text-dark font-weight-bold'>Tipo</label><br>Certificato Medico<br>";
                else if ($tipo == 1) echo " <label class='text-dark font-weight-bold'>Tipo</label><br>Visita Agonistica<br>";
                else  $visita = false;
                if (!$visita)
                    echo "Nessuna visita!";
                else {
                    echo "
                    <label class='text-dark font-weight-bold mt-1'>Scadenza</label>
                    <br>";
                    if ($scadenza != 'nessuna data di scadenza') {
                        $date = str_replace("-", "/", $scadenza);
                        $newDate = date('d/m/Y', strtotime($date));
                        echo $newDate;
                    }
                    echo "<br>";
                    if ($fotoVisita != null) {
                        echo "<label class='text-dark font-weight-bold'>Foto</label><br>";
                        echo "<img id='fotoVisita' src='img/uploadsVisita/$fotoVisita' />";
                    }
                }
                ?>
            <h4 class="text-dark font-weight-bold">CONTATTI</h4>
            <?php
            if (count($telefoniCont)) {
                echo '  <div class="row" style="margin-left:-2%">
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
                    ';
                for ($i = 0; $i < count($telefoniCont); $i++) {
                    echo "  <div class='row telefoni' style='margin-left:-2%'>
                                <div class='col-7'>
                                    <p>" . $telefoniTel[$i] . "</p>
                                </div>
                                <div class='col-4'>
                                    <p>" . $telefoniCont[$i] . "</p>
                                </div>
                            </div>";
                }
            } else
                echo '<div><p>Nessun telefono presente</p></div>';

            if (count($mailCont) > 0) {
                echo '  <div class="row" style="margin-left:-2%; margin-top:2%">
                            <div class="col-7">
                                <label class="text-dark font-weight-bold">Mail</label>
                            </div>
                            <div class="col-4">
                                <label class="text-dark font-weight-bold">Contatto</label>
                            </div>
                            <div class="col-1">
                                <input type="text" id="numMail" name="numMail" hidden="true" value="1" class="form-control form-control-sm mb-2">
                            </div>
                        </div>';
                for ($i = 0; $i < count($mailCont); $i++) {
                    echo "  <div class='row mail' style='margin-left:-2%'>
                                    <div class='col-7'>
                                        <p>" . $mailMail[$i] . " </p>
                                    </div>
                                    <div class='col-4'>
                                        <p>" . $mailCont[$i] . " </p>
                                    </div>
                                </div>";
                }
                echo "</div>";
            } else
                echo '<div><p>Nessuna mail presente</p></div>';
            ?>
        </div>
        <div class="col-sm-4">
            <h4 class="text-dark font-weight-bold">RESIDENZA</h4>
            <label class="text-dark font-weight-bold">Indirizzo</label>
            <p><?php echo $indirizzo ?></p>
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label class="text-dark font-weight-bold">Citta </label>
                    <p><?php echo $citta ?></p>
                </div>
                <div class="col">
                    <label class="text-dark font-weight-bold">Provincia </label>
                    <p><?php echo $provincia ?></p>
                </div>
            </div>
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label class="text-dark font-weight-bold">Ruolo </label>
                    <p><?php echo $ruolo ?></p>
                </div>
                <div class="col">
                    <label class="text-dark font-weight-bold">Categoria </label>
                    <p><?php echo $categoria ?></p>
                </div>
            </div>
            <h4 class="text-dark font-weight-bold">CONTABILITA'</h4>
            <div class="row" style="margin-left: -2%">
                <div class="col">
                    <label class="text-dark font-weight-bold">Da Pagare </label>
                    <p><?php echo $daPagare . " " ?> €</p>
                </div>
                <div class="col">
                    <label class="text-dark font-weight-bold">Pagato </label>
                    <p><?php echo $pagato . " " ?> €</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    if ($(window).width() < 501) {
        $(".destra").removeClass("border-right");
    } else {
        $(".destra").addClass("border-right");
    }
</script>