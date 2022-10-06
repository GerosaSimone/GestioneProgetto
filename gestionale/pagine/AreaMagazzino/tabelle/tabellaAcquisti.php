<div class="limiter pt-3" style="margin-left:-1%">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <?php
                $sql = "SELECT acquistimagazzino.id,prodotto.nome,magazzino.taglia,acquistimagazzino.quantita,acquistimagazzino.prezzototale,acquistimagazzino.data 
                FROM acquistimagazzino 
                INNER JOIN magazzino ON magazzino.id=acquistimagazzino.idMagazzino 
                INNER JOIN prodotto ON magazzino.idProdotto = prodotto.id
                ORDER BY acquistimagazzino.id DESC";
                echo "<table class='display shadow-lg tabellaAcquisti' style='width:100%'><thead><tr>";
                echo "      <th class='pl-4'> Articolo</th>";
                echo "      <th> Taglia</th>";
                echo "      <th> Quantita</th>";
                echo "      <th> Prezzo </th>";
                echo "      <th> Data Acquisto </th>";
                echo "      <th class='column3'> Actions</th>";
                echo "</tr></thead><tbody>";
                if ($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td class='pl-4'>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['taglia'] . "</td>";
                            echo "<td>" . $row['quantita'] . "</td>";
                            echo "<td>" . $row['prezzototale'] . " €</td>";
                            $date = str_replace('-', '/', $row['data']);
                            $newDate = date("d/m/Y", strtotime($date));
                            echo "<td>" . $newDate . "</td>";
                            echo "<td class='column3'>                                            
                                            <button type='button' class='btn btn-outline-danger' data-bs-toggle='modal' data-bs-target='#eliminaAcquisto' data-bs-whatever='" . $row['id'] . "'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'class='bi bi-trash' viewBox='0 0 16 16'>
                                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                                                    <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
                                                </svg>
                                            </button>
                                            " . "</td>";
                        }
                        mysqli_free_result($result);
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