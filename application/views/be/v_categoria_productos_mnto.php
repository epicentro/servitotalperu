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
<?php

           if($filas!="" &&  $filas!="0" ){
            //$getSubcat!="" sera cuando todavia no se selecciono ningún elemento del combo categoria
            //$getSubcat!="0" ocurrira cuando en una paginación solo existe una fila y lo eliminamos por defecto
            //                regresara a la misa url pero como no existira ya ninguna fila evitamos que salte el error

               //idproducto, nombre, descripcion, archivo, foto, thumb, precio


                echo $filas;
        

	

           }//endIF


          
?>



                          <br style="clear: both" />
                          <br/>




				</div>
			</div><!-- end #dashboard -->
</div>