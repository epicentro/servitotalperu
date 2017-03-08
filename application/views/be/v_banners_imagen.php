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
        <title>Upload</title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/personal.css" />

        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.6.2.js"></script>

 <!-- ESTE jquery-ui.js es muy importante para hacer AJAX CON JSON-->
 <script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui.js"></script>


 <script type="text/javascript" src="<?php echo base_url(); ?>js/mis_js.js"></script>
 <script type="text/javascript" src="<?php echo base_url();?>ajax/funciones_query.js"></script>



<script type="text/javascript">



function validar(){

    var file=$.trim($("#file").val());
    
    
    

   if(file.length==0){

       var men="Por favor seleccione el archivo .";
       alert(men);
       $("#file").focus();
        return false;

   }//endIF


   




}

</script>



    </head>
    <body>

       <form id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>be/<?php echo $this->tabla; ?>/imagen/<?php echo $id; ?>" onsubmit="return validar();" >

        <table cellpadding="0" cellspacing="0" class="tb_mnto"  >


<!--seo_title, seo_descripcion, seo_keywords, text_html-->


          <tr>
                    <td>Seleccione el archivo: </td>
                    <td>
                      Imagen para el slide : 1920px X 700px<br/>
                      
                      
                    <div class="upload"><input type="file" name="imagen" id="file" /></div>
                    </td>
          </tr>
       
            <tr>
                <td colspan="2">
                   <input type="submit" name="Subir" value="Grabar" id="save" />

                </td>

            </tr>

        </table>

       </form>
        
        <?php 
                $strsql="select imagen from $this->tabla where id$this->tabla='$id'";
                $fila=$this->modelo_base->c_una_fila($strsql);
                                        
                if(   strlen(trim($fila->imagen)) > 0 ){
        ?>
                   <img src="<?php echo base_url().$this->carpeta_img.'/'.$fila->imagen ?>" />
        <?php
                    
                   
                }//endIF
        ?>
        

    </body>
</html>
