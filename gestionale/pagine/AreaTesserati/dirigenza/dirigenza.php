<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../../config.php';
$_SESSION['ultimaPage'] = "dirigenza";
//controllo se si devono eliminare telefoni o mail
$sql = "SELECT telefono.id,telefono.telefono FROM telefono";
$query = "";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            if ($row['telefono'] == "") {
                $query .= "DELETE FROM `telefono` WHERE id='" . $row['id'] . "';";
            }
        }
    }
}
$sql = "SELECT mail.id,mail.mail FROM mail";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            if ($row['mail'] == "") {
                $query .= "DELETE FROM `mail` WHERE id='" . $row['id'] . "';";
            }
        }
    }
}
if ($query != "")
    mysqli_multi_query($link, $query);
?>

<body>
    <div class="page-header clearfix text-center">
        <strong>
            <h1 class="display-5 font-weight-bold">Dirigenza
                <button type='button' class='btn btn-outline-secondary pull-right mt-3' data-bs-toggle='modal' data-bs-target='#addDirigente' style="margin-right:3%">
                    Add Mister/Dirigente
                </button>
            </h1>
        </strong>
    </div>
    <div>
        <?php include 'modal/modal.php'; ?>
    </div>
    <?php include '../tabelle/tabellaDirigenza.php'; ?>
</body>
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
            var id = button.getAttribute('data-bs-whatever')
            $.post("pagine/AreaTesserati/dirigenza/modal/visualizza.php?idTesserato=" + id, true, function(data, status) {
                $("#modalVisualizza").html(data);
            });
        });
        var modifica = document.getElementById('modifica')
        modifica.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-whatever')
            $.post("pagine/AreaTesserati/dirigenza/modal/modifica.php?idTesserato=" + id, true, function(data, status) {
                $("#modalModifica").html(data);
            });
        });
        var addDirigente = document.getElementById('addDirigente')
        addDirigente.addEventListener('show.bs.modal', function(event) {
            $.post("pagine/AreaTesserati/dirigenza/modal/aggiungi.php", true, function(data, status) {
                $("#modalAggiungi").html(data);
            });
        });
        var elimina = document.getElementById('elimina')
        elimina.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')
            document.getElementById("idElimina").value = recipient;
        });
        var acquistaProdotto = document.getElementById('acquistaProdotto')
        acquistaProdotto.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-whatever')
            $.post("pagine/AreaTesserati/giocatori/modal/acquista.php?idTesserato=" + id, true, function(data, status) {
                $("#modalAcquista").html(data);
            });
        });
    });
</script>

</html>