               

<div class="section-empty section-bg-color">
        <div class="container content">
            <div class="maso-list">
                
                <div class="row">
                    
                       <?php if( $this->uri->segment(2)=="contacto" and $this->uri->segment(3)=="success"  ){ ?>


                            <div class="alert alert-success mt-lg" id="contactSuccess">
                                <strong>Exito!</strong> Su consulta fue enviado con éxito. En breve estaremos en contacto con Ud.
                            </div>





                        <?php }elseif( $this->uri->segment(2)=="contacto" and $this->uri->segment(3)=="error"  ){
?>
                            <div class="alert alert-danger mt-lg" id="contactError">
                                <strong>Error!</strong> Su mensaje no pude ser enviado.
                                <span class="font-size-xs mt-sm display-block" id="mailErrorMessage"></span>
                            </div>
                            <?php
                            }//endIF ?>
                                                    
                    
                    
                    
                    
                    
                    
                    
                    
                  
                    
                
                    
                    
                  
                   
                   
                  
                    
                   
                    
                    
                    
                    <!-- INSERT OTHERS GALLERY ITEMS HERE -->
                   
                </div>
                
            
            
            
            
                    <div class="pagination col-xs-12 text-center"><?php  echo  $this->pagination->create_links(); ?></div>    
            
            
            
            
            
            
            
            
            </div>
        </div>
    </div>