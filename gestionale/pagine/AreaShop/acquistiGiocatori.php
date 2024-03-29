<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
$_SESSION['ultimaPage'] = "acquistiGiocatori";
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
        <h1 class="display-5 font-weight-bold">Acquisti dei Giocatori</h1>
    </div>
    <div class="mb-5">
        <?php include 'tabelle/tabellaAcquistiGiocatori.php'; ?>
    </div>
    <div>
        <?php include 'modal/modal.php'; ?>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.tabellaAcquisti').DataTable({
                    paging: false,
                    searching: true,
                    ordering: true,
                    info: false
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