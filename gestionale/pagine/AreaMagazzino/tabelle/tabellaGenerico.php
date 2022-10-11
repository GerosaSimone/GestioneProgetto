<div class="row ">
    <?php
    $sql = "SELECT * FROM acquistimateriale WHERE nascosto=0 ORDER BY id DESC";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "      
                                <div class='card rounded shadow-lg border-0'>
                                    <div class='card-body p-4'>
                                        <div onclick='apriModalGenerico(this)' data-bs-whatever='" . $row['id'] . "'>";
                if ($row['foto'] != "") {
                    echo "<img src='img/uploadsProdotti/" . $row['foto'] . "' alt='' class='img-fluid d-block mx-auto mb-3 rounded prova'>";
                } else
                    echo "<img src='img/uploadsProdotti/default.jpg' alt='' class='img-fluid d-block mx-auto mb-3 rounded prova'>";
                echo "<h4> <b>" . $row['nome'] . "</b>
                                            </h4>
                                            <p class=' text-muted '>" . substr($row['descrizione'], 0, 80) . "...</p>                                             
                                            <p class=' text-muted '>n. Acquisti: " . $row['quantita']  . "</p>
                                            <p class=' text-primary font-italic pull-right ' style='margin-bottom:0 !important; margin-top:3%;'>Prezzo: " . $row['prezzo'] . " €</p>
                                        </div>
                                        <div >
                                            <button type='button' class='btn btn-outline-danger rounded-circle' data-bs-toggle='modal' data-bs-target='#eliminaGenerico' data-bs-whatever='" . $row['id'] . "'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='27' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                                                    <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                           ";
            }
        } else {
            echo '<div class="text-center" style="width:100%"> <h5>Nessun prodotto presente</h5></div>';
        }
    }
    ?>
</div>
<script>
    $(".prova").css("object-fit", "cover");
    if ($(window).width() < 501) {
        $(".prova").css("height", "40vw");
        $(".prova").css("width", "90vw");
    } else {
        $(".prova").css("height", "12vw");
        $(".prova").css("width", "14vw");
    }
</script>