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
        <title>Nuevo Registro</title>
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
        
        

       <form id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>be/<?php echo $this->tabla; ?>/editar/<?php echo $id; ?>" onsubmit="return validar();" >

        <table cellpadding="0" cellspacing="0" class="tb_mnto"  >


<!--seo_title, seo_descripcion, seo_keywords, text_html-->

      

            
            <?php
                   
              //PONEMOS CADA FILA DEL ARRAY EN UNA VARIABLE $fila 
              foreach($this->estructura_editar as $filas){
                   
                     
                     //LA FILA $fila la vaciamos en key=>valor
                     foreach($filas as $i => $value){
                            //echo $i."=".$filas[$i]."<br/>";
                     }//endFor
                     
                        if($filas["show"]=="si"){
                                
                                if($filas["clave"]=="foranea"){
                                        
                                        if($filas["multinivel"]=="si"){
            ?>                  
                                    
                                    
                                                <tr>
                                                        <td>
                                                        <?php echo $filas["rotulo"]; ?>
                                                        </td>
                                                        <td>
                                                                <select name='<?php echo $filas["nombre_campo"]; ?>' id='<?php echo $filas["nombre_campo"]; ?>'>
                                                                <option value="0">Seleccione una categoría</option>
                                                                <?php echo $combo; ?>
                                                                </select>
                                                        </td>
                                                </tr>   
                                    
           <?php                         
                                    
                                    
                                       }elseif($filas["multinivel"]=="no"){
                                    
                                    
             ?>
                                                <tr>
                                                        <td>
                                                        <?php echo $filas["rotulo"]; ?>
                                                        </td>
                                                        <td>

                                                        <?php 
                                                                    //si es clave foranea averiguamos la tabla
                                                                    $parte=explode("id", $filas["nombre_campo"]);
                                                                    $tabla=$parte[1];
                                                                    //Aquí $filas["nombre_campo"] es el ID de la Tabla
                                                                    $strsql="select ".$filas["nombre_campo"].", nombre from ".$tabla;
                                                                    $rows=$this->modelo_base->consulta($strsql);

                                                                    //LAS CLAVES FORANEAS SIEMPRE VAN EN COMBOS
                                                                    echo "<select name='".$filas["nombre_campo"]."' id='".$filas["nombre_campo"]."'>";
                                                                    if($rows!="0"){
                                                                        foreach($rows as $row){

                                                                            if($filas["valor"]==$row->$filas["nombre_campo"]){
                                                                                echo "<option value='".$row->$filas["nombre_campo"]."' selected>".$row->nombre."</option>";
                                                                            }else{
                                                                                echo "<option value='".$row->$filas["nombre_campo"]."' >".$row->nombre."</option>";
                                                                            }//endIF

                                                                        }//endFor
                                                                    }//endIF    
                                                                    echo "</select>";
                                                        ?>   

                                                        </td>
                                                </tr>    
            <?php                     
                                            
                                  
                                       }//endIF                    
            
            
                                }else if($filas["clave"]=="no"){//SI NO ES CLAVE FOREANA NI PRIMARIA
                                  
                                    //PREGUNTAMOS EL TIPO DE CAMPO SI ES TEXT
                                    if($filas["tipo"]=="text"){
                                        
             ?>                          
                                       <tr>
                                                <td>
                                                <?php echo $filas["rotulo"]; ?>
                                                </td>
                                                <td>
                                                <textarea name="<?php echo $filas["nombre_campo"]; ?>" id="<?php echo $filas["nombre_campo"]; ?>" rows="10" cols="20" ><?php echo $filas["valor"]; ?></textarea>
                                                <script>
                                                
                                                            var oFCKeditor = new FCKeditor( '<?php echo $filas["nombre_campo"]; ?>' ) ;
                                                            oFCKeditor.BasePath = "<?php echo base_url();?>js/fckeditor/";
                                                            oFCKeditor.Width  = '700' ;
                                                            oFCKeditor.Height = '300' ;
                                                            oFCKeditor.Config['EnterMode'] = 'br';
                                                            oFCKeditor.ReplaceTextarea();

                                                   
                                                </script>
                                                </td>
                                        </tr>   
                                        
                                        
              <?php                           
                                        
                                    }elseif($filas["tipo"]=="varchar"){
                                        
                                             if(substr($filas["nombre_campo"], 0, 5)=="fecha"){
                                                 
                                                 $filas["valor"]=$this->be_funciones->formato_fecha($filas["valor"]);
                                             }//endiF
                                        
            ?>                          
                                         
                                           
                                                 <tr>
                                                        <td>
                                                        <?php echo $filas["rotulo"]; ?>
                                                        </td>
                                                        <td>
                                                                <input name="<?php echo $filas["nombre_campo"]; ?>"  id="<?php echo $filas["nombre_campo"]; ?>" value="<?php echo $filas["valor"]; ?>" style="width:400px;"  /><br/>
                                                        </td>
                                                </tr>   
                                        
                                        
                                        
                                        
             <?php                                                       
                                        
                                    }//endIF
                              
                            
            ?>
                                        
                                        
                                        
            <?php
                               }//endIF DE CLAVE 
                        }//endIF DE SHOW
                        
                        
                     
                   
               }//endFor DEL PRIMER FOR
          
          ?>

            
            
          
            




            <tr>
                <td colspan="2">
                   <input type="submit" name="Subir" value="Grabar" id="save" />

                </td>

            </tr>

        </table>

       </form>

    </body>
</html>
