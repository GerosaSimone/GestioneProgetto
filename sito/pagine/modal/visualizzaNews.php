<style>
    .imgTop {
        width: 100%;
        border-top-left-radius: 7px;
        border-top-right-radius: 7px;
    }

    .scritte {
        padding-left: 25px;
        padding-right: 20px;
        margin-top: 10px;
    }

    #bordo {
        border-bottom: 1px solid rgb(200, 200, 200);
    }
</style>
<?php
require_once "../../config.php";
$id = $_GET["idNews"];
$sql = "    SELECT * FROM news WHERE id='$id'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo '  <div class="text-center">
                        <img src="../gestionale/img/uploadsNews/' . $row["foto"] . '" class="imgTop" alt="">
                    </div>
                    <div class="scritte">
                        <h1>' . $row["titolo"] . '</h1>
                    </div>
                    <div id="bordo"></div>
                    <div class="scritte">
                        <p>' . $row["descrizione"] . '</p>
                    </div>
                    <div class="text-end pb-3" style="padding-right:5%">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>';
        }
        mysqli_free_result($result);
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>






