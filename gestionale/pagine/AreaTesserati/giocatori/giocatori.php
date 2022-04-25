<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body style="background-color: rgba(250, 250, 250, 255)">
    <div class="page-header clearfix">
        <strong>
            <h2 class="pull-left pl-5"> Giocatori </h2>
            <button type='button' class='btn btn-outline-secondary pull-right' data-bs-toggle='modal' data-bs-target='#addGiocatore' style="margin-right:3%">
                Add Giocatore
            </button>
        </strong>
    </div>
    <div>
        <?php include 'modal.php'; ?>
    </div>
    <?php include 'tabellaGiocatori.php'; ?>
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
            var visualizza = document.getElementById('visualizza')
            visualizza.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var id = button.getAttribute('data-bs-whatever')
                loadVisualizza(id)
            });
            var modifica = document.getElementById('modifica')
            modifica.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("tempModifica").value = recipient;
            });
            var elimina = document.getElementById('elimina')
            elimina.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("idElimina").value = recipient;
            });

        });

        function loadModifica() {

        }

        function loadVisualizza(id) {
            $("#nomeVisualizza").val(nome);
            $("#cognomeVisualizza").val(cognome);
            $("#cfVisualizza").val(cf);
            $("#dataNascitaVisualizza").val(dataNascita);
            $("#luogoNascitaVisualizza").val(luogoNascita);
        }
    </script>
</body>

</html>