<div class="page-header clearfix">
    <h4 class="pull-left font-weight-bold" style="margin-left:4.5%; margin-top:20px"> Dirigenza </h4>
    <button type='button' class='btn btn-outline-secondary pull-right' style="margin-right:3%; margin-top:20px" data-bs-toggle='modal' data-bs-target='#addDirigente' <?php echo "data-bs-whatever='" . $_GET['squadra'] . "'" ?>>
        Add Dirigente/Mister
    </button>
</div>
<div class="limiter pt-3">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <?php
                $sql = "SELECT tesserato.nascosto, tesserato.id, tesserato.nome, tesserato.cognome, tesserato.dataNascita, tesserato.ruolo 
                        FROM tesserato inner join categoria on categoria.id=tesserato.idCategoria 
                        WHERE tipo='1' and tesserato.nascosto='0' and categoria.nome='" . $_GET['squadra'] . "' 
                        ORDER BY tesserato.cognome, tesserato.nome DESC";
                echo "<table class='display shadow-lg tabellaDirigenzaSquadre' style='width:100%'><thead><tr>";
                echo "      <th class='pl-4'> Nome</th>";
                echo "      <th> Cognome</th>";
                echo "      <th> Data Nascita</th>";
                echo "      <th> Ruolo</th>";
                echo "      <th class='column4'> Actions</th>";
                echo "</tr></thead><tbody>";
                if ($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td class='pl-4'>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['cognome'] . "</td>";
                            $date = str_replace('-', '/', $row['dataNascita']);
                            $newDate = date("d/m/Y", strtotime($date));
                            echo "<td>" . $newDate . "</td>";
                            if ($row['ruolo'] == "M") {
                                echo "<td>Mister</td>";
                            } else if ($row['ruolo'] == "D") {
                                echo "<td>Dirigente</td>";
                            } else if ($row['ruolo'] == "P") {
                                echo "<td>Presidente</td>";
                            } else {
                                echo "<td>Nessun ruolo</td>";
                            }
                            echo "<td >
                                            <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#acquistaProdotto' data-bs-whatever='" . $row['id'] . "'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bag' viewBox='0 0 16 16'>
                                                    <path d='M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z'/>
                                                </svg>
                                            </button>
                                            <button type='button' class='btn btn-outline-info' data-bs-toggle='modal' data-bs-target='#visualizzaDirigente' data-bs-whatever='" . $row['id'] . "'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                                                    <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                                    <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                                </svg>
                                            </button>
                                            <button type='button' class='btn btn-outline-success' data-bs-toggle='modal' data-bs-target='#modificaDirigente' data-bs-whatever='" . $row['id'] . "'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
                                            </svg>
                                            </button>
                                            <button type='button' class='btn btn-outline-danger' data-bs-toggle='modal' data-bs-target='#eliminaDirigente' data-bs-whatever='" . $row['id'] . "'>
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