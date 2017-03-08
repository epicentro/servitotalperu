  <div id="content_main" class="clearfix">

                <div id="dashboard_y">
				<h2 class="ico_mug"> Mnto. de <?php echo $this->tabla; ?></h2>
		<div class="clearfix">




               <br />
<script>
function abrir_popup(valor, ancho, alto){


  centrar_popup(valor,'name',ancho,alto,'yes');



}
</script>

<div class="div_agregar">

    <img onclick="abrir_popup('<?php echo base_url()."be/".$this->tabla."/nuevo/";?>',1000,350);" src="<?php echo base_url();?>img/agregar.png" width="16" height="16" title="Agregar Nuevo"/>

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
            <td ><?php echo $row->idmarcas; ?></td>
            <td style="text-align:center; " ><?php echo $row->nombre; ?></td>
            
            <td style="text-align: center;"  >

                   <?php
                              if($row->imagen!=""){
                   ?>
                              <img src="<?php echo base_url().$this->carpeta_img."/".$this->be_funciones->nombre_thumbs($row->imagen); ?>" /><br/>
                   <?php
                              }//endIF
                   ?> 
                
                   <img class="img_link" onclick="abrir_popup('<?php echo base_url()."be/$this->tabla/v_imagen/".$row->$idtabla;?>',1000,400);" src="<?php echo base_url();?>img/edit.png" width="16" height="16" title="Actualizar"/>
                   
                    
                        

            </td>

            <th  >

                    <img class="img_link" onclick="abrir_popup('<?php echo base_url()."be/$this->tabla/v_editar/".$row->$idtabla;?>',1000,350);" src="<?php echo base_url();?>img/edit.png" width="16" height="16" title="Actualizar"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                     <img class="img_link" onclick = "javascript:elimina_locales('<?php echo $row->$idtabla; ?>')" src="<?php echo base_url();?>img/cancel.png" width="16" height="16" title="Eliminar"/>    

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