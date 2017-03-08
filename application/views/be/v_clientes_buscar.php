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
        <title>Buscar</title>
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
    /*
    var txt_title=$.trim($("#txt_title").val());
    var txt_keyword=$.trim($("#txt_keyword").val());
    var txt_description=$.trim($("#txt_description").val());

    var txt_nombre=$.trim($("#txt_nombre").val());
    
    //var cbo_categoria=$.trim($("#cbo_categoria").val());
    var txt_orden=$.trim($("#txt_orden").val());

   if(txt_title.length==0){

       var men="Por favor ingrese el Title.";
       alert(men);
       $("#txt_title").focus();
        return false;

   }//endIF


   if(txt_keyword.length==0){

       var men="Por favor ingrese el Keyword.";
       alert(men);
       $("#txt_keyword").focus();
        return false;

   }//endIF

   if(txt_description.length==0){

       var men="Por favor ingrese Description.";
       alert(men);
       $("#txt_description").focus();
        return false;

   }//endIF

   if(txt_nombre.length==0){

       var men="Por favor ingrese el nombre.";
       alert(men);
       $("#txt_nombre").focus();
        return false;

   }//endIF

   

  

   if(txt_orden.length==0){

      var men="Por favor ingrese el orden.";
       alert(men);
       $("#txt_orden").focus();
        return false;


   }//endIF
  */



}

</script>



    </head>
    <body>
        
        

       <form id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>be/<?php echo $this->tabla; ?>/buscar" onsubmit="return validar();" >

        <table cellpadding="0" cellspacing="0" class="tb_mnto"  >



           <tr>
                <td >
                    Filtro

                </td>
                <td >
                    <input type="text" id="buscar" name="buscar">

                </td>

            </tr>
            
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">
                   <input type="submit" name="Subir" value="Buscar" id="save" />

                </td>

            </tr>

        </table>

       </form>
        
        <form id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>be/<?php echo $this->tabla; ?>/buscar" onsubmit="return validar();" >

        <table cellpadding="0" cellspacing="0" class="tb_mnto"  >


          
            <tr>
                <td >
                    Categoría
                </td>
                <td >
                    <select name="categoria" id="categoria">
                    <?php echo $combo; ?>    
                    </select>
                </td>

            </tr>



            <tr>
                <td>&nbsp;</td>
                <td >
                   <input type="submit" name="Subir" value="Buscar" id="save" />

                </td>

            </tr>

        </table>

       </form>

    </body>
</html>
