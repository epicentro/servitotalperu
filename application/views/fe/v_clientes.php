
                                            
                <div class="container">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 secciones">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                           <strong><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1One">
                                                <?php echo $titulo;?>                                       
                      </a></strong>
                                        </h4>
                                    </div>
                                    <div id="collapse1One" class="accordion-body collapse in">
                                        <div class="panel-body">
                                          <?php if(trim($descripcion)<>""){?> 
                                            <div class="row">
                                              <div class="col-md-12">
                                              <?php echo $descripcion;?> 
                                              </div>  
                                              <br><br>
                                            </div>
                                          <?php } ?>                                       
                      <div class="row">
                        <div class="col-md-12">
                          <ul class="image-gallery sort-destination lightbox">

                                            <?php
                                              if($clientes!="0"){

                                                  
                                                  foreach($clientes as $cli){
                                                      

                                                      ?>
                                            

                            <li class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                              <div class="image-gallery-item">
                                <span class="thumb-info">   
                                    <span class="thumb-info-wrapper">
                                      <img src="<?php echo base_url()."img_clientes/".$cli->imagen; ?>" class="img-responsive" alt="">
                                    </span>
                                </span>
                              </div> 
                            </li>                                            
                                            
                                            
                                                      <?php

                                                      
                                                      
                                                  }//endFor
                                              }//endIF
                                            ?>                          


                            <hr/>
                            <div class="clearfix"></div>   
                          </ul>
                        </div>
                      </div><!--row-->
                                        </div><!--panel-body-->
                                    </div><!--collapse1One-->
                                </div><!--panel-->
                            </div><!--panel-group-->
                        </div>
          </div>
        </div>
                                        