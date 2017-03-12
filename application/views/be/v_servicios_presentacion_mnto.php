  
 <script type="text/javascript" src="<?php echo base_url();?>js/fckeditor/fckeditor.js"></script>


   
    <div id="content_main" class="clearfix">

                <div id="dashboard_y">
				<h2 class="ico_mug"> Presentación para : <?php echo $nombre; ?></h2>
				<div class="clearfix">




                         <br />








                         <form id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>be/servicios_presentacion/grabar/<?php echo $id; ?>" onsubmit="return validar();" >

        <table cellpadding="0" cellspacing="0" class="tb_mnto"  >


<!--seo_title, seo_descripcion, seo_keywords, text_html-->

      

            
           
                                              
                                                  
                                       <tr>
                                                
                                                <td>
                                                <textarea name="presentacion" id="presentacion" rows="10" cols="20" ><?php echo $valor; ?></textarea>
                                                <script>
                                                
                                                            var oFCKeditor = new FCKeditor( 'presentacion' ) ;
                                                            oFCKeditor.BasePath = "<?php echo base_url();?>js/fckeditor/";
                                                            oFCKeditor.Width  = '900' ;
                                                            oFCKeditor.Height = '600' ;
                                                            oFCKeditor.Config['EnterMode'] = 'br';
                                                            oFCKeditor.ReplaceTextarea();

                                                   
                                                </script>
                                                </td>
                                        </tr>   
                                        
          

            <tr>
                <td >
                   <input type="submit" name="Subir" value="Grabar" id="save" />

                </td>

            </tr>

        </table>

       </form>
                         
                         
                         
                         
                         
                         
                         
                         
                         

<div class="pagination"><?php  echo  $this->pagination->create_links(); ?></div>




                       <br style="clear: both" />
                     <br />




                     <input type="button" value="Regresar" id="yasser" class="regresar"/>




				</div>
			</div><!-- end #dashboard -->
</div>
<?php 
   
    //CUANDO ENTRA LA PRIMERA VEZ CAPTURAMOS LA RUTA DE DONDE VINO
    //Y LO GUARDAMOS EN UNA VARIABLE DE SESSION
    if(!$this->session->userdata('ruta_mnto_servicios')){
           
           $ruta=$_SERVER['HTTP_REFERER'];
           $this->session->set_userdata('ruta_mnto_servicios', $ruta);
       }
       
   
  ?>
  
<script>
$(".regresar").click(function(){
    
    window.location.href="<?php echo $this->session->userdata('ruta_mnto_servicios');?>";
    
    
});

</script>
    