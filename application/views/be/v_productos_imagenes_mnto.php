   <div id="content_main" class="clearfix">

                <div id="dashboard_y">
				<h2 class="ico_mug"> Fotos : <?php echo $nombre; ?></h2>
				<div class="clearfix">




                         <br />
<script>
function abrir_popup(valor, ancho, alto){

          centrar_popup(valor,'name',ancho,alto,'yes');

}
</script>


<div class="div_agregar">

    <img onclick="abrir_popup('<?php echo base_url()."be/".$this->tabla."/v_imagen/".$id;?>',1000,300);" src="<?php echo base_url();?>img/agregar.png" width="16" height="16" title="Agregar Nuevo"/>

</div>



<?php

           if($filas!="" &&  $filas!="0" ){
            //$getSubcat!="" sera cuando todavia no se selecciono ningún elemento del combo categoria
            //$getSubcat!="0" ocurrira cuando en una paginación solo existe una fila y lo eliminamos por defecto
            //                regresara a la misa url pero como no existira ya ninguna fila evitamos que salte el error

               //idnoticias, titulo, foto, fecha, clave, idioma
 ?>


<table  cellpadding="0" cellspacing="0" class="tb_mnto">
	<thead><tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Orden</th>
            <th>Primera Foto</th>
            
            <th colspan="2">Control</th>
	</tr></thead>
	<?php foreach($filas as $row){  ?>
	<tr>
            <td><?php echo $row->$idtabla; ?></td>
            <td>
                
                <img width="150" src="<?php echo base_url().$this->carpeta_img."/".$this->be_funciones->nombre_thumbs($row->imagen); ?>"/>
            </td>
            
            <td>
                <?php echo $row->orden; ?><br/>
                <img class="img_link" onclick="abrir_popup('<?php echo base_url()."be/productos_imagenes/v_imagen_orden/$id/".$row->idproductos_imagenes;?>',1000,230);" src="<?php echo base_url();?>img/edit.png" width="16" height="16" title="Actualizar"/>
            </td>

          <td>
                <?php  if($row->idprimera_foto=="1"){echo "Si";}else{ echo "No"; } ?><br/>
                <img class="img_link" onclick="abrir_popup('<?php echo base_url()."be/productos_imagenes/v_imagen_pf/$id/".$row->idproductos_imagenes;?>',1000,230);" src="<?php echo base_url();?>img/edit.png" width="16" height="16" title="Actualizar"/>
            </td>
            
            
           
            
            <td style="text-align: center;" >


                        <img class="img_link" onclick="abrir_popup('<?php echo base_url()."be/productos_imagenes/v_imagen_editar/$id/".$row->$idtabla;?>',1000,530);" src="<?php echo base_url();?>img/edit.png" width="16" height="16" title="Actualizar"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <img class="img_link" onclick = "javascript:elimina_productos_imagenes('<?php echo $row->$idtabla; ?>')" src="<?php echo base_url();?>img/cancel.png" width="16" height="16" title="Eliminar"/>


            </td>
        </tr>
    <?php }//endFor?>
</table>

<?php
           }//endIF


           //$url=base_url().$this->uri->uri_string();
           //$this->session->set_userdata('guardar_url', $url);
?>

<div class="pagination"><?php  echo  $this->pagination->create_links(); ?></div>




                       <br style="clear: both" />
                     <br />




                     <input type="button" value="Regresar" id="save" />




				</div>
			</div><!-- end #dashboard -->
</div>
<?php 
   
    //CUANDO ENTRA LA PRIMERA VEZ CAPTURAMOS LA RUTA DE DONDE VINO
    //Y LO GUARDAMOS EN UNA VARIABLE DE SESSION
    if(!$this->session->userdata('ruta_mnto_productos')){
           
           $ruta=$_SERVER['HTTP_REFERER'];
           $this->session->set_userdata('ruta_mnto_productos', $ruta);
       }
       
   
  ?>
  
<script>
$("#save").click(function(){
    
    window.location.href="<?php echo $this->session->userdata('ruta_mnto_productos');?>";
    
    
});

</script>
    