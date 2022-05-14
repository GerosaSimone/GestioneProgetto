<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
$_SESSION['ultimaPage'] = "news";
require_once '../../config.php';
?>

<body>
    <header class="text-center mb-2">
        <h1 class="display-5 font-weight-bold">NEWS</h1>
        <p class="text-center">
            <button type='button' class='btn btn-outline-primary btn-lg' data-bs-toggle='modal' data-bs-target='#addNews'>
                Aggiungi News
            </button>
        </p>
    </header>

    <div class="row pb-5 mb-4 ml-3 mr-3 align-items-center">
        <?php
        $sql = "SELECT * FROM news";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $descrizione = " ";
                    if (empty($row['descrizione'])) {
                        $descrizione = "<br>";
                    } else
                        $descrizione = $row['descrizione'];
                    echo "  <div class='col-md-3 mt-5 ' >
                        <div class='card rounded shadow-lg border-0 ' id='card'>
                                <div class='card-body p-4'>
                                    <div onclick='apriModal(this)' data-bs-whatever='" . $row['id'] . "'>
                                        <img src='img/uploadsNews/" . $row['foto'] . "' alt='' class='img-fluid d-block mx-auto mb-3 rounded' >
                                        <h4> <b>" . $row['titolo'] . "</b>
                                        </h4>
                                        <p class=' text-muted '>" . $descrizione . "</p> 
                                    </div>
                                    <button type='button' class='btn btn-outline-danger rounded-circle pull-right'  data-bs-toggle='modal' data-bs-target='#eliminaNews' data-bs-whatever='" . $row['id'] . "'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='27' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16' >
                                            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                                            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
                                        </svg>
                                    </button>                                   
                                </div>
                            </div>
                            
                        </div>";
                }
            } else {
                echo '<h5 class="card-title ml-5">Nessuna news presente</h5>';
            }
        }
        ?>
    </div>
    <div>
        <?php include "modal.php"; ?>
    </div>

    <script>
        function apriModal(div) {
            $('#visualizzaNews').modal('show');
            var recipient = div.getAttribute('data-bs-whatever');
            $.post("pagine/AreaSito/visualizza.php", {
                id: recipient
            }, function(data, status) {
                $("#modalVisualizzaNews").html(data);
            });
        }
        var eliminaNews = document.getElementById('eliminaNews')
        eliminaNews.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')
            document.getElementById("idEliminaNews").value = recipient;
        });
        var addNews = document.getElementById('addNews')
        addNews.addEventListener('show.bs.modal', function(event) {
            $.post("pagine/AreaSito/aggiungi.php", true, function(data, status) {
                $("#modalAggiungiNews").html(data);
            });
        });
    </script>
</body>