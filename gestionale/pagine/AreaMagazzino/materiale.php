<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
$_SESSION['ultimaPage'] = "materiale";
require_once '../../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body>
    <div class="page-header clearfix">
        <h1 class="display-5 font-weight-bold pl-5">Materiale Squadre</h1>
    </div>
    <div>
        <?php include 'modal.php'; ?>
    </div>
    <?php include 'tabellaMateriale.php'; ?>
    <script>
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.tabellaMateriale').DataTable({
                    paging: false,
                    searching: true,
                    ordering: true,
                    info: false
                });
            });
            var eliminaGenerico = document.getElementById('eliminaGenerico')
            eliminaGenerico.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("idEliminaGenerico").value = recipient;
            });
        });
    </script>
</body>

</html>