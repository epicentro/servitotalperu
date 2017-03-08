<div id="content_main" class="clearfix">

                <div id="dashboard_y">
				<h2 class="ico_mug">Sección: Pedido </h2>
				<div class="clearfix">
                         <br />

</script>

<script type="text/javascript">
function abrir_popup(valor, ancho, alto){

          centrar_popup(valor,'name',ancho,alto,'yes');

}    
    
function cerrar_pedido(){
    
    if(confirm("¿Seguro de Cerrar este Pedido?")){
     window.location.href='<?php echo base_url()."be/pedido/cerrar_pedido/".$idpedido; ?>';
     }
}//endFunction


function eliminar_pedido(){
     if(confirm("¿Seguro de Eliminar este Pedido?")){
     window.location.href='<?php echo base_url()."be/pedido/eliminar_pedido/".$idpedido; ?>';
     }
    
}//endFunction

function lugar_entrega_midireccion(){

    if(confirm("¿Seguro de Cambiar el lugar de entrega?")){
     window.location.href='<?php echo base_url()."be/pedido/lugar_entrega_midireccion/".$idpedido; ?>';
     }
}

function enviar_por_email(){

     window.location.href='<?php echo base_url()."be/pedido/envio_email/".$idpedido; ?>';
    
}//endFunction


 </script>


      

        <table cellpadding="0" cellspacing="0" class="tb_mnto"  >


             <tr>
                <th colspan="2" style="text-align: left;">
                     CLIENTE
                </th>
                
            </tr> 
             <tr>
                <td>
                   IDcliente
                </td>
                <td style="width:350px;" >
                 <?php echo $idcliente; ?>
                 </td>
            </tr>

           <tr>
                <td>
                   Nombres
                </td>
                <td>
                 <?php echo $nombres; ?>
                 </td>
            </tr>
           
            <tr>
                <td>
                   Apellidos
                </td>
                <td>
                 <?php echo $apellidos; ?>
                 </td>
            </tr>
            
            <tr>
                <td>
                   Email
                </td>
                <td>
                 <?php echo $email; ?>
                 </td>
            </tr>
            
            


        </table>
      
        <br/> 
        <table cellpadding="0" cellspacing="0" class="tb_mnto"  >


             <tr>
                <th colspan="2" style="text-align: left;">
                    DIRECCIÓN DE ENTREGA : 
                    
                     
                </th>
            </tr> 
            
              <tr>
                 <td>
                  País
                </td>
                <td >
                    <?php echo $pais; ?>
                 </td>
            </tr>
            
            <tr>
                 <td>
                  Contacto
                </td>
                <td >
                    <?php echo $nombre_contacto; ?>
                 </td>
            </tr>
            
             
              <tr>
                 <td>
                  Dirección
                </td>
                <td >
                    <?php echo $direccion; ?>
                 </td>
            </tr>
            
            <tr>
                 <td>
                  Código_Postal
                </td>
                <td >
                    <?php echo $codigo_postal; ?>
                 </td>
            </tr>
            
            <tr>
                 <td>
                  Ciudad
                </td>
                <td >
                    <?php echo $poblacion; ?>
                 </td>
            </tr>
            
            <tr>
                 <td>
                  Provincia
                </td>
                <td >
                    <?php echo $provincia; ?>
                 </td>
            </tr>
            
            <tr>
                 <td>
                  Teléfono
                </td>
                <td >
                    <?php echo $telefono; ?>
                 </td>
            </tr>
            
            <tr>
                 <td>
                  Celular
                </td>
                <td >
                    <?php echo $celular; ?>
                 </td>
            </tr>
            
            
            
           
        </table>
 
         
         <!--
         <table cellpadding="0" cellspacing="0" class="tb_mnto"  >
             <tr>
                <th colspan="2" style="text-align: left;">
                      OBSERVACIÓN DEL PEDIDO              
                </th>
                
            </tr> 
             <tr>
                <td>
                   Observación:
                </td>
                <td style="width: 300px; padding: 5px;">
                    <textarea name="txt_obs_pedido" id="txt_obs_pedido" cols="40" rows="10"><?php echo $observacion; ?></textarea>
                    
                 </td>
            </tr>
         </table>
          
         -->
        
        <br/>
        <table cellpadding="0" cellspacing="0" class="tb_mnto"  >
             <tr>
                <th colspan="2" style="text-align: left;">
                      PEDIDO               
                </th>
                
            </tr> 
             <tr>
                <td>
                   IDPedido
                </td>
                <td style="width:350px;">
                 <?php echo $idpedido; ?>
                 </td>
            </tr>
            
            <tr>
                <td>
                   Estado
                </td>
                <td style="color: #01429a;">
                 <?php echo $estado; ?>
                 </td>
            </tr>
            
            <tr>
                <td>
                   IP Origen
                </td>
                <td>
                 <?php echo $ip_visita. " ". $pais_origen; ?>
                 </td>
            </tr>
            
            <tr>
                <td>
                   Tipo Registro
                </td>
                <td>
                 <?php echo $tipo_registro; ?>
                    
                 </td>
            </tr>
            
            <tr>
                <td>
                   Tipo Pago
                </td>
                <td>
                 <?php echo $tipo_pago; ?>
                    
                 </td>
            </tr>

            <tr>
                <td>
                   Metodo de Envio
                </td>
                <td>
                 <?php echo $metodo_envio; ?>
                    
                 </td>
            </tr>
            
             <tr>
                <td>
                   Fecha
                </td>
                <td>
                 <?php echo $fecha_y_hora; ?>
                 </td>
            </tr>
            
            
            
           


        </table>
         
         

       
         <br/>
         <br/>
         <?php if($idestado!=3){ ?>
         
         <input type="button" value="Enviar pedido por Email" id="save" onclick="javascript:enviar_por_email();" />
         
         <?php 
            echo $this->session->userdata("mensaje");
            $this->session->unset_userdata("mensaje");
         
         ?>
         
         <?php }//endIF ?>
         <br/>
         <br/>
         
         
         
         
         <?php

           if($filas!="" &&  $filas!="0" ){
            //$getSubcat!="" sera cuando todavia no se selecciono ningún elemento del combo categoria
            //$getSubcat!="0" ocurrira cuando en una paginación solo existe una fila y lo eliminamos por defecto
            //                regresara a la misa url pero como no existira ya ninguna fila evitamos que salte el error

               //iddetalle, idproducto, cantidad, precio, idtarjeta, precio_tarjeta, 
               //  idpapel_regalo, precio_papel
               
              
 ?>


<table  cellpadding="0" cellspacing="0" class="tb_mnto">
	<thead><tr>
            <th>IdProducto</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th >Total (<?php echo $simbolo; ?>)</th>
            
	</tr></thead>
	<?php 
        $sumaPeso="0.00";
        foreach($filas as $row){ //iddetalle, idproducto, cantidad, precio, idtarjeta, precio_tarjeta,  idpapel_regalo, precio_papel
                   
            $sumaPeso+=$row->peso;
        ?>
	<tr>
            <td style="text-align: center;"><?php echo $row->idproductos; ?></td>
            <td style="width: 800px;"><?php echo $this->be_funciones->nombre_producto($row->idproductos); ?></td>
            <td style="text-align: right; padding-right: 5px; text-align: center;">
                <?php echo $row->cantidad; ?>
            </td>
            <td style="text-align: right; padding-right: 5px;"><?php echo $row->precio; ?></td>
            
           
            <td style="text-align: right; padding-right: 5px;">
                <?php 
                    
                    $total_item= ($row->cantidad * $row->precio);
                    echo sprintf("%.2f",$total_item);

                ?>
            </td>
            
            
            
        </tr>
    <?php }//endFor?>
        
         <tr> 
            <td colspan="4" style="text-align: right; padding-right: 5px;">SUBTOTAL (<?php echo $simbolo; ?>):</td>
            <td style="text-align: right; padding-right: 5px; color: #01429a;"><?php echo $subtotal; ?></td>
            <td></td>
            
        </tr>
        
        <?php
        
            $fila=$this->be_funciones->precio_x_peso($pais_destino, $sumaPeso);
            $rango_peso="";
            if($fila!="0"){
                 $rango_peso=$fila->rango_inicial." - ".$fila->rango_final."gr.";

            }//endIF
        
        ?>
        
        
        
        <tr> 
            <td colspan="4" style="text-align: right; padding-right: 5px;">
            <strong>Costo de Transporte <?php echo $sumaPeso; ?>gr. </strong>
                   [Tarifa: <?php echo $rango_peso; ?>] (<?php echo $simbolo; ?>) :  
            </td>
            <td style="text-align: right; padding-right: 5px; color: #01429a;"><?php echo $gastos_envio; ?></td>
            <td></td>
            
        </tr>
        
       
       
        
        
        
        <tr> 
            <td colspan="4" style="text-align: right; padding-right: 5px; font-weight: bold;">TOTAL (<?php echo $simbolo; ?>):</td>
            <td style="text-align: right; padding-right: 5px; color: #01429a;"><?php echo $total; ?></td>
            <td></td>
            
        </tr>
</table>

<?php
           }//endIF


           //$url=base_url().$this->uri->uri_string();
           //$this->session->set_userdata('guardar_url', $url);
?>
         
         
        <br/>
         <br/>
         <?php if($idestado==1){ ?>
         <input type="button" value="Cerrar Pedido" id="save" onclick="javascript:cerrar_pedido();" />
         <input type="button" value="Rechazar / Eliminar Pedido" id="save" onclick="javascript:eliminar_pedido();" />
         <?php }elseif($idestado==2){//endIF ?>
         <input type="button" value="Rechazar / Eliminar Pedido" id="save" onclick="javascript:eliminar_pedido();" />
         <?php }//endIF ?>
         <br/>
         <br/> 
         
          <?php if($idestado==3){ ?>
          <form id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>be/pedido/graba_obs_anula/<?php echo $idpedido; ?>"  >
         <table cellpadding="0" cellspacing="0" class="tb_mnto"  >
             <tr>
                <th colspan="2" style="text-align: left;">
                      OBSERVACIÓN DE ANULACIÓN              
                </th>
                
            </tr> 
             <tr>
                <td>
                   ¿Por qué se rechazó o Anuló?
                </td>
                <td style="width: 300px; padding: 5px;">
                    <textarea name="txt_obs_anula" id="txt_obs_anula" cols="40" rows="10"><?php echo $obs_anula_rechazo; ?></textarea>
                    <input type="submit" value="Grabar Observación" id="save"  />
                 </td>
            </tr>
         </table>
          </form>     
         <?php }//endIF ?>
                         

         <div style="text-align: right; padding-right: 5px;"> 
             <input type="button" value="Regresar" id="save" name="save" value="Regresar" onclick="javascript:window.history.back();"  />
             
         </div>
         
         
                         <br style="clear: both;" /><br /><br />
				</div>
			</div><!-- end #dashboard -->
</div>