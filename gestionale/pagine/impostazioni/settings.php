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
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 text-right pr-3">
                <a href="">
                    <button type="button" class="btn  btn-outline-secondary btn-lg p-4">Carica Backup</button>
                </a>
            </div>
            <div class="col-6 text-start pl-3">
                <a href="">
                    <button type="button" class="btn btn-outline-secondary btn-lg p-4">Esegui Backup</button>
                </a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <a href="">
                    <button type="button" class="btn btn-outline-secondary btn-lg" style="padding-left:9.5%; padding-right:9.5%">Carica PDF</button>
                </a>
            </div>
        </div>
    </div>
</body>