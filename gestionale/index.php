<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>U.S. Giovanile Canzese</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .contenitore {
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: space-between;
            height: 100%;
        }

        .item {
            display: block;
        }
    </style>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="contenitore">
                <div class="item">
                    <div class="p-4">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="img logo mb-3" style="background-image: url(../sito/imm/logo.png);"></a>
                                </div>
                                <div class="col">
                                    <h3 style="color:white">Giovanile<br>Canzese</h3>
                                </div>
                            </div>
                        </div>
                        <ul class="list-unstyled components mb-5">
                            <li>
                                <a href="#TesseratiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Area Tesserati</a>
                                <ul class="collapse list-unstyled" id="TesseratiSubmenu">
                                    <li>
                                        <a href="#MisterSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Generale</a>
                                        <ul class="collapse list-unstyled" id="MisterSubmenu">
                                            <li>
                                                <a href="#" id="dirigenza">Dirigenza</a>
                                            </li>
                                            <li>
                                                <a href="#" id="giocatori">Giocatori</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#SquadreSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Squadre</a>
                                        <ul class="collapse list-unstyled" id="SquadreSubmenu">
                                            <li>
                                                <a href="#" id="prima">Prima Squadra</a>
                                            </li>
                                            <li>
                                                <a href="#" id="juniores">Juniores</a>
                                            </li>
                                            <li>
                                                <a href="#" id="allievi">Allievi</a>
                                            </li>
                                            <li>
                                                <a href="#" id="giovanissimi">Giovanissimi</a>
                                            </li>
                                            <li>
                                                <a href="#" id="esordienti">Esordienti</a>
                                            </li>
                                            <li>
                                                <a href="#" id="pulcini">Pulcini</a>
                                            </li>
                                            <li>
                                                <a href="#" id="piccoli">Piccoli Amici</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#FinanziariaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Area Finanziaria</a>
                                <ul class="collapse list-unstyled" id="FinanziariaSubmenu">
                                    <li>
                                        <a href="#" id="bilancio">Bilancio</a>
                                    </li>
                                    <li>
                                        <a href="#" id="acuistiSocieta">Acquisti Società</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#ShopSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Area Shop</a>
                                <ul class="collapse list-unstyled" id="ShopSubmenu">
                                    <li>
                                        <a href="#" id="articoli">Articoli</a>
                                    </li>
                                    <li>
                                        <a href="#" id="acquistiGiocatori">Acquisti Giocatori</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#MagazzinoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Area Magazzino</a>
                                <ul class="collapse list-unstyled" id="MagazzinoSubmenu">
                                    <li>
                                        <a href="#" id="deposito">Deposito</a>
                                    </li>
                                    <li>
                                        <a href="#" id="acquistiDeposito">Acquisti Deposito</a>
                                    </li>
                                    <li>
                                        <a href="#" id="materiale">Materiale Squadre</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#SitoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Area Sito</a>
                                <ul class="collapse list-unstyled" id="SitoSubmenu">
                                    <li>
                                        <a href="#" id="galleria">Foto Galleria</a>
                                    </li>
                                    <li>
                                        <a href="#" id="news">Foto News</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="item pb-4 pl-3">
                    <a href="logout.php">
                        <button type="button" class="btn btn-light btn-toggle active">
                            <span class="glyphicon glyphicon-log-out"></span> Log out
                        </button>
                    </a>
                </div>
            </div>

        </nav>

        <div id="content" class="p-2 p-md-4">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
            </button>
            <div id="pagina" style="margin-top:20px">

            </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        
        <script src="js/jquery.js"></script>
        <script src="js/CollegamentiMenu.js"></script>
    </div>
</body>

</html>