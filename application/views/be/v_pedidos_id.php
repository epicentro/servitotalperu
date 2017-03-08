  <div id="content_main" class="clearfix">

                <div id="dashboard_y">
				<h2 class="ico_mug"> Buscar Pedido</h2>
				<div class="clearfix">




                         <br />



<form id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>be/pedido/buscarid/mostrar/" onsubmit="return validar();" >

        <table cellpadding="0" cellspacing="0" class="tb_mnto"  >


<!--seo_title, seo_descripcion, seo_keywords, text_html-->


          
                    <td> BuscarID: </td>
                    <td>
                        <input type="text" name="txt_id" id="txt_id" value="<?php echo $txt_id;; ?>">
                    </td>

                    <td >
                       <input type="submit" name="Subir" value="Mostrar" id="save" />

                    </td>

            

        </table>

       </form>


<br><br>




<?php

           if($filas!="" &&  $filas!="0" ){
            //$getSubcat!="" sera cuando todavia no se selecciono ningún elemento del combo categoria
            //$getSubcat!="0" ocurrira cuando en una paginación solo existe una fila y lo eliminamos por defecto
            //                regresara a la misa url pero como no existira ya ninguna fila evitamos que salte el error

               //idpedidos, idcliente, fecha_y_hora, idtipo_pago, idtipo_registro
 ?>


<table  cellpadding="0" cellspacing="0" class="tb_mnto">
	<thead><tr>
            <th>IdPedido</th>
            <th>Cliente</th>
            <th>Fecha y Hora</th>
            <th>Tipo Pago</th>
            <th>Tipo Registro</th>
            <th>Estado</th>
            <th>Total </th>

            
           
	</tr></thead>
	<?php foreach($filas as $row){ //idcategoria, nombre, orden?>
	<tr>
            <td style="text-align: center;"><a class="link_subrayado" href="<?php echo base_url()."be/pedido/".$row->idpedidos; ?>"><?php echo $row->idpedidos; ?></a></td>
            <td><?php echo $this->be_funciones->nombre_cliente($row->idcliente); ?></td>
            <td style="text-align: center;"><?php echo $this->be_funciones->formato_fecha_hora($row->fecha_y_hora); ?></td>
            <td style="text-align: center;"><?php echo $this->be_funciones->tipo_pago($row->idtipo_pago); ?></td>
            <td style="text-align: center;"><?php echo $this->be_funciones->tipo_registro($row->idtipo_registro);  ?></td>
            <td style="text-align: center;"><?php echo $this->be_funciones->estado_pedido($row->idestado);  ?></td>
            <td style="text-align:right; padding-right: 5px;"><?php echo $this->be_funciones->simbolo_moneda($row->idmoneda).$this->be_funciones->calcula_total($row->idpedidos); ?></td>
            
            
            
        </tr>
    <?php }//endFor?>
</table>

<?php
           }//endIF


           //$url=base_url().$this->uri->uri_string();
           //$this->session->set_userdata('guardar_url', $url);
?>




                         <br style="clear: both;" /><br /><br />




				</div>
			</div><!-- end #dashboard -->
</div>