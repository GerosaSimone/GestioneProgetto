<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$_SESSION['ultimaPage'] = "categorie";
?>

<body>
    <header class="text-center mb-2">
        <h1 class="display-5 font-weight-bold">Gestione Categorie</h1>
        <p class="text-center">
            <button type='button' class='btn btn-outline-primary btn-lg' data-bs-toggle='modal' data-bs-target='#add'>
                Aggiungi Categoria
            </button>
        </p>
    </header>
    <div><?php include "tabellaCategorie.php" ?></div>
    <div><?php include "modal.php" ?></div>

    <script>
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.tabellaCategorie').DataTable({
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
            var modificaProdotto = document.getElementById('modificaProdotto')
            modificaProdotto.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var id = button.getAttribute('data-bs-whatever')
                $.post("pagine/AreaTesserati/categorie/modifica.php?idProdotto=" + id, true, function(data, status) {
                    $("#modalModifica").html(data);
                });
            });
            var elimina = document.getElementById('edit')
            elimina.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("idModifica").value = recipient;
            });
        });
    </script>
</body>