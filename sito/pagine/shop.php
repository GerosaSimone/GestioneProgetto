<style>
    .card {
        border-radius: 25px;
    }
    .immagine{
        border-radius: 15px;
        width: 14.5vw;
        height: 12vw;
        object-fit: cover;
    }
    .immagineMobile{
        border-radius: 30px;
        width: 44.5vw;
        height: 37vw;
        object-fit: cover;
    }
</style>
<?php
require_once "../config.php";
?>

<body>
    <div class="page-header">
        <strong class="testoHeader">SHOP</strong>
    </div>
    <div id="contenuto" class="container mb-5">
        <div class="row">
            <?php
            $sql = "    SELECT *
                        FROM prodotto
                        ORDER BY id DESC";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '  <div class="col-sm-6 col-lg-3 mt-5">
                                    <div class="card shadow p-1 mb-1 bg-body" style="width: 18rem;">
                                        <img src="../gestionale/img/uploadsProdotti/' . $row["foto"] . '" class="card-img-top mt-3 px-2 temp" alt="...">
                                        <div class="card-body">
                                            <p class="card-text fs-5 fw-bold text-center">' . $row["nome"] . '</p>';
                        if ($row["tipoTaglie"] == "0") {
                            echo '  <div class="row text-center" style="padding-left:0 !important">
                                        <div class="btn-group" role="group" style="padding-left:0 !important">
                                            <button type="button" class="btn btn-outline-secondary" disabled>XXXS</button>
                                            <button type="button" class="btn btn-outline-secondary" disabled>XXS</button>
                                            <button type="button" class="btn btn-outline-secondary" disabled>XS</button>
                                            <button type="button" class="btn btn-outline-secondary" disabled>S</button>
                                            <button type="button" class="btn btn-outline-secondary" disabled>M</button>
                                            <button type="button" class="btn btn-outline-secondary" disabled>L</button>
                                        </div>
                                    </div>';
                        } else {
                            echo '  <div class="row text-center">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-outline-secondary" disabled>S</button>
                                            <button type="button" class="btn btn-outline-secondary" disabled>M</button>
                                            <button type="button" class="btn btn-outline-secondary" disabled>L</button>
                                            <button type="button" class="btn btn-outline-secondary" disabled>XL</button>
                                            <button type="button" class="btn btn-outline-secondary" disabled>XXL</button>
                                        </div>
                                    </div>';
                        }
                        echo '
                                            <div class="mt-2 text-center">
                                                <button type="button" class="btn btn-primary px-3" disabled> ' . $row["costoUnitario"] . ' €</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                    }
                    mysqli_free_result($result);
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
            ?>
        </div>
    </div>
    <script>
        if ($(window).width() < 1000) {
            $("#contenuto").css("max-width", "100vw");
            $(".temp").removeClass("immagine");
            $(".temp").addClass("immagineMobile");
        } else {
            $("#contenuto").css("max-width", "70vw");
            $(".temp").removeClass("immagineMobile");
            $(".temp").addClass("immagine");
        }
    </script>
</body>