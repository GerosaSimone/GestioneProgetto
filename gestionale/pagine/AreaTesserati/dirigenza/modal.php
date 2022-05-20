<!--Aggiungi Giocatore-->
<div class="modal fade" id="addDirigente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addDirigenteLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h3 style="color:white" class="modal-title pl-3" id="addDirigenteLabel"><b>AGGIUNGI NUOVO DIRIGENTE</b></h3>
                <button style="color:white" type="button" class="close" aria-label="Close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="pagine/AreaTesserati/dirigenza/addDirigente.php" method="post" enctype="multipart/form-data">
                <div class="modal-body" id="modalAggiungi">
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-primary" value="Salva">
                </div>
            </form>
        </div>
    </div>
</div>
<!--Elimina-->
<div class="modal fade" id="elimina" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h3 style="color:white" class="modal-title pl-3" id="eliminaLabel"><b>ELIMINA DIRIGENTE</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="pagine/AreaTesserati/delete.php" method="post">
                <div class="modal-body">
                    Sei sicuro di voler eliminare definitivamente il dirigente?
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
<!--Modifica-->
<div class="modal fade" id="modifica" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modificaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h3 style="color:white" class="modal-title pl-3" id="modificaLabel"><b>MODIFICA DIRIGENTE</b></h3>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal" style="color:white"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="pagine/AreaTesserati/dirigenza/editDirigente.php" method="post" enctype="multipart/form-data">
                <div class="modal-body" id="modalModifica">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn btn-success" value="Salva">
                </div>
            </form>
        </div>
    </div>
</div>
<!--Visualizza-->
<div class="modal fade" id="visualizza" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="visualizzaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(33, 164, 245);">
                <h3 style="color:white" class="modal-title pl-3" id="visualizzaLabel"><b>VISUALIZZA DIRIGENTE</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalVisualizza">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>