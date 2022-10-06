<style>
    .carta-sponsor {
        max-width: 70vw;
        box-shadow: 0px 0px 20px 1px grey;
    }
</style>

<body>
    <div class="page-header">
        <strong class="testoHeader">SPONSOR</strong>
    </div>
    <br>
    <div id="contenuto" class="container mt-4">
        <div class="row">
            <div class="col-lg-3 col-sm-5">
                <img src="./img/nike.png" class="img-fluid " alt="...">
            </div>
            <div class="col-lg-2 col-sm-1"></div>
            <div class="col-lg-7 col-sm-6">
                <div class="card-body">
                    <h3 class="card-title">Nike</h3>
                    <h6 class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little . <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, a quasi? Fugit architecto aliquid reiciendis necessitatibus nemo odit itaque placeat, quia vel nesciunt magni, eos reprehenderit odio similique ipsum quasi?</h6>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-3 col-sm-5">
                <img src="./img/bentley.png" class="img-fluid" alt="...">
            </div>
            <div class="col-lg-2 col-sm-1"></div>
            <div class="col-lg-7 col-sm-6">
                <div class="card-body">
                    <h3 class="card-title">Bentley</h3>
                    <h6 class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little . <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, a quasi? Fugit architecto aliquid reiciendis necessitatibus nemo odit itaque placeat, quia vel nesciunt magni, eos reprehenderit odio similique ipsum quasi?</h6>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-3 col-sm-5">
                <img src="./img/adidas.png" class="img-fluid" alt="..." style="margin-top:3vw; margin-bottom:3vw">
            </div>
            <div class="col-lg-2 col-sm-1"></div>
            <div class="col-lg-7 col-sm-6">
                <div class="card-body">
                    <h3 class="card-title">Adidas</h3>
                    <h6 class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little . <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, a quasi? Fugit architecto aliquid reiciendis necessitatibus nemo odit itaque placeat, quia vel nesciunt magni, eos reprehenderit odio similique ipsum quasi?</h6>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <script>
        $(document).ready(function() {
            if ($(window).width() < 1000) {
                $("#contenuto").css("max-width", "90vw");
            } else {
                $("#contenuto").css("max-width", "70vw");
            }
        });
    </script>
</body>