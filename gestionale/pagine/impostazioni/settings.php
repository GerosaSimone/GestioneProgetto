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
        <div class="col-4 text-center">
            <div class="card">
                <div class="card-header">
                    Carica Backup
                </div>
                <div class="card-body">
                    <div class="input-group mb-3" style="width:100%">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                        </div>
                    </div>
                    <a href="pagine/impostazioni/eseguiBackup.php">
                        <button type="button" class="btn btn-outline-secondary btn-block" style="width:100%">Esegui Backup</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-4">
            <a href="pagine/impostazioni/eseguiBackup.php">
                <button type="button" class="btn btn-outline-secondary " style="width:50%">Esegui Backup</button>
            </a>
        </div>

        <div class="col-4">
            <a href="">
                <button type="button" class="btn btn-outline-secondary " style="width:50%">Carica PDF</button>
            </a>
        </div>
    </div>

</body>