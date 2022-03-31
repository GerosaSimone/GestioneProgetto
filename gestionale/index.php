<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: login.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</head>

<body>
    <div class="sidenav">
        <div class="item">
            <a href="index.php" id="titolo">Giovanile Canzese</a>
            <a href="#" id="giocatori" class="text-uppercase testo" style="margin-top:20px; margin-bottom:5px;">Giocatori</a>
            <a href="#" class="text-uppercase testo">Squadre</a>
            <a href="#" id="piccoli" class="testo">&nbsp &nbspPiccoli Amici</a>
            <a href="#" id="pulcini" class="testo">&nbsp &nbspPulcini</a>
            <a href="#" id="giovanissimi" class="testo">&nbsp &nbspGiovanissimi</a>
            <a href="#" id="esordienti" class="testo">&nbsp &nbspEsordienti</a>
            <a href="#" id="allievi" class="testo">&nbsp &nbspAllievi</a>
            <a href="#" id="juniores" class="testo">&nbsp &nbspJiuniores</a>
            <a href="#" id="prima" class="testo" style="margin-bottom:5px;">&nbsp &nbspPrima Squadra</a>
            <a href="#" id="shop" class="text-uppercase testo" style="margin-bottom:5px;">Shop</a>
            <a href="#" id="volantini" class="text-uppercase testo" style="margin-bottom:5px;">Volantini</a>
            <a href="#" id="galleria" class="text-uppercase testo" style="margin-bottom:5px;">Galleria</a>
        </div>
        <div class="item">
            <a href="logout.php" class="testo" style="margin-bottom:30px;">Logout</a>
        </div>
    </div>

    <div id="pagina">

    </div>
</body>
<script src="script/jquery.js"></script>
<script src="script/CollegamentiMenu.js"></script>

</html>