<?php
$_GET["squadra"];
//inter-milan,data,ora partita,via partita,ora ritrovo,luogo ritrovo, giocatori, 
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="text-center">
                    <label class="text-dark font-weight-bold ">Casa</label>
                </div>
                <input type="text" name="casa" class="form-control form-control-sm mb-2" required>
            </div>
            <div class="col-2">
                <div class="text-center">
                    <label class="text-dark font-weight-bold">VS</label>
                </div>
            </div>
            <div class="col-5">
                <div class="text-center">
                    <label class="text-dark font-weight-bold">Ospite</label>
                </div>
                <input type="text" name="ospite" class="form-control form-control-sm mb-2" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label class="text-dark font-weight-bold">Data</label>
                <input type="date" data-date-format="yyyy-mm-dd" style="width:100%" class="form-control form-control-sm mb-2" name="data" required>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-2">
                <label class="text-dark font-weight-bold">Ora</label>
            </div>
            <div class="col-8">
                <label class="text-dark font-weight-bold">Luogo</label>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label class="text-dark font-weight-bold">Ritrovo</label>
            </div>
            <div class="col-2">
                <input type="text" name="oraRitrovo" class="form-control form-control-sm mb-2" required>
            </div>
            <div class="col-8">
                <input type="text" name="luogoRitrovo" class="form-control form-control-sm mb-2" required>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label class="text-dark font-weight-bold">Partita</label>
            </div>
            <div class="col-2">
                <input type="text" name="oraPartita" class="form-control form-control-sm mb-2" required>
            </div>
            <div class="col-8">
                <input type="text" name="luogoPartita" class="form-control form-control-sm mb-2" required>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <label class="text-dark font-weight-bold">Giocatore</label>
            </div>
            <div class="col-3">
                <label class="text-dark font-weight-bold">DataNascita</label>
            </div>
            <div class="col-3">
                <div class="text-center">
                    <label class="text-dark font-weight-bold">Convocato</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label>Simone Gerosa</label>
            </div>
            <div class="col-3">
                <label>06/08/2022</label>
            </div>
            <div class="col-3">
                <div class="text-center">
                    <input type="checkbox" class="form-check-input " id="exampleCheck1"  style="margin-left:-2.5%" checked>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label>Andrea Locatelli</label>
            </div>
            <div class="col-3">
                <label>06/08/2020</label>
            </div>
            <div class="col-3">
                <div class="text-center">
                    <input type="checkbox" class="form-check-input " id="exampleCheck1"  style="margin-left:-2.5%" checked>
                </div>
            </div>
        </div>
    </div>


</body>
<script>

</script>