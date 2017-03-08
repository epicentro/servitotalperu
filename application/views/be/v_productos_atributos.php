<?php
           if(isset($recarga_padre) && $recarga_padre=="si"){

              
				   echo "<script>";
				   echo " window.opener.location.reload();";
                                   echo " window.close();";
				   echo "</script>";
                                   exit();
           }//endIF
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Agregar especiales</title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/personal.css" />

        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.6.2.js"></script>

 <!-- ESTE jquery-ui.js es muy importante para hacer AJAX CON JSON-->
 <script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui.js"></script>


 <script type="text/javascript" src="<?php echo base_url(); ?>js/mis_js.js"></script>
 <script type="text/javascript" src="<?php echo base_url();?>ajax/funciones_query.js"></script>
 <script type="text/javascript" src="<?php echo base_url();?>js/fckeditor/fckeditor.js"></script>

<script type="text/javascript">

window.onload = function()
{
	/*
        var oFCKeditor = new FCKeditor( 'sumilla' ) ;
	oFCKeditor.BasePath = "<?php echo base_url();?>js/fckeditor/";
        oFCKeditor.Width  = '700' ;
	oFCKeditor.Height = '300' ;
        oFCKeditor.ReplaceTextarea();
       */
}


function validar(){
    
    
    var cbo_especial=$.trim($("#cbo_especial").val());
    

   

     
   if(cbo_especial=="0"){

       var men="Por favor seleccione un especial.";
       alert(men);
       $("#cbo_especial").focus();
        return false;

   }//endIF

   

  

  



}

</script>



    </head>
    <body>
        
        

       <form id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>be/<?php echo $this->tabla; ?>/atributos/<?php echo $id; ?>" onsubmit="return validar();" >

        <table cellpadding="0" cellspacing="0" class="tb_mnto"  >

<!--seo_title, seo_descripcion, seo_keywords, text_html-->

            <tr>
                <td>
                Atributos:
                </td>
                <td>
                        <select name='cbo_atributos' id='cbo_atributos'>
                        <option value="0">Seleccione una opción...</option>
                        <?php echo $combo; ?>
                        </select>
                </td>
            </tr>              

            <tr>
                <td colspan="2">
                   <input type="submit" name="Subir" value="Agregar" id="save" />

                </td>

            </tr>

        </table>

       </form>

    </body>
</html>
