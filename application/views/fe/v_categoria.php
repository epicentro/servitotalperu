<div class="container">                    
                    <div class="row">

                        <ul class="portfolio-list sort-destination" data-sort-id="portfolio">

                                        
                            
                            <?php
                            
                            
                            
                                  if($cat_servicios!="0"){
                                      foreach($cat_servicios as $cs){
                                          ?>
                            
                            
                                        <li class="col-md-3 col-sm-6 col-xs-12 isotope-item">
                                            <div class="portfolio-item">
                                                <a href="<?php echo base_url()."categoria/".$cs->seo."/"; ?>">
                                                    <span class="thumb-info thumb-info-lighten">
                                                        <span class="thumb-info-wrapper">
                                                            <img src="<?php echo base_url()."img_categorias/".$cs->imagen; ?>" class="img-responsive" alt="">
                                                            <span class="thumb-info-title">
                                                                <span class="thumb-info-inner"><?php echo $cs->nombre; ?></span>
                                                                <span class="thumb-info-type">Categoría</span>
                                                            </span>
                                                            <span class="thumb-info-action">
                                                                <span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                            
                            
                                          <?php
                                      }
                                          
                                  }
                            ?>                        


                        </ul>
                    </div>

</div>                    

