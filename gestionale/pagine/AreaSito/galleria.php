<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <style>
        .photo-gallery {
            color: #313437;
            background-color: #fff;
        }

        .photo-gallery p {
            color: #7d8285;
        }

        .photo-gallery h2 {
            font-weight: bold;
            margin-bottom: 40px;
            padding-top: 40px;
            color: inherit;
        }

        @media (max-width:767px) {
            .photo-gallery h2 {
                margin-bottom: 25px;
                padding-top: 25px;
                font-size: 24px;
            }
        }

        .photo-gallery .intro {
            font-size: 16px;
            max-width: 600px;
            margin: 0 auto 40px;
        }

        .photo-gallery .intro p {
            margin-bottom: 0;
        }

        .photo-gallery .photos {
            padding-bottom: 20px;
        }

        .photo-gallery .item {
            padding-bottom: 30px;
        }
    </style>
</head>

<body>

    <div class="photo-gallery">
        <div>
            <h2 class="text-center">Galleria US. Giovanile Canzese</h2>
            <p class="text-center">
                <button type='button' class='btn btn-outline-secondary btn-lg' data-bs-toggle='modal' data-bs-target='#addGalleria'>
                    Add Immagine
                </button>
            </p>
        </div>
        <div class="row photos">
            <?php
            require "../../config.php";
            $sql = "  SELECT galleria.foto FROM galleria";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $foto = $row['foto'];
                        echo '  <div class="col-3 item">
                                    <a href="img/uploadsGalleria/' . $foto . '" data-lightbox="photos">
                                        <img class="img-fluid" src="img/uploadsGalleria/' . $foto . ' " style="height:350px; width:auto; max-height:350px; object-fit: cover;">
                                    </a>
                                </div>';
                    }
                } else {
                    echo '<h5 class="card-title">Nessuna immagine presente nella galleria</h5>';
                }
            }
            ?>
        </div>

    </div>
    <div>
        <?php include 'modal.php'; ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>


</html>