 <div class="section-empty">
        <div class="container content">
            <div class="row">
                <div class="col-md-12">
                    <div class="grid-list one-row-list">
                        <div class="grid-box">


                        
                            <?php
                                if($normas){
                                    foreach($normas as $norma){
                                       ?>
                            
                            <div class="grid-item">
                                <div class="advs-box advs-box-side-img" data-anima="scale-rotate" data-trigger="hover">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a class="img-box" target="_blank" href="<?php echo base_url()."img_normas/".$norma->imagen; ?>">
                                                <img class="anima" src="<?php echo base_url()."imagenes/pdf-descargar.png"; ?>" alt="" />
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            <h2><a  target="_blank" href="<?php echo base_url()."img_normas/".$norma->imagen; ?>"><?php echo $norma->nombre; ?></a></h2>
                                            <hr>
                                            <div class="tag-row icon-row">
                                                <span><i class="fa fa-calendar"></i><?php echo $this->be_funciones->formato_fecha($norma->fecha); ?></span>
                                                
                                                <span><i class="fa fa-pencil"></i>Admin</span>
                                                
                                            </div>
                                            <p>
                                               <?php echo $norma->descripcion; ?>
                                            </p>
                                            <a class="anima-button circle-button btn-sm" target="_blank" href="<?php echo base_url()."img_normas/".$norma->imagen; ?>"><i class="fa fa-arrow-down"></i>Descargar</a>
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