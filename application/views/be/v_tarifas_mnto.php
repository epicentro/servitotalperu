  <div id="content_main" class="clearfix">

                <div id="dashboard_y">
				<h2 class="ico_mug"> Tarifas: <?php echo $this->be_funciones->nombre_pais($this->uri->segment(4)); ?></h2>
		<div class="clearfix">




               <br />
<script>
function abrir_popup(valor, ancho, alto){


  centrar_popup(valor,'name',ancho,alto,'yes');



}
</script>

<div class="div_agregar">

    <img onclick="abrir_popup('<?php echo base_url()."be/".$this->tabla."/nuevo/".$id;?>',1000,350);" src="<?php echo base_url();?>img/agregar.png" width="16" height="16" title="Agregar Nuevo"/>

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
            <th >Rango Inicial</th>
            <th >Rango Final</th>
            <th >Precio económico</th>
            <th >Precio Urgente</th>
            

            
            <th colspan="2">Control</th>
	</tr></thead>
	<?php foreach($filas as $row){  ?>
	<tr>
            <td ><?php echo $row->$idtabla; ?></td>
            <td style="text-align:center; " ><?php echo $row->rango_inicial; ?></td>
            <td style="text-align:center; " ><?php echo $row->rango_final; ?></td>
            <td style="text-align:center; " ><?php echo $row->precio_economico; ?></td>
            <td style="text-align:center; " ><?php echo $row->precio_urgente; ?></td>
            
            <th  >

                    <img class="img_link" onclick="abrir_popup('<?php echo base_url()."be/$this->tabla/v_editar/".$row->$idtabla;?>',1000,350);" src="<?php echo base_url();?>img/edit.png" width="16" height="16" title="Actualizar"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                     <img class="img_link" onclick = "javascript:elimina_tarifas('<?php echo $row->$idtabla; ?>')" src="<?php echo base_url();?>img/cancel.png" width="16" height="16" title="Eliminar"/>    

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

                            <input type="button" value="Regresar" id="save" />


				</div>
			</div><!-- end #dashboard -->
</div>

<?php 
   
    //CUANDO ENTRA LA PRIMERA VEZ CAPTURAMOS LA RUTA DE DONDE VINO
    //Y LO GUARDAMOS EN UNA VARIABLE DE SESSION
    if(!$this->session->userdata('ruta_mnto_tarifas')){
           
           $ruta=$_SERVER['HTTP_REFERER'];
           $this->session->set_userdata('ruta_mnto_tarifas', $ruta);
           //echo $this->session->set_userdata('ruta_mnto_tarifas');
       }
       
   
  ?>
  
<script>
$("#save").click(function(){
    
    window.location.href="<?php echo $this->session->userdata('ruta_mnto_tarifas');?>";
    
    
});

</script>