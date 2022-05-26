<div class="photo-gallery">
    <div class="row photos mt-3">
        <?php
        $sql = "SELECT galleria.foto, galleria.id FROM galleria ORDER BY id DESC";       
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $foto = $row['foto'];                    
                    echo "";
                    if (file_exists('../../img/uploadsGalleria/' . $foto)) {
                        echo '  <div class="col-3 item">
                                    <button type="button" class="btn btn-danger eliminaFoto bottone" aria-label="Close" data-bs-toggle="modal" data-bs-target="#elimina" data-bs-whatever="' . $row['id'] . '">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                    <a href="img/uploadsGalleria/' . $foto . '" data-lightbox="photos">                                    
                                    <img class="img-fluid rounded shadow" src="img/uploadsGalleria/' . $foto . ' " style="height:350px; width:auto; max-height:350px; object-fit: cover;">
                                    </a>
                                </div>';
                    }
                }
            } else {
                echo '<h5 class="card-title ml-5">Nessuna immagine presente nella galleria</h5>';
            }
        }
        ?>
    </div>
</div>