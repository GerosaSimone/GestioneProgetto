<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
$_SESSION['ultimaPage'] = $_GET['squadra'];
require_once '../../../../config.php';
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="text-center">
                    <label class="text-dark font-weight-bold ">Casa</label>
                </div>
                <input type="text" name="casa" class="form-control form-control-sm mb-2" required>
            </div>
            <div class="col-2">
                <div class="text-center">
                    <label class="text-dark font-weight-bold">VS</label>
                </div>
            </div>
            <div class="col-5">
                <div class="text-center">
                    <label class="text-dark font-weight-bold">Ospite</label>
                </div>
                <input type="text" name="ospite" class="form-control form-control-sm mb-2" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label class="text-dark font-weight-bold">Data</label>
                <input type="date" data-date-format="yyyy-mm-dd" style="width:100%" class="form-control form-control-sm mb-2" name="data" required>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-2">
                <label class="text-dark font-weight-bold">Ora</label>
            </div>
            <div class="col-8">
                <label class="text-dark font-weight-bold">Luogo</label>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label class="text-dark font-weight-bold">Ritrovo</label>
            </div>
            <div class="col-2">
                <input type="text" name="oraRitrovo" class="form-control form-control-sm mb-2" required>
            </div>
            <div class="col-8">
                <input type="text" name="luogoRitrovo" class="form-control form-control-sm mb-2" required>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label class="text-dark font-weight-bold">Partita</label>
            </div>
            <div class="col-2">
                <input type="text" name="oraPartita" class="form-control form-control-sm mb-2" required>
            </div>
            <div class="col-8">
                <input type="text" name="luogoPartita" class="form-control form-control-sm mb-2" required>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <label class="text-dark font-weight-bold">Giocatore</label>
            </div>
            <div class="col-3">
                <label class="text-dark font-weight-bold">DataNascita</label>
            </div>
            <div class="col-3">
                <div class="text-center">
                    <label class="text-dark font-weight-bold">Convocato</label>
                </div>
            </div>
        </div>
        <?php
        $sql = "SELECT tesserato.id, tesserato.nome, tesserato.cognome, tesserato.dataNascita
                FROM `tesserato`          
                INNER JOIN categoria 
                on idCategoria=categoria.id
                WHERE categoria.nome='" . $_GET["squadra"] . "' and tesserato.nascosto='0' and tesserato.tipo='0'   
                ORDER BY tesserato.nome, tesserato.cognome";
        //inter-milan,data,ora partita,via partita,ora ritrovo,luogo ritrovo, giocatori, 
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $date1 = $row['dataNascita'];
                    $dataOggi = date("Y/m/d");
                    $differenza = floor((strtotime($date1) - strtotime($dataOggi)) / 86400);
                    $date = str_replace('-', '/', $row['dataNascita']);
                    $newDate = date("d/m/Y", strtotime($date));
                    echo '<div class="row">
                    <div class="col-6">
                        <label>' . $row['nome'] . ' ' . $row['cognome'] . '</label>
                    </div>
                    <div class="col-3">
                        <label>' .$newDate. '</label>
                    </div>
                    <div class="col-3">
                        <div class="text-center">
                            <input type="checkbox" class="form-check-input " id="g' . $row['id'] . '" style="margin-left:-2.5%" checked>
                        </div>
                    </div>
                </div>';
                }
            }
        }
        ?>


    </div>
</body>
<script>

</script>