<!--Aggiungi Galleria-->
<div class="modal fade ml-5" id="addGalleria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addGalleriaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h3 class="modal-title text-light" id="addGalleriaLabel">Aggiungi nuova immagine alla Galleria</h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="pagine/AreaSito/addGalleria.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mt-2" style="max-height:45%">
                        <label>Foto</label>
                        <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" onchange="readFoto(this);" style="margin-left:-2%" required>
                        <img id="fotoGalleria" class="mt-3" src="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Salva">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function readFoto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#fotoGalleria')
                    .attr('src', e.target.result);
                $('#fotoGalleria')
                    .attr('style', "width: 400px; height: 480px; object-fit: cover;");
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>