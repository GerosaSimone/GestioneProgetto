$(document).ready(function () {
    //HOME
    $(document).on('click', "#home", function () {
        $.post("pagine/home.php", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
    //AREA TESSERATI
    //GENERELE
    $(document).on('click', "#dirigenza", function () {
        $.post("pagine/AreaTesserati/dirigenza/dirigenza.php", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
    $(document).on('click', "#giocatori", function () {
        $.post("pagine/AreaTesserati/giocatori/giocatori.php", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
    //SQUADRE
    $(document).on('click', "#prima", function () {
        $.post("pagine/AreaTesserati/squadre/squadre.php?squadra=PrimaSquadra", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
    $(document).on('click', "#juniores", function () {
        $.post("pagine/AreaTesserati/squadre/squadre.php?squadra=Juniores", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
    $(document).on('click', "#allievi", function () {
        $.post("pagine/AreaTesserati/squadre/squadre.php?squadra=Allievi", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
    $(document).on('click', "#giovanissimi", function () {
        $.post("pagine/AreaTesserati/squadre/squadre.php?squadra=Giovanissimi", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
    $(document).on('click', "#esordienti", function () {
        $.post("pagine/AreaTesserati/squadre/squadre.php?squadra=Esordienti", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
    $(document).on('click', "#pulcini", function () {
        $.post("pagine/AreaTesserati/squadre/squadre.php?squadra=Pulcini", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
    $(document).on('click', "#piccoli", function () {
        $.post("pagine/AreaTesserati/squadre/squadre.php?squadra=PiccoliAmici", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });

    //AREA SHOP
    $(document).on('click', "#articoli", function () {
        $.post("pagine/AreaShop/articoli.php", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
    $(document).on('click', "#acquistiGiocatori", function () {
        $.post("pagine/AreaShop/acquistiGiocatori.php", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });

    //AREA FINANZIARIA
    $(document).on('click', "#bilancio", function () {
        $.post("pagine/AreaFinanziaria/bilancio.php", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });

    //AREA MAGAZZINO
    $(document).on('click', "#deposito", function () {
        $.post("pagine/AreaMagazzino/deposito.php", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
    $(document).on('click', "#acquistiSocieta", function () {
        $.post("pagine/AreaMagazzino/acquistiSocieta.php", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });

    //AREA SITO
    $(document).on('click', "#galleria", function () {
        $.post("pagine/AreaSito/galleria.php", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
    $(document).on('click', "#news", function () {
        $.post("pagine/AreaSito/news.php", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})