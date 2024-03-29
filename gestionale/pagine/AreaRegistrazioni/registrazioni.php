<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
$_SESSION['ultimaPage'] = "registrazioni";
?>

<body>
    <header class="text-center mb-2">
        <h1 class="display-5 font-weight-bold">Gestione Registrazioni</h1>
        <p class="text-center">
            <button type='button' class='btn btn-outline-primary btn-lg' data-bs-toggle='modal' data-bs-target='#add'>
                Aggiungi Utente
            </button>
        </p>
    </header>
    <div class="mb-5"><?php include "modal/tabellaRegistrazioni.php" ?></div>
    <div><?php include "modal/modal.php" ?></div>

    <script>
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.tabellaGiocatori').DataTable({
                    paging: true,
                    searching: false,
                    ordering: true,
                    info: false,
                    lengthChange: false,
                    pageLength: 13
                });
            });
            var elimina = document.getElementById('elimina')
            elimina.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("idElimina").value = recipient;
            });
            var add = document.getElementById('add')
            add.addEventListener('show.bs.modal', function(event) {
                $.post("pagine/AreaRegistrazioni/modal/aggiungi.php", true, function(data, status) {
                    $("#modalAggiungi").html(data);
                });
            });
        });
    </script>
</body>