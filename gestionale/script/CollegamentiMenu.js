$(document).ready(function() {
    $(document).on('click', "#giocatori", function() {
        $.post("pagine/visualizza.php", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#piccoli", function() {
        $.post("pagine/visualizza.php?squadra=Piccoli", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#pulcini", function() {
        $.post("pagine/visualizza.php?squadra=Pulcini", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#giovanissimi", function() {
        $.post("pagine/visualizza.php?squadra=Giovanissimi", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#esordienti", function() {
        $.post("pagine/visualizza.php?squadra=Esordienti", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#allievi", function() {
        $.post("pagine/visualizza.php?squadra=Allievi", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#juniores", function() {
        $.post("pagine/visualizza.php?squadra=Juniores", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})
$(document).ready(function() {
    $(document).on('click', "#prima", function() {
        $.post("pagine/visualizza.php?squadra=Prima Squadra", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#shop", function() {
        $.post("pagine/shop.php", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})
$(document).ready(function() {
    $(document).on('click', "#volantini", function() {
        $.post("pagine/volantini.php", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})
$(document).ready(function() {
    $(document).on('click', "#galleria", function() {
        $.post("pagine/galleria.php", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})
