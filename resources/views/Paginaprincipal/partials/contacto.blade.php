<div class="contact-area section-padding" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>CONTACTO</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, temporibus consequuntur dicta
                        ullam illo facere.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 contact-right">
                <h2>Get In Touch</h2>
                <p class="r-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim ipsa officia in, at
                    inventore. Iste.</p>
                <div class="connn-right xs-mb-30">
                    <p><b><i class="fa fa-home"></i></b>127 , Brick Feild Road , London</p>
                    <p><b><i class="fa fa-phone"></i></b>+124 579 963 , +578 496 333</p>
                    <p><b><i class="fa fa-envelope"></i></b>youremail@yourdomain.com</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 contact-left">
                <h2>say something</h2>
                <form action="contact.php" id="contact-form" method="post" name="contact-form">
                    <div class="messages"></div>
                    <!--you can change the message in contact.php file -->
                    <div class="controls">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control" data-error="Fullname is required." id="form_name"
                                        name="name" placeholder="Enter your full name *" required="required"
                                        type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control" data-error="Valid email is required."
                                        id="form_email" name="email" placeholder="Enter your email *"
                                        required="required" type="email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" data-error="Leave a message for me"
                                        id="form_message" name="message" placeholder="Your Message *"
                                        required="required" rows="4"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-send custom-button-4">Enviar mensaje</button>
                            </div>
                        </div>
                    </div>
                </form><!-- contact form ends-->
            </div>
        </div>
    </div>
</div>
