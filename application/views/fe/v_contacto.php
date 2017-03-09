
                <div class="container">

                    <div class="row">
                        <div class="col-md-6">

                            <div class="alert alert-success hidden mt-lg" id="contactSuccess">
                                <strong>Exito!</strong> Su mensaje ha sido enviado.
                            </div>

                            <div class="alert alert-danger hidden mt-lg" id="contactError">
                                <strong>Error!</strong> Su mensaje no pude ser enviado.
                                <span class="font-size-xs mt-sm display-block" id="mailErrorMessage"></span>
                            </div>

                            <h2 class="mb-sm mt-sm"><strong>Formulario de Contacto</strong></h2>
                            <form id="contactForm" action="<?php echo base_url()."procesar/grabar/"; ?>" method="POST">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Su nombre <span class="heading-primary mt-lg">*</span></label>
                                            <input type="text" value="" data-msg-required="Por favor ingresa tu nombre." maxlength="100" class="form-control" name="txt_nombres" id="txt_nombres" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Su email <span class="heading-primary mt-lg">*</span></label>
                                            <input type="email" value="" data-msg-required="Por favor ingresa tu email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="txt_email" id="txt_email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Asunto <span class="heading-primary mt-lg">*</span></label>
                                            <input type="text" value="" data-msg-required="Por favor ingresa tu asunto" maxlength="100" class="form-control" name="txt_asunto" id="txt_asunto" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Mensaje <span class="heading-primary mt-lg">*</span></label>
                                            <textarea maxlength="5000" data-msg-required="Por favor ingresa tu mensaje." rows="10" class="form-control" name="txt_comentario" id="txt_comentario" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="link" id="link" value="<?php echo base_url().$this->uri->segment(1).'/'.$this->uri->segment(2); ?>"/>                                                                    
                                        <input type="submit" value="Enviar" class="btn btn-primary btn-lg mb-xlg" data-loading-text="Cargando...">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">

                            <h4 class="heading-primary mt-lg">Datos de<strong> Contacto</strong></h4>
                            <p><?php echo $descripcion;?></p>

                            <hr>

                            <h4 class="heading-primary">Datos de <strong>Oficina</strong></h4>
                            <ul class="list list-icons list-icons-style-3 mt-xlg">
                                <li><i class="fa fa-map-marker"></i> <strong>Dirección:</strong> <?php echo $this->be_parametros->valor("direccion"); ?></li>
                                <li><i class="fa fa-phone"></i> <strong>Teléfono:</strong> <?php echo $this->be_parametros->valor("telefono_frontis")." / ".$this->be_parametros->valor("celular_frontis"); ?></li>
                                <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="<?php echo $this->be_parametros->valor("correo_contacto"); ?>"><?php echo $this->be_parametros->valor("correo_contacto"); ?></a></li>
                            </ul>

                            <hr>

                            <h4 class="heading-primary">Horario de<strong> Atención</strong></h4>
                            <ul class="list list-icons list-dark mt-xlg">
                                <li><i class="fa fa-clock-o"></i><?php echo $this->be_parametros->valor("atencion-L-V"); ?></li>
                                <li><i class="fa fa-clock-o"></i><?php echo $this->be_parametros->valor("atencion-S"); ?></li>
                                <li><i class="fa fa-clock-o"></i><?php echo $this->be_parametros->valor("atencion-D"); ?></li>
                            </ul>

                        </div>

                    </div>
                    <br><h2 class="mb-sm mt-sm"><strong>Ubicación </strong></h2></br>
                </div>
                <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.6811355294385!2d-77.01642394996098!3d-12.065446491412951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTLCsDAzJzU1LjYiUyA3N8KwMDAnNTEuMiJX!5e0!3m2!1ses!2spe!4v1471529379158" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>                
                <!-- <div id="googlemaps" class="google-map"></div> -->
                <br>    