<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
$_SESSION['ultimaPage'] = "finanziaria";
?>

<body>
    <header class="text-center mb-2">
        <h1 class="display-5 font-weight-bold">Area Finanziaria</h1>
    </header>
    <div class="container">
        <div class="row pt-5">
            <div class="col-6">
                <canvas id="Entrate"></canvas>
            </div>
            <div class="col-6">
                <canvas id="Uscite"></canvas>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-3 text-start">
                I dati sono relativi agli acquisti fatti dalla societa
                e dai giocatori durante l'ultimo trimestre
            </div>
            <div class="col-6 text-center" style="padding-left:200px;padding-right:200px">
                <canvas id="Torta"></canvas>
            </div>
            <div class="col-3 text-end">
                Tramite i grafici si possono osservare varie statistiche
                che possono risultare utili alla societa' per tener conto
                dei bilanci
            </div>
        </div>
        <?php
        $sql = "SELECT SUM(tesserato.daPagare) AS totale FROM tesserato WHERE tesserato.tipo=0 AND tesserato.idCategoria=1 GROUP BY tesserato.idCategoria";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $prima = $row['totale'];
        } else
            $prima = 0;

        $sql = "SELECT SUM(tesserato.daPagare) AS totale FROM tesserato WHERE tesserato.tipo=0 AND tesserato.idCategoria=2 GROUP BY tesserato.idCategoria";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $juniores = $row['totale'];
        } else
            $juniores = 0;

        $sql = "SELECT SUM(tesserato.daPagare) AS totale FROM tesserato WHERE tesserato.tipo=0 AND tesserato.idCategoria=3 GROUP BY tesserato.idCategoria";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $allievi = $row['totale'];
        } else
            $allievi = 0;

        $sql = "SELECT SUM(tesserato.daPagare) AS totale FROM tesserato WHERE tesserato.tipo=0 AND tesserato.idCategoria=4 GROUP BY tesserato.idCategoria";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $giovanissimi = $row['totale'];
        } else
            $giovanissimi = 0;

        $sql = "SELECT SUM(tesserato.daPagare) AS totale FROM tesserato WHERE tesserato.tipo=0 AND tesserato.idCategoria=5 GROUP BY tesserato.idCategoria";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $esordienti = $row['totale'];
        } else
            $esordienti = 0;

        $sql = "SELECT SUM(tesserato.daPagare) AS totale FROM tesserato WHERE tesserato.tipo=0 AND tesserato.idCategoria=6 GROUP BY tesserato.idCategoria";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $pulcini = $row['totale'];
        } else
            $pulcini = 0;

        $sql = "SELECT SUM(tesserato.daPagare) AS totale FROM tesserato WHERE tesserato.tipo=0 AND tesserato.idCategoria=7 GROUP BY tesserato.idCategoria";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $piccoli = $row['totale'];
        } else
            $piccoli = 0;
        ?>
    </div>

    <script>
        const dataEntrate = {
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
                label: 'Entrate Mensili',
                backgroundColor: 'green',
                borderColor: 'green',
                data: [0, 12, 5, 2, 5, 30, 5],
            }]
        };
        const dataUscite = {
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
                data: [0, 12, 5, 2, 5, 300, 5],
            }]
        };
        const dataTorta = {
            labels: [
                'Prima Squadra',
                'Juniores',
                'Allievi',
                'Giovanissimi',
                'Esordienti',
                'Pulcini',
                'Piccoli Amici'
            ],
            datasets: [{
                label: 'Entrate Squadre',
                data: [<?php echo $prima ?>, <?php echo $juniores ?>, <?php echo $allievi ?>, <?php echo $giovanissimi ?>, <?php echo $esordienti ?>, <?php echo $pulcini ?>, <?php echo $piccoli ?>],
                backgroundColor: [
                    'rgb(255, 51, 0)',
                    'rgb(255, 153, 0)',
                    'rgb(255, 255, 0)',
                    'rgb(0, 255, 0)',
                    'rgb(0, 255, 255)',
                    'rgb(124,252,0)',
                    'rgb(204, 51, 255)'
                ],
                hoverOffset: 4
            }]
        };
        const Entrate = new Chart(document.getElementById('Entrate'), {
            type: 'line',
            data: dataEntrate,
            options: {
                scales: {
                    y: {
                        stacked: true
                    }
                }
            }
        });
        const Uscite = new Chart(document.getElementById('Uscite'), {
            type: 'line',
            data: dataUscite,
            options: {
                scales: {
                    y: {
                        stacked: true
                    }
                }
            }
        });
        const Torta = new Chart(document.getElementById('Torta'), {
            type: 'doughnut',
            data: dataTorta,
            options: {}
        });
    </script>
</body>