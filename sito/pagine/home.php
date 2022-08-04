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
                <img src="./img/campo.jpg" alt="" style="width:100vw; height:25vw; object-fit:cover; filter: brightness(50%);">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Campo della Giovanile Canzese</h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000" style="transition: transform 2s ease, opacity .5s ease-out">
                <img src="./img/eventi.jpg" alt="" style="width:100vw; height:25vw; object-fit:cover;filter: brightness(50%);">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Ultimi eventi</h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000" style="transition: transform 2s ease, opacity .5s ease-out">
                <img src="./img/galleria.jpg" alt="" style="width:100vw; height:25vw; object-fit:cover;filter: brightness(50%);">
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
    <div class="container mt-4" style="max-width:69vw">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="./img/eventi.jpg" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">January 1, 2022</div>
                        <h2 class="card-title">Titolo della news</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a class="btn btn-primary" href="#!">Leggi di più →</a>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4" style="min-height:22vw" style="transition: width 2s, height 4s;">
                            <a href="#!"><img class="card-img-top" src="./img/campo.jpg" alt="..." style="max-height:12vw" /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2022</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Leggi di più →</a>
                            </div>
                        </div>
                        <!-- Blog post-->
                        <div class="card mb-4" style="min-height:22vw" style="transition: width 2s, height 4s;">
                            <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." style="max-height:12vw" /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2022</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Leggi di più →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4" style="min-height:22vw" style="transition: width 2s, height 4s;">
                            <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." style="max-height:12vw" /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2022</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Leggi di più →</a>
                            </div>
                        </div>
                        <!-- Blog post-->
                        <div class="card mb-4" style="min-height:22vw" style="transition: width 2s, height 4s;">
                            <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." style="max-height:12vw" /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2022</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                                <a class="btn btn-primary" href="#!">Leggi di più →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <hr class="my-0" />
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                        <li class="page-item"><a class="page-link" href="#!">2</a></li>
                        <li class="page-item"><a class="page-link" href="#!">3</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                        <li class="page-item"><a class="page-link" href="#!">15</a></li>
                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Categories-->
                <div class="card mb-4">
                    <div class="card-header">Squadre</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!" class="text-decoration-none ">Giovanissimi</a></li>
                                    <li><a href="#!" class="text-decoration-none ">Pulcini</a></li>
                                    <li><a href="#!" class="text-decoration-none ">Piccoli Amici</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!" class="text-decoration-none ">Juniores</a></li>
                                    <li><a href="#!" class="text-decoration-none ">Prima Squadra</a></li>
                                    <li><a href="#!" class="text-decoration-none ">Esordienti</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Gallery-->
                <div class="card mb-4">
                    <div class="card-header">Le ultime foto... </div>
                    <div class="card-body">
                        <img src="./img/campo.jpg" class="rounded text-center" alt="..." style="width:32%; ">
                        <img src="./img/eventi.jpg" class="rounded text-center " alt="..." style="width:32%; ">
                        <img src="./img/galleria.jpg" class="rounded text-center " alt="..." style="width:32%;">
                    </div>
                    <div class="card-footer text-center"><a href="#" class="btn btn-primary ">Apri la galleria</a></div>
                </div>
                <!-- Sponsor-->
                <div class="card mb-4 mt-10 ">
                    <div class="card-header">I nostri sponsor </div>
                    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active img-sponsor" data-bs-interval="2000">
                                <a href="#" class="sponsor"><img src="./img/bentley.png" class="rounded text-center sponsor pt-3" alt="..." style="width:21.8vw "></a>
                            </div>
                            <div class="carousel-item img-sponsor" data-bs-interval="2000">
                                <a href="#" class="sponsor"><img src="./img/nike.png" class="rounded text-center sponsor" alt="..." style="width:21.8vw "></a>
                            </div>
                            <div class="carousel-item img-sponsor" data-bs-interval="2000">
                                <a href="#" class="sponsor"><img src="./img/adidas.png" class="rounded text-center sponsor pt-5 mt-4 pb-5" alt="..." style="width:21.8vw"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</body>