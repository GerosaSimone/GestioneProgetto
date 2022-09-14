<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
$_SESSION['ultimaPage'] = "settings";
?>

<body>
    <header class="text-center mb-2">
        <h1 class="display-5 font-weight-bold">IMPOSTAZIONI</h1>
    </header>
    <div class="row text-center">
        <div class="col " style="min-width:300px">
            <div class="card mt-4">
                <div class="card-header text-dark font-weight-bold">
                    Gestisci Backup
                </div>
                <div class="card-body">
                    <p class="card-text" style="text-align:start">Accedi al cPanel per controllare i vecchi backup e ripristinarne uno.</p>
                    <p class="card-text text-dark" style="text-align:start">Attenzione: una volta ripristinato un db non si puo' tornare indietro!</p>
                    <a href="https://hostingweb38.netsons.net:2083/cpsess4742229815/frontend/paper_lantern/index.html">
                        <button type="button" class="btn btn-outline-secondary btn-block " style="width:100%">Accedi a CPanel</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col " style="min-width:300px">
            <div class="card mt-4">
                <div class="card-header text-dark font-weight-bold">
                    Reset fine anno
                </div>
                <div class="card-body">
                    <p class="card-text" style="text-align:start">Questa operazione comporta: <br>
                        - aggiornare la categoria dei giocatori automaticamente <br>
                        - azzerare le quote versate giocatori <br>
                        - azzerare le tabelle degli acquisti
                    </p>
                    <p class="card-text text-dark" style="text-align:start">Attenzione: una volta eseguita questa operazione non si potra' tornare indietro!</p>
                    <a href="pagine/impostazioni/reset.php">
                        <button type="button" class="btn btn-outline-secondary btn-block " style="width:100%">Reset</button>
                    </a>
                </div>
            </div>
        </div>

    </div>

</body>