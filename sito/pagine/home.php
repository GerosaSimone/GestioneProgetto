<style>
    .sponsor {
        opacity: 0.9;
    }

    .sponsor:hover {
        opacity: 1.0;
    }

    .img-sponsor {
        transition: transform 2s ease, opacity .5s ease-out;
        height: 13vw;
    }

    .ultime-foto {
        width: 32%;
        height: 80px;
        object-fit: cover
    }

    .ultime-foto-mobile {
        width: 32%;
        height: 140px;
        object-fit: cover
    }
</style>

<body>
    <!--Immagini che scorrono-->
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000" style="transition: transform 2s ease, opacity .5s ease-out">
                <img src="./img/campo.jpg" alt="" style="width:100vw; height:25vw; object-fit:cover; filter: brightness(50%);" class="fotoCarousel">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Campo della Giovanile Canzese</h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000" style="transition: transform 2s ease, opacity .5s ease-out">
                <img src="./img/eventi.jpg" alt="" style="width:100vw; height:25vw; object-fit:cover;filter: brightness(50%);" class="fotoCarousel">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Ultimi eventi</h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000" style="transition: transform 2s ease, opacity .5s ease-out">
                <img src="./img/galleria.jpg" alt="" style="width:100vw; height:25vw; object-fit:cover;filter: brightness(50%);" class="fotoCarousel">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Foto della galleria</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--Contenuto pagina-->
    <div id="contenuto" class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="./img/eventi.jpg" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">January 1, 2022</div>
                        <h2 class="card-title">Titolo della news</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a class="btn btn-primary" href="#!">Leggi di più →</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card mb-4" style="min-height:22vw" style="transition: width 2s, height 4s;">
                            <a href="#!"><img class="card-img-top" src="./img/campo.jpg" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2022</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Leggi di più →</a>
                            </div>
                        </div>
                        <div class="card mb-4" style="min-height:22vw" style="transition: width 2s, height 4s;">
                            <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2022</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Leggi di più →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card mb-4" style="min-height:22vw" style="transition: width 2s, height 4s;">
                            <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2022</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Leggi di più →</a>
                            </div>
                        </div>
                        <div class="card mb-4" style="min-height:22vw" style="transition: width 2s, height 4s;">
                            <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2022</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla</p>
                                <a class="btn btn-primary" href="#!">Leggi di più →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widgets-->
            <div class="col-4" id="laterali">
                <!-- Categories-->
                <div class="card mb-4">
                    <div class="card-header">Squadre</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <ul class="list-unstyled mb-0">
                                    <li> <img src="./img/ball.png" alt="" style="width:20px;height:auto">&nbsp&nbsp&nbsp <b class="text-primary">Giovanissimi</b> </li>
                                    <li class="mt-1"> <img src="./img/ball.png" alt="" style="width:20px;height:auto">&nbsp&nbsp&nbsp <b class="text-primary">Pulcini</b></li>
                                    <li class="mt-1"><img src="./img/ball.png" alt="" style="width:20px;height:auto">&nbsp&nbsp&nbsp <b class="text-primary">  Piccoli Amici</b></li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="list-unstyled mb-0">
                                    <li><img src="./img/ball.png" alt="" style="width:20px;height:auto">&nbsp&nbsp&nbsp <b class="text-primary">Juniores</b> </li>
                                    <li class="mt-1"><img src="./img/ball.png" alt="" style="width:20px;height:auto">&nbsp&nbsp&nbsp <b class="text-primary">Prima Squadra</b> </li>
                                    <li class="mt-1"><img src="./img/ball.png" alt="" style="width:20px;height:auto">&nbsp&nbsp&nbsp <b class="text-primary">Esordienti</b> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Gallery-->
                <div class="card mb-4">
                    <div class="card-header">Le ultime foto... </div>
                    <div class="card-body">
                        <a href="#" class="galleria"> <img src="./img/campo.jpg" class="rounded text-center ultFoto" alt="..."></a>
                        <a href="#" class="galleria"> <img src="./img/eventi.jpg" class="rounded text-center ultFoto" alt="..."></a>
                        <a href="#" class="galleria"> <img src="./img/galleria.jpg" class="rounded text-center ultFoto" alt="..."></a>
                    </div>
                    <div class="card-footer text-center"><a href="#" class="btn btn-primary galleria">Apri la galleria</a></div>
                </div>
                <!-- Sponsor-->
                <div class="card mb-4 mt-10 ">
                    <div class="card-header">I nostri sponsor </div>
                    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active img-sponsor text-center" data-bs-interval="4000">
                                <a href="#" class="sponsor"><img src="./img/bentley.png" class="rounded text-center sponsor" alt="..." style="width:21.8vw"></a>
                            </div>
                            <div class="carousel-item img-sponsor text-center" data-bs-interval="4000">
                                <a href="#" class="sponsor"><img src="./img/nike.png" class="rounded text-center sponsor" alt="..." style="width:21.8vw"></a>
                            </div>
                            <div class="carousel-item img-sponsor text-center" data-bs-interval="4000">
                                <a href="#" class="sponsor"><img src="./img/adidas.png" class="rounded text-center sponsor" alt="..." style="width:21.8vw"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        if ($(window).width() < 1000) {
            $(".fotoCarousel").css("height", "60vw");
            $("#laterali").removeClass("col-4");
            $("#laterali").addClass("col-12");
            $("#contenuto").css("max-width", "90vw");
            $(".card-img-top").css("height", "20vw");
            $(".card-img-top").css("object-fit", "cover");
            $(".ultFoto").removeClass("ultime-foto");
            $(".ultFoto").addClass("ultime-foto-mobile");
        } else {
            $(".card-img-top").css("height", "20vw");
            $(".card-img-top").css("object-fit", "cover");
            $("#contenuto").css("max-width", "70vw");
            $(".ultFoto").removeClass("ultime-foto-mobile");
            $(".ultFoto").addClass("ultime-foto");
        }
    });
</script>