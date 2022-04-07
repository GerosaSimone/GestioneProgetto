<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: login.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
    <style>
        .contenitore {
            width: auto;
            height: auto;
        }
    </style>
</head>

<body>

</html>
<div class="contenitore">
    <div class="row">
        <div class="col-lg-9">
            <div class="main">
                <div class="wrapper ">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-header clearfix">
                                    <h2 class="pull-left"> <?php echo "Giocatori "  . $_GET['squadra'] ?> </h2>
                                </div>
                                <?php
                                require_once '../config.php';
                                $sql = "SELECT * FROM calciatore WHERE categoria='" . $_GET['squadra'] . "'";
                                if ($result = mysqli_query($link, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {
                                        echo "<br> <table class='table table-bordered table-hover'>";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th>Nome</th>";                                        
                                        echo "<th>Cognome</th>";                                        
                                        echo "<th>Data di Nascita</th>";
                                        echo "<th>Visita Medica</th>";                                        
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        while ($row = mysqli_fetch_array($result)) {                                            
                                            echo "<tr>";                                            
                                            echo "<td>" . $row['Nome'] . "</td>";
                                            echo "<td>" . $row['Cognome'] . "</td>";                                            
                                            echo "<td>" . $row['DataNascita'] . "</td>";                                           
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
        </div>
        <div class="col-sm-3">
            One of three columns
        </div>
    </div>


</div>
</body>