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

    <img onclick="abrir_popup('<?php echo base_url()."be/".$this->tabla."/nuevo"?>',1000,650);" src="<?php echo base_url();?>img/agregar.png" width="16" height="16" title="Agregar Nuevo"/>

</div>
<div class="div_buscar">

    <img onclick="abrir_popup('<?php echo base_url()."be/".$this->tabla."/v_buscar"?>',400,200);" src="<?php echo base_url();?>img/lupa.png" width="25" height="25" title="Buscar"/>
    <?php
              if($this->session->userdata($this->tabla_padre."buscar")){
                 echo "Filtro aplicado: ".$buscar=$this->session->userdata($this->tabla_padre."buscar"); 
              ?>
    &nbsp;&nbsp;<img onclick="abrir_popup('<?php echo base_url()."be/".$this->tabla."/buscar_elimina_filtro"?>',400,200);" src="<?php echo base_url();?>img/cancel.png" width="16" height="16" title="Elimina Filtro"/>

              <?php
              }//endIF
    ?>
    
    <?php
              if($this->session->userdata($this->tabla_padre."categoria")){
                  
                 echo "Filtro aplicado: ".$nombre_categoria_filtro; 
              ?>
    &nbsp;&nbsp;<img onclick="abrir_popup('<?php echo base_url()."be/".$this->tabla."/buscar_elimina_filtro"?>',400,200);" src="<?php echo base_url();?>img/cancel.png" width="16" height="16" title="Elimina Filtro"/>

              <?php
              }//endIF
    ?>

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
            <th>¿Visible?</th>
            <th>Imagen</th>
            <th colspan="2">Control</th>
	</tr></thead>
	<?php foreach($filas as $row){  ?>
	<tr>
            <td><?php echo $row->idbanners; ?></td>
            <td><?php echo $row->nombre; ?></td>
            <td><?php echo $row->orden; ?></td>        

            <td>

                         <?php
                                 if( $row->idsw==1 ){

                                     echo "SI";

                                 }else{
                                     
                                     echo "NO";
                         
                                 }//endIF
                         ?>

                         


            </td>
            
            
            <td style="text-align: center;" >
                
                
                                        
                    
                    <?php
                              if($row->imagen!=""){
                   ?>
                    <a href="<?php echo base_url().$this->carpeta_img."/".$row->imagen ?>" class="nyroModal" rel="gal" title="<?php echo $row->nombre; ?>">

                              <img src="<?php echo base_url().$this->carpeta_img."/".$this->be_funciones->nombre_thumbs($row->imagen); ?>" /><br/>
                    </a>          
                   <?php
                              }//endIF
                   ?> 
                
                   <img class="img_link" onclick="abrir_popup('<?php echo base_url()."be/$this->tabla/v_imagen/".$row->$idtabla;?>',1000,400);" src="<?php echo base_url();?>img/edit.png" width="16" height="16" title="Actualizar"/>
                
            </td>
           
            
            <th style="text-align: center;" >


                        <img class="img_link" onclick="abrir_popup('<?php echo base_url()."be/".$this->tabla."/v_editar/".$row->$idtabla;?>',1000,530);" src="<?php echo base_url();?>img/edit.png" width="16" height="16" title="Actualizar"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <img class="img_link" onclick = "javascript:elimina_banners('<?php echo $row->$idtabla; ?>')" src="<?php echo base_url();?>img/cancel.png" width="16" height="16" title="Eliminar"/>


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




                       <br style="clear: both" />
                     <br />




                        




				</div>
			</div><!-- end #dashboard -->
</div>