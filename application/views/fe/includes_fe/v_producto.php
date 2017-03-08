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


 

         <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">

                        <div class="modal-body">
                            <form id="demo-form" class="form-horizontal mb-lg" action="" method="post">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                    <h4 class="modal-title" id="formModalLabel"> <b id="nombre_paquete"> Ingrese su información</b></h4>
                                </div>
                                        <div class="form-group mt-lg">
                                                <label class="col-sm-3 control-label">Su Nombre *</label>
                                                <div class="col-sm-9">
                                                        <input type="text" name="txt_nombres" id="txt_nombres" class="form-control" placeholder="Ingrese su nombre..." required/>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-sm-3 control-label">Su Email *</label>
                                                <div class="col-sm-9">
                                                        <input type="email" name="txt_email" id="txt_email" class="form-control" placeholder="Ingrese su email..." required/>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-sm-3 control-label">Asunto *</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="txt_asunto" id="txt_asunto" class="form-control" placeholder="Ingrese su Asunto..." required />
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-sm-3 control-label">Mensaje</label>
                                                <div class="col-sm-9">
                                                        <textarea rows="5" name="txt_comentario" id="txt_mensaje" class="form-control" placeholder="Ingrese su mensaje" required></textarea>
                                                </div>
                                        </div>


                                    <div class="modal-footer">
                                        <div  class="alert alert-success ok_sms" role="alert">Mensaje enviando satisfactoriamente</div>
                                        <div class="alert alert-danger fail_sms" role="alert">Error!, no se pudo enviar el mensaje.</div>
                                        <div class="loading" style="width: 100px;margin: auto;">
                                            <img style="width: 100%;" src="http://www.solucionesajax.com/imagenes/loading-gallery.gif"/> enviando...
                                        </div>

                                        <input type="hidden" name="paquete" id="paquete">
                                        <!--
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        -->
                                        <button type="submit" id="btn_enviar" name="btn_enviar" class="btn btn-primary">Enviar</button>
                                    </div>
                                </form>
                        </div>

                </div>
        </div>
</div>