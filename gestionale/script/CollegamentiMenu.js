
$(document).ready(function() {
    $(document).on('click', "#prima", function() {
        $.post("pagine/visualizza.php", { squadra: "Prima Squadra" }, function(data, status) {
            $("#pagina").html(data);
        });
        $(document).scrollTop(0);
    });
})

