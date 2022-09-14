<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
$_SESSION['ultimaPage'] = "finanziaria";

$entrateEffettive = 0;
$sql = "SELECT sum(pagato) as somma FROM tesserato WHERE tesserato.tipo='0'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['somma'] != null)
            $entrateEffettive = $row['somma'];
    }
}
$entrateIpotetiche = 0;
$sql = "SELECT sum(daPagare) as somma FROM tesserato WHERE tesserato.tipo='0'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['somma'] != null)
            $entrateIpotetiche = $row['somma'];
    }
}
$entrateSponsor = 0;
$sql = "SELECT sum(entrata) as somma FROM sponsor ";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['somma'] != null)
            $entrateSponsor = $row['somma'];
    }
}
$uscita1 = 0;
$uscita2 = 0;
$sql = "SELECT sum(prezzoTotale) as temp FROM `acquistimagazzino`";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['temp'] != null)
            $uscita1 = $row['temp'];
    }
}
$sql = "SELECT sum(prezzo) as somma FROM acquistimateriale";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['somma'] != null)
            $uscita2 = $row['somma'];
    }
}
?>

<body>
    <header class="text-center mb-2">
        <h1 class="display-5 font-weight-bold">Area Finanziaria</h1>
    </header>
    <div class="container">
        <div class="row mt-5">
            <div class="col-3">
                <div class="alert alert-light border text-center" role="alert">
                    <h3 class="alert-heading text-dark font-weight-bold">Entrate Effettive</h3>
                    <hr>
                    <h5 class="text-muted">+ <?php echo $entrateEffettive ?>,00 €</h5>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" style="width: 100%"></div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="alert alert-light border text-center" role="alert">
                    <h3 class="alert-heading text-dark font-weight-bold">Entrate Potenziali</h3>
                    <hr>
                    <h5 class="text-muted">+ <?php echo $entrateIpotetiche ?>,00 €</h5>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-info" style="width: 100%"></div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="alert alert-light border text-center" role="alert">
                    <h3 class="alert-heading text-dark font-weight-bold">Entrate Sponsor</h3>
                    <hr>
                    <h5 class="text-muted">+ <?php echo $entrateSponsor ?>,00 €</h5>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-warning" style="width: 100%"></div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="alert alert-light border text-center" role="alert">
                    <h3 class="alert-heading text-dark font-weight-bold">Uscite Società</h3>
                    <hr>
                    <h5 class="text-muted">+ <?php echo $uscita1 + $uscita2 ?>,00 €</h5>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-danger" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5" id="grafici">
            <div class="col-2">
            </div>
            <div class="col-8">
                <div class="alert alert-light border text-center" role="alert">
                    <canvas class="p-3" id="Uscite"></canvas>
                </div>
            </div>
        </div>

        <?php
        //Uscite
        $materiale = [];
        $sql = "SELECT 	sum(acquistimateriale.prezzo) as risultato,		
                        month(acquistimateriale.data) as data
                FROM acquistimateriale
                where year(acquistimateriale.data)=year(CURRENT_TIMESTAMP)
                GROUP BY month(acquistimateriale.data)";
        $result = mysqli_query($link, $sql);
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $materiale += [$row['data'] => $row['risultato']];
                }
            }
        }
        $magazzino = [];
        $sql = "SELECT SUM(acquistimagazzino.prezzototale) AS risultato,
                    MONTH(acquistimagazzino.data) AS data
                FROM
                    acquistimagazzino
                where year(acquistimagazzino.data)=year(CURRENT_TIMESTAMP)
                GROUP BY
                    MONTH(acquistimagazzino.data)";
        $result = mysqli_query($link, $sql);
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $magazzino += [$row['data'] => $row['risultato']];
                }
            }
        }
        $risultato = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
            12 => 0
        ];
        for ($i = 0; $i < 13; $i++) {
            if (array_key_exists($i, $materiale)) {
                $risultato[$i] += $materiale[$i];
            }
            if (array_key_exists($i, $magazzino)) {
                $risultato[$i] += $magazzino[$i];
            }
        }
        ?>
    </div>
    <script>
        new Chart(document.getElementById('Uscite').getContext("2d"), {
            type: 'line',
            data: {
            labels: [
                'Gennaio',
                'Febbraio',
                'Marzo',
                'Aprile',
                'Maggio',
                'Giugno',
                'Luglio',
                'Agosto',
                'Settembre',
                'Ottobre',
                'Novembre',
                'Dicembre'
            ],
            datasets: [{
                label: 'Uscite Mensili',
                backgroundColor: 'red',
                borderColor: 'red',
                data: [<?php echo $risultato[1] ?>, <?php echo $risultato[2] ?>, <?php echo $risultato[3] ?>, <?php echo $risultato[4] ?>, <?php echo $risultato[5] ?>, <?php echo $risultato[6] ?>, <?php echo $risultato[7] ?>, <?php echo $risultato[8] ?>, <?php echo $risultato[9] ?>, <?php echo $risultato[10] ?>, <?php echo $risultato[11] ?>, <?php echo $risultato[12] ?>],
            }]
        },
            options: {
                scales: {
                    y: {
                        stacked: true
                    }
                }
            }
        });
        console.log("stampato");
        if ($(window).width() < 501) {
            $("#grafici").css("display", "none");
        } else
            $("#grafici").css("display", "flex");
    </script>
</body>