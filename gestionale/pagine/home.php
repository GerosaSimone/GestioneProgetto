<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
$_SESSION['ultimaPage'] = "home";
?>

<body>
    <div class="page-header clearfix text-center">
        <strong>
            <h1 class="display-5 font-weight-bold ">HomePage
            </h1>
        </strong>
    </div>
    <div class="text-center" style="width:100%; height:100%">
        <a href="https://giovanilecanzese.it/sito/"> <img src="img/logo.png" class="rounded" alt="logo" style="width:30%; height:auto; margin-top:7%"></a>
    </div>

</body>