<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
require_once '../AreaTesserati/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white" style="width: 100%;">
                <h1 class="display-4 fw-bolder">Articoli Disponibili</h1>
            </div>
        </div>
    </header>
</html>

<?php
$sql = "SELECT * FROM prodotto";
echo " <section class='py-5'>
        <div class='container px-4 px-lg-5 mt-5'>
            <div class='row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center'>";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<div class='col mb-5'>";
            echo "<div class='card h-80' style='width:20%; min-width:170px'>
            <!-- Sale badge-->
            <div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'><a href='eliminaProdotto.php'><img src='pagine/AreaShop/trashBin.png' style='width:15px;'></a></div>
            <!-- Product image-->            
            <img class='card-img-top p-2' src='". $row["linkFoto"] ."'   alt='...'   />
            <!-- Product details-->
            <div class='card-body p-4'>
                <div class='text-center'>
                    <!-- Product name-->";
            echo "<h5 class='fw-bolder' >" . $row["nome"] . "</h5>";
            echo "<!-- Product reviews-->
                    <!-- Product price-->
                    <span class='text-muted text-decoration-line-through'>$".$row["costoUnitario"]."</span>
                </div>
            </div>
            <!-- Product actions-->
            <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
            </div>
        </div>
        </div>";
        }
    }
}
echo "</div>
    </div>
</section>";

?>
<footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Shop Giovanile Canzese</p>
        </div>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



    <!-- 
   
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">

                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><img src="pagine/AreaShop/trashBin.png" style="width:15px;"></div>

                       
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        
                        <div class="card-body p-4">
                            <div class="text-center">
                               
                                <h5 class="fw-bolder">Special Item</h5>
                               
                                <span class="text-muted text-decoration-line-through">$20.00</span>
                                $18.00
                            </div>
                        </div>
                     
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                       
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><img src="pagine/AreaShop/trashBin.png" style="width:15px;"></div>
                      
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                      
                        <div class="card-body p-4">
                            <div class="text-center">
                              
                                <h5 class="fw-bolder">Special Item</h5>
                              

                             
                                <span class="text-muted text-decoration-line-through">$20.00</span>
                                $18.00
                            </div>
                        </div>
                     
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                     
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><img src="pagine/AreaShop/trashBin.png" style="width:15px;"></div>
                    
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                       
                        <div class="card-body p-4">
                            <div class="text-center">
                           >
                                <h5 class="fw-bolder">Special Item</h5>
                            
                                <span class="text-muted text-decoration-line-through">$20.00</span>
                                $18.00
                            </div>
                        </div>
                     
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                       
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><img src="pagine/AreaShop/trashBin.png" style="width:15px;"></div>
                       
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    
                        <div class="card-body p-4">
                            <div class="text-center">
                               
                                <h5 class="fw-bolder">Special Item</h5>
                              
                                <span class="text-muted text-decoration-line-through">$20.00</span>
                                $18.00
                            </div>
                        </div>
                      
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                    
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><img src="pagine/AreaShop/trashBin.png" style="width:15px;"></div>
                   
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                      
                        <div class="card-body p-4">
                            <div class="text-center">
                            
                                <h5 class="fw-bolder">Special Item</h5>
                            
                                <span class="text-muted text-decoration-line-through">$20.00</span>
                                $18.00
                            </div>
                        </div>
                    
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                    
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><img src="pagine/AreaShop/trashBin.png" style="width:15px;"></div>
                     
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
              
                        <div class="card-body p-4">
                            <div class="text-center">
                          
                                <h5 class="fw-bolder">Special Item</h5>
                            

                                <span class="text-muted text-decoration-line-through">$20.00</span>
                                $18.00
                            </div>
                        </div>
                 
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
   
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Shop Giovanile Canzese</p>
        </div>
    </footer>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
->
    <script src="js/scripts.js"></script>
</body>
-->

