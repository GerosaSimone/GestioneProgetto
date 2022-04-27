<!--Elimina-->
<div class="modal fade" id="elimina" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminaLabel">Elimina Giocatore</h5>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="pagine/AreaShop/deleteProdotto.php" method="post">
                <div class="modal-body">
                    Sei sicuro di voler eliminare definitivamente il giocatore?
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