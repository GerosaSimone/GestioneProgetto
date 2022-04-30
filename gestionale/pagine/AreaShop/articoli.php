<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<style>
    #titolo {
        font-size: 45px;
        color: white;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
    }
</style>

<body>
    <div class="page-header clearfix">
        <strong>
            <h2 class="pull-left pl-5"> Giocatori </h2>
            <button type='button' class='btn btn-outline-secondary pull-right' data-bs-toggle='modal' data-bs-target='#addGiocatore' style="margin-right:3%">
                Add Giocatore
            </button>
        </strong>
    </div>

</html>

<?php
$sql = "SELECT * FROM prodotto";
echo " <section class='py-5'>
        <div class='container px-5 px-lg-6 mt-5' >
            <div class='row gx-5 gx-lg-6 row-cols-3 row-cols-md-4 row-cols-xl-5'>";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<div class='col mb-4' >";
            echo "<div class='card h-100' style='width:20%; min-width:200px; background-color:rgb(240,240,240);'>
            <!-- Sale badge-->
            
            <!-- Product image-->            
            <img class='card-img-top p-3' style='width:100%; height:100%;' src='" . $row["linkFoto"] . "'   alt='...'   />
            <!-- Product details-->
            <div class='card-body p-2'>
                <div class='text-center'>
                    <!-- Product name-->";
            echo "<h5 class='fw-bolder' style='color:dark;'>" . $row["nome"] . "</h5>";
            echo "<!-- Product reviews-->
                    <!-- Product price-->
                    <span class='text-muted text-decoration-line-through'>$" . $row["costoUnitario"] . "</span>
                </div>
            </div>
            <!-- Product actions-->
            
            <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
            <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#visualizza' data-bs-whatever='" . $row['id'] . "'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                                                    <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                                    <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                                </svg>
                                            </button>
                                            <button type='button' class='btn btn-outline-success' data-bs-toggle='modal' data-bs-target='#modifica' data-bs-whatever='" . $row['id'] . "'>
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
            </div>
        </div>
        </div>";
        }
    }
}
echo "</div>
    </div>
</section>";
include 'modal.php';
?>
<footer class="py-5 " style="background: rgb(33, 164, 245);">
    <div class="container">
        <p class="m-0 text-center text-white"></p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    var elimina = document.getElementById('elimina')
    elimina.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var recipient = button.getAttribute('data-bs-whatever')
        document.getElementById("idElimina").value = recipient;
    });
</script>