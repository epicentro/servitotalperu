                <div class="container">
                    <h2>Producto: <strong><?php echo $titulo; ?></strong></h2>


                    <div class="row mb-xlg">
                        <div class="col-sm-4">
                            <div class="owl-carousel owl-theme nav-inside pull-left mr-lg mb-sm" style="width: 300px;" data-plugin-options='{"items": 1, "nav": true, "margin": 10, "animateOut": "fadeOut"}'>
                            <?php 
                            //var_dump($imagenes);
                            foreach ($imagenes as $key => $value) {
                                ?>
                                <div>
                                <img class="pull-left mr-xlg img-responsive" alt="<?php echo $titulo; ?>" src="<?php echo base_url()."img_productos/".$value->imagen; ?>" style="">
                                </div>
                                <?php
                            }
                            ?>

                            </div>                        


                        </div>
                        <div class="col-sm-8">                        
                            <p><?php echo $descripcion; ?></p>                        

                            <div class="col-xs-12 col-sm-10 col-md-10">
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

                        <div class="col-xs-12">
                            <a href="javascript: history.back()" class="btn btn-lg btn-primary mt-xl pull-right">Volver</a>
                        </div>

                    </div>
                </div>


 

<?php echo $formulario_modal;?> 