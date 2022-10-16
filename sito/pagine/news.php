<body>
    <?php
    require_once "../config.php";
    ?>
    <div>
        <?php include 'modal/modal.php'; ?>
    </div>
    <div class="page-header">
        <strong class="testoHeader">NEWS</strong>
    </div>
    <div id="contenuto" class="mt-4 container">
        <div class="row">
            <?php
            $sql = "    SELECT *
                            FROM news
                            ORDER BY id DESC";
            $descrizione = "";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        if (strlen($row['descrizione']) > 143)
                            $descrizione = substr($row['descrizione'], 0, 140) . '...';
                        else
                            $descrizione = $row['descrizione'];
                        echo '  <div class="col-lg-4 col-sm-12">                        
                                    <div class="card mb-4">
                                        <img class="card-img-top" src="../gestionale/img/uploadsNews/' . $row['foto'] . '" />
                                        <div class="card-body">                                            
                                            <h2 class="card-title h4">' . $row['titolo'] . '</h2>
                                            <p class="card-text">' . $descrizione . '</p>
                                            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#visualizza" data-bs-whatever="' . $row["id"] . '">Leggi di più →</button>
                                        </div>
                                    </div>
                                </div>';
                    }
                    mysqli_free_result($result);
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
            ?>
        </div>
        <!-- Pagination-->
        <nav aria-label=" Pagination">
            <hr class="my-0" />
            <ul class="pagination justify-content-center my-4">
                <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                <li class="page-item"><a class="page-link" href="#!">2</a></li>
                <li class="page-item"><a class="page-link" href="#!">3</a></li>
                <li class="page-item"><a class="page-link" href="#!">Older</a></li>
            </ul>
        </nav>
    </div>
    <script>
        var visualizza = document.getElementById('visualizza')
        visualizza.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-whatever')
            $.post("pagine/modal/visualizzaNews.php?idNews=" + id, true, function(data, status) {
                $("#modalVisualizza").html(data);
            });
        });
        $(document).ready(function() {
            if ($(window).width() < 1000) {
                $(".card").css("min-height", "60vw")
                $(".card-img-top ").css("height", "32vw")
                $(".card-img-top ").css("object-fit", "cover")
                $("#contenuto").css("max-width", "90vw");
            } else {
                $(".card").css("min-height", "22vw")
                $(".card-img-top ").css("height", "12vw")
                $(".card-img-top ").css("object-fit", "cover")
                $("#contenuto").css("max-width", "70vw");
            }
        });
    </script>
</body>