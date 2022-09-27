<!--Elimina-->
<div class="modal fade" id="elimina" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h3 style="color:white" class="modal-title" id="eliminaLabel"><b>ELIMINA UTENTE</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="pagine/AreaRegistrazioni/funzioni/delete.php" method="post">
                <div class="modal-body">
                    Sei sicuro di voler eliminare definitivamente l'utente?
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
<!--Aggiungi-->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title text-light" id="addLabel"><b>AGGIUNGI UTENTE</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="pagine/AreaRegistrazioni/funzioni/add.php" method="post" enctype="multipart/form-data">
                <div class="modal-body" id="modalAggiungi">
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Salva" style="background-color:#007bff !important">
                </div>
            </form>
        </div>
    </div>
</div>