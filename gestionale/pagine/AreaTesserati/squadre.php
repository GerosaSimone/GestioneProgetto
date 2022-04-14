<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
?>

<html>
<div class="page-header clearfix">
    <strong>
        <h2 class="pull-left" style="margin-left:2%"> <?php echo "   Giocatori "  . $_GET['squadra'] ?> </h2>
    </strong>
</div>

<body style="background-color: rgba(250, 250, 250, 255)">
    <div class="contenitore">
        <div class="row">
            <div class="col-sm-9 border-right">
                <?php include 'tabellaMister.php'; ?>
                <?php include 'tabellaGiocatori.php'; ?>
            </div>
            
            <div class="col-sm-3">
                <div class="alert alert-secondary ml-3" role="alert">
                    <h4 class="alert-heading">Info materiale:</h4>
                    <hr>
                    <p>Num Pettorine: 20</p>
                    <!--Query!-->
                    <p class="mb-0">Num Palloni: 10</p>
                    <!--Query!-->
                </div>
                <div class="alert alert-secondary ml-3" role="alert">
                    <h4 class="alert-heading">Orari Allenamenti:</h4>
                    <hr>
                    <!--Query!-->
                    <p>Lunedi: 20.30/22.00</p>
                    <p>Mercoledi: 10.30/12.00</p>
                    <p>Venerdi: 20.30/22.00</p>

                </div>
                <div class="alert alert-secondary ml-3" role="alert">
                    <h4 class="alert-heading">Divise:</h4>
                    <hr>
                    <img src="img/divisa.webp" class="rounded float-left mr-2" alt="..." width="100px" height="100px">
                    <img src="img/divisa.webp" class="rounded float-left  mr-2" alt="..." width="100px" height="100px">
                    <button type='button' class='btn btn-outline-secondary p-4 mb-3' data-bs-toggle='modal' data-bs-target='#divise'> Show <br>More...</button>


                </div>

            </div>
        </div>
    </div>

    <div id="includiModal">
    </div>

    <script>
        jQuery(document).ready(function($) {
            $("#includiModal").load("pagine/AreaTesserati/modal.html");
            $(document).ready(function() {
                $('.tabella').DataTable({
                    paging: false,
                    searching: false,
                    ordering: true,
                    info: false
                });
            });
            var elimina = document.getElementById('elimina')
            elimina.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("tempElimina").value = recipient;
            });
            var modifica = document.getElementById('modifica')
            modifica.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("tempModifica").value = recipient;
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
            var divise = document.getElementById('divise')
            divise.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("textDivise").value = recipient;
            });
        });
    </script>

</html>