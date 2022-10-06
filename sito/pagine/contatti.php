<body>
    <style>
        .ligth {
            color: white;
        }

        @media (max-width: 1000px) {
            #iframe {
                width: 100%;
                height: 50vw;
            }

            #contattiForm {
                margin-top: 50px;
                margin-left: 15px;
                margin-right: 15px;
                padding: 8%;
            }

            #contattaci {
                font-size: 40px;
                font-weight: bold;
            }
        }

        @media (min-width: 1000px) {
            #iframe {
                width: 100%;
                height: 13vw;
            }

            #contattiForm {
                padding: 10%;
            }

            #contattaci {
                font-size: 30px;
                font-weight: bold;
                margin-bottom: 3%;
            }
        }
    </style>
    <div class="page-header">
        <strong class="testoHeader">CONTATTI</strong>
    </div>
    <iframe id="iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d89028.33807135273!2d9.168926432804124!3d45.78851175176185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47841e33fb41a8db%3A0x5d7e49ca1e292000!2sCampo%20Sportivo%20S.Miro!5e0!3m2!1sit!2sit!4v1659612922395!5m2!1sit!2sit" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <div id="contenuto" class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-12">
                        <div class="wrapper">
                            <div class="row no-gutters">
                                <div class="col-lg-7 col-sm-12 d-flex align-items-stretch">
                                    <div id="form" class="contact-wrap w-100">
                                        <div id="contattaci">CONTATTACI</div>
                                        <form method="POST" id="contactForm" name="contactForm" action="php/sendMail.php">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name" id="name" placeholder="Nome">
                                                    </div>
                                                </div>
                                                <div id="email" class="col-lg-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Oggetto">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <div class="form-group">
                                                        <textarea name="message" class="form-control" id="message" cols="30" rows="7" placeholder="Messaggio"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <div class="d-grid gap-2">
                                                            <input type="submit" value="Invia Messaggio" class="btn btn-primary btn-block">
                                                        </div>
                                                        <div class="submitting"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-sm-12 align-items-start mt-auto mb-auto">
                                    <div id="contattiForm" class="info-wrap bg-primary border rounded-4">
                                        <h3 class="mb-4 mt-md-4 ligth"><b>CONTATTI</b></h3>
                                        <div class="dbox w-100 d-flex">
                                            <div class="text pl-3">
                                                <p class="ligth"><i class="bi bi-cursor-fill"></i><span>&nbsp&nbsp&nbspIndirizzo:</span> Campo Sportivo S.Miro, Via Antonio Stoppani, Canzo, CO</p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex">
                                            <div class="text pl-3">
                                                <p class="ligth"><i class="bi bi-telephone-fill"></i><span>&nbsp&nbsp&nbspTelefono:</span> +39 333 145 1234</p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex">
                                            <div class="text pl-3">
                                                <p class="ligth"><i class="bi bi-envelope-fill"></i><span>&nbsp&nbsp&nbspMail:</span> usgiovanilecanzese@gmail.com</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            if ($(window).width() < 1000) {
                $("#form").css("padding", "2%");
                $("#email").addClass("mt-3");
                $("#contenuto").css("max-width", "90vw");
            } else {
                $("#form").css("padding", "5%");
                $("#contenuto").css("max-width", "70vw");
            }
        });
    </script>
</body>