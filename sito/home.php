<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!--  HEADER -->
    <section class="header">
        <a href="home.php" class="logo"> Giovanile Canzese</a>

        <nav class="navbar">
            <a href="news.html">News</a>
            <a href="societa.php">Societa</a>
            <a href="squadre.php">Squadre</a>
            <a href="stadio.php">Stadio</a>
            <a href="galleria.php">Galleria</a>
            <a href="sponsor.php">Sponsor</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </section>

    <!-- HOME-->
    <section class="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide" style="background:url(img/bg1.jpg) no-repeat">
                    <div class="content">
                        <span>News</span>
                        <h3>Pagina 1</h3>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background:url(img/bg.png) no-repeat">
                    <div class="content">
                        <span>prova</span>
                        <h3>Pagina 2</h3>
                        <a href="package.php" class="btn">discover more</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background:url(img/bg.png) no-repeat">
                    <div class="content">
                        <span>prova</span>
                        <h3>Pagina 3</h3>
                        <a href="package.php" class="btn">discover more</a>
                    </div>
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>




    <section class="services">

        <h1 class="heading-title"> I NOSTRI SERVIZI</h1>

        <div class="box-container">

            <div class="box">
                <img src="img/icon1.png" alt="">
                <h3>prova</h3>
            </div>

            <div class="box">
                <img src="img/icon1.png" alt="">
                <h3>prova</h3>
            </div>

            <div class="box">
                <img src="img/icon1.png" alt="">
                <h3>prova</h3>
            </div>

            <div class="box">
                <img src="img/icon1.png" alt="">
                <h3>prova</h3>
            </div>

            <div class="box">
                <img src="img/icon1.png" alt="">
                <h3>prova</h3>
            </div>


        </div>


    </section>

    <!-- HOME TEXT-->
    <section class="home-map">

        <div class="image">
            <iframe style="max-width:80%; display:block; margin:auto; margin-bottom:15px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2779.224030129493!2d9.264436915570322!3d45.846815479107335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47841e33fb41a8db%3A0x5d7e49ca1e292000!2sCampo%20Sportivo%20S.Miro!5e0!3m2!1sit!2sit!4v1644660685152!5m2!1sit!2sit" width="800" height="600" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="content">
            <h3>Dove siamo</h3>
            <p>Canzo bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla
                bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla
                bla bla bla bla bla</p>
            <a href="about.php" class="btn">read more</a>
        </div>

    </section>

    <!-- LE NOSTRE SQUADRE-->
    <section class="home-packages">

        <h1 class="heading-title"> SQUADRE </h1>

        <div class="box-container">

            <?php
            require_once "config.php";
            $sql = "SELECT * FROM categoria LIMIT 3";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<div class='box'>
                        <div class='image'>
                            <img src='img/sf1.jpg' alt=''>
                        </div>
                        <div class='content'>
                            <h3>".$row["nome"]."</h3>
                            <p></p>
                            <a href='#' class='btn'>SCOPRI</a>
                        </div>
                    </div>";
                    }
                }
            }
            ?>

        </div>

        <div class="load-more"> <a id="squadre" href="#" class="btn">Carica tutte le squadre</a> </div>

    </section>


   



    <!-- FOOTER -->
    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>quick links</h3>
                <a href="news.php"><i class="fas fa-angle-right"></i>News</a>
                <a href="societa.php"><i class="fas fa-angle-right"></i>Societa</a>
                <a href="squadre.php"><i class="fas fa-angle-right"></i>Squadre</a>
                <a href="stadio.php"><i class="fas fa-angle-right"></i>Stadio</a>
                <a href="galleria.php"><i class="fas fa-angle-right"></i>Galleria</a>
                <a href="sponsor.php"><i class="fas fa-angle-right"></i>Sponsor</a>
            </div>

            <div class="box">
                <h3>extra</h3>
                <a href="#"> <i class="fas fa-angle-right"></i> Contattaci</a>
                <a href="#"> <i class="fas fa-angle-right"></i> About us</a>
                <a href="#"> <i class="fas fa-angle-right"></i> Privacy</a>
                <a href="#"> <i class="fas fa-angle-right"></i> Termini e condizioni</a>
            </div>

            <div class="box">
                <h3>contatti</h3>
                <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
                <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
                <a href="#"> <i class="fas fa-envelope"></i> prova@gmail.com </a>
                <a href="#"> <i class="fas fa-map"></i> Canzo, Italia - 12345 </a>
            </div>

            <div class="box">
                <h3>Seguici</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>

            </div>

        </div>

        <div class="credit"> Creato da <span>JM Mariano</span> | protetto da copyright! </div>
    </section>




    <!-- JS-->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>