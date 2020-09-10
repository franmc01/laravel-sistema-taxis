<div class="contact-area section-padding" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>CONTACTO</h2>
                    <p>Déjanos tu comentario o consulta a través de los siguientes medios, estamos atentos a siempre responder las dudas que tengas sobre nuestro servicio.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 contact-right">
                <h2>Contáctanos!!</h2>
                <p class="r-text">Puedes acercarte a las oficinas o llamar desde las 7 AM hasta las 7 PM. </p>
                <div class="connn-right xs-mb-30">
                    <p><b><i class="fa fa-home"></i></b>{{ $info_pagina[0]->direccion }}</p>
                    <p><b><i class="fa fa-phone"></i></b>+{{ $info_pagina[0]->telefono1 }} , +{{ $info_pagina[0]->telefono2 }}</p>
                    <p><b><i class="fa fa-envelope"></i></b>{{ $info_pagina[0]->correo_contacto }}</p>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 contact-left">
                <h2>No dudes en escribirnos</h2>
                <form id="contact-form" method="POST" name="contact-form">
                    <div class="messages"></div>
                    <!--you can change the message in contact.php file -->
                    <div class="controls">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control" data-error="Fullname is required." id="form_name" name="name" placeholder="Escriba sus nombres completos *" required="required" type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control" data-error="Valid email is required." id="form_email" name="email" placeholder="Escriba su email personal*" required="required" type="email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" data-error="Leave a message for me" id="form_message" name="message" placeholder="Escriba su mensaje *" required="required" rows="4"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-send custom-button-4 btn-submit" id="btn">Enviar mensaje</button>
                            </div>
                        </div>
                    </div>
                </form><!-- contact form ends-->
            </div>

        </div>
    </div>
</div>

