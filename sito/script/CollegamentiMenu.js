$(document).ready(function() {
    $(document).on('click', "#home", function() {
        $.post("pagine/home.html", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#news", function() {
        $.post("pagine/news.html", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})



$(document).ready(function() {
    $(document).on('click', "#albo", function() {
        $.post("pagine/albo.html", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#organigramma", function() {
        $.post("pagine/organigramma.html", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });


})

$(document).ready(function() {
    $(document).on('click', "#storia", function() {
        $.post("pagine/storia.html", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})


$(document).ready(function() {
    $(document).on('click', "#prima", function() {
        $.post("pagine/prima.html", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#junores", function() {
        $.post("pagine/junores.html", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#allievi", function() {
        $.post("pagine/allievi.html", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#giovanissimi", function() {
        $.post("pagine/giovanissimi.html", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#esordienti", function() {
        $.post("pagine/esordienti.html", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#pulcini", function() {
        $.post("pagine/pulcini.html", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#piccoli", function() {
        $.post("pagine/piccoli.html", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})


$(document).ready(function() {
    $(document).on('click', "#come", function() {
        $.post("pagine/come.html", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#informazioni", function() {
        $.post("pagine/informazioni.html", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#galleria", function() {
        $.post("pagine/galleria.html", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

$(document).ready(function() {
    $(document).on('click', "#sponsor", function() {
        $.post("pagine/sponsor.html", true, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})