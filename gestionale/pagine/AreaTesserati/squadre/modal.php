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
            <form action="pagine/AreaTesserati/squadre/addDivisa.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mt-2" style="max-height:45%">
                        <label>Foto</label>
                        <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" onchange="readFoto(this);" style="margin-left:-2%" required>
                        <img id="fotoDivisa" class="mt-3" src="" />
                    </div>
                    <label>Titolo</label>
                    <input type="text" name="titolo" class="form-control form-control-sm mb-2" required>
                    <label>Descrizione</label>
                    <input type="text" name="descrizione" class="form-control form-control-sm mb-2">
                    <input type="text" name="squadra" hidden=true class="form-control form-control-sm mb-2" value="<?php echo $_GET['squadra'] ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Salva">
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
            <form action="pagine/AreaTesserati/squadre/addGiocatore.php" method="post" enctype="multipart/form-data">
                <input type="text" hidden="true" name="squadra" value="<?php echo $_GET['squadra']; ?>">
                <div class="modal-body" id="modalAggiungi">

                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-primary" value="Salva">
                </div>
            </form>
        </div>
    </div>
</div>
<!--Divise-->
<div class="modal fade" id="divise" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="diviseLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h3 class="modal-title pl-4 text-light" id="viewGiocatoreLabel"><b>VISUALIZZA DIVISE</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <?php $sql = "  SELECT maglia.id, maglia.titolo, maglia.foto, maglia.descrizione 
                                        FROM `maglia` inner JOIN usa on maglia.id=usa.idMaglia 
                                        INNER JOIN categoria on usa.idCategoria=categoria.id
                                        WHERE categoria.nome='" . $_GET['squadra'] . "'";
                        if ($result = mysqli_query($link, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $titolo = $row['titolo'];
                                    $foto = $row['foto'];
                                    $descrizione = $row['descrizione'];
                                    $idMaglia = $row['id'];
                                    echo ' <div class="col-sm-4 mt-3">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="img/uploadsDivise/' . $foto . '" alt="Previw divisa" style="height:300px; width:auto; max-height:300px">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            ' . $titolo . '
                                            <button type="button" class="close pull-rigth" aria-label="close" style="color:red" id="' . $idMaglia . '" onclick="eliminaMaglia(this);"><span aria-hidden="true">&times;</span></button>
                                        </h5>
                                        <p class="card-text">' . $descrizione . '</p>
                                    </div>
                                </div>
                            </div>';
                                }
                            } else {
                                echo '<h5 class="card-title">Nessuna Divisa</h5>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Elimina-->
<div class="modal fade" id="elimina" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eliminaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h3 style="color:white" class="modal-title pl-4" id="eliminaLabel"><b>ELIMINA GIOCATORE</b></h3>
                <button type="button" class="close" aria-label="Close" style="color:white" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="pagine/AreaTesserati/squadre/deleteGiocatore.php?squadra=<?php echo $_GET['squadra']; ?>" method="post">
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
<!--Visualizza-->
<div class="modal fade" id="visualizzaGiocatore" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewGiocatoreLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(33, 164, 245);">
                <h3 style="color:white" class="modal-title pl-4" id="viewGiocatoreLabel"><b>VISUALIZZA GIOCATORE</b></h3>
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
<!--Modifica-->
<div class="modal fade" id="modifica" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modificaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h3 style="color:white" class="modal-title pl-4" id="modificaLabel"><b>MODIFICA GIOCATORE</b></h3>
                <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal" style="color:white"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="pagine/AreaTesserati/squadre/editGiocatore.php" method="post" enctype="multipart/form-data">
                <input type="text" hidden="true" name="squadra" value="<?php echo $_GET['squadra']; ?>">
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
<!-- usare un swal al posto dell alert -->
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
        }
    }


    function eliminaMaglia(input) {
        if (confirm("Sicuro di voler eliminare la maglia?") == true) {
            var id = input.getAttribute('id');
            <?php echo  "var squadra='" . $_GET['squadra'] . "';" ?>
            window.location.href = "pagine/AreaTesserati/squadre/delMaglia.php?idMaglia=" + id + "&squadra=" + squadra;
        }
    }
</script>