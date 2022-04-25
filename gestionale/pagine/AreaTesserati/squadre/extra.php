<?php
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
$giorni = "";
$orariInizio = "";
$orariFine = "";
$sql = "SELECT oraInizio ,oraFine ,giorno FROM allenamento INNER JOIN categoria on allenamento.idCategoria=categoria.id WHERE categoria.nome='" . $_GET['squadra'] . "'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $giorni .= $row['giorno'] . ";";
            $orariInizio .= $row['oraInizio'] . ";";
            $orariFine .= $row['oraFine'] . ";";
        }
    }
}

?>
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
    <p class=" mb-0">Num Palloni: <?php echo $numPalloni ?></p>
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
    <?php
    for ($i = 0; $i < substr_count($giorni, ";"); $i++) {
        echo "<p>" . explode(';', $giorni)[$i] . " " . explode(';', $orariInizio)[$i] . " | " . explode(';', $orariFine)[$i] . "</p>";
    }
    ?>
    <p style="margin-bottom:-5%"></p>
</div>
<div class="alert alert-secondary ml-3" role="alert">
    <h4 class="alert-heading">Divise:</h4>
    <hr>
    <img src="img/divisa.webp" class="rounded float-left mr-2" alt="..." width="30%" height="30%">
    <img src="img/divisa.webp" class="rounded float-left  mr-2" alt="..." width="30%" height="30%">
    <button type='button' class='btn btn-outline-secondary mb-3' style="width:6em;height:6em" data-bs-toggle='modal' data-bs-target='#divise'> Show <br>More...</button>
</div>