<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
$_SESSION['ultimaPage'] = "acquistiSocieta";
require_once '../../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body>
    <div class="page-header clearfix text-center">
        <h1 class="display-5 font-weight-bold pl-5">Acquisti Societa</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-6" style="padding-left:0.5% !important; padding-right:0.5% !important;">
                <?php include 'tabellaAcquisti.php'; ?>
            </div>
            <div class="col-6" style="padding-left:0.5% !important; padding-right:0.5% !important;">
                <?php include 'tabellaMateriale.php'; ?>
            </div>
        </div>
    </div>
    <div>
        <?php include 'modal.php'; ?>
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
        });
    </script>
</body>

</html>