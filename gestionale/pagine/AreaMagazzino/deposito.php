<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
$_SESSION['ultimaPage'] = "deposito";
require_once '../../config.php';
?>

<body>
    <header class="text-center mb-2">
        <h1 class="display-5 font-weight-bold">Magazzino</h1>
        <p class="text-center">
            <button type='button' class='btn btn-outline-primary btn-lg mr-3' data-bs-toggle='modal' data-bs-target='#addProdotto'>
                Aggiungi Prodotto
            </button>

            <button type='button' class='btn btn-outline-primary btn-lg ml-3' data-bs-toggle='modal' data-bs-target='#addGenerico'>
                Aggiungi Generico
            </button>
        </p>
    </header>
    <div class="container" style="margin-left:0 !important; margin-right:0 !important; width:100%">
        <div class="ml-3 row ">
            <div class="col-6 ">
                <?php
                include "tabellaMagazzino.php"
                ?>
            </div>
            <div class="col-6">
                <?php
                include "tabellaGenerico.php"
                ?>
            </div>
        </div>
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
        var eliminaGenerico = document.getElementById('eliminaGenerico')
        eliminaGenerico.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')
            document.getElementById("idEliminaGenerico").value = recipient;
        });
        var addProdotto = document.getElementById('addProdotto')
        addProdotto.addEventListener('show.bs.modal', function(event) {
            $.post("pagine/AreaShop/aggiungi.php", true, function(data, status) {
                $("#modalAggiungi").html(data);
            });
        });
        var addGenerico = document.getElementById('addGenerico')
        addGenerico.addEventListener('show.bs.modal', function(event) {
            $.post("pagine/AreaMagazzino/aggiungiGenerico.php", true, function(data, status) {
                $("#modalGenerico").html(data);
            });
        });
        var buyDeposito = document.getElementById('buyDeposito')
        buyDeposito.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')
            $.post("pagine/AreaMagazzino/acquista.php?idProdotto=" + recipient, true, function(data, status) {
                $("#modalAcquista").html(data);
            });
        });

        function apriModal(div) {
            $('#visualizzaDeposito').modal('show');
            var recipient = div.getAttribute('data-bs-whatever');
            $.post("pagine/AreaMagazzino/visualizza.php", {
                id: recipient
            }, function(data, status) {
                $("#modalVisualizzaDeposito").html(data);
            });
        }

        function apriModalGenerico(div) {
            $('#visualizzaGenerico').modal('show');
            var recipient = div.getAttribute('data-bs-whatever');
            $.post("pagine/AreaMagazzino/visualizzaGenerico.php", {
                id: recipient
            }, function(data, status) {
                $("#modalVisualizzaGenerico").html(data);
            });
        }
    </script>
</body>