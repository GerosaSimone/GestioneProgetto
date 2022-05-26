<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
$_SESSION['ultimaPage'] = "galleria";
require "../../config.php";
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <style>
        @media (max-width:767px) {
            .photo-gallery h2 {
                margin-bottom: 25px;
                padding-top: 25px;
                font-size: 24px;
            }
        }

        .photo-gallery .intro {
            font-size: 16px;
            max-width: 600px;
            margin: 0 auto 40px;
        }

        .photo-gallery .intro p {
            margin-bottom: 0;
        }

        .photo-gallery .photos {
            padding-bottom: 20px;
        }

        .photo-gallery .item {
            padding-bottom: 30px;
            z-index: 2;
        }

        .eliminaFoto {
            position: absolute;
            top: 8%;
            left: 85%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
        }

        .bottone {
            opacity: 0.5;
            color: red;
        }

        .bottone:hover {
            opacity: 1;
            color: red;
        }
    </style>
</head>

<body>
    <header class="text-center mb-5">
        <h1 class="display-5 font-weight-bold">Galleria US. Giovanile Canzese</h1>
        <p class="text-center">
            <button type='button' class='btn btn-outline-primary btn-lg' data-bs-toggle='modal' data-bs-target='#addGalleria'>
                Aggiungi Immagine
            </button>
        </p>
    </header>
    <div>
        <?php include 'tabelle/tabellaGalleria.php'; ?>
    </div>
    <div>
        <?php include 'modal/modal.php'; ?>
    </div>

    <script>
        var elimina = document.getElementById('elimina')
        elimina.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')
            document.getElementById("idElimina").value = recipient;
        });
    </script>
</body>