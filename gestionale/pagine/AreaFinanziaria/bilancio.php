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
    </div>

    <script>
        const dataEntrate = {
            labels: [
                'Lunedi',
                'Martedi',
                'Mercoledi',
                'Giovedi',
                'Venerdi',
                'Sabato',
                'Domenica',
            ],
            datasets: [{
                label: 'Entrate Giornaliere',
                backgroundColor: 'green',
                borderColor: 'green',
                data: [0, 12, 5, 2, 5, 30, 5],
            }]
        };
        const dataUscite = {
            labels: [
                'Lunedi',
                'Martedi',
                'Mercoledi',
                'Giovedi',
                'Venerdi',
                'Sabato',
                'Domenica',
            ],
            datasets: [{
                label: 'Uscite Giornaliere',
                backgroundColor: 'red',
                borderColor: 'red',
                data: [0, 12, 5, 2, 5, 30, 5],
            }]
        };
        const dataTorta = {
            labels: [
                'Red',
                'Blue',
                'Yellow'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
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