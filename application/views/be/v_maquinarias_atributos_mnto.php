  <div id="content_main" class="clearfix">

                <div id="dashboard_y">
				<h2 class="ico_mug"> Mnto. de <?php echo $this->tabla; ?></h2>
		<div class="clearfix">




               <br />


<div cellpadding="0" cellspacing="0"  class="div_agregar">

    
    <table class="tb_mnto">
        <tr>
            <td>Seleccione el especial:</td>
            <td>
                <select name="cbo_atributos" id="cbo_atributos">
                    <option value="0">Seleccione...</option>
                    <?php
                          echo $combo;
                    ?>
                    
                </select>
                
            </td>
            <td><a href="#" id="mostrar_especial" class="save" >Mostrar</a></td>
        </tr>
    </table>

</div>

<?php

           if($filas!="" &&  $filas!="0" ){
            //$getSubcat!="" sera cuando todavia no se selecciono ningún elemento del combo categoria
            //$getSubcat!="0" ocurrira cuando en una paginación solo existe una fila y lo eliminamos por defecto
            //                regresara a la misa url pero como no existira ya ninguna fila evitamos que salte el error

               //idparametros, llave, valor, descripcion
 ?>


<table  cellpadding="0" cellspacing="0" class="tb_mnto" >
	<thead><tr>
            <th >Id</th>    
            <th >Nombre</th>
            <th >Imagen</th>
            
            

            
            <th colspan="2">Control</th>
	</tr></thead>
	<?php foreach($filas as $row){  ?>
	<tr>
            <td ><?php echo $row->idproductos; ?></td>
            <td style="text-align:center; " ><?php echo $row->nombre; ?></td>
            
            <td style="text-align: center;"  >

                   <?php
                              $imagen=$this->be_parametros->primera_foto($row->idproductos);
                              if(strlen($imagen)>0){
                                  
                   ?>
                              <img src="<?php echo base_url().$this->carpeta_img."/".$this->be_funciones->nombre_thumbs($imagen); ?>" /><br/>
                   <?php
                              }//endIF
                   ?> 
                
                  
                   
                    
                        

            </td>

            <th  >

                    
                    
                     <img class="img_link" onclick = "javascript:elimina_productos_atributos('<?php echo $row->idproductos_atributos; ?>')" src="<?php echo base_url();?>img/cancel.png" width="16" height="16" title="Eliminar"/>    

            </th>


            
            
        </tr>
    <?php }//endFor?>
</table>

<?php
           }//endIF


           //$url=base_url().$this->uri->uri_string();
           //$this->session->set_userdata('guardar_url', $url);
?>


<div class="pagination"><?php  echo  $this->pagination->create_links(); ?></div>

                         <br style="clear: both;" /><br /><br />




				</div>
			</div><!-- end #dashboard -->
</div>

<script>
  
  $("#mostrar_especial").click(function(e){
        e.preventDefault();
        var cbo_especial=$('#cbo_atributos').val();
        if(cbo_especial!="0"){
            
           var  ruta=window.document.domain;
           if(document.domain=="localhost"){
               
                var ruta="http://localhost/blamac/be/productos_atributos/inicio/"+cbo_especial;
            }else{
                var ruta="http://"+document.domain+"/be/productos_atributos/inicio/"+cbo_especial;
            }
            
            window.location.href=ruta;
            
            
            
        }else{
            
            var mensaje="Por favor seleccione un Especial";
            alert(mensaje);
        }
   
      
  });
</script>