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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper {
            width: 1100px;
            margin: 0 auto;
        }

        .page-header h2 {
            margin-top: 0;
        }

        table tr td:last-child a {
            margin-right: 15px;
        }

        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 300px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 6px 6px 6px 32px;
            text-decoration: none;
            font-size: 23px;
            color: #818181;
            display: block;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .main {
            margin-left: 200px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 13px;
            }

            .sidenav a {
                font-size: 16px;
            }
        }

        .sopra {
            margin-top: 0;
        }

        .sotto {
            margin-bottom: 0%;
            margin-top: 120%;
        }
    </style>
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
            <a href="#">&nbsp &nbspPrima Squadra</a>
            <br>
            <a href="#" class="text-uppercase">Shop</a>
        </div>
        <div class="sotto">
            <a href="#">About</a>
            <a href="#">Contact</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="main">
        <div class="wrapper ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header clearfix">
                            <h2 class="pull-left">Giocatori Giovanile Canzese</h2>

                        </div>
                        <a href="inserisci.php" class="btn btn-success ">Aggiungi Giocatore</a>
                        <a href="cerca.php" class="btn btn-success ">Cerca Giocatore</a> <br>
                        <?php
                        require_once 'config.php';
                        $sql = "SELECT * FROM calciatore WHERE categoria='Prima Squadra'";
                        if ($result = mysqli_query($link, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                echo "<br> <table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>ID</th>";
                                echo "<th>Nome</th>";
                                echo "<th>Cognome</th>";
                                echo "<th>Ruolo</th>";
                                echo "<th>Data di Nascita</th>";
                                echo "<th>Visita Medica</th>";
                                echo "<th>Scadenza Visita</th>";
                                echo "<th>Da Pagare</th>";
                                echo "<th>Pagato</th>";
                                echo "<th>Cateogira</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_array($result)) {
                                    $visita = "";
                                    if ($row['visita'] == "1")
                                        $visita = "Valida";
                                    else
                                        $visita = "Non Valida";
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['nome'] . "</td>";
                                    echo "<td>" . $row['cognome'] . "</td>";
                                    echo "<td>" . $row['ruolo'] . "</td>";
                                    echo "<td>" . $row['dataNascita'] . "</td>";
                                    echo "<td>" . $visita . "</td>";
                                    echo "<td>" . $row['scadenzaVisita'] . "</td>";
                                    echo "<td>" . $row['daPagare'] . "</td>";
                                    echo "<td>" . $row['pagato'] . "</td>";
                                    echo "<td>" . $row['categoria'] . "</td>";
                                    echo "<td>";
                                    echo "<a href='vendi.php?anno=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                mysqli_free_result($result);
                            } else {
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        } else {
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
                        mysqli_close($link);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>