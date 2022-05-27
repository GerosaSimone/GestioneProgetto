<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
?>
<!doctype html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <title>U.S. Giovanile Canzese</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/table.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
    <!--CARICAMENTO!-->
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <!--CONTENUTO!-->
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
        </nav>
        <div id="content">
            <button type="button" id="sidebarCollapse" class="btn btn-primary m-3">
                <i class="fa fa-bars"></i>
            </button>
            <div id="pagina" style="margin-top:-3%">
            </div>
        </div>
    </div>
    <!--SCRIPT!-->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/CollegamentiMenu.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut(1000);
        });
        $(function() {
            $("#sidebar").load("menu.php");
        });
        <?php if (isset($_SESSION['ultimaPage']))
            $c = $_SESSION['ultimaPage'];
        else
            $c = "eccezione" ?>
        var a = "<?php echo $c; ?>";
        if (a == "PrimaSquadra" || a == "Juniores" || a == "Allievi" || a == "Giovanissimi" || a == "Esordienti" || a == "Pulcini" || a == "PiccoliAmici")
            $("#pagina").load("pagine/AreaTesserati/squadre/squadre.php?squadra=" + a);
        else if (a == "giocatori") {
            $("#pagina").load("pagine/AreaTesserati/giocatori/giocatori.php");
        } else if (a == "dirigenza") {
            $("#pagina").load("pagine/AreaTesserati/dirigenza/dirigenza.php");
        } else if (a == "deposito") {
            $("#pagina").load("pagine/AreaMagazzino/deposito.php");
        } else if (a == "acquistiSocieta") {
            $("#pagina").load("pagine/AreaMagazzino/acquistiSocieta.php");
        } else if (a == "materiale") {
            $("#pagina").load("pagine/AreaMagazzino/materiale.php");
        } else if (a == "shop") {
            $("#pagina").load("pagine/AreaShop/articoli.php");
        } else if (a == "acquistiGiocatori") {
            $("#pagina").load("pagine/AreaShop/acquistiGiocatori.php");
        } else if (a == "acquistiDirigenza") {
            $("#pagina").load("pagine/AreaShop/acquistiDirigenza.php");
        } else if (a == "galleria") {
            $("#pagina").load("pagine/AreaSito/galleria.php");
        } else if (a == "news") {
            $("#pagina").load("pagine/AreaSito/news.php");
        } else if (a == "finanziaria") {
            $("#pagina").load("pagine/AreaFinanziaria/bilancio.php");
        } else if (a == "sponsor") {
            $("#pagina").load("pagine/AreaSponsor/sponsor.php");
        } else if (a == "registrazioni") {
            $("#pagina").load("pagine/AreaRegistrazioni/registrazioni.php");
        } else if (a == "home") {
            $("#pagina").load("pagine/home.php");
        } else {
            $("#pagina").load("pagine/home.php");
        }
    </script>
</body>

</html>