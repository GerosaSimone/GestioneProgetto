<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$squadra = "";
if ($_GET['squadra'] == "PrimaSquadra")
    $squadra = "Prima Squadra";
else if ($_GET['squadra'] == "PiccoliAmici")
    $squadra = "Piccoli Amici";
else {
    $squadra = $_GET['squadra'];
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
                <?php include 'extra.php' ?>
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

            var addGiocatore = document.getElementById('addGiocatore')
            addGiocatore.addEventListener('show.bs.modal', function(event) {
                $.post("pagine/AreaTesserati/squadre/aggiungi.php?squadra=<?php echo $_GET['squadra'];?>", true, function(data, status) {
                    $("#modalAggiungi").html(data);
                });
            });        
           
                      
        });
    </script>
</body>

</html>