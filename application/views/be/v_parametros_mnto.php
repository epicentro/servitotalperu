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

    <img onclick="abrir_popup('<?php echo base_url()."be/".$this->tabla."/nuevo/";?>',1000,300);" src="<?php echo base_url();?>img/agregar.png" width="16" height="16" title="Agregar Nuevo"/>

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
             <th style="width:300px;">LLave</th>    
            <th style="width:300px;">Valor</th>
            <th style="width:400px; text-align:center; ">Descripción</th>
            

            
            <th colspan="2">Control</th>
	</tr></thead>
	<?php foreach($filas as $row){ //idcategoria, nombre, orden?>
	<tr>
            <td ><?php echo $row->llave; ?></td>
            <td style="text-align:center; " ><?php echo $row->valor; ?></td>
            <td ><?php echo $row->descripcion; ?></td>
            

            


            <th style="width:200px;" >

                    <img class="img_link" onclick="abrir_popup('<?php echo base_url()."be/$this->tabla/v_editar/".$row->$idtabla;?>',1000,200);" src="<?php echo base_url();?>img/edit.png" width="16" height="16" title="Actualizar"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                     <img class="img_link" onclick = "javascript:elimina_parametros('<?php echo $row->$idtabla; ?>')" src="<?php echo base_url();?>img/cancel.png" width="16" height="16" title="Eliminar"/>    

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