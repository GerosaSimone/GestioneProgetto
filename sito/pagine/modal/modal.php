<!--Visualizza-->
<div class="modal fade" id="visualizza" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewVisualizzaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="modalVisualizza" style="padding:0 !important">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        if ($(window).width() < 1000) {
            $(".modal-dialog").css("max-width", "86%");
        }
    });
</script>