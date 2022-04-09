<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: login.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .contenitore {
            width: auto;
            height: auto;
        }
    </style>
</head>

<body>

</html>
<div class="page-header clearfix">
    <h2 class="pull-left" style="margin-left:30px"> <?php echo "   Giocatori "  . $_GET['squadra'] ?> </h2>
</div>
<div class="contenitore">
    <div class="row">
        <div class="col-sm-9">
            <div class="page-header clearfix">
                <h2 class="pull-left" style="margin-left:30px; margin-top:20px"> Mister </h2>
            </div>
            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100">
                            <?php
                            require_once '../config.php';
                            $sql = "SELECT * FROM categoria WHERE categoria.nome='" . $_GET['squadra'] . "'";
                            $idCategoria = 0;
                            $idVisita = 0;
                            if ($result = mysqli_query($link, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                    $idCategoria = $row['id'];
                                }
                            }
                            $sql = "SELECT * FROM tesserato WHERE idCategoria='" . $idCategoria . "'and tipo='1'";
                            echo "<table id='modalDirigenza'><thead><tr class='table100-head'>";
                            echo "      <th class='column1'>Nome</th>";
                            echo "     <th class='column1'>Cognome</th>";
                            echo "      <th class='column1'>Data Nascita</th>";
                            echo "</tr></thead><tbody>";
                            if ($result = mysqli_query($link, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td class='column1'>" . $row['nome'] . "</td>";
                                        echo "<td class='column2'>" . $row['cognome'] . "</td>";
                                        echo "<td class='column3'>" . $row['dataNascita'] . "</td>";
                                    }
                                    mysqli_free_result($result);
                                } else {
                                }
                            } else {
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                            }
                            echo "</table>";

                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-header clearfix">
                <h2 class="pull-left" style="margin-left:30px; margin-top:20px"> Giocatori </h2>
            </div>
            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100">
                            <?php
                            require_once '../config.php';
                            $sql = "SELECT * FROM categoria WHERE categoria.nome='" . $_GET['squadra'] . "'";
                            $idCategoria = 0;
                            $idVisita = 0;
                            if ($result = mysqli_query($link, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                    $idCategoria = $row['id'];
                                }
                            }
                            $sql = "SELECT * FROM tesserato WHERE idCategoria='" . $idCategoria . "'and tipo='0'";
                            echo "<table id='modalGiocatori'><thead><tr class='table100-head'>";
                            echo "      <th class='column1'>Nome</th>";
                            echo "     <th class='column1'>Cognome</th>";
                            echo "      <th class='column1'>Data Nascita</th>";
                            echo "      <th class='column1'>Visita</th>";
                            echo "      <th class='column1'>Scadenza</th>";
                            echo "</tr></thead><tbody>";
                            if ($result = mysqli_query($link, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td class='column1'>" . $row['nome'] . "</td>";
                                        echo "<td class='column2'>" . $row['cognome'] . "</td>";
                                        echo "<td class='column3'>" . $row['dataNascita'] . "</td>";

                                        $sql1 = "SELECT * FROM visita WHERE visita.id='" . $row['idVisita'] . "'";
                                        if ($result2 = mysqli_query($link, $sql1)) {
                                            if (mysqli_num_rows($result2) > 0) {
                                                $row2 = mysqli_fetch_array($result2);
                                                if (true)
                                                    echo "<td class='column4'>  <span class='dot-green'></span>  </td>";
                                                else
                                                    echo "<td class='column4'>  <span class='dot-red'></span>  </td>";
                                                echo "<td class='column5'>" . $row2['scadenza'] . "</td>";
                                                echo "</tbody>";
                                            }
                                        }
                                    }
                                    mysqli_free_result($result);
                                } else {
                                }
                            } else {
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                            }
                            echo "</table>";

                            mysqli_close($link);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            Prova prova prova
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">User Details</h4>
            </div>
            <div class="modal-body">
                <div class="username">
                    <p>Name: </p><span></span>
                </div>
                <div class="position">
                    <p>Position: </p><span></span>
                </div>
                <div class="office">
                    <p>Office: </p><span></span>
                </div>
                <div class="age">
                    <p>Age: </p><span></span>
                </div>
                <div class="date">
                    <p>Start date: </p><span></span>
                </div>
                <div class="salary">
                    <p>Salary: </p><span></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



</body>