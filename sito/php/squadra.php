<?php

session_start();
require_once 'config.php';


$squadra = $_GET['squadra'];
//where passare come parametro il nome della squadra;
if (isset($squadra)) {
    $sql = "SELECT nome,cognome.ruolo,dataNascita FROM calciatore WHERE categoria = " . $squadra;
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo '<link href="css/tendina.css" rel="stylesheet" type="text/css">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">';

            echo "<th>Anno</th>";
            echo "<th>Numero</th>";
            echo "<th>Rara</th>";
            echo "<th>Elimina</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['anno'] . "</td>";
                echo "<td>" . $row['num'] . "</td>";
                if ($row['rara']) {
                    echo "<td>Rara</td>";
                } else {
                    echo "<td>Comune</td>";
                }

                echo "<td>";
                echo "<a href='delete.php?anno=" . $row['anno'] . "&numero=" . $row['num'] . "' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";

                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else {
            echo "<p class='lead'><em>No records were found.</em></p>";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    // Close connection
    mysqli_close($link);
}
