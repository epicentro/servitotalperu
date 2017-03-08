<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of validacion
 *
 * @author Yasser
 */
class fe_pedido {

    public $CI;
    public function  __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model("modelo_base");
        $this->CI->load->library('be/be_funciones');
        $this->CI->load->library('fe/fe_pedido');
        $this->CI->load->library('email');

    }

   public function mostrar_pedido($idpedido){
       
       
         ///////////////////////
         //Pedido
         //////////////////////
         
         $strsql="select idcliente, idmoneda, iddirecciones, idtipo_registro, idtipo_pago, idmetodo_envio, idestado, 
                fecha, fecha_y_hora, gastos_envio, descuento, comision_tipo_pago, ip_visita,
                idusuarios_por_telefono, obs_anula_rechazo, observacion
                from pedidos where idpedidos='$idpedido'";
        
         $fila=$this->CI->modelo_base->c_una_fila($strsql);
         
        
         $idcliente=$fila->idcliente;  
         
         $idtipo_pago=$fila->idtipo_pago;
         $tipo_pago=$this->CI->be_funciones->tipo_pago($idtipo_pago);
         
         $idmetodo_envio=$fila->idmetodo_envio;
         $metodo_envio=$this->CI->be_funciones->metodo_envio($idmetodo_envio);
         
         $idmoneda=$fila->idmoneda;
         $simbolo=$this->CI->be_funciones->simbolo_moneda($fila->idmoneda);
         
         
         $iddirecciones=$fila->iddirecciones;
         
         $idestado=$fila->idestado;  
         $estado=$this->CI->be_funciones->estado_pedido($idestado);
         
         $fecha=$fila->fecha;  
         $fecha=$this->CI->be_funciones->formato_fecha($fecha);
         
         $gastos_envio=$fila->gastos_envio; 
         
         $observacion=$fila->observacion; 
         
        /////////////////// 
        //Cliente
        /////////////////// 
         $strsql="select nombres, apellidos, email  
                  from cliente where idcliente='$idcliente'";
                 
         $cliente=$this->CI->modelo_base->c_una_fila($strsql);
         $nombre=$cliente->nombres;
         $apellidos=$cliente->apellidos;
         $email=$cliente->email;
         
         ///////////////////////////
         //Dirección de Envío
         //////////////////////////
         $strsql="select idpais, nombre_contacto, direccion, codigo_postal, poblacion, provincia, telefono, celular "
                . " from direcciones where iddirecciones='".$iddirecciones."'";
         
         $dir=$this->CI->modelo_base->c_una_fila($strsql);
        
        $pais_destino=$dir->idpais;
        
        $pais=$this->CI->be_funciones->nombre_pais($dir->idpais);
        $nombre_contacto=$dir->nombre_contacto;
        $direccion=$dir->direccion;
        $codigo_postal=$dir->codigo_postal;
        $poblacion=$dir->poblacion;
        $provincia=$dir->provincia;
        $telefono=$dir->telefono;
        $celular=$dir->celular;
         
         
        //////////////////////
        //CLIENTE
        //////////////////////
         
         $strhtml="<table  width='500'>";
         $strhtml.="<tr>";
         $strhtml.="<td colspan='2' style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; font-weight:bold;'>Cliente</td>";
         $strhtml.="</tr>";
         
         $strhtml.="<tr>";
         $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; width:150px;' >Nombre</td>";
         $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
         $strhtml.=$nombre." ".$apellidos;
         $strhtml.="</td>";
         $strhtml.="</tr>";
        
         $strhtml.="</table>";
         
         /////////////////////////////////////////
         //DIRECCIÓN DE ENVÍO
         /////////////////////////////////////////
             
        $strhtml.="<table  width='500'>";
        $strhtml.="<tr>";
        $strhtml.="<td colspan='2' style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; font-weight:bold;'>Dirección de Envío</td>";
        $strhtml.="</tr>";

        $strhtml.="<tr>";
        $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; width:150px;' >Nombre Contacto</td>";
        $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
        $strhtml.=$nombre_contacto;
        $strhtml.="</td>";
        $strhtml.="</tr>";

        $strhtml.="<tr>";
        $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Dirección</td>";
        $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
        $strhtml.=$direccion;
        $strhtml.="</td>";
        $strhtml.="</tr>";

        $strhtml.="<tr>";
        $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Código Postal</td>";
        $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
        $strhtml.=$codigo_postal;
        $strhtml.="</td>";
        $strhtml.="</tr>";

        $strhtml.="<tr>";
        $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Ciudad</td>";
        $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
        $strhtml.=$poblacion;
        $strhtml.="</td>";
        $strhtml.="</tr>";

        $strhtml.="<tr>";
        $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Provincia</td>";
        $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
        $strhtml.=$provincia;
        $strhtml.="</td>";
        $strhtml.="</tr>";
        
        $strhtml.="<tr>";
        $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >País</td>";
        $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
        $strhtml.=$pais;
        $strhtml.="</td>";
        $strhtml.="</tr>";
        
        $strhtml.="<tr>";
        $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Teléfono</td>";
        $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
        $strhtml.=$telefono;
        $strhtml.="</td>";
        $strhtml.="</tr>";
        
        $strhtml.="<tr>";
        $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Celular</td>";
        $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>&nbsp;";
        $strhtml.=$celular;
        $strhtml.="</td>";
        $strhtml.="</tr>";



        $strhtml.="</table>";
                
                
               
             
             
             
             
        
         
         
        $strhtml.="<table  width='500'>";
        $strhtml.="<tr>";
        $strhtml.="<td colspan='2' style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; font-weight:bold;'>Pedido</td>";
        $strhtml.="</tr>";

        $strhtml.="<tr>";
        $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; width:150px;' >Idpedido</td>";
        $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
        $strhtml.=$idpedido;
        $strhtml.="</td>";
        $strhtml.="</tr>";

        $strhtml.="<tr>";
        $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Estado</td>";
        $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
        $strhtml.=$estado;
        $strhtml.="</td>";
        $strhtml.="</tr>";

        $strhtml.="<tr>";
        $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Tipo de Pago</td>";
        $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
        $strhtml.=$tipo_pago;
        $strhtml.="</td>";
        $strhtml.="</tr>";
        
        $strhtml.="<tr>";
        $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Metodo de Envio</td>";
        $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
        $strhtml.=$metodo_envio;
        $strhtml.="</td>";
        $strhtml.="</tr>";

        $strhtml.="<tr>";
        $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Fecha</td>";
        $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
        $strhtml.=$fecha;
        $strhtml.="</td>";
        $strhtml.="</tr>";
        
        /*
        $strhtml.="<tr>";
        $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Observación</td>";
        $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>&nbsp;";
        $strhtml.=$observacion;
        $strhtml.="</td>";
        $strhtml.="</tr>";
        */
        $strhtml.="</table>";
        
        
        
        ///////////////////////////////////////////// 
       //DETALLE DEL PEDIDO
       /////////////////////////////////////////////
        
        $strsql="select iddetalle, idproductos, cantidad, precio, idtarjeta, precio_tarjeta, 
                 idpapel_regalo, precio_papel, peso from detalle where idpedidos='$idpedido'";
        
        $rows=$this->CI->modelo_base->consulta($strsql);
        
        if($rows!="0"){
            
            $strhtml.="<table width='500' >";
            $strhtml.="<tr>";
            $strhtml.="<td style='background-color:#ffc600; text-align:center; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>Producto</td>";
            $strhtml.="<td style='background-color:#ffc600; text-align:center; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>Cantidad</td>";
            $strhtml.="<td style='background-color:#ffc600; text-align:center; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>Precio </td>";
            /*
            $strhtml.="<td style='background-color:#ffc600; text-align:center; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>Papel Regalo</td>";
            $strhtml.="<td style='background-color:#ffc600; text-align:center; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>Precio Papel (&euro;)</td>";
            $strhtml.="<td style='background-color:#ffc600; text-align:center; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>Tarjeta</td>";
            $strhtml.="<td style='background-color:#ffc600; text-align:center; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>Precio Tarjeta (&euro;)</td>";
            */
         
            $strhtml.="<td style='background-color:#ffc600; text-align:center; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; width:80px;'>Total ( $simbolo ) </td>";
            $strhtml.="</tr>";
           
            $sumaPeso="";
            foreach($rows as $row){
                
                $total_x_item=($row->precio * $row->cantidad)+ $row->precio_papel + $row->precio_tarjeta;
                $total_x_items=sprintf("%.2f", $total_x_item);
                
                $sumaPeso+=$row->peso;

            $strhtml.="<tr>";
            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>".$this->CI->be_funciones->nombre_producto($row->idproductos)."</td>";
            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; text-align:right;'>".$row->cantidad."</td>";
            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; text-align:right;'>".$row->precio."</td>";
            /*
            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>&nbsp;".$this->CI->be_funciones->nombre_papel($row->idpapel_regalo)."</td>";
            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; text-align:right;'>".$row->precio_papel."</td>";
            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>&nbsp;".$this->CI->be_funciones->nombre_tarjeta($row->idtarjeta)."</td>";
            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; text-align:right; '>".$row->precio_tarjeta."</td>";
             */
          
            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; text-align:right;'>".number_format($total_x_item,2)."</td>";
            $strhtml.="</tr>";      
                

            }//endFor
             
           //EXTRAEMOS EL RANGO DONDE SE ENCUENTRA EL PESO
           $fila=$this->CI->be_funciones->precio_x_peso($pais_destino, $sumaPeso);
           $rango_peso="";
           if($fila!="0"){
                $rango_peso=$fila->rango_inicial." - ".$fila->rango_final."gr.";

           }//endIF
            
         
             $strhtml.="<tr>";
             $strhtml.="<td colspan='3' style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; text-align:right;' >Subtotal ( $simbolo ) </td>";
             $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; text-align:right;'>".$this->CI->be_funciones->calcula_subtotal($idpedido)." </td>";
             $strhtml.="</tr>"; 
             
             $strhtml.="<tr>";
             $strhtml.="<td colspan='3' style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; text-align:right;' >";
             $strhtml.="<strong>Costo de Transporte $sumaPeso gr. </strong>[Tarifa:  $rango_peso ] ( $simbolo ) :  ";
             $strhtml.="</td>";
             
             $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; text-align:right;'>".number_format($gastos_envio,2)." </td>";
             
             $strhtml.="</tr>"; 
             
             /*
             $strhtml.="<tr>";
             $strhtml.="<td colspan='3' style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; text-align:right;' >Comisión Tipo Pago (+)</td>";
             $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; text-align:right;'>".number_format($comision_tipo_pago,2)." &euro;</td>";
             $strhtml.="</tr>"; 
             
             $strhtml.="<tr>";
             $strhtml.="<td colspan='3' style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; text-align:right;' >Descuento (-)</td>";
             $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; text-align:right;'>".number_format($descuento,2)." &euro;</td>";
             $strhtml.="</tr>"; 
             */
             
             $strhtml.="<tr>";
             $strhtml.="<td colspan='3' style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; text-align:right;' > TOTAL ( $simbolo ) </td>";
             $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; text-align:right;'>".$this->CI->be_funciones->calcula_total($idpedido)." </td>";
             $strhtml.="</tr>"; 
             
             $strhtml.="</table>";
        
        }//endIF
         
        
        
        
        
        return $strhtml;
        
         
         
         
         
         
       
   }//endFunction   
    
    
    
       
    
   
}
?>