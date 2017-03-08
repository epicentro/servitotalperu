<div id="content_main" class="clearfix">

                <div id="dashboard_y">
				<h2 class="ico_mug">Sección: Contacto </h2>
				<div class="clearfix">
                         <br />
<script type="text/javascript" src="<?php echo base_url();?>js/fckeditor/fckeditor.js"></script>
<script type="text/javascript">

window.onload = function()
{
	var oFCKeditor = new FCKeditor( 'descripcion' ) ;
	oFCKeditor.BasePath = "<?php echo base_url();?>js/fckeditor/";
        oFCKeditor.Width  = '700' ;
	oFCKeditor.Height = '200' ;
        oFCKeditor.ReplaceTextarea();
        
        var oFCKeditor = new FCKeditor( 'bottom' ) ;
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


      <form id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>be/secciones/contacto" onsubmit="return validar();" >

        <table cellpadding="0" cellspacing="0" class="tb_mnto"  >



             <tr>
                <td>
                   Title
                </td>
                <td>
                 <input name="txt_title"  id="txt_title" style="width:400px;" value="<?php echo $title; ?>" /><br/>
                 </td>
            </tr>

             <tr>
                <td>
                   Keyword
                </td>
                <td>
                 <input name="txt_keyword"  id="txt_keyword" style="width:400px;" value="<?php echo $keyword; ?>" /><br/>
                 </td>
            </tr>

             <tr>
                <td>
                   Description
                </td>
                <td>
                 <input name="txt_description"  id="txt_description" style="width:400px;" value="<?php echo $description; ?>" /><br/>
                 </td>
            </tr>



            <tr>
                <td>
                   Título
                </td>
                <td>
                 <input name="txt_titulo"  id="txt_titulo" style="width:400px;" value="<?php echo $titulo; ?>"  /><br/>
                 </td>
            </tr>



            <tr>
                <td>
                 Descripción - Top
                </td>
                <td>
                    <textarea id="descripcion" rows="10" cols="20" name="descripcion"><?php echo $descripcion; ?></textarea>

                </td>
            </tr>
            
            
              <tr>
                <td>
                 Descripción - Bottom
                </td>
                <td>
                    <textarea id="bottom" rows="10" cols="20" name="bottom"><?php echo $bottom; ?></textarea>

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