<!DOCTYPE html>
<html lang="en">

<head>
    <!--FONT-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <title>U.S. Giovanile Canzese</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

</html><button type='button' class='btn btn-outline-secondary pull-right' style="margin-right:1%" data-bs-toggle='modal' data-bs-target='#addMister'>
    Add Mister
</button>

<div class='modal fade' id='addMister' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='misterLabel' aria-hidden='true'>
    <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title pl-3' id='misterLabel'>Aggiungi Mister</h5>
                <button type='button' class='close' aria-label='Close' data-bs-dismiss='modal'><span aria-hidden='true'>&times;</span></button>
            </div>
            <form action="creaMister.php" method="post">
                <div class='modal-body'>
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
                </div>
                <div class='modal-footer'>
                    <input type="submit" class="btn btn-primary" value="Salva" data-bs-dismiss='modal'>
                </div>
            </form>
        </div>
    </div>
</div>






<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    var addMister = document.getElementById('addMister')
    addMister.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
    });
</script>
</body>