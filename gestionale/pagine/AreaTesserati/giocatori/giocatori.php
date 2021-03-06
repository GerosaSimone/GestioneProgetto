<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$_SESSION['ultimaPage'] = "giocatori";

//controllo se si devono eliminare telefoni o mail
$query = "DELETE FROM `telefono` WHERE telefono='';";
mysqli_query($link, $query);
$query = "DELETE FROM `mail` WHERE mail='';";
mysqli_query($link, $query);
?>

<body>
    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>
    <div class="page-header clearfix text-center">
        <strong>
            <h1 class="display-5 font-weight-bold ">Giocatori
                <button type='button' class='btn btn-outline-secondary pull-right mt-3' data-bs-toggle='modal' data-bs-target='#addGiocatore' style="margin-right:4%">
                    Add Giocatore
                </button>
            </h1>
        </strong>
    </div>
    <div>
        <?php include 'modal/modal.php'; ?>
    </div>
    <?php include '../tabelle/tabellaGiocatori.php'; ?>
    <script>
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.tabellaGiocatori').DataTable({
                    paging: false,
                    searching: true,
                    ordering: true,
                    info: false
                });
            });
            var visualizza = document.getElementById('visualizzaGiocatore')
            visualizza.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var id = button.getAttribute('data-bs-whatever')
                $.post("pagine/AreaTesserati/giocatori/modal/visualizza.php?idTesserato=" + id, true, function(data, status) {
                    $("#modalVisualizza").html(data);
                });
            });
            var modifica = document.getElementById('modifica')
            modifica.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var id = button.getAttribute('data-bs-whatever')
                $.post("pagine/AreaTesserati/giocatori/modal/modifica.php?idTesserato=" + id, true, function(data, status) {
                    $("#modalModifica").html(data);
                });
            });
            var addGiocatore = document.getElementById('addGiocatore')
            addGiocatore.addEventListener('show.bs.modal', function(event) {
                $.post("pagine/AreaTesserati/giocatori/modal/aggiungi.php", true, function(data, status) {
                    $("#modalAggiungi").html(data);
                });
            });
            var acquistaProdotto = document.getElementById('acquistaProdotto')
            acquistaProdotto.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var id = button.getAttribute('data-bs-whatever')
                $.post("pagine/AreaTesserati/giocatori/modal/acquista.php?idTesserato=" + id, true, function(data, status) {
                    $("#modalAcquista").html(data);
                });
            });
            var elimina = document.getElementById('elimina')
            elimina.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("idElimina").value = recipient;
            });

        });
    </script>
</body>

</html>