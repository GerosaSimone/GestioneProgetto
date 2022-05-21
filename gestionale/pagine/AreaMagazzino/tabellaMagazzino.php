<div class="row ">
    <?php
    $sql = "SELECT * FROM magazzino INNER JOIN prodotto ON magazzino.idProdotto=prodotto.id GROUP BY idProdotto HAVING magazzino.nascosto='0'";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $tipoTaglie = " ";
                if (!$row['tipoTaglie']) {
                    $tipoTaglie = "Bambino";
                } else
                    $tipoTaglie = "Adulto";
                echo "      <div class='col-6 mt-5' >
                                                <div class=' card rounded shadow-lg border-0' style='width: 20rem;'>
                                                    <div class='card-body p-4'>
                                                        <div onclick='apriModal(this)' data-bs-whatever='" . $row['id'] . "'>
                                                            <img src='img/uploadsProdotti/" . $row['foto'] . "' alt='' class='img-fluid d-block mx-auto mb-3 rounded'>
                                                            <h4> <b>" . $row['nome'] . "</b>
                                                            </h4>
                                                            <p class=' text-muted '>" . $tipoTaglie . "</p>
                                                            <p class=' text-primary font-italic pull-right ' style='margin-bottom:0 !important; margin-top:3%;'>Prezzo: " . $row['costoUnitario'] . " €</p>
                                                        </div>
                                                        <button type='button' class='btn btn-outline-primary rounded-circle' data-bs-toggle='modal' data-bs-target='#buyDeposito' data-bs-whatever='" . $row['id'] . "'>
                                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='27' fill='currentColor' class='bi bi-bag' viewBox='0 0 16 16'>
                                                                <path d='M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z'/>
                                                            </svg>
                                                        </button>
                                                        <button type='button' class='btn btn-outline-success rounded-circle' data-bs-toggle='modal' data-bs-target='#modificaProdotto' data-bs-whatever='" . $row['id'] . "'>
                                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='27' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
                                                            </svg>
                                                        </button>
                                                        <button type='button' class='btn btn-outline-danger rounded-circle' data-bs-toggle='modal' data-bs-target='#eliminaProdotto' data-bs-whatever='" . $row['id'] . "'>
                                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='27' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                                                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                                                                <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>";
            }
        }
    }
    ?></div>