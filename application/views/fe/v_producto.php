                <div class="container">
                    <h2>Producto <strong><?php echo $titulo; ?></strong></h2>

                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non pulvinar. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eu risus enim, ut pulvinar lectus. Sed hendrerit nibh metus.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <section class="call-to-action call-to-action-secondary mb-xl">
                                <div class="call-to-action-content">
                                    <p>¿Te gusta lo que ofrecemos? <strong> ¡QUE BIEN!</strong>
                                    <h3>No esperes más<strong> SOLICÍTALO </strong></h3></p>
                                </div>
                                <div class="call-to-action-btn">
                                    <a id="btn_seccion" href="#" class="btn btn-lg btn-primary mt-xl pull-right" data-toggle="modal" data-target="#formModal"><i class="fa fa-envelope"></i> AQUÍ <i class="fa fa-envelope"></i></a><span class="arrow hlb hidden-xs hidden-sm hidden-md" data-appear-animation="rotateInUpLeft" style="top: -94px;"></span>
                                </div>
                            </section>
                            <img src="<?php echo base_url()."img/whatsapp.png"; ?>">
                            <span style="font-size: 18px;margin-left: 10px; font-weight: bold;"><?php echo $this->be_parametros->valor("celular_frontis"); ?></span>

                        </div>
                    </div>
                    <hr>
                    <div class="row mb-xlg">
                        <div class="col-sm-12">
                            <h2><strong>Descripción</strong></h2>
                            <p> <?php echo $descripcion; ?></p>

                            </br></br>
                            <!-- <a href="blog-post.html" class="btn btn-xs btn-primary">Descargar como PDF</a></br></br></br></br> -->
                            <a href="javascript: history.back()" class="btn btn-lg btn-primary mt-xl pull-right">Volver</a>
                        </div>
                    </div>
                </div>


 

<?php echo $formulario_modal;?> 