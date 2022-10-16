<style>
    .foto {
        height: 10vw;
        width: 16vw;
        object-fit: cover;
    }

    .foto-mobile {
        height: 26vw;
        width: 37vw;
        object-fit: cover;
    }

    .item {
        padding: 1em;
        text-align: center;
    }
</style>
<?php
require_once "../config.php";
?>

<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="page-header">
        <strong class="testoHeader">GALLERIA</strong>
    </div>
    <div id="contenuto" class="container py-4">
        <div class="row">
            <?php
            $sql = "    SELECT *
                            FROM galleria
                            ORDER BY id DESC";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<div class="col-lg-3 col-sm-6 item"><a href="../gestionale/img/uploadsGalleria/' . $row['foto'] . '" data-lightbox="photos"><img class="img-fluid temp foto" src="../gestionale/img/uploadsGalleria/' . $row['foto'] . '"></a></div>';
                    }
                    mysqli_free_result($result);
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
            ?>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
<script>
    if ($(window).width() < 1000) {
        $(".temp").removeClass("foto");
        $(".temp").addClass("foto-mobile");
        $("#contenuto").css("max-width", "100vw");
    } else {
        $(".temp").removeClass("foto-mobile");
        $(".temp").addClass("foto");
        $("#contenuto").css("max-width", "70vw");
    }
</script>