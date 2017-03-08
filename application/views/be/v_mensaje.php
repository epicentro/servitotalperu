<div id="content_main" class="clearfix">

                <div id="dashboard_y">
				<h2 class="ico_mug">Mensaje</h2>
				<div class="clearfix">




                         <br />
                         <div style="margin-left:140px; border:1px solid #666; background-color:#e1e1e1; padding:20px;">
                         

                           <?php
                           if($sw_mensaje=="grabar_producto"){
                           
                                    echo $this->session->userdata('mensaje');
                                    $this->session->unset_userdata('mensaje');
                                    
                            ?> 
                             , <a class="link_clave" href="<?php echo base_url()."be/producto/"; ?>"><b>Intentelo Nuevamente clic AQUÍ</b></a>
                             
                            <?php
                            
                            }elseif($sw_mensaje=="actualizar_producto"){//endIF
                                
                                echo $this->session->userdata('mensaje');
                                    $this->session->unset_userdata('mensaje');
                                    
                            ?> 
                             , <a class="link_clave" href="javascript:window.history.back();"><b>Intentelo Nuevamente clic AQUÍ</b></a>
                             
                            <?php        
                            }
                           ?>

						
                        <br />
			   
                           <br/>
                          </div>
                         <br /><br />





				</div>
			</div><!-- end #dashboard -->
</div>