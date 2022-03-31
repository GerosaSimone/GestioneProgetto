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
        <div class="sopra">
            <a href="#" class="text-uppercase">Giocatori</a>
            <a href="#" class="text-uppercase" style=" color: #818181;">Squadre</a>
            <a href="#">&nbsp &nbspPiccoli Amici</a>
            <a href="#">&nbsp &nbspPulcini</a>
            <a href="#">&nbsp &nbspGiovanissimi</a>
            <a href="#">&nbsp &nbspEsordienti</a>
            <a href="#">&nbsp &nbspAllievi</a>
            <a href="#">&nbsp &nbspJiuniores</a>
            <a href="#" id="prima">&nbsp &nbspPrima Squadra</a>
            <br>
            <a href="#" class="text-uppercase">Shop</a>
        </div>
        <div class="sotto">
            <a href="#">About</a>
            <a href="#">Contact</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div id="pagina">

    </div>
</body>

<script src="script/jquery.js"></script>
<script src="script/CollegamentiMenu.js"></script>

</html>