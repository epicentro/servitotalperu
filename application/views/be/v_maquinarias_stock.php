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
        <title>Actualizar Stock</title>
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
    
    
    var stock=$.trim($("#txt_stock").val());
    

   

     
   if(stock.length==0){

       var men="Por favor ingrese el stock.";
       alert(men);
       $("#txt_stock").focus();
        return false;

   }//endIF

   

  

  



}

</script>



    </head>
    <body>
        
        

       <form id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>be/<?php echo $this->tabla; ?>/stock/<?php echo $id; ?>" onsubmit="return validar();" >

        <table cellpadding="0" cellspacing="0" class="tb_mnto"  >

<!--seo_title, seo_descripcion, seo_keywords, text_html-->

            <tr>
                <td>Stock </td>
                <td>
                    <input type="text" value="<?php echo $stock; ?>" name="txt_stock" id="txt_stock">
                </td>

            </tr>

            <tr>
                <td colspan="2">
                   <input type="submit" name="Subir" value="Grabar" id="save" />

                </td>

            </tr>

        </table>

       </form>

    </body>
</html>
