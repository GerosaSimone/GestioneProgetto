<!--Elimina-->
<div class="modal fade" id="eliminaProdotto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h3 style="color:white" class="modal-title" id="eliminaLabel"><b>ELIMINA PRODOTTO</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
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
            <form action="pagine/AreaShop/addProdotto.php" method="post" enctype="multipart/form-data">
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
            <form action="pagine/AreaShop/editProdotto.php" method="post" enctype="multipart/form-data">
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
            <form action="pagine/AreaShop/buyProdotto.php" method="post" enctype="multipart/form-data">
                <input type="text" name="idProdotto" id="idProdotto" hidden="true">
                <div class="modal-body ui-front" id="modalAcquista">
                    <div class="container">
                        <div class="row">
                            <div style="width: 100%;"><label>Giocatore</label>
                                <button type="button" class="close pull-rigth" aria-label="close" style="color:red;" onclick="azzeraComplete();"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <input type="text" name="city" id="search_city" placeholder="Type to search..." class="form-control">
                            
                            <div class="btn-group btn-group-toggle mt-3 mb-3" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="XS" checked> XS
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="S"> S
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="M"> M
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="L"> L
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="XL"> XL
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="azzeraComplete()">Close</button>
                        <input type="submit" name="submit" id="btnSalva" class="btn btn-primary" value="Salva" disabled>
                    </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#search_city").autocomplete({
        source: 'pagine/AreaShop/giocatori-search.php',
        select: function(event, ui) {
            $("#search_city").prop('readonly', true);
            $("#btnSalva").prop('disabled', false);
        }
    });

    function azzeraComplete() {
        $("#search_city").prop('readonly', false);
        $("#btnSalva").prop('disabled', true);
        $("#search_city").val("");
    }
</script>