
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
                                        <input type="hidden" name="link" id="link" value="<?php echo base_url().$this->uri->segment(1).'/'.$this->uri->segment(2); ?>"/>                                
                                        <button type="submit" id="btn_enviar" name="btn_enviar" class="btn btn-primary">Enviar</button>
                                    </div>
                                </form>
                        </div>

                </div>
        </div>
</div>	