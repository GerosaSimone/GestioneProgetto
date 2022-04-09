$(document).ready(function () {
    $(document).on('click', "#prima", function () {
        $.post("pagine/AreaTesserati/squadre.php?squadra=PrimaSquadra", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function () {
    $(document).on('click', "#articoli", function () {
        $.post("pagine/AreaShop/articoli.php", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})