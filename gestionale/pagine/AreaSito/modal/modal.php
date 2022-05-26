<!--Aggiungi Galleria-->
<div class="modal fade ml-5" id="addGalleria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addGalleriaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h3 class="modal-title text-light" id="addGalleriaLabel">AGGIUNGI IMMAGINE</h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="pagine/AreaSito/funzioni/addGalleria.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mt-2" style="max-height:45%">
                        <label class="text-dark font-weight-bold">Foto</label>
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
<!--Aggiungi News-->
<div class="modal fade ml-5" id="addNews" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addNewsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title text-light" id="addNewsLabel"><b>AGGIUNGI NEWS</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="pagine/AreaSito/funzioni/addNews.php" method="post" enctype="multipart/form-data">
                <div class="modal-body" id="modalAggiungiNews">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Salva" style="background-color:#007bff !important">
                </div>
            </form>
        </div>
    </div>
</div>
<!--Elimina Galleria-->
<div class="modal fade" id="elimina" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h3 style="color:white" class="modal-title pl-3" id="eliminaLabel"><b>ELIMINA FOTO</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="pagine/AreaSito/funzioni/deleteGalleria.php" method="post">
                <div class="modal-body">
                    Sei sicuro di voler eliminare definitivamente la foto?
                    <input type="text" name="idElimina" id="idElimina" hidden="true">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-danger" value="Elimina" data-bs-dismiss="modal">
                </div>
            </form>
        </div>
    </div>
</div>
<!--Elimina News-->
<div class="modal fade" id="eliminaNews" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h3 style="color:white" class="modal-title pl-3" id="eliminaLabel"><b>ELIMINA NEWS</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="pagine/AreaSito/funzioni/deleteNews.php" method="post">
                <div class="modal-body">
                    Sei sicuro di voler eliminare definitivamente la news?
                    <input type="text" name="idEliminaNews" id="idEliminaNews" hidden="true">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-danger" value="Elimina" data-bs-dismiss="modal">
                </div>
            </form>
        </div>
    </div>
</div>
<!--Visualizza news-->
<div class="modal fade" id="visualizzaNews" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 style="color:white" class="modal-title " id="eliminaLabel"><b>VISUALIZZA NEWS</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" id="modalVisualizzaNews">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

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
                    .attr('style', "width: 470px; height: auto; object-fit: cover;");
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>