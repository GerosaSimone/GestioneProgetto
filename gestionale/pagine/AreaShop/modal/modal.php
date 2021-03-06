<!--Aggiungi Prodotto-->
<div class="modal fade" id="addProdotto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addGiocatoreLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 style="color:white" class="modal-title " id="addGiocatoreLabel"><b>AGGIUNGI NUOVO PRODOTTO</b></h3>
                <button style="color:white" type="button" class="close" aria-label="Close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="pagine/AreaShop/funzioni/addProdotto.php" method="post" enctype="multipart/form-data">
                <div class="modal-body" id="modalAggiungi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Salva">
                </div>
            </form>
        </div>
    </div>
</div>
<!--Modifica-->
<div class="modal fade" id="modificaProdotto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modificaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h3 style="color:white" class="modal-title" id="modificaLabel"><b>MODIFICA PRODOTTO</b></h3>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal" style="color:white"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="pagine/AreaShop/funzioni/editProdotto.php" method="post" enctype="multipart/form-data">
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
<!--Acquista-->
<div class="modal fade" id="acquistaProdotto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="acquistaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 style="color:white" class="modal-title" id="acquistaLabel"><b>ACQUISTA PRODOTTO</b></h3>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal" style="color:white"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="pagine/AreaShop/funzioni/buyProdotto.php" method="post" enctype="multipart/form-data">
                <div class="modal-body ui-front" id="modalAcquista">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="azzeraComplete()">Close</button>
                    <input type="submit" name="submit" id="btnSalva" class="btn btn-primary" value="Acquista" disabled>
                </div>
            </form>
        </div>
    </div>
</div>
<!--visualizza-->
<div class="modal fade" id="visualizzaArticoli" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 style="color:white" class="modal-title " id="eliminaLabel"><b>VISUALIZZA ARTICOLO</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" id="modalVisualizzaArticoli">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!--Elimina Prodotto-->
<div class="modal fade" id="eliminaProdotto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h3 style="color:white" class="modal-title" id="eliminaLabel"><b>ELIMINA PRODOTTO</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="pagine/AreaShop/funzioni/deleteProdotto.php" method="post">
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
<!--Elimina Acquisto-->
<div class="modal fade" id="eliminaAcquisto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaAcquistiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h3 style="color:white" class="modal-title" id="eliminaAcquistiLabel"><b>ELIMINA TRANSAZIONE</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="pagine/AreaShop/funzioni/deleteAcquisto.php" method="post">
                <div class="modal-body">
                    Sei sicuro di voler eliminare definitivamente la transazione?
                    <input type="text" name="idEliminaAcquisto" id="idEliminaAcquisto" hidden="true">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-danger" value="Elimina" data-bs-dismiss="modal">
                </div>
            </form>
        </div>
    </div>
</div>