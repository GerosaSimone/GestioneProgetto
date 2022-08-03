window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        //PICCOLO
        document.getElementById("logo").style.display = "none";
        const boxes = document.querySelectorAll('.nav-link');
        boxes.forEach(box => {
            box.classList.remove('fs-5');
            box.classList.add('fs-6');
        });
        document.getElementById("container-nav").style.maxWidth = "69vw";
        document.getElementById("brand").style.fontSize = "1.25rem";
    } else {
        //GRANDE
        document.getElementById("logo").style.display = "block";
        const boxes = document.querySelectorAll('.nav-link');
        boxes.forEach(box => {
            box.classList.remove('fs-6');
            box.classList.add('fs-5');
        });
        document.getElementById("container-nav").style.maxWidth = "80vw";
        document.getElementById("brand").style.fontSize = "1.95rem";
        document.getElementById("pagina").style.marginTop = "9em";
    }
}
$(document).ready(function () {
    $("#pagina").load("pagine/shop.php");
    //HOME
    $(document).on('click', ".home", function () {
        $.post("pagine/home.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    //NEWS
    $(document).on('click', "#news", function () {
        $.post("pagine/news.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    //SHOP
    $(document).on('click', "#shop", function () {
        $.post("pagine/shop.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    //GALLERIA
    $(document).on('click', "#galleria", function () {
        $.post("pagine/galleria.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    //SQUADRE
    $(document).on('click', "#squadre", function () {
        $.post("pagine/squadre.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    //SPONSOR
    $(document).on('click', "#sponsor", function () {
        $.post("pagine/sponsor.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
    //CONTATTI
    $(document).on('click', "#contatti", function () {
        $.post("pagine/contatti.php", true, function (data, status) {
            $("#pagina").html(data);
            $(".loader-wrapper").fadeIn(0);
            $(".loader-wrapper").fadeOut(1000);
        });
        menuTelefono();
    });
});