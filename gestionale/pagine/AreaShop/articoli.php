<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
$_SESSION['ultimaPage'] = "shop";
require_once '../../config.php';
?>

<body>
    <header class="text-center mb-2">
        <h1 class="display-5 font-weight-bold">Negozio</h1>
        <p class="text-center">
            <button type='button' class='btn btn-outline-primary btn-lg' data-bs-toggle='modal' data-bs-target='#addProdotto'>
                Aggiungi Prodotto
            </button>
        </p>
    </header>

    <div class="row pb-5 mb-4 ml-3 mr-3 align-items-center">
        <?php include "tabellaArticoli.php"; ?>
    </div>
    <div>
        <?php include "modal.php"; ?>
    </div>

    <script>
        var modificaProdotto = document.getElementById('modificaProdotto')
        modificaProdotto.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-whatever')
            $.post("pagine/AreaShop/modifica.php?idProdotto=" + id, true, function(data, status) {
                $("#modalModifica").html(data);
            });
        });
        var eliminaProdotto = document.getElementById('eliminaProdotto')
        eliminaProdotto.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')
            document.getElementById("idElimina").value = recipient;
        });
        var addGiocatore = document.getElementById('addProdotto')
        addGiocatore.addEventListener('show.bs.modal', function(event) {
            $.post("pagine/AreaShop/aggiungi.php", true, function(data, status) {
                $("#modalAggiungi").html(data);
            });
        });
        var acquistaProdotto = document.getElementById('acquistaProdotto')
        acquistaProdotto.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')
            $.post("pagine/AreaShop/acquista.php?idProdotto=" + recipient, true, function(data, status) {
                $("#modalAcquista").html(data);
            });
        });

        function apriModal(div) {
            $('#visualizzaArticoli').modal('show');
            var recipient = div.getAttribute('data-bs-whatever');
            $.post("pagine/AreaShop/visualizza.php", {
                id: recipient
            }, function(data, status) {
                $("#modalVisualizzaArticoli").html(data);
            });
        }
    </script>
</body>