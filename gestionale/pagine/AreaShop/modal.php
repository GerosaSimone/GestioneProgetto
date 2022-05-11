<!--Elimina-->
<div class="modal fade" id="elimina" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminaLabel">Elimina Prodotto</h5>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="pagine/AreaShop/deleteProdotto.php" method="post">
                <div class="modal-body">
                    Sei sicuro di voler eliminare definitivamente il prodotto?
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
<!--Aggiungi Giocatore-->
<div class="modal fade" id="addGiocatore" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addGiocatoreLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h3 style="color:white" class="modal-title pl-4" id="addGiocatoreLabel"><b>AGGIUNGI NUOVO GIOCATORE</b></h3>
                <button style="color:white" type="button" class="close" aria-label="Close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="pagine/AreaTesserati/giocatori/addGiocatore.php" method="post" enctype="multipart/form-data">
                <div class="modal-body" id="modalAggiungi">
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-primary" value="Salva">
                </div>
            </form>
        </div>
    </div>
</div>
<!--Modifica-->
<div class="modal fade" id="modifica" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modificaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h3 style="color:white" class="modal-title pl-4" id="modificaLabel"><b>MODIFICA GIOCATORE</b></h3>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal" style="color:white"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="pagine/AreaTesserati/giocatori/editGiocatore.php" method="post" enctype="multipart/form-data">
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