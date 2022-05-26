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
                include "tabelle/tabellaMagazzino.php"
                ?>
            </div>
            <div class="col-6">
                <?php
                include "tabelle/tabellaGenerico.php"
                ?>
            </div>
        </div>
    </div>

    <div>
        <?php include "modal/modal.php"; ?>
    </div>

    <script>
        //VISUALIZZA
        function apriModal(div) {
            $('#visualizzaDeposito').modal('show');
            var recipient = div.getAttribute('data-bs-whatever');
            $.post("pagine/AreaMagazzino/modal/visualizza.php", {
                id: recipient
            }, function(data, status) {
                $("#modalVisualizzaDeposito").html(data);
            });
        }

        function apriModalGenerico(div) {
            $('#visualizzaGenerico').modal('show');
            var recipient = div.getAttribute('data-bs-whatever');
            $.post("pagine/AreaMagazzino/modal/visualizzaGenerico.php", {
                id: recipient
            }, function(data, status) {
                $("#modalVisualizzaGenerico").html(data);
            });
        }
        //AGGIUNGI
        var addProdotto = document.getElementById('addProdotto')
        addProdotto.addEventListener('show.bs.modal', function(event) {
            $.post("pagine/AreaShop/modal/aggiungi.php", true, function(data, status) {
                $("#modalAggiungi").html(data);
            });
        });
        var addGenerico = document.getElementById('addGenerico')
        addGenerico.addEventListener('show.bs.modal', function(event) {
            $.post("pagine/AreaMagazzino/modal/aggiungiGenerico.php", true, function(data, status) {
                $("#modalGenerico").html(data);
            });
        });
        //ELIMINA
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
        //ACQUISTA
        var buyDeposito = document.getElementById('buyDeposito')
        buyDeposito.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')
            $.post("pagine/AreaMagazzino/modal/acquista.php?idProdotto=" + recipient, true, function(data, status) {
                $("#modalAcquista").html(data);
            });
        });
        //MODIFICA
        var modificaProdotto = document.getElementById('modificaProdotto')
        modificaProdotto.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-whatever')
            $.post("pagine/AreaShop/modifica.php?idProdotto=" + id, true, function(data, status) {
                $("#modalModifica").html(data);
            });
        });
    </script>
</body>