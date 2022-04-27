
<div class="container">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <h4 style="color:dark">DATI ANAGRAFICI</h4>
                            <div class="form-group mt-2" style="max-height:45%">
                                <label for="exampleFormControlFile1">Foto</label>
                                <input type="file" class="form-control-file" name="foto1" onchange="readFotoProfilo(this);" style="margin-left:-2%">
                                <img id="fotoProfilo" src="" />
                            </div>
                            <label>Nome</label>
                            <input type="text" name="nomeVisualizza" id="nomeVisualizza" class="form-control form-control-sm mb-2" readonly="readonly">
                            <label>Cognome</label>
                            <input type="text" name="cognomeVisualizza" id="cognomeVisualizza" class="form-control form-control-sm mb-2" readonly="readonly">
                            <label>Codice Fiscale</label>
                            <input type="text" name="cfVisualizza" id="cfVisualizza" class="form-control form-control-sm mb-2" readonly="readonly">
                            <label>Data di Nascita</label>
                            <input type="text" id="dataNascitaVisualizza" style="width:100%" class="form-control form-control-sm mb-2" name="dataNascitaVisualizza" readonly="readonly">
                            <label>Luogo di Nascita</label>
                            <input type="text" name="luogoNascitaVisualizza" id="luogoNascitaVisualizza" class="form-control form-control-sm" readonly="readonly">
                        </div>
                        <div class="col-sm-4 border-right">
                            <h4 style="color:dark">VISITA</h4>
                            <label>Tipo</label><br>
                            <input type="text" name="tipo" class="form-control form-control-sm" readonly="readonly">
                            <label>Scadenza</label>
                            <input type="date" data-date-format="yyyy-mm-dd" style="width:100%" class="form-control form-control-sm mb-2" name="scadenza" readonly="readonly">
                            <div class="form-group mt-2">
                                <label for="exampleFormControlFile1">Foto</label>
                                <input type="file" class="form-control-file" name="foto2" style="margin-left:-2%" readonly="readonly"><!-- mettere sull onload che carica la foto -->
                                <img id="fotoVisita" src="" />
                            </div>
                            <h4 style="color:dark; margin-left:-2%">CONTATTI</h4>
                            <div class="container" style="margin-left:-4%">
                                <div class="row">
                                    <div class="col-sm-7">
                                        Telefono
                                    </div>
                                    <div class="col-sm-4">
                                        Contatto
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" id="numTelefoni" name="numTelefoni" hidden="true" value="1" class="form-control form-control-sm mb-2">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <input type="tel" class="form-control form-control-sm mb-2" minlength="9" maxlength="14" readonly="readonly">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm mb-2" readonly="readonly">
                                    </div>
                                    <div class="col-sm-1">
                                    </div>
                                </div>
                            </div>
                            <div class="container" style="margin-left:-4%; margin-top:2%">
                                <div class="row">
                                    <div class="col-sm-7">
                                        Mail
                                    </div>
                                    <div class="col-sm-4">
                                        Contatto
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" id="numMail" name="numMail" hidden="true" value="1" class="form-control form-control-sm mb-2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control form-control-sm mb-2" readonly="readonly">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm mb-2" readonly="readonly">
                                    </div>
                                    <div class="col-sm-1">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <h4 style="color:dark">RESIDENZA</h4>
                            <label>Indirizzo</label>
                            <input type="text" name="via" class="form-control form-control-sm mb-2" readonly="readonly">
                            <label>Citta </label>
                            <input type="text" name="citta" class="form-control form-control-sm mb-2" readonly="readonly">
                            <label>Provincia </label>
                            <input type="text" name="provincia" class="form-control form-control-sm mb-2" readonly="readonly">
                            <div class="row" style="margin-left:-2%">
                                <div class="col-sm-6">
                                    <label>Ruolo</label>
                                    <input type="text" name="ruolo" class="form-control form-control-sm mb-2" readonly="readonly">
                                </div>
                                <div class="col-sm-6">
                                    <label>Categoria</label>
                                    <input type="text" name="categoria" class="form-control form-control-sm mb-2" readonly="readonly">
                                </div>
                            </div><br>
                            <h4 style="color:dark">CONTABILITA'</h4>
                            <div class="container" style="margin-left:-2%">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Da Pagare</label>
                                        <input type='currency' name="daPagare" value="0,00€" placeholder='Type a number & click outside' class="form-control form-control-sm mb-2" readonly="readonly" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Pagato</label>
                                        <input type='currency' name="pagato" value="0,00€" placeholder='Type a number & click outside' class="form-control form-control-sm mb-2" readonly="readonly" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>