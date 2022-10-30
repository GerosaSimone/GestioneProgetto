<style>
    .sponsor {
        opacity: 0.9;
    }

    .sponsor:hover {
        opacity: 1.0;
    }

    .img-sponsor {
        transition: transform 2s ease, opacity .5s ease-out;
        height: 13vw;
    }

    .ultime-foto {
        width: 32%;
        height: 80px;
        object-fit: cover
    }

    .ultime-foto-mobile {
        width: 32%;
        height: 140px;
        object-fit: cover
    }

    .img-news {
        height: 17vw !important;
        object-fit: cover;
    }

    .img-news-short {
        height: 13vw !important;
        object-fit: cover;
    }
</style>
<?php
require_once "../config.php";
?>

<body>
    <div>
        <?php include 'modal/modal.php'; ?>
    </div>
    <!--Immagini che scorrono-->
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000" style="transition: transform 2s ease, opacity .5s ease-out">
                <img src="./img/campo.jpg" alt="" style="width:100vw; height:25vw; object-fit:cover; filter: brightness(50%);" class="fotoCarousel">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Campo della Giovanile Canzese</h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000" style="transition: transform 2s ease, opacity .5s ease-out">
                <img src="./img/eventi.jpg" alt="" style="width:100vw; height:25vw; object-fit:cover;filter: brightness(50%);" class="fotoCarousel">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Ultimi eventi</h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000" style="transition: transform 2s ease, opacity .5s ease-out">
                <img src="./img/galleria.jpg" alt="" style="width:100vw; height:25vw; object-fit:cover;filter: brightness(50%);" class="fotoCarousel">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Foto della galleria</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--Contenuto pagina-->
    <div id="contenuto" class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                <?php
                $sql = "    SELECT *
                            FROM news
                            ORDER BY id DESC LIMIT 1";
                if ($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            if (strlen($row['descrizione']) > 143)
                                $descrizione = substr($row['descrizione'], 0, 140) . '...';
                            else
                                $descrizione = $row['descrizione'];
                            echo '  <div class="card mb-4">
                                        <a href="#!"><img class="card-img-top img-news" src=".././gestionale/img/uploadsNews/' . $row['foto'] . '" alt="..."/></a>
                                        <div class="card-body">                                            
                                            <h2 class="card-title">' . $row['titolo'] . '</h2>                                            
                                            <p class="card-text">' . $descrizione . '</p>
                                            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#visualizza" data-bs-whatever="' . $row["id"] . '">Leggi di più →</button>
                                        </div>
                                    </div>';
                        }
                        mysqli_free_result($result);
                    }
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
                ?>
                <div class="row">
                    <?php
                    $sql = "    SELECT *
                                FROM news
                                ORDER BY id DESC LIMIT 4";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                if (strlen($row['descrizione']) > 143)
                                    $descrizione = substr($row['descrizione'], 0, 140) . '...';
                                else
                                    $descrizione = $row['descrizione'];
                                echo '  <div class="col-6">
                                            <div class="card mb-4" style="min-height:22vw" style="transition: width 2s, height 4s;">
                                                <a href="#!"><img class="card-img-top img-news-short" src=".././gestionale/img/uploadsNews/' . $row['foto'] . '" alt="..." /></a>
                                                <div class="card-body">                                                    
                                                    <h2 class="card-title h4">' . $row['titolo'] . '</h2>
                                                    <p class="card-text">' . $descrizione . '</p>
                                                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#visualizza" data-bs-whatever="' . $row["id"] . '">Leggi di più →</button>
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
            <!-- Side widgets-->
            <div class="col-4" id="laterali">
                <!-- Categories-->
                <div class="card mb-4">
                    <div class="card-header">Squadre</div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $sql = "    SELECT *
                                        FROM categoria
                                        ORDER BY id DESC";
                            if ($result = mysqli_query($link, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '  <div class="col-6 mb-1">
                                                    <img src="./img/ball.png" alt="" style="width:20px;height:auto">&nbsp&nbsp&nbsp <b class="text-primary">' . $row['nome'] . '</b>
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
                </div>
                <!-- Gallery-->
                <div class="card mb-4">
                    <div class="card-header">Le ultime foto... </div>
                    <div class="card-body">
                        <a href="#" class="galleria"> <img src="./img/campo.jpg" class="rounded text-center ultFoto" alt="..."></a>
                        <a href="#" class="galleria"> <img src="./img/eventi.jpg" class="rounded text-center ultFoto" alt="..."></a>
                        <a href="#" class="galleria"> <img src="./img/galleria.jpg" class="rounded text-center ultFoto" alt="..."></a>
                    </div>
                    <div class="card-footer text-center"><a href="#" class="btn btn-primary galleria">Apri la galleria</a></div>
                </div>
                <!-- Sponsor-->
                <div class="card mb-4 mt-10 ">
                    <div class="card-header">I nostri sponsor </div>
                    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active img-sponsor text-center" data-bs-interval="4000">
                                <a href="#" class="sponsor"><img src="./img/sponsor/Caffe la corte.jpeg" class="rounded text-center sponsor" alt="..." style="width:100%"></a>
                            </div>
                            <div class="carousel-item img-sponsor text-center" data-bs-interval="4000">
                                <a href="#" class="sponsor"><img src="./img/sponsor/CRA.jpeg" class="rounded text-center sponsor" alt="..." style="width:100%"></a>
                            </div>
                            <div class="carousel-item img-sponsor text-center" data-bs-interval="4000">
                                <a href="#" class="sponsor"><img src="./img/sponsor/ETA.jpg" class="rounded text-center sponsor" alt="..." style="width:100%"></a>
                            </div>
                            <div class="carousel-item active img-sponsor text-center" data-bs-interval="4000">
                                <a href="#" class="sponsor"><img src="./img/sponsor/Evoluzione Ceramica.jpeg" class="rounded text-center sponsor" alt="..." style="width:100%"></a>
                            </div>
                            <div class="carousel-item active img-sponsor text-center" data-bs-interval="4000">
                                <a href="#" class="sponsor"><img src="./img/sponsor/meroni edilizia.jpg" class="rounded text-center sponsor" alt="..." style="width:100%"></a>
                            </div>
                            <div class="carousel-item active img-sponsor text-center" data-bs-interval="4000">
                                <a href="#" class="sponsor"><img src="./img/sponsor/Previus Burger.jpeg" class="rounded text-center sponsor" alt="..." style="width:100%"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    var visualizza = document.getElementById('visualizza')
    visualizza.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var id = button.getAttribute('data-bs-whatever')
        $.post("pagine/modal/visualizzaNews.php?idNews=" + id, true, function(data, status) {
            $("#modalVisualizza").html(data);
        });
    });
    $(document).ready(function() {
        if ($(window).width() < 1000) {
            $(".fotoCarousel").css("height", "60vw");
            $("#laterali").removeClass("col-4");
            $("#laterali").addClass("col-12");
            $("#contenuto").css("max-width", "90vw");
            $(".card-img-top").css("height", "20vw");
            $(".card-img-top").css("object-fit", "cover");
            $(".ultFoto").removeClass("ultime-foto");
            $(".ultFoto").addClass("ultime-foto-mobile");
        } else {
            $(".card-img-top").css("height", "20vw");
            $(".card-img-top").css("object-fit", "cover");
            $("#contenuto").css("max-width", "70vw");
            $(".ultFoto").removeClass("ultime-foto-mobile");
            $(".ultFoto").addClass("ultime-foto");
        }
    });
</script>