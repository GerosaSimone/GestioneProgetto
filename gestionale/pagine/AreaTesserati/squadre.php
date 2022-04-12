<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: login.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>
<div class="page-header clearfix">
    <strong>
        <h2 class="pull-left" style="margin-left:2%"> <?php echo "   Giocatori "  . $_GET['squadra'] ?> </h2>
    </strong>
</div>

<body style="background-color: rgba(250, 250, 250, 255)">

    <div class="contenitore">
        <div class="row">
            <div class="col-sm-9">
                <div class="page-header clearfix">
                    <strong>
                        <h4 class="pull-left" style="margin-left:2.5%; margin-top:1%"> Mister </h4>
                        <button type='button' class='btn btn-outline-secondary pull-right' style="margin-right:1%" data-bs-toggle='modal' data-bs-target='#addMister'>
                            Add Mister
                        </button>
                    </strong>
                </div>
                <div class=" limiter">
                    <div class="container-table100">
                        <div class="wrap-table100">
                            <div class="table100">
                                <?php
                                require_once '../config.php';
                                $sql = "SELECT * FROM categoria WHERE categoria.nome='" . $_GET['squadra'] . "'";
                                $idCategoria = 0;
                                $idVisita = 0;
                                if ($result = mysqli_query($link, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_array($result);
                                        $idCategoria = $row['id'];
                                    }
                                }
                                $sql = "SELECT * FROM tesserato WHERE idCategoria='" . $idCategoria . "'and tipo='1'";
                                echo "<table class='display shadow-lg' style='width:100%'><thead><tr>";
                                echo "      <th> Nome</th>";
                                echo "      <th> Cognome</th>";
                                echo "      <th> Data Nascita</th>";
                                echo "      <th> Actions</th>";
                                echo "</tr></thead><tbody>";
                                if ($result = mysqli_query($link, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['nome'] . "</td>";
                                            echo "<td>" . $row['cognome'] . "</td>";
                                            echo "<td>" . $row['dataNascita'] . "</td>";
                                            echo "<td class='column4'>
                                            <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#visualizza' data-bs-whatever='" . $row['id'] . "'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                                                    <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                                    <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                                </svg>
                                            </button>
                                            <button type='button' class='btn btn-outline-success' data-bs-toggle='modal' data-bs-target='#editMister' data-bs-whatever='" . $row['id'] . "'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
                                            </svg>
                                            </button>
                                            <button type='button' class='btn btn-outline-danger' data-bs-toggle='modal' data-bs-target='#elimina' data-bs-whatever='" . $row['id'] . "'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'class='bi bi-trash' viewBox='0 0 16 16'>
                                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                                                    <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
                                                </svg>
                                            </button>
                                            " . "</td>";
                                        }
                                        mysqli_free_result($result);
                                    } else {
                                    }
                                } else {
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                }
                                echo "</tbody></table>";

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-header clearfix">
                    <h4 class="pull-left" style="margin-left:30px; margin-top:20px"> Giocatori </h4>
                    <button type='button' class='btn btn-outline-secondary pull-right' style="margin-right:1%; margin-top:20px" data-bs-toggle='modal' data-bs-target='#addGiocatore'>
                        Add Giocatore
                    </button>
                </div>
                <div class="limiter">
                    <div class="container-table100">
                        <div class="wrap-table100">
                            <div class="table100">
                                <?php
                                require_once '../config.php';
                                $sql = "SELECT * FROM categoria WHERE categoria.nome='" . $_GET['squadra'] . "'";
                                $idCategoria = 0;
                                $idVisita = 0;
                                if ($result = mysqli_query($link, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_array($result);
                                        $idCategoria = $row['id'];
                                    }
                                }
                                $sql = "SELECT * FROM tesserato WHERE idCategoria='" . $idCategoria . "'and tipo='0'";
                                echo "<table class='display shadow-lg tabella' style='width:100%'><thead><tr>";
                                echo "      <th>Nome</th>";
                                echo "      <th>Cognome</th>";
                                echo "      <th class='column4' >Data Nascita</th>";
                                echo "      <th>Visita</th>";
                                echo "      <th class='column4'>Actions</th>";
                                echo "</tr></thead><tbody>";
                                if ($result = mysqli_query($link, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['nome'] . "</td>";
                                            echo "<td>" . $row['cognome'] . "</td>";
                                            echo "<td class='column4'>" . $row['dataNascita'] . "</td>";
                                            $sql1 = "SELECT * FROM visita WHERE visita.id='" . $row['idVisita'] . "'";
                                            if ($result2 = mysqli_query($link, $sql1)) {
                                                if (mysqli_num_rows($result2) > 0) {
                                                    $row2 = mysqli_fetch_array($result2);
                                                    if ($row2['scadenza'] < date("Y/m/d"))
                                                        echo "<td style='text-align:left'>  <span class='dot-green'></span>&nbsp&nbsp" . $row2['scadenza'] . "</td>";
                                                    else
                                                        echo "<td style='text-align:left'>  <span class='dot-red'></span> &nbsp&nbsp" . $row2['scadenza'] . " </td>";

                                                    echo "<td class='column4'>
                                                            <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#visualizza' data-bs-whatever='" . $row['id'] . "'>
                                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                                                                    <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                                                    <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                                                </svg>
                                                            </button>
                                                            <button type='button' class='btn btn-outline-success' data-bs-toggle='modal' data-bs-target='#modifica' data-bs-whatever='" . $row['id'] . "' >
                                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
                                                            </svg>
                                                            </button>
                                                            <button type='button' class='btn btn-outline-danger' data-bs-toggle='modal' data-bs-target='#elimina' data-bs-whatever='" . $row['id'] . "'>
                                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'class='bi bi-trash' viewBox='0 0 16 16'>
                                                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                                                                    <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
                                                                </svg>
                                                            </button>
                                                        " . "</td>";
                                                }
                                            }
                                        }
                                        mysqli_free_result($result);
                                    } else {
                                    }
                                } else {
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                }
                                echo "</tbody>";
                                echo "</table>";
                                mysqli_close($link);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                Prova prova prova
            </div>
        </div>
    </div>

    <?php echo

    "
    <!-- Elimina-->
    <div class='modal fade' id='elimina' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='eliminaLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='eliminaLabel'>Elimina Giocatore</h5>
                    <button type='button' class='close' aria-label='Close' data-bs-dismiss='modal'><span aria-hidden='true'>&times;</span></button>
                </div>
                <div class='modal-body'>           
                    <input type='text' id='tempElimina' >
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                    <button type='button' class='btn btn-danger'>Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modifica-->
    <div class='modal fade' id='modifica' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='modificaLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='modificaLabel'>Modifica Giocatore</h5>
                    <button type='button' class='close' aria-label='Close' data-bs-dismiss='modal'><span aria-hidden='true'>&times;</span></button>
                </div>
                <div class='modal-body'>           
                    <input type='text' id='tempModifica'>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                    <button type='button' class='btn btn-primary'>Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Visualizza-->
        <div class='modal fade' id='visualizza' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='visualizzaLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='visualizzaLabel'>visualizza Giocatore</h5>
                        <button type='button' class='close' aria-label='Close' data-bs-dismiss='modal'><span aria-hidden='true'>&times;</span></button>
                    </div>
                    <div class='modal-body'>           
                        <input type='text' id='tempVisualizza'>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                    
                    </div>
                </div>
            </div>
        </div>    
        <!-- Modifica Mister-->
        <div class='modal fade' id='editMister' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='editmisterLabel' aria-hidden='true'>
        <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title pl-3' id='editmisterLabel'>Modifica Mister</h5>
                    <button type='button' class='close' aria-label='Close' data-bs-dismiss='modal'><span aria-hidden='true'>&times;</span></button>
                </div>
                <form action='creaMister.php' method='post'>
                    <div class='modal-body'>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-sm-6 border-right'>
                                    <label>Nome</label>
                                    <input type='text' name='nome' class='form-control form-control-sm mb-2'>
                                    <label>Cognome</label>
                                    <input type='text' name='cognome' class='form-control form-control-sm mb-2'>
                                    <label>Codice Fiscale</label>
                                    <input type='text' name='cf' class='form-control form-control-sm mb-2'>
                                    <label>Data di Nascita</label>
                                    <input type='date' data-date-format='mm/dd/yyyy' style='width:100%' class='form-control form-control-sm mb-2'>
                                    <label>Luogo di Nascita</label>
                                    <input type='text' name='dataNascita' class='form-control form-control-sm'>
                                </div>
                                <div class='col-sm-6'>
                                    <label>Indirizzo</label>
                                    <input type='text' name='indirizzo' class='form-control form-control-sm mb-2'>
                                    <label>Citta</label>
                                    <input type='text' name='citta' class='form-control form-control-sm mb-2'>
                                    <label>Provincia</label>
                                    <input type='text' name='provincia' class='form-control form-control-sm mb-2'>
                                    <div class='row'>
                                        <div class='col-sm-4'>
                                            <div class='form-check mt-3'>
                                                <input class='form-check-input' type='radio' name='gridRadios' id='gridRadios1' value='Mister' checked>
                                                <label class='form-check-label' for='gridRadios1'>
                                                    Mister
                                                </label>
                                            </div>
                                            <div class='form-check'>
                                                <input class='form-check-input' type='radio' name='gridRadios' id='gridRadios2' value='Dirigente'>
                                                <label class='form-check-label' for='gridRadios2'>
                                                    Dirigente
                                                </label>
                                            </div>
                                        </div>
                                        <div class='col-sm-8'>
                                            <label for='inlineFormCustomSelectPref'>Categoria</label>
                                            <select class='custom-select custom-select-sm' id='inlineFormCustomSelectPref'>
                                                <option selected>Choose...</option>
                                                <option value='1'>Prima Squadra</option>
                                                <option value='2'>Juniores</option>
                                                <option value='3'>Allievi</option>
                                                <option value='4'>Giovanissimi</option>
                                                <option value='5'>Esordienti</option>
                                                <option value='6'>Pulcini</option>
                                                <option value='7'>Piccoli Amici</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='form-group mt-2'>
                                        <label for='exampleFormControlFile1'>Foto</label>
                                        <input type='file' class='form-control-file' id='foto'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type='text' id='textEditMister' hidden='true'>
                    </div>
                    <div class='modal-footer'>
                        <input type='submit' class='btn btn-primary' value='Salva' data-bs-dismiss='modal'>
                    </div>
                </form>
            </div>
        </div>
    </div>"
    ?>



    <script>
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.tabella').DataTable({
                    paging: false,
                    searching: true,
                    ordering: true,
                    info: false
                });
            });
            var elimina = document.getElementById('elimina')
            elimina.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("tempElimina").value = recipient;
            });
            var modifica = document.getElementById('modifica')
            modifica.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("tempModifica").value = recipient;
            });
            var visualizza = document.getElementById('visualizza')
            visualizza.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("tempVisualizza").value = recipient;
            });
            var modificaMister = document.getElementById('editMister')
            modificaMister.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget
                var recipient = button.getAttribute('data-bs-whatever')
                document.getElementById("textEditMister").value = recipient;
            });
        });
    </script>
</body>

</html>