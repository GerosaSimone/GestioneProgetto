<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: login.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>

<body>

</html>
<div class="main">
    <div class="wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Giocatori Giovanile Canzese</h2>
                    </div>
                    <a href="inserisci.php?squadra=<?php $_GET['squadra'] ?>" class="btn btn-primary pull-right ">Aggiungi Giocatore</a>
                    <a href="cerca.php" class="btn btn-primary pull-right" style="margin-right:20px margin-bottom">Cerca Giocatore</a> <br>
                    <?php
                    require_once '../config.php';
                    $sql = "SELECT * FROM calciatore WHERE categoria='" . $_GET['squadra'] . "'";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo "<br> <table class='table table-bordered table-hover'>";
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
                            echo "<th>Categoira</th>";
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