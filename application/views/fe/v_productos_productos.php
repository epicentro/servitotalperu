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
                                                if($productos!="0"){
                                                    $con=0;
                                                    foreach($productos as $pro){
                                                        $con++;
                                                        ?>
                                                        <li class="col-md-3 col-sm-6 col-xs-12 product" style="margin-bottom: 30px;">
                                                                                        <!-- 
                                                        <a href="shop-product-sidebar.html">
                                                            <span class="onsale">New!</span>
                                                        </a>
                                                                                        -->
                                                            <span class="product-thumb-info">
                                                                                                    <!--
                                                                <a href="shop-cart.html" class="add-to-cart-product">
                                                                    <span><i class="fa fa-shopping-cart"></i> Add to Cart</span>
                                                                </a>
                                                                                                    -->
                                                                <a href="<?php echo base_url().$pro->seo."/"; ?>">
                                                                    <span class="product-thumb-info-image">
                                                                        <span class="product-thumb-info-act">
                                                                            <span class="product-thumb-info-act-left"><em>Ver</em></span>
                                                                            <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Detalle</em></span>
                                                                        </span>
                                                                        <img alt="<?php echo $pro->nombre; ?>" class="img-responsive" src="<?php echo base_url()."img_productos/".$this->be_parametros->primera_foto($pro->idproductos); ?>">
                                                                    </span>
                                                                </a>
                                                                <span class="product-thumb-info-content">
                                                                    <a href="<?php echo base_url().$pro->seo."/"; ?>">
                                                                        <h4><?php echo $pro->nombre; ?></h4>
                                                                                                                    <!--
                                                                        <span class="price">
                                                                            <del><span class="amount">$325</span></del>
                                                                            <ins><span class="amount">$299</span></ins>
                                                                        </span>
                                                                                                                    -->
                                                                    </a>
                                                                </span>
                                                            </span>
                                                        </li>                                                        
                                   
                                                        <?php

                                                            if($con % 4 ==0){?> <div class="clearfix hidden-xs hidden-sm"></div> <?php }
                                                            if($con % 2 ==0){?> <div class="clearfix hidden-xs hidden-md hidden-lg"></div> <?php }
                                
                                                            
                                                      }//endFor
                                                          
                                                  }//endIF
                                            ?>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>





                                        
                                        
                                        
                                        
                                        