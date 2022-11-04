<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>U.S. Giovanile Canzese</title>
    <link rel="icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="navbar">
        <div class="container" id="container-nav" style="max-width:80vw">
            <a class="navbar-brand home" href="#!" id="brand" style="font-size:1.95rem">U.S. Giovanile Canzese
            </a>
            <div style="max-width:7em; margin-left:20vw; " id="divLogoHeader">
                <img src="./img/logo.png" class="img-fluid home" alt="..." id="logo" href="#!">
            </div>
            <button id="navbarSupported" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link fs-5 home" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link fs-5" href="#" id="news">News</a></li>
                    <li class="nav-item"><a class="nav-link fs-5" href="#" id="shop">Shop</a></li>
                    <li class="nav-item"><a class="nav-link fs-5 galleria" href="#">Galleria</a></li>
                    <li class="nav-item"><a class="nav-link fs-5 sponsor" href="#">Sponsor</a></li>
                    <li class="nav-item"><a class="nav-link fs-5" href="#" id="contatti">Contatti</a></li>
                    <li class="nav-item" id="trattino"><a class="nav-link fs-5">&nbsp&nbsp&nbsp|&nbsp&nbsp</a></li>
                    <li class="nav-item"><a class="nav-link fs-5" href="../gestionale/">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- CONTENUTO-->
    <div class="container" id="pagina" style="margin-top:9em; padding-left:0 !important; padding-right:0 !important; max-width:100vw">
    </div>
    <!-- FOOTER-->
    <footer class="pb-3 pt-3 bg-dark" id="footer">
        <div class="container" id="containerFooter">
            <div class="row" style="margin-right:0px !important">
                <div class="col-4" id="testoFooter">
                    <p></p>
                    <p class="text-light  pt-3"><strong>Telefono:</strong> <br id="capo">+39 000 000 0000</p>
                    <p class="text-light"><strong> Mail:</strong> usgiovanilecanzese@gmail.com</p>
                </div>
                <div class="col-4 text-center"> <img id="logoFooter" src="./img/logo.png" alt="" style="width:26%"></div>
                <div class="col-3 text-center hstack">
                    <br>
                    <div style="margin-right:2vw"><a href="https://www.instagram.com/giovanilecanzese/?hl=it" target="_blank"><i class="bi bi-instagram text-light h1"></i></a></div>
                    <div><a href="https://it-it.facebook.com/giovanilecanzese/" target="_blank"><i class="bi bi-facebook text-light h1"></i></a></div>
                </div>
            </div>
            <p class="m-0 text-center text-muted pt-4">Copyright &copy; U.S. Giovanile Canzese</p>
        </div>
    </footer>

    <!-- SCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./script/navbar.js"></script>
    <script>
        $(document).ready(function() {
            if ($(window).width() < 1000) {
                $("#containerFooter").removeClass("container");
                $("#testoFooter").css("padding-left", "5%")
                $("#logoFooter").css("width", "40%")
                $("#logoFooter").css("padding-top", "10%")
                $("#container-nav").css("max-width", "90vw");
                $("#divLogoHeader").css("display", "none");
                $("#capo").css("display", "block");
                $("#trattino").css("display", "none");
                $("#pagina").css("margin-top", "4.6em");
                $(".footer").css("width", "100vw");
            } else {
                $("#capo").css("display", "none");
                $(".footer").css("width", "99.4vw");
            }
        });
    </script>
</body>

</html>