<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
$_SESSION['ultimaPage'] = "shop";
require_once '../../config.php';
?>

<body>
    <header class="text-center mb-2">
        <h1 class="display-5 font-weight-bold">Negozio</h1>
        <p class="text-center">
            <button type='button' class='btn btn-outline-secondary btn-lg' data-bs-toggle='modal' data-bs-target='#addProdotto'>
                Aggiungi Prodotto
            </button>
        </p>
    </header>

    <div class="row pb-5 mb-4 ml-3 mr-3">
        <?php
        $sql = "SELECT * FROM prodotto";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $descrizione = " ";
                    if (empty($row['descrizione'])) {
                        $descrizione = "<br>";
                    } else
                        $descrizione = $row['descrizione'];
                    echo "  <div class='col-md-3 mt-5'>
                        <div class='card rounded shadow-lg border-0'>
                                <div class='card-body p-4'>
                                    <img src='https://www.zeusnews.it/img/4/8/1/6/2/0/026184-620-google-vedi-immagini.jpg' alt='' class='img-fluid d-block mx-auto mb-3 rounded'>
                                    <h4> <a href='#' class='text-dark'><b>" . $row['nome'] . "</b></a>
                                    </h4>
                                    <p class=' text-muted '>" . $descrizione . "</p>
                                    <p class=' text-muted font-italic pull-right ' style='margin-bottom:0 !important; margin-top:3%;'>Prezzo: " . $row['costoUnitario'] . " €</p>
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
        ?>
    </div>
    <div>
        <?php include "modal.php"; ?>
    </div>

    <script>
        /*var visualizzaProdotto = document.getElementById('visualizzaProdotto')
        visualizzaProdotto.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-whatever')
            $.post("pagine/AreaShop/visualizza.php?idProdotto=" + id, true, function(data, status) {
                $("#modalVisualizza").html(data);
            });
        });*/
        var modificaProdotto = document.getElementById('modificaProdotto')
        modificaProdotto.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-whatever')
            $.post("pagine/AreaShop/modifica.php?idProdotto=" + id, true, function(data, status) {
                $("#modalModifica").html(data);
            });
        });
        var eliminaProdotto = document.getElementById('eliminaProdotto')
        eliminaProdotto.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')
            document.getElementById("idElimina").value = recipient;
        });
        var addGiocatore = document.getElementById('addProdotto')
        addGiocatore.addEventListener('show.bs.modal', function(event) {
            $.post("pagine/AreaShop/aggiungi.php", true, function(data, status) {
                $("#modalAggiungi").html(data);
            });
        });
    </script>
</body>