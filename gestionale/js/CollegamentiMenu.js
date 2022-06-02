function menuTelefono() {
    $(document).scrollTop(0);
    if ($(window).width() < 501) {
        $("#sidebar").removeClass("active");
        $("#pagina").css("display", "block");
        stato = false
    }
}
$(document).ready(function () {
    //HOME
    $(document).on('click', "#home", function () {
        $.post("pagine/home.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    //AREA TESSERATI
    //GENERELE
    $(document).on('click', "#dirigenza", function () {
        $.post("pagine/AreaTesserati/dirigenza/dirigenza.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    $(document).on('click', "#giocatori", function () {
        $.post("pagine/AreaTesserati/giocatori/giocatori.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    //SQUADRE
    $(document).on('click', "#prima", function () {
        $.post("pagine/AreaTesserati/squadre/squadre.php?squadra=PrimaSquadra", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    $(document).on('click', "#juniores", function () {
        $.post("pagine/AreaTesserati/squadre/squadre.php?squadra=Juniores", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    $(document).on('click', "#allievi", function () {
        $.post("pagine/AreaTesserati/squadre/squadre.php?squadra=Allievi", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    $(document).on('click', "#giovanissimi", function () {
        $.post("pagine/AreaTesserati/squadre/squadre.php?squadra=Giovanissimi", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    $(document).on('click', "#esordienti", function () {
        $.post("pagine/AreaTesserati/squadre/squadre.php?squadra=Esordienti", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    $(document).on('click', "#pulcini", function () {
        $.post("pagine/AreaTesserati/squadre/squadre.php?squadra=Pulcini", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    $(document).on('click', "#piccoli", function () {
        $.post("pagine/AreaTesserati/squadre/squadre.php?squadra=PiccoliAmici", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });

    //AREA SHOP
    $(document).on('click', "#articoli", function () {
        $.post("pagine/AreaShop/articoli.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    $(document).on('click', "#acquistiGiocatori", function () {
        $.post("pagine/AreaShop/acquistiGiocatori.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    $(document).on('click', "#acquistiDirigenza", function () {
        $.post("pagine/AreaShop/acquistiDirigenza.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });

    //AREA FINANZIARIA
    $(document).on('click', "#bilancio", function () {
        $.post("pagine/AreaFinanziaria/bilancio.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    //AREA SPONSOR
    $(document).on('click', "#sponsor", function () {
        $.post("pagine/AreaSponsor/sponsor.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    //AREA REGISTRAZIONI
    $(document).on('click', "#registrazioni", function () {
        $.post("pagine/AreaRegistrazioni/registrazioni.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });

    //AREA MAGAZZINO
    $(document).on('click', "#deposito", function () {
        $.post("pagine/AreaMagazzino/deposito.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    $(document).on('click', "#acquistiSocieta", function () {
        $.post("pagine/AreaMagazzino/acquistiSocieta.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });

    //AREA SITO
    $(document).on('click', "#galleria", function () {
        $.post("pagine/AreaSito/galleria.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    $(document).on('click', "#news", function () {
        $.post("pagine/AreaSito/news.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
})