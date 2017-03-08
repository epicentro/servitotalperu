<div id="content_main" class="clearfix">

                <div id="dashboard_y">
				<h2 class="ico_mug">Sección: <?php echo $seccion; ?> </h2>
				<div class="clearfix">
                         <br />
<script type="text/javascript" src="<?php echo base_url();?>js/fckeditor/fckeditor.js"></script>
<script type="text/javascript">

window.onload = function()
{
	var oFCKeditor = new FCKeditor( 'parte1' ) ;
	oFCKeditor.BasePath = "<?php echo base_url();?>js/fckeditor/";
        oFCKeditor.Width  = '700' ;
	oFCKeditor.Height = '400' ;
        oFCKeditor.ReplaceTextarea();
        
        var oFCKeditor = new FCKeditor( 'parte2' ) ;
	oFCKeditor.BasePath = "<?php echo base_url();?>js/fckeditor/";
        oFCKeditor.Width  = '700' ;
	oFCKeditor.Height = '400' ;
        oFCKeditor.ReplaceTextarea();


}
</script>

<script type="text/javascript">
 function validar(){

     
 }

 </script>


      <form id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>be/email/graba/<?php echo $clave; ?>" onsubmit="return validar();" >

        <table cellpadding="0" cellspacing="0" class="tb_mnto"  >



             <tr>
                <td>
                   De(Email)
                </td>
                <td>
                 <input name="txt_email"  id="txt_email" style="width:400px;" value="<?php echo $de; ?>"  /><br/>
                 </td>
            </tr>

             <tr>
                <td>
                   Asunto
                </td>
                <td>
                 <input name="txt_asunto"  id="txt_asunto" style="width:400px;" value="<?php echo $asunto; ?>" /><br/>
                 </td>
            </tr>

             <tr>
                <td>
                  1ra. Parte
                </td>
                <td>
                 Estimado(a). XXXXXX XXXXXX XXXXX:
                 </td>
            </tr>


            <tr>
                <td>
                 2da. Parte (Texto)
                </td>
                <td>
                    <textarea id="parte1" rows="10" cols="20" name="parte1"><?php echo $parte1; ?></textarea>

                </td>
            </tr>
            
            
              <tr>
                <td>
                 3ra. Parte (Texto)
                </td>
                <td>
                    Datos alimentados desde la base datos

                </td>
            </tr>

             <tr>
                <td>
                 4ra. Parte (Texto)
                </td>
                <td>
                   
                    <textarea id="parte2" rows="10" cols="20" name="parte2"><?php echo $parte2; ?></textarea>

                </td>
            </tr>

           
           




            <tr>
                <td colspan="2">
                   <input type="submit" name="Subir" value="Grabar" id="save" />

                </td>

            </tr>

        </table>

       </form>

                         

                         <br style="clear: both;" /><br /><br />
				</div>
			</div><!-- end #dashboard -->
</div>