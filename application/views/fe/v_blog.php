 <div class="section-empty">
        <div class="container content">
            <div class="row">
                <div class="col-md-12">
                    <div class="grid-list one-row-list">
                        <div class="grid-box">


                            
                              <?php
                                      if($blog!="0"){
                                          foreach($blog as $b){
                                              ?>
                            
                            
                            
                            <div class="grid-item">
                                <div class="advs-box advs-box-side-img" data-anima="scale-rotate" data-trigger="hover">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a class="img-box" href="#">
                                                <img class="anima" src="<?php echo base_url()."img_articulos/".$b->imagen; ?>" alt="" />
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            <h2><a href="#"><?php echo $b->nombre; ?></a></h2>
                                            <hr>
                                            <div class="tag-row icon-row">
                                                <span><i class="fa fa-calendar"></i><?php echo $this->be_funciones->formato_fecha($b->fecha); ?></span>
                                                <span><i class="fa fa-pencil"></i>Admin</span>
                                                
                                            </div>
                                            <p>
                                                <?php echo $b->sumilla; ?>
                                            </p>
                                            <a class="anima-button circle-button btn-sm" href="<?php echo base_url()."blog/item/".$b->seo; ?>"><i class="fa fa-long-arrow-right"></i>Ver más</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                           
                             <hr />
                            
                            
                            
                            
                                                <?php
                                            }//endFor
                                      
                                       }//endIF
                            ?>



                           
                            
                            
                           
                            
                            
                            
                            
                            
                            
                            
                            
                             <div class="pagination col-xs-12 text-center"><?php  echo  $this->pagination->create_links(); ?></div>    










                        </div><!--grid-box-->
                    </div>
                </div>
            </div>
        </div>
    </div>