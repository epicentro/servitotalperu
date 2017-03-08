<style type="text/css">
    .product-thumb-info-content h4{text-align: center;}
    .product-thumb-info-image img{margin: auto;}
</style>               

                <div class="container">

                    <div class="row">
                        <div class="featured-box featured-box-primary align-left">
                        <div class="box-content">
                            <ul class="portfolio-list sort-destination" data-sort-id="portfolio">
                                 <?php
                                 // echo '<pre>';
                                 // var_dump($servicios);
                                 // echo '</pre>';                                 
                                    if($servicios!="0"){
                                        $con=1;
                                        foreach($servicios as $pro){
                                            ?>
                                            <li class="col-md-3 col-sm-6 col-xs-12 product" style="margin-bottom: 30px;">
                                                <span class="product-thumb-info">

                                                    <a href="<?php echo base_url()."servicio/".$pro->seo."/"; ?>">
                                                        <span class="product-thumb-info-image">
                                                            <span class="product-thumb-info-act">
                                                                <span class="product-thumb-info-act-left"><em>Ver</em></span>
                                                                <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Detalle</em></span>
                                                            </span>

                                                            <img alt="<?php echo $pro->nombre; ?>" class="img-responsive" src="<?php echo base_url()."img_servicios/".$this->be_parametros->primera_foto_servicios($pro->idservicios); ?>">
                                                        </span>
                                                    </a>
                                                    <span class="product-thumb-info-content">
                                                        <a href="<?php echo base_url()."servicio/".$pro->seo."/"; ?>">
                                                            <h4><?php echo $pro->nombre; ?></h4>
                                                        </a>
                                                    </span>
                                                </span>
                                            </li>                                                        
                       
                                            <?php

                                                
                                          }//endFor
                                              
                                      }//endIF
                                    ?>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>

