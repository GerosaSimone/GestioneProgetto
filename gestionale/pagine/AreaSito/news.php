<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
$_SESSION['ultimaPage'] = "news";
require_once '../../config.php';
?>

<body>
    <header class="text-center mb-2">
        <h1 class="display-5 font-weight-bold">News</h1>
        <p class="text-center">
            <button type='button' class='btn btn-outline-primary btn-lg' data-bs-toggle='modal' data-bs-target='#addNews'>
                Aggiungi News
            </button>
        </p>
    </header>
    <div>
        <?php include "tabelle/tabellaNews.php"; ?>
    </div>
    <div>
        <?php include "modal/modal.php"; ?>
    </div>

    <script>
        function apriModal(div) {
            $('#visualizzaNews').modal('show');
            var recipient = div.getAttribute('data-bs-whatever');
            $.post("pagine/AreaSito/modal/visualizza.php", {
                id: recipient
            }, function(data, status) {
                $("#modalVisualizzaNews").html(data);
            });
        }
        var eliminaNews = document.getElementById('eliminaNews')
        eliminaNews.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')
            document.getElementById("idEliminaNews").value = recipient;
        });
        var addNews = document.getElementById('addNews')
        addNews.addEventListener('show.bs.modal', function(event) {
            $.post("pagine/AreaSito/modal/aggiungi.php", true, function(data, status) {
                $("#modalAggiungiNews").html(data);
            });
        });
    </script>
</body>