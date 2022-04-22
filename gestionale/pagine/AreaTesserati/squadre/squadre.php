<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../config.php';
$squadra = "";
if ($_GET['squadra'] == "PrimaSquadra")
    $squadra = "Prima Squadra";
else if ($_GET['squadra'] == "PiccoliAmici")
    $squadra = "Piccoli Amici";
else {
    $squadra = $_GET['squadra'];
}
$numPettorine = "";
$numPalloni = "";
$sql = "SELECT * FROM categoria WHERE categoria.nome='" . $_GET['squadra'] . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $numPettorine = $row['pettorine'];
        $numPalloni = $row['palloni'];
    }
}
$giorni;
$ore;
$sql = "SELECT * FROM categoria WHERE categoria.nome='" . $_GET['squadra'] . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $numPettorine = $row['pettorine'];
        $numPalloni = $row['palloni'];
    }
}
?>
<html>
<div class="page-header clearfix">
    <strong>
        <h2 class="pull-left" style="margin-left:3.5%"> <?php echo $squadra ?> </h2>
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
                    <h4 class="alert-heading">Info materiale:
                        <button type='button' class='btn btn-outline-secondary pull-right' data-bs-toggle='modal' data-bs-target='#oggetti'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
                            </svg>
                        </button>
                    </h4>
                    <hr>
                    <p>Num Pettorine: <?php echo $numPettorine ?></p>
                    <!--Query!-->
                    <p class=" mb-0">Num Palloni: <?php echo $numPalloni ?></p>
                    <!--Query!-->
                </div>
                <div class="alert alert-secondary ml-3" role="alert">
                    <h4 class="alert-heading">Orari Allenamenti:
                        <button type='button' class='btn btn-outline-secondary pull-right' data-bs-toggle='modal' data-bs-target='#orari'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16px' height='16px' fill='currentColor' class='bi bi-pencil'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
                            </svg>
                        </button>
                    </h4>
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
                    <button type='button' class='btn btn-outline-secondary mb-3' style="padding:6.5%" data-bs-toggle='modal' data-bs-target='#divise'> Show <br>More...</button>


                </div>

            </div>
        </div>
    </div>

    <div>
        <?php include 'modal.php'; ?>
    </div>

    <script>
        jQuery(document).ready(function($) {
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
            var addMister = document.getElementById('addMister')
            addMister.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("textAddMister").value = recipient;
            });
        });
    </script>
</body>

</html>