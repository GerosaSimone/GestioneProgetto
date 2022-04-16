<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body style="background-color: rgba(250, 250, 250, 255)">
    <div class="page-header clearfix">
        <strong>
            <h2 class="pull-left pl-5"> Mister </h2>
            <button type='button' class='btn btn-outline-secondary pull-right mr-3' data-bs-toggle='modal' data-bs-target='#addMister'>
                Add Mister
            </button>
        </strong>
    </div>
    <div>
        <?php include 'modal.php'; ?>
    </div>
    <?php include 'tabellaDirigenza.php'; ?>
    <script>
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.tabellaDirigenza').DataTable({
                    paging: false,
                    searching: true,
                    ordering: true,
                    info: false
                });
            });
            var visualizza = document.getElementById('visualizza')
            visualizza.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("tempVisualizza").value = recipient;
            });
            var modificaMister = document.getElementById('editMister')
            modificaMister.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("textEditMister").value = recipient;
            });
            var elimina = document.getElementById('elimina')
            elimina.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("tempElimina").value = recipient;
            });
        });
    </script>
</body>

</html>