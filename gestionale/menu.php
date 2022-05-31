<?php
//tipo 0=admin 1=mister
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once "config.php";
$sql = "SELECT * FROM utenti WHERE utenti.user='" . $_SESSION['user_id'] . "';";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['tipo'] == 0) {
            echo ' <div class="contenitoreSidebar">
            <div id="menu" class="item">
                <div class="p-4">
                    <div class="container" style="margin-left: -5%;">
                        <div class="row " >
                            <div class="col ">
                                <a href="#" id="home" class=" mb-3" ><img src="img/logo.png" class="img-fluid" alt="Responsive image"></a>
                            </div>
                            <div class="col my-auto">
                                    <a href="#" id="home">
                                        <h3 class="text-light ">Giovanile<br>Canzese</h3>
                                    </a>
                            </div>
                        </div>
                    </div>
                    <ul class="list-unstyled components mb-5">
                        <li>
                            <a href="#TesseratiSubmenu" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle">Area Tesserati</a>
                            <ul class="collapse list-unstyled" id="TesseratiSubmenu" >
                                <li >
                                    <a href="#MisterSubmenu" data-toggle="collapse" aria-expanded="false"
                                        class="dropdown-toggle">Generale</a>
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
                                    <a href="#SquadreSubmenu" data-toggle="collapse" aria-expanded="false"
                                        class="dropdown-toggle"> Squadre</a>
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
                            <a href="#" id="bilancio">Area Finanziaria</a>
                        </li>
                        <li>
                            <a href="#ShopSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Area
                                Shop</a>
                            <ul class="collapse list-unstyled" id="ShopSubmenu">
                                <li>
                                    <a href="#" id="articoli">Articoli</a>
                                </li>
                                <li>
                                    <a href="#" id="acquistiGiocatori">Acquisti Giocatori</a>
                                </li>
                                <li>
                                    <a href="#" id="acquistiDirigenza">Acquisti Dirigenza</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#MagazzinoSubmenu" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle">Area Magazzino</a>
                            <ul class="collapse list-unstyled" id="MagazzinoSubmenu">
                                <li>
                                    <a href="#" id="deposito">Deposito</a>
                                </li>
                                <li>
                                    <a href="#" id="acquistiSocieta">Acquisti Società</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" id="sponsor">Area Sponsor</a>
                        </li>
                        <li>
                            <a href="#SitoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Area
                                Sito</a>
                            <ul class="collapse list-unstyled" id="SitoSubmenu">
                                <li>
                                    <a href="#" id="galleria">Foto Galleria</a>
                                </li>
                                <li>
                                    <a href="#" id="news">Foto News</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" id="registrazioni">Area Registrazioni</a>
                        </li>
        
                    </ul>
                </div>
            </div>
            <div class="p-3">
                <a href="pagine/login/logout.php">
                    <button type="button" class="btn btn-outline-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                            <path fill-rule="evenodd"
                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>
                    </button>
                </a>
            </div>
        </div>';
        } else {
            echo ' <div class="contenitoreSidebar">
            <div id="menu" class="item">
                <div class="p-4">
                    <div class="container" style="margin-left: -5%;">
                        <div class="row">
                            <div class="col">
                                <a href="#" id="home" class="img logo mb-3" style="background-image: url(img/logo.png);"></a>
                            </div>
                            <div class="col">
                                <a href="#" id="home">
                                    <h3 class="text-light mt-2">Giovanile<br>Canzese</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <ul class="list-unstyled components mb-5">
                        <li>
                            <a href="#TesseratiSubmenu" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle">Area Tesserati</a>
                            <ul class="collapse list-unstyled" id="TesseratiSubmenu">                                  
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
                        <li>
                            <a href="#ShopSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Area
                                Shop</a>
                            <ul class="collapse list-unstyled" id="ShopSubmenu">
                                <li>
                                    <a href="#" id="articoli">Articoli</a>
                                </li>
                                <li>
                                    <a href="#" id="acquistiGiocatori">Acquisti Giocatori</a>
                                </li>
                                <li>
                                    <a href="#" id="acquistiDirigenza">Acquisti Dirigenza</a>
                                </li>
                            </ul>
                        </li>
                       
                        
        
                    </ul>
                </div>
            </div>
            <div class="p-3">
                <a href="pagine/login/logout.php">
                    <button type="button" class="btn btn-outline-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                            <path fill-rule="evenodd"
                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>
                    </button>
                </a>
            </div>
        </div>';
        }
    }
}
