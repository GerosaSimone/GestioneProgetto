<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$squadra = "";
if ($_GET['squadra'] == "PrimaSquadra")
    $squadra = "Prima Squadra";
else if ($_GET['squadra'] == "PiccoliAmici")
    $squadra = "Piccoli Amici";
else {
    $squadra = $_GET['squadra'];
}
$_SESSION['ultimaPage'] = $_GET['squadra'];
//controllo se si devono eliminare telefoni o mail
try {
    $query = "DELETE FROM `telefono` WHERE telefono='';";
    mysqli_query($link, $query);
    $query = "DELETE FROM `mail` WHERE mail='';";
    mysqli_query($link, $query);
} catch (Exception $e) {
}
?>
<html>
<div class="page-header clearfix mt-5">
    <div class="page-header clearfix">
        <strong>
            <h1 class="display-5 font-weight-bold pl-5 ml-2"><?php echo $squadra ?> </h1>
        </strong>
    </div>
</div>

<body>
    <div class="contenitore">
        <div class="row">
            <div class="col-sm-9 border-right" style="min-width:875px">
                <?php include '../tabelle/tabellaDirigenzaSquadre.php'; ?>
                <?php include '../tabelle/tabellaGiocatoriSquadre.php'; ?>
            </div>
            <div class="col-sm-3">
                <?php include 'extra.php' ?>
            </div>
        </div>
    </div>
    <div>
        <?php include 'modal/modal.php'; ?>
    </div>

    <script>
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.tabella').DataTable({
                    paging: false,
                    searching: false,
                    ordering: true,
                    info: false
                });
            });
            //AGGIUNGI
            var addDirigente = document.getElementById('addDirigente')
            addDirigente.addEventListener('show.bs.modal', function(event) {
                $.post("pagine/AreaTesserati/squadre/modal/aggiungiDirigente.php?squadra=<?php echo $_GET['squadra']; ?>", true, function(data, status) {
                    $("#modalAggiungiDirigente").html(data);
                });
            });
            var addGiocatore = document.getElementById('addGiocatore')
            addGiocatore.addEventListener('show.bs.modal', function(event) {
                $.post("pagine/AreaTesserati/squadre/modal/aggiungi.php?squadra=<?php echo $_GET['squadra']; ?>", true, function(data, status) {
                    $("#modalAggiungi").html(data);
                });
            });
            //ELIMINA
            var eliminaDirigente = document.getElementById('eliminaDirigente')
            eliminaDirigente.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("idEliminaDirigente").value = recipient;
            });
            var elimina = document.getElementById('elimina')
            elimina.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("idElimina").value = recipient;
            });
            //VISUALIZZA
            var visualizzaDirigente = document.getElementById('visualizzaDirigente')
            visualizzaDirigente.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var id = button.getAttribute('data-bs-whatever')
                $.post("pagine/AreaTesserati/squadre/modal/visualizzaDirigente.php?idTesserato=" + id, true, function(data, status) {
                    $("#modalVisualizzaDirigente").html(data);
                });
            });
            var visualizza = document.getElementById('visualizzaGiocatore')
            visualizza.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var id = button.getAttribute('data-bs-whatever')
                $.post("pagine/AreaTesserati/squadre/modal/visualizza.php?idTesserato=" + id, true, function(data, status) {
                    $("#modalVisualizza").html(data);
                });
            });
            //MODIFICA
            var modificaDirigente = document.getElementById('modificaDirigente')
            modificaDirigente.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var id = button.getAttribute('data-bs-whatever')
                $.post("pagine/AreaTesserati/squadre/modal/modificaDirigente.php?idTesserato=" + id + "&squadra=<?php echo $_GET['squadra']; ?>", true, function(data, status) {
                    $("#modalModificaDirigente").html(data);
                });
            });
            var modifica = document.getElementById('modifica')
            modifica.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var id = button.getAttribute('data-bs-whatever')
                $.post("pagine/AreaTesserati/squadre/modal/modifica.php?idTesserato=" + id + "&squadra=<?php echo $_GET['squadra']; ?>", true, function(data, status) {
                    $("#modalModifica").html(data);
                });
            });
            //ACQUISTA
            var acquistaProdotto = document.getElementById('acquistaProdotto')
            acquistaProdotto.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var id = button.getAttribute('data-bs-whatever')
                $.post("pagine/AreaTesserati/giocatori/modal/acquista.php?idTesserato=" + id, true, function(data, status) {
                    $("#modalAcquista").html(data);
                });
            });
        });
    </script>
</body>

</html>