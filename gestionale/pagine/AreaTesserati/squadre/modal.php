<!--Elimina-->
<div class="modal fade" id="elimina" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminaLabel">Elimina Giocatore</h5>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="text" id="tempElimina">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
<!--Modifica-->
<div class="modal fade" id="modifica" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modificaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modificaLabel">Modifica Giocatore</h5>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="text" id="tempModifica">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>
<!--Visualizza-->
<div class="modal fade" id="visualizza" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="visualizzaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visualizzaLabel">visualizza Giocatore</h5>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="text" id="tempVisualizza">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!--Modifica Mister-->
<div class="modal fade" id="editMister" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editmisterLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pl-3" id="editmisterLabel">Modifica Mister</h5>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="creaMister.php" method="post">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 border-right">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control form-control-sm mb-2">
                                <label>Cognome</label>
                                <input type="text" name="cognome" class="form-control form-control-sm mb-2">
                                <label>Codice Fiscale</label>
                                <input type="text" name="cf" class="form-control form-control-sm mb-2">
                                <label>Data di Nascita</label>
                                <input type="date" data-date-format="mm/dd/yyyy" style="width:100%" class="form-control form-control-sm mb-2">
                                <label>Luogo di Nascita</label>
                                <input type="text" name="dataNascita" class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-6">
                                <label>Indirizzo</label>
                                <input type="text" name="indirizzo" class="form-control form-control-sm mb-2">
                                <label>Citta</label>
                                <input type="text" name="citta" class="form-control form-control-sm mb-2">
                                <label>Provincia</label>
                                <input type="text" name="provincia" class="form-control form-control-sm mb-2">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Mister" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Mister
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="Dirigente">
                                            <label class="form-check-label" for="gridRadios2">
                                                Dirigente
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label for="inlineFormCustomSelectPref">Categoria</label>
                                        <select class="custom-select custom-select-sm" id="inlineFormCustomSelectPref">
                                            <option selected>Choose...</option>
                                            <option value="1">Prima Squadra</option>
                                            <option value="2">Juniores</option>
                                            <option value="3">Allievi</option>
                                            <option value="4">Giovanissimi</option>
                                            <option value="5">Esordienti</option>
                                            <option value="6">Pulcini</option>
                                            <option value="7">Piccoli Amici</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="exampleFormControlFile1">Foto</label>
                                    <input type="file" class="form-control-file" id="foto">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="text" id="textEditMister" hidden="true">
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Salva" data-bs-dismiss="modal">
                </div>
            </form>
        </div>
    </div>
</div>
<!--Aggiungi Mister-->
<div class="modal fade" id="addMister" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addMisterLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pl-3" id="addMisterLabel">Aggiungi nuovo Mister</h5>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="addMister.php" method="post">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 border-right">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control form-control-sm mb-2">
                                <label>Cognome</label>
                                <input type="text" name="cognome" class="form-control form-control-sm mb-2">
                                <label>Codice Fiscale</label>
                                <input type="text" name="cf" class="form-control form-control-sm mb-2">
                                <label>Data di Nascita</label>
                                <input type="date" data-date-format="mm/dd/yyyy" style="width:100%" class="form-control form-control-sm mb-2">
                                <label>Luogo di Nascita</label>
                                <input type="text" name="dataNascita" class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-6">
                                <label>Indirizzo</label>
                                <input type="text" name="indirizzo" class="form-control form-control-sm mb-2">
                                <label>Citta</label>
                                <input type="text" name="citta" class="form-control form-control-sm mb-2">
                                <label>Provincia</label>
                                <input type="text" name="provincia" class="form-control form-control-sm mb-2">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Mister" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Mister
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="Dirigente">
                                            <label class="form-check-label" for="gridRadios2">
                                                Dirigente
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label>Categoria</label>
                                        <input type="text" id="textAddMister" class="form-control form-control-sm mb-2" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="exampleFormControlFile1">Foto</label>
                                    <input type="file" class="form-control-file" id="foto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Salva" data-bs-dismiss="modal">
                </div>
            </form>
        </div>
    </div>
</div>
<!--Divise-->
<div class="modal fade" id="divise" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="diviseLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pl-3" id="diviseLabel">Divise Squadra</h5>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
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
            <div class="modal-header">
                <h5 class="modal-title" id="oggettiLabel">Modifica Materiale</h5>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
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
            <div class="modal-header">
                <h5 class="modal-title" id="orariLabel">Modifica Allenamenti</h5>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
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
<!--Aggiungi Giocatore-->
<div class="modal fade" id="addGiocatore" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="aggiungiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aggiungiLabel">Aggiungi Giocatore</h5>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>