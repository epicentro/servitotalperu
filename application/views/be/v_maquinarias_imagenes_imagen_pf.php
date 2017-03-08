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
        <title>Orden</title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/personal.css" />

        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.6.2.js"></script>

 <!-- ESTE jquery-ui.js es muy importante para hacer AJAX CON JSON-->
 <script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui.js"></script>


 <script type="text/javascript" src="<?php echo base_url(); ?>js/mis_js.js"></script>
 <script type="text/javascript" src="<?php echo base_url();?>ajax/funciones_query.js"></script>






    </head>
    <body>

       <form id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>be/<?php echo $this->tabla; ?>/imagen_pf/<?php echo $id; ?>/<?php echo $idtabla; ?>" onsubmit="return validar();" >

        <table cellpadding="0" cellspacing="0" class="tb_mnto"  >


<!--seo_title, seo_descripcion, seo_keywords, text_html-->


       
           <tr>
                    <td>Primera Foto?: </td>
                    <td>
                    
                        <select id="pf" name="pf">
                            <?php
                            if($idprimera_foto=="1"){
                            ?>
                                <option selected value="1">Si</option>
                                <option value="2">No</option>
                            <?php
                            }else{
                            ?>
                                <option  value="1">Si</option>
                                <option selected value="2">No</option>
                            <?php
                            }//endIF
                            ?>
                            
                            
                            
                            
                        </select>
                        
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
                $strsql="select imagen from $this->tabla where id$this->tabla='$idtabla'";
               
                
                $fila=$this->modelo_base->c_una_fila($strsql);
                
             
                 
              
                if(  $fila!="0" ){
        ?>
                   <img src="<?php echo base_url().$this->carpeta_img.'/'.$fila->imagen ?>" />
        <?php
                    
                   
                }//endIF
               
                 
        ?>

    </body>
</html>
