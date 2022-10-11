<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
$_SESSION['ultimaPage'] = "acquistiSocieta";
require_once '../../config.php';
?>

<body>
    <header class="text-center mb-2">
        <h1 class="display-5 font-weight-bold">Acquisti Societa</h1>

    </header>
    <div class="container mb-5">
        <div class="row">
            <div class="col-6" style="padding-left:0.5% !important; padding-right:0.5% !important;" id="primaColonna">
                <?php include 'tabelle/tabellaAcquisti.php'; ?>
            </div>
            <div class="col-6" style="padding-left:0.5% !important; padding-right:0.5% !important;" id="secondaColonna">
                <?php include 'tabelle/tabellaMateriale.php'; ?>
            </div>
        </div>
    </div>
    <div>
        <?php include 'modal/modal.php'; ?>
    </div>

    <script>
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.tabellaAcquisti').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: false,
                    lengthChange: false,
                    pageLength: 12
                });
            });
            $(document).ready(function() {
                $('.tabellaMateriale').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: false,
                    lengthChange: false,
                    pageLength: 12
                });
            });
            var elimina = document.getElementById('eliminaAcquisto')
            elimina.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("idEliminaAcquisto").value = recipient;
            });
            var eliminaGenerico = document.getElementById('eliminaGenerico')
            eliminaGenerico.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("idEliminaGenerico").value = recipient;
            });

            var visualizzaGenerico = document.getElementById('visualizzaGenerico')
            visualizzaGenerico.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var id = button.getAttribute('data-bs-whatever')
                $.post("pagine/AreaMagazzino/modal/visualizzaGenerico.php?id=" + id, true, function(data, status) {
                    $("#modalVisualizzaGenerico").html(data);
                });
            });
            if ($(window).width() < 501) {
                $("#primaColonna").removeClass("col-6");
                $("#primaColonna").addClass("col-12");
                $("#primaColonna").addClass("mb-5");
                $("#secondaColonna").removeClass("col-6");
                $("#secondaColonna").addClass("col-12");
                $(".container").css("padding-left", "0");
                $(".container").css("padding-right", "0");

            } else {
                $("#primaColonna").removeClass("col-12");
                $("#primaColonna").addClass("col-6");
                $("#secondaColonna").removeClass("mb-5");
                $("#secondaColonna").removeClass("col-12");
                $("#secondaColonna").addClass("col-6");
                $(".container").css("padding-left", "15px");
                $(".container").css("padding-right", "15px");
            }
        });
    </script>
</body>

</html>