<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$_SESSION['ultimaPage'] = "dirigenza";

?>

<body style="background-color: rgba(250, 250, 250, 255)">
    <div class="page-header clearfix text-center">
        <strong>
            <h1 class="display-5 font-weight-bold pl-5">Dirigenza
                <button type='button' class='btn btn-outline-secondary pull-right mt-3' data-bs-toggle='modal' data-bs-target='#addDirigente' style="margin-right:3%">
                    Add Mister/Dirigente
                </button>
            </h1>
        </strong>
    </div>
    <div>
        <?php include 'modal.php'; ?>
    </div>
    <?php include 'tabellaDirigenza.php'; ?>
    <script>
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.tabellaDirigenza').DataTable({
                    paging: false,
                    searching: true,
                    ordering: true,
                    info: false
                });
            });
            var visualizza = document.getElementById('visualizza')
            visualizza.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var id = button.getAttribute('data-bs-whatever')
                $.post("pagine/AreaTesserati/dirigenza/visualizza.php?idTesserato=" + id, true, function(data, status) {
                    $("#modalVisualizza").html(data);
                });
            });
            var modifica = document.getElementById('modifica')
            modifica.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var id = button.getAttribute('data-bs-whatever')
                $.post("pagine/AreaTesserati/dirigenza/modifica.php?idTesserato=" + id, true, function(data, status) {
                    $("#modalModifica").html(data);
                });
            });
            var addDirigente = document.getElementById('addDirigente')
            addDirigente.addEventListener('show.bs.modal', function(event) {
                $.post("pagine/AreaTesserati/dirigenza/aggiungi.php", true, function(data, status) {
                    $("#modalAggiungi").html(data);
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