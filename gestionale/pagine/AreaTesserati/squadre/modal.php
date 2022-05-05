<!--Divise-->
<div class="modal fade" id="divise" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="diviseLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(33, 164, 245);">
                <h3 class="modal-title pl-4 text-light" id="viewGiocatoreLabel"><b>VISUALIZZA DIVISE</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="img/divisa.webp" alt="Previw divisa">
                                <div class="card-body">
                                    <h5 class="card-title">Prima Divisa</h5>
                                    <p class="card-text">Utilizzata durante le partite giocate casa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="img/divisa.webp" alt="Previw divisa">
                                <div class="card-body">
                                    <h5 class="card-title">Seconda Divisa</h5>
                                    <p class="card-text">Utilizzata durante le partite in trasferta</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="img/divisa.webp" alt="Previw divisa">
                                <div class="card-body">
                                    <h5 class="card-title">Divisa dei Portieri</h5>
                                    <p class="card-text">Utilizzata dai portieri <br>&nbsp</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Modifica Materiale-->
<div class="modal fade" id="oggetti" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="oggettiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h3 class="modal-title text-light" id="oggettiLabel">MODIFICA MATERIALE</h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="pagine/AreaTesserati/squadre/modificaCategoriaMateriale.php" method="GET">
                <div class="modal-body">
                    <label>Num Pettorine: </label>
                    <input type="text" name="pettorine" class="form-control form-control-sm mb-2" value="<?php echo $numPettorine ?>">
                    <label>Num Palloni:</label>
                    <input type="text" name="palloni" class="form-control form-control-sm mb-2" value="<?php echo $numPalloni ?>">

                    <input type="text" name="squadra" hidden=true class="form-control form-control-sm mb-2" value="<?php echo $_GET['squadra'] ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Salva" data-bs-dismiss="modal">
                </div>
            </form>
        </div>
    </div>
</div>
<!--Modifica Orari-->
<div class="modal fade" id="orari" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="orariLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h3 class="modal-title text-light" id="orariLabel">Modifica Allenamenti</h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="pagine/AreaTesserati/squadre/modificaCategoriaOrari.php" method="GET">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label>Giorno:</label>
                            <select class="custom-select custom-select-sm form-control form-control-sm mb-2" name="giorno1">
                                <option selected><?php echo $giorni[0] ?></option>
                                <option value="Lunedi">Lunedi</option>
                                <option value="Martedi">Martedi</option>
                                <option value="Mercoledi">Mercoledi</option>
                                <option value="Giovedi">Giovedi</option>
                                <option value="Venerdi">Venerdi</option>
                                <option value="Sabato">Sabato</option>
                                <option value="Domenica">Domenica</option>
                            </select>
                            <select class="custom-select custom-select-sm form-control form-control-sm mb-2" name="giorno2">
                                <option selected><?php echo $giorni[1] ?></option>
                                <option value="Lunedi">Lunedi</option>
                                <option value="Martedi">Martedi</option>
                                <option value="Mercoledi">Mercoledi</option>
                                <option value="Giovedi">Giovedi</option>
                                <option value="Venerdi">Venerdi</option>
                                <option value="Sabato">Sabato</option>
                                <option value="Domenica">Domenica</option>
                            </select>
                        </div>
                        <div class="col">
                            <label>Ora Inizio:</label>
                            <input type="text" name="oraInizio1" value="<?php echo $orariInizio[0] ?>" class="form-control form-control-sm mb-2">
                            <input type="text" name="oraInizio2" value="<?php echo $orariInizio[1] ?>" class="form-control form-control-sm mb-2">

                        </div>
                        <div class="col">
                            <label>Ora Fine:</label>
                            <input type="text" name="oraFine1" value="<?php echo $orariFine[0] ?>" class="form-control form-control-sm mb-2">
                            <input type="text" name="oraFine2" value="<?php echo $orariFine[1] ?>" class="form-control form-control-sm mb-2">

                        </div>
                        <input type="text" name="squadra" hidden=true class="form-control form-control-sm mb-2" value="<?php echo $_GET['squadra'] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Salva" data-bs-dismiss="modal">
                </div>
            </form>
        </div>
    </div>
</div>
<!--Aggiungi Divisa-->
<div class="modal fade" id="addDivisa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addDivisaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h3 class="modal-title text-light" id="addDivisaLabel">Aggiungi Maglia</h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="pagine/AreaTesserati/squadre/addDivisa.php" method="get" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mt-2" style="max-height:45%">
                        <label>Foto</label>
                        <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" onchange="readFoto(this);" style="margin-left:-2%">
                        <img id="fotoDivisa" class="mt-3" src="" />
                    </div>
                    <label>Titolo</label>
                    <input type="text" name="titolo" class="form-control form-control-sm mb-2" required>
                    <label>Descrizione</label>
                    <input type="text" name="descrizione" class="form-control form-control-sm mb-2" required>
                    <input type="text" name="squadra" hidden=true class="form-control form-control-sm mb-2" value="<?php echo $_GET['squadra'] ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Salva" data-bs-dismiss="modal">
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
                $('#fotoDivisa')
                    .attr('src', e.target.result);

                $('#fotoDivisa')
                    .attr('style', "width: 280px; height: 350px; object-fit: cover;");

            };
            reader.readAsDataURL(input.files[0]);
            //blob input.files[0]            
        }
    }
</script>