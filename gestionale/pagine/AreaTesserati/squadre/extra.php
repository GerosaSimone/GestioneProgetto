<?php
$totGiocatori = "";
$totDirigenti = "";
$totVisite = "";
$sql = "SELECT COUNT(tesserato.nome) AS somma FROM `tesserato` INNER JOIN categoria on categoria.id=tesserato.idCategoria WHERE tesserato.nascosto=0 and tesserato.tipo=0 and categoria.nome='" . $_GET['squadra'] . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $totGiocatori = $row['somma'];
    }
}
$sql = "SELECT COUNT(tesserato.nome) AS somma FROM `tesserato` INNER JOIN categoria on categoria.id=tesserato.idCategoria WHERE tesserato.nascosto=0 and tesserato.tipo=1 and categoria.nome='" . $_GET['squadra'] . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $totDirigenti = $row['somma'];
    }
}
$sql = "SELECT COUNT(visita.id) AS somma FROM visita 
        INNER JOIN tesserato on tesserato.idVisita=visita.id
        INNER JOIN categoria on tesserato.idCategoria=categoria.id
        WHERE tesserato.nascosto=0 and (DATE(visita.scadenza)<DATE(NOW()) and DATE(visita.scadenza)>DATE(01-01-1900)) and categoria.nome='" . $_GET['squadra'] . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $totVisite = $row['somma'];
    }
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
$giorni = array("", "");
$orariInizio = array("", "");
$orariFine = array("", "");
$spogliatoi = array("", "");

$sql = "SELECT *
        FROM allenamento 
        INNER JOIN categoria on allenamento.idCategoria=categoria.id 
        WHERE categoria.nome='" . $_GET['squadra'] . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) == 2) {
        $row = mysqli_fetch_array($result);
        $giorni[0] = $row['giorno'];
        $orariInizio[0] = $row['oraInizio'];
        $orariFine[0] = $row['oraFine'];
        $spogliatoi[0] = $row['spogliatoio'];
        $row = mysqli_fetch_array($result);
        $giorni[1] = $row['giorno'];
        $orariInizio[1] = $row['oraInizio'];
        $orariFine[1] = $row['oraFine'];
        $spogliatoi[1] = $row['spogliatoio'];
    } else if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $giorni[0] = $row['giorno'];
        $orariInizio[0] = $row['oraInizio'];
        $orariFine[0] = $row['oraFine'];
        $spogliatoi[0] = $row['spogliatoio'];
    }
}

?>
<div class="alert alert-secondary ml-3" role="alert" style="min-width:300px">
    <h4 class="alert-heading">Info:</h4>
    <hr>
    <p class="mb-1">Totale Giocatori: <?php echo $totGiocatori ?></p>
    <p class="mb-1">Totale Dirigenti: <?php echo $totDirigenti ?></p>
    <p class="mb-1">Visite Scadute: <?php echo $totVisite ?></p>
</div>
<div class="alert alert-secondary ml-3" role="alert" style="min-width:300px">
    <h4 class="alert-heading">Materiale:
        <button type='button' class='btn btn-outline-secondary pull-right' data-bs-toggle='modal' data-bs-target='#oggetti'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
            </svg>
        </button>
    </h4>
    <hr>
    <p class="mb-1">Num Pettorine: <?php echo $numPettorine ?></p>
    <p class=" mb-0">Num Palloni: <?php echo $numPalloni ?></p>
</div>
<div class="alert alert-secondary ml-3" role="alert" style="min-width:300px">
    <h4 class="alert-heading">Orari Allenamenti:
        <button type='button' class='btn btn-outline-secondary pull-right' data-bs-toggle='modal' data-bs-target='#orari'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16px' height='16px' fill='currentColor' class='bi bi-pencil'>
                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
            </svg>
        </button>
    </h4>
    <hr>
    <?php
    if ($giorni[0] != "")
        echo "<p>" . $giorni[0] . " " . $orariInizio[0] . " | " . $orariFine[0] . " -> " . $spogliatoi[0] . "</p>";
    if ($giorni[1] != "")
        echo "<p>" . $giorni[1] . " " . $orariInizio[1] . " | " . $orariFine[1] . " -> " . $spogliatoi[1] . "</p>";
    if ($giorni[1] == "" && $giorni[0] == "")
        echo "<p> Nessun Allenamento Salvato </p>";
    ?>
    <p style="margin-bottom:-5%"></p>
</div>
<div class="alert alert-secondary ml-3" role="alert" style="min-width:300px; min-height:180px">
    <h4 class="alert-heading">Divise:
        <button type='button' class='btn btn-outline-secondary pull-right' data-bs-toggle='modal' data-bs-target='#addDivisa'>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
            </svg>
        </button>
    </h4>
    <hr>
    <div class="row" style="margin-left:0.1%; margin-right:0.1%; min-height:90px; max-height:90px">
        <?php $sql = "SELECT maglia.foto
                    FROM `maglia` inner JOIN usa on maglia.id=usa.idMaglia 
                    INNER JOIN categoria on usa.idCategoria=categoria.id
                    WHERE categoria.nome='" . $_GET['squadra'] . "'";
        if ($result = mysqli_query($link, $sql)) {
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 1) {
                    for ($i = 0; $i < 2; $i++) {
                        $row = mysqli_fetch_array($result);
                        echo '  <div class="col-4">
                                    <img src="img/uploadsDivise/' . $row['foto'] . '" class="rounded float-left mr-2" alt="..." style="max-height:90px" width="95%" height="95%">
                                </div>';
                    }
                } else if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result);
                    echo '  <div class="col-4">
                                <img src="img/uploadsDivise/' . $row['foto'] . '" class="rounded float-left mr-2" alt="..." style="max-height:90px" width="95%" height="95%">
                            </div>';
                }
            }
        }
        ?>
        <div class="col-4">
            <button style="height:95%" class="btn btn-outline-secondary btn-block p-2" data-bs-toggle='modal' data-bs-target='#divise'>Show <br>more...</button>
        </div>
    </div>
</div>
<div class="alert alert-secondary ml-3" role="alert" style="min-width:300px; min-height:40px">
    <h4 class="alert-heading pt-1">Distinta pdf:
        <button type='button' class='btn btn-outline-secondary pull-right' data-bs-toggle='modal' data-bs-target='#distinta'>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
            </svg>
        </button>
    </h4>
</div>
<div class="alert alert-secondary ml-3" role="alert" style="min-width:300px; min-height:40px">
    <h4 class="alert-heading pt-1">Distinta word:
        <a href="pagine/AreaTesserati/squadre/funzioni/downloadDistinta2.php?squadra=<?php echo $_GET["squadra"]; ?>" class='btn btn-outline-secondary pull-right'>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
            </svg>
        </a>
    </h4>
</div>
<script>
    var distinta = document.getElementById('distinta')
    distinta.addEventListener('show.bs.modal', function(event) {
        $.post("pagine/AreaTesserati/squadre/modal/distinta.php?squadra=<?php echo $_GET["squadra"]; ?>", true, function(data, status) {
            $("#modalDistinta").html(data);
        });
    });
</script>