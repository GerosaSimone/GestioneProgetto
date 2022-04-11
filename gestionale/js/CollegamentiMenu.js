$(document).ready(function () {
    $(document).on('click', "#prima", function () {
        var a = '<div class="embed-responsive embed-responsive-16by9">' +
            '<iframe class="embed-responsive-item" src="pagine/AreaTesserati/squadre.php?squadra=PrimaSquadra" allowfullscreen></iframe>' +
            '</div>';
        $("#pagina").html(a);
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

$(document).ready(function () {
    $(document).on('click', "#juniores", function () {
        $.post("pagine/AreaTesserati/squadre.php?squadra=Juniores", true, function (data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})