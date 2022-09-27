<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?php
require_once "./config.php";
$nomiSquadre = [];
$idSquadre = [];
$sql = "SELECT id,nome
        FROM categoria
        ORDER BY id";
$result = mysqli_query($link, $sql);
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($nomiSquadre, $row['nome']);
            array_push($idSquadre, $row['id']);
        }
    }
}
?>
<script>
    function menuTelefono() {
        $(document).scrollTop(0);
        if ($(window).width() < 501) {
            $("#sidebar").removeClass("active");
            $("#pagina").css("display", "block");
            stato = false
        }
    }
    $(document).ready(function() {
        //HOME
        $(document).on('click', "#home", function() {
            $.post("pagine/home.php", true, function(data, status) {
                $("#pagina").html(data);
                $(".loader-wrapper").fadeIn(0);
                $(".loader-wrapper").fadeOut(1000);
            });
            menuTelefono();
        });
        //AREA TESSERATI
        //GENERELE
        $(document).on('click', "#dirigenza", function() {
            $.post("pagine/AreaTesserati/dirigenza/dirigenza.php", true, function(data, status) {
                $("#pagina").html(data);
                $(".loader-wrapper").fadeIn(0);
                $(".loader-wrapper").fadeOut(1000);
            });
            menuTelefono();
        });
        $(document).on('click', "#giocatori", function() {
            $.post("pagine/AreaTesserati/giocatori/giocatori.php", true, function(data, status) {
                $("#pagina").html(data);
                $(".loader-wrapper").fadeIn(0);
                $(".loader-wrapper").fadeOut(1000);
            });
            menuTelefono();
        });
        $(document).on('click', "#categorie", function() {
            $.post("pagine/AreaTesserati/categorie/categorie.php", true, function(data, status) {
                $("#pagina").html(data);
                $(".loader-wrapper").fadeIn(0);
                $(".loader-wrapper").fadeOut(1000);
            });
            menuTelefono();
        });
        //SQUADRE     
        <?php
        for ($i = 0; $i < count($nomiSquadre); $i++) {
            echo "$(document).on('click', '#" . $idSquadre[$i] . "', function() {
                    $.post('pagine/AreaTesserati/squadre/squadre.php?squadra=" . $nomiSquadre[$i] . "', true, function(data, status) {
                        $('#pagina').html(data);
                        $('.loader-wrapper').fadeIn(0);
                        $('.loader-wrapper').fadeOut(1000);
                    });
                    menuTelefono();
                });";
        } ?>
        //AREA SHOP
        $(document).on('click', "#articoli", function() {
            $.post("pagine/AreaShop/articoli.php", true, function(data, status) {
                $("#pagina").html(data);
                $(".loader-wrapper").fadeIn(0);
                $(".loader-wrapper").fadeOut(1000);
            });
            menuTelefono();
        });
        $(document).on('click', "#acquistiGiocatori", function() {
            $.post("pagine/AreaShop/acquistiGiocatori.php", true, function(data, status) {
                $("#pagina").html(data);
                $(".loader-wrapper").fadeIn(0);
                $(".loader-wrapper").fadeOut(1000);
            });
            menuTelefono();
        });
        $(document).on('click', "#acquistiDirigenza", function() {
            $.post("pagine/AreaShop/acquistiDirigenza.php", true, function(data, status) {
                $("#pagina").html(data);
                $(".loader-wrapper").fadeIn(0);
                $(".loader-wrapper").fadeOut(1000);
            });
            menuTelefono();
        });
        //AREA FINANZIARIA
        $(document).on('click', "#bilancio", function() {
            $.post("pagine/AreaFinanziaria/bilancio.php", true, function(data, status) {
                $("#pagina").html(data);
                $(".loader-wrapper").fadeIn(0);
                $(".loader-wrapper").fadeOut(1000);
            });
            menuTelefono();
        });
        //AREA SPONSOR
        $(document).on('click', "#sponsor", function() {
            $.post("pagine/AreaSponsor/sponsor.php", true, function(data, status) {
                $("#pagina").html(data);
                $(".loader-wrapper").fadeIn(0);
                $(".loader-wrapper").fadeOut(1000);
            });
            menuTelefono();
        });
        //AREA REGISTRAZIONI
        $(document).on('click', "#registrazioni", function() {
            $.post("pagine/AreaRegistrazioni/registrazioni.php", true, function(data, status) {
                $("#pagina").html(data);
                $(".loader-wrapper").fadeIn(0);
                $(".loader-wrapper").fadeOut(1000);
            });
            menuTelefono();
        });

        //AREA MAGAZZINO
        $(document).on('click', "#deposito", function() {
            $.post("pagine/AreaMagazzino/deposito.php", true, function(data, status) {
                $("#pagina").html(data);
                $(".loader-wrapper").fadeIn(0);
                $(".loader-wrapper").fadeOut(1000);
            });
            menuTelefono();
        });
        $(document).on('click', "#acquistiSocieta", function() {
            $.post("pagine/AreaMagazzino/acquistiSocieta.php", true, function(data, status) {
                $("#pagina").html(data);
                $(".loader-wrapper").fadeIn(0);
                $(".loader-wrapper").fadeOut(1000);
            });
            menuTelefono();
        });

        //AREA SITO
        $(document).on('click', "#galleria", function() {
            $.post("pagine/AreaSito/galleria.php", true, function(data, status) {
                $("#pagina").html(data);
                $(".loader-wrapper").fadeIn(0);
                $(".loader-wrapper").fadeOut(1000);
            });
            menuTelefono();
        });
        $(document).on('click', "#news", function() {
            $.post("pagine/AreaSito/news.php", true, function(data, status) {
                $("#pagina").html(data);
                $(".loader-wrapper").fadeIn(0);
                $(".loader-wrapper").fadeOut(1000);
            });
            menuTelefono();
        });
        //AREA IMPOSTAZIONI
        $(document).on('click', "#settings", function() {
            $.post("pagine/impostazioni/settings.php", true, function(data, status) {
                $("#pagina").html(data);
                $(".loader-wrapper").fadeIn(0);
                $(".loader-wrapper").fadeOut(1000);
            });
            menuTelefono();
        });
    })
</script>