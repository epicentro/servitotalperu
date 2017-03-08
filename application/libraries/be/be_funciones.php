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
class be_funciones {

    public $CI;
    public function  __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model("modelo_base");
       

    }

   
    
  public function nombre_categoria($id){

       $strsql="select nombre from categoria_inmueble where idcategoria_inmueble='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->nombre;
       }else{
           return "";
       }//endIF

   }
   
      
   public function filtrar_iframe($cadena){
       
       $find="&lt;iframe";
       $replace="<iframe ";
       $cadena=str_replace($find,$replace,$cadena); 
       
       $find="&gt;&lt;/iframe>";
       $replace="></iframe> ";
       $cadena=str_replace($find,$replace,$cadena);
       
       return $cadena;
       
   }
   
   public function  verificar_atributo($idproductos, $idatributos){
       $strsql="select count(*) as cantidad from productos_atributos where idproductos='$idproductos' and idatributos='$idatributos'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);
       if ($fila!="0"){
           
           return $fila->cantidad; 
           
       }else{
           return "";
       }//endIF
       
   }
   
   public function nombre_atributo($id){

       $strsql="select nombre from atributos where idatributos='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->nombre;
       }else{
           return "";
       }//endIF

   }
   
   public function nombres_atributos($id){

       $strsql="select pa.idatributos, a.padre_id from productos_atributos pa, atributos a  where 
                pa.idatributos=a.idatributos and idproductos='$id'";
       $filas=$this->CI->modelo_base->consulta($strsql);

       if ($filas!="0"){
           
           $atributos="";
           $strhtml="<ul style='text-align:left;'>";
           foreach($filas as $fila){
               
               $nombre_padre=$this->nombre_atributo($fila->padre_id);
               $nombre_hijo=$this->nombre_atributo($fila->idatributos);
               
                if($nombre_padre!=""){
               
                    $strhtml.="<li> ".$nombre_padre."/<b>".$nombre_hijo."</b></li>";
               }else{
                    $strhtml.="<li> <b>".$nombre_hijo."</b></li>";
               }     
               
           }//endForEach
           $strhtml.="</ul>";
           return $strhtml;
           
       }else{
           return "";
       }//endIF

   }
   
   

   public function nombre_marca($id){

       $strsql="select nombre from marca where idmarca='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->nombre;
       }else{
           return "";
       }//endIF


   }
   
   public function kardex_operacion($id){

       $strsql="select nombre from kardex_operacion where idkardex_operacion='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->nombre;
       }else{
           return "";
       }//endIF


   }
   
   public function nombre_usuario($id){

       $strsql="select usuario from usuarios where idusuarios='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->usuario;
       }else{
           return "";
       }//endIF


   }
   
   
   
   

   public function nombre_thumbs($nombre){

       $parte=explode(".", $nombre);
       $nuevo_nombre=$parte[0]."_thumb".".".$parte[1];

       return $nuevo_nombre;

   }

   public function cantidad_fotos($id){

       $strsql="select count(*) as cantidad from productos_imagenes where idproductos='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->cantidad;
       }else{
           return "";
       }//endIF

   }
   
   public function cantidad_fotos_maquinarias($id){

       $strsql="select count(*) as cantidad from maquinarias_imagenes where idmaquinarias='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->cantidad;
       }else{
           return "";
       }//endIF

   }   


   public function cantidad_fotos_servicio($id){

       $strsql="select count(*) as cantidad from servicios_imagenes where idservicios='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->cantidad;
       }else{
           return "";
       }//endIF

   }   
    public function cantidad_atributos($id){

       $strsql="select count(*) as cantidad from productos_atributos where idproductos='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->cantidad;
       }else{
           return "";
       }//endIF

   }
   
   public function cantidad_comentarios($id){

       $strsql="select count(*) as cantidad from productos_comentarios where idproductos='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->cantidad;
       }else{
           return "";
       }//endIF

   }

   public function cantidad_videos($id){

       $strsql="select count(*) as cantidad from videos where idgaleria_videos='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->cantidad;
       }else{
           return "";
       }//endIF

   }


   

   
    
    public function kardex( $id, $cantidad, $idproductos, $idusuarios, $idpedidos, $stock_actual ){
        
        
        $fecha=date("Y-m-d");
        $hora= time (); 
	$hora=date( "H:i:s" , $hora );
        
        if($id=="1"){//Se creo producto en el kardex
            
            $strsql="insert into kardex (idkardex_operacion, idusuarios, idproductos,  entrada, stock, fecha, hora )
                    values('$id','$idusuarios','$idproductos','$cantidad','$cantidad','$fecha', '$hora')";
            $fila=$this->CI->modelo_base->ejecuta($strsql);
            
            
        }else if($id=="2"){//Se actualizó stock
            
                      
            if($cantidad>$stock_actual){//se esta incrementando el stock
                
                $incremento= $cantidad - $stock_actual;
                
                $strsql="insert into kardex (idkardex_operacion, idusuarios, idproductos,  entrada, stock, fecha, hora )
                   values('$id','$idusuarios','$idproductos','$incremento','$cantidad','$fecha', '$hora')";
                 
                 
               
                 $fila=$this->CI->modelo_base->ejecuta($strsql);
                
            }elseif($stock_actual>$cantidad){//si se quita unidades al stock
                
                $decremento= $stock_actual - $cantidad;
                
                $strsql="insert into kardex (idkardex_operacion, idusuarios, idproductos,  salida, stock, fecha, hora )
                    values('$id','$idusuarios','$idproductos','$decremento','$cantidad','$fecha', '$hora')";
                 $fila=$this->CI->modelo_base->ejecuta($strsql);
            }//endIF
          
            
            
           
            
         
        }else if($id=="3"){//Pedido Rechazado
            
            
             $nuevo_stock= $stock_actual + $cantidad;
             
              $strsql="insert into kardex (idkardex_operacion, idusuarios, idproductos,  entrada, stock, idpedidos, fecha, hora )
                values('$id','$idusuarios','$idproductos','$cantidad','$nuevo_stock', '$idpedidos','$fecha', '$hora')";
           
              $fila=$this->CI->modelo_base->ejecuta($strsql);
            
            
        }else if($id=="4"){//Se agregó a pedido
            
            
            $nuevo_stock= $stock_actual - $cantidad;
                
            $strsql="insert into kardex (idkardex_operacion, idusuarios, idproductos,  salida, stock, idpedidos, fecha, hora )
                values('$id','$idusuarios','$idproductos','$cantidad','$nuevo_stock', '$idpedidos', '$fecha', '$hora')";
            $fila=$this->CI->modelo_base->ejecuta($strsql);
            
            
            
        }else if($id=="5"){//Se incremento unidades en pedido
             
          
            
            $nuevo_stock= $stock_actual - $cantidad;
             
            $strsql="insert into kardex (idkardex_operacion, idusuarios, idproductos,  salida, stock, idpedidos, fecha, hora )
                values('$id','$idusuarios','$idproductos','$cantidad','$nuevo_stock', '$idpedidos','$fecha', '$hora')";
           
           $fila=$this->CI->modelo_base->ejecuta($strsql);
           
            
        
        }else if($id=="6"){//Se resto unidades en pedido   
            
            $nuevo_stock= $stock_actual + $cantidad;
             
            $strsql="insert into kardex (idkardex_operacion, idusuarios, idproductos,  entrada, stock, idpedidos, fecha, hora )
                values('$id','$idusuarios','$idproductos','$cantidad','$nuevo_stock', '$idpedidos','$fecha', '$hora')";
           
           $fila=$this->CI->modelo_base->ejecuta($strsql);
            
        }else if($id=="7"){//Se eliminó de Pedido
             
             $nuevo_stock= $stock_actual + $cantidad;
             
            $strsql="insert into kardex (idkardex_operacion, idusuarios, idproductos,  entrada, stock, idpedidos, fecha, hora )
                values('$id','$idusuarios','$idproductos','$cantidad','$nuevo_stock', '$idpedidos','$fecha', '$hora')";
           
              $fila=$this->CI->modelo_base->ejecuta($strsql);
        
            
                
            
        }//endIf
        
        
        
        
        
    }
    
    
    function stock_actual($idproductos){
        
        $strsql="select stock from productos where idproductos='$idproductos'";
        $fila=$this->CI->modelo_base->c_una_fila($strsql);
        
        return $fila->stock;
        
    }//EndFunction

 
   function formato_fecha($fecha){
       
       $parte=explode("-", $fecha);
       
       $fecha=$parte[2]."-".$parte[1]."-".$parte[0];
       
       return $fecha;
       
   }//EndFunction 
   
   function formato_fecha_hora($fecha){
       
       $hacha=explode(" ", $fecha);
       
       //en $hacha[0] esta la fecha y en $hacha[1] esta la hora
       $parte=explode("-", $hacha[0]);
       
       $fecha=$parte[2]."-".$parte[1]."-".$parte[0]." ".$hacha[1];
       
       return $fecha;
       
   }//EndFunction 
   
   
    public function nombre_producto($id){

       $strsql="select nombre from productos where idproductos='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->nombre;
       }else{
           return "";
       }//endIF

   }
   
   public function precio_producto($id){

       $strsql="select pvp from productos where idproductos='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->pvp;
       }else{
           return "";
       }//endIF

   }

   function gastos_envio(){
       
        $strsql="select valor from parametros where llave='gastos_de_envio'";
        $fila=$this->CI->modelo_base->c_una_fila($strsql);
        $valor=trim($fila->valor);
        
       if($valor==""){
           
           return "0.00";
       }else{

           return $valor;
       }// endIIF
       
   }//EndFunction 


   public function lugar_entrega($id){

       $strsql="select nombre from lugar_entrega where idlugar_entrega='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->nombre;
       }else{
           return "";
       }//endIF


   }
   
   public function tipo_registro($id){

       $strsql="select nombre from tipo_registro where idtipo_registro='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->nombre;
       }else{
           return "";
       }//endIF


   }
   
    public function tipo_pago($id){

       $strsql="select nombre from tipo_pago where idtipo_pago='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->nombre;
       }else{
           return "";
       }//endIF


   }
   
   public function nombre_papel($id){

       $strsql="select nombre from papel_regalo where idpapel_regalo='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->nombre;
       }else{
           return "";
       }//endIF


   }
   
   public function nombre_tarjeta($id){

       $strsql="select nombre from tarjeta where idtarjeta='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->nombre;
       }else{
           return "";
       }//endIF


   }
   
   public function nombre_cliente($id){
       
       $strsql="select nombres, apellidos from cliente where idcliente='$id'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->nombres." ".$fila->apellidos;
       }else{
           return "";
       }//endIF
   }
   
   public function solo_nombre_cliente($id){
       
       $strsql="select nombres from cliente where idcliente='$id'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->nombres;
       }else{
           return "";
       }//endIF
   }
   
    public function estado_pedido($id){

       $strsql="select nombre from estado where idestado='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->nombre;
       }else{
           return "";
       }//endIF


   }
   
   public function valida_stock($id, $cantidad){

       $strsql="select stock from productos where idproductos='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

        $result=$fila->stock - $cantidad;
        if($result<0){
            return "faltaStock";
        }else{
            return ""; 
        }//endIF
        
       
       

   }
   
    public function verifica_existencia($id, $idpedido){

       $strsql="select count(*) as cantidad from detalle where idpedidos='".$idpedido."' and idproductos='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       
        if($fila->cantidad > 0){
            return "YaExiste";
        }else{
            return ""; 
        }//endIF
        
       
       

   }
   
   public function calcula_subtotal($idpedido){
       
       $strsql="select iddetalle, idproductos, cantidad, precio, idtarjeta, precio_tarjeta, 
                 idpapel_regalo, precio_papel from detalle where idpedidos='$idpedido'";
        
        $rows=$this->CI->modelo_base->consulta($strsql);
                
        $subtotal="0.00";
        
        if($rows!="0"){
            
            
            foreach($rows as $row){
                    
                $subtotal+=($row->cantidad * $row->precio) + $row->precio_tarjeta + $row->precio_papel;
                
           }//endFOR
            
            
       }//endIF
       
       //return number_format($subtotal,2);
       return sprintf("%.2f", $subtotal);
   
   }
   
   
   
   
   public function comision_tipo_pago($idpedido){
       
       $strsql="select comision_tipo_pago from pedidos where idpedidos='$idpedido'";
       $row=$this->CI->modelo_base->c_una_fila($strsql);
       
       return $row->comision_tipo_pago;
       
   }
   
   //ESTE GASTO DE ENVIO ES EL QUE SE GRABÓ EN EL PEDIDO
   function gastos_envio_en_el_pedido($idpedido){
       
       $strsql="select gastos_envio from pedidos where idpedidos='$idpedido'";
       $row=$this->CI->modelo_base->c_una_fila($strsql);
       
       return $row->gastos_envio;
       
   }//EndFunction 
   
    public function descuento($idpedido){
       
       $strsql="select descuento from pedidos where idpedidos='$idpedido'";
       $row=$this->CI->modelo_base->c_una_fila($strsql);
       
       return $row->descuento;
       
   }

  
    public function calcula_total($idpedido){
   
        $total=$this->calcula_subtotal($idpedido) + $this->gastos_envio_en_el_pedido($idpedido) + $this->comision_tipo_pago($idpedido) - $this->descuento($idpedido);
        //return $total;
        return sprintf("%.2f", $total);
       
    }
    
    
    public function respuesta_comentario($idcomentarios){
        
        $strsql="select respuesta from rpta_comentarios where idcomentarios='$idcomentarios'";
        $fila=$this->CI->modelo_base->c_una_fila($strsql);
        
        
        if($fila!="0"){
            
            return $fila->respuesta;
            
        }else{
            
            return "";
        }
        
    }
    
    public function nombre_pais($id){

       $strsql="select nombre from pais where idpais='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->nombre;
       }else{
           return "";
       }//endIF

   }
   public function cantidad_tarifas($id){

       $strsql="select count(*) as cantidad from tarifas where idpais='".$id."'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->cantidad;
       }else{
           return "";
       }//endIF

   }
   
   public function precio_x_peso($idpais, $peso){
       
                                       
        //Averiguamos la tarifa para este peso y para este pais
          $strsql="select precio_economico, precio_urgente, rango_inicial, rango_final from tarifas "
                  . "where idpais='$idpais' and $peso BETWEEN rango_inicial and rango_final";
          
         $fila=$this->CI->modelo_base->c_una_fila($strsql); 
         
         return $fila;
                                    
   }
   
   //LA TARIFA ECONÓMICA SOLO SE USARA CUANDO EL PAIS DE DESTINO NO ES PERU
   public function calcular_tarifa_economica($code_pais, $pais_destino, $peso, $valor_cambio, $subtotal ){
                   
                    $tarifa="0";
                   //AVERIGUAMOS LA TARIFA PARA EL PAIS
                    $strsql="select precio_economico  from tarifas "
                            . "where idpais='$pais_destino' and $peso BETWEEN rango_inicial and rango_final";
                    
                    $top_soles=750;// (soles)
                    
                    $fila=$this->CI->modelo_base->c_una_fila($strsql);
                    
                    
                    
                    if($code_pais=="PE"){//SI EL VISITANTE ESTA EN PERU
                        
                            $tarifa=sprintf("%.2f", ($fila->precio_economico));
                            
                            //SI ES MAYOR A top_soles la tarifa es 0
                            if($subtotal>$top_soles){
                                $tarifa=sprintf("%.2f",0);
                            }//endIF
                            
                    }else{ // SI EL VISITANTE NO SE ENCUENTRA EN PERU
                           
                            $tarifa=sprintf("%.2f", $fila->precio_economico/ $valor_cambio);
                            $this->CI->session->set_userdata("estoy","fuera peru");
                            //SI ES MAYOR A top_soles la tarifa es 0
                            if(($subtotal * $valor_cambio )>$top_soles){
                                $tarifa=sprintf("%.2f",0);
                            }//endIF
                            
                    }//endIF
                    
                    //SI ES MAYOR A 300 DOLARES
                   
                   
                    return $tarifa;
                    
   }//endFunction
   
   
   //LA TARIFA EXPRESS ES PARA PERU Y PARA EL EXTRANJERO
   public function calcular_tarifa_express($code_pais, $pais_destino, $peso, $valor_cambio, $subtotal ){
       
                     $tarifa="0";
                     
                     //AVERIGUAMOS LA TARIFA PARA EL PAIS
                    $strsql="select precio_urgente  from tarifas "
                            . "where idpais='$pais_destino' and $peso BETWEEN rango_inicial and rango_final";
                     $fila=$this->CI->modelo_base->c_una_fila($strsql);
                    
                    
                    
                    //SI EL COMPRADOR ESTA EN PERU
                    if($code_pais=="PE"){
                                 
                                $tarifa=sprintf("%.2f",$fila->precio_urgente);
                                
                                
                                    
                                if($pais_destino=="156"){//SI VOY  ENVIAR A PERU LIMA

                                          //SI ES MAYOR A 100 SOLES 
                                          if($subtotal>100){
                                               $tarifa=sprintf("%.2f",0);
                                           }


                                }elseif($pais_destino=="217"){//SI VOY  ENVIAR A PERU PROVINCIA

                                          //SI ES MAYOR A 150 SOLES
                                           if($subtotal>150){
                                               $tarifa=sprintf("%.2f",0);
                                           }
                                }

                    }else{//SI EL COMPRADOR NO ESTA EN PERU TODO ES DOLARES
                        
                              $tarifa=sprintf("%.2f", ($fila->precio_urgente/$valor_cambio) );
                         
                               if($pais_destino=="156"){//SI VOY  ENVIAR A PERU LIMA

                                          //SI ES MAYOR A 100 SOLES 
                                          if($subtotal >(100/$valor_cambio)){
                                               $tarifa=sprintf("%.2f",0);
                                           }


                                }elseif($pais_destino=="217"){//SI VOY  ENVIAR A PERU PROVINCIA

                                          //SI ES MAYOR A 150 SOLES
                                           if($subtotal >(150/$valor_cambio)){
                                               $tarifa=sprintf("%.2f",0);
                                           }

                               
                                }//endIF
                    }//endIF
                    
                    
               return $tarifa;     
       
   }//endIF
   
   
   public function calcular_tarifa($code_pais, $pais_destino, $peso, $valor_cambio, $subtotal ){
       
                    //AVERIGUAMOS LA TARIFA PARA EL PAIS
                   
                     $strsql="select precio_economico, precio_urgente  from tarifas "
                            . "where idpais='$pais_destino' and $peso BETWEEN rango_inicial and rango_final";
                    
                    $fila=$this->CI->modelo_base->c_una_fila($strsql);
                    
                    $tarifa="";
       
                    if($code_pais=="PE"){//SI EL VISITANTE ESTA EN PERU

                               //SI EL PAIS SELECCIONADO ES DIFERENTE DE PERU 
                               if($pais_destino!=="156" && $pais_destino!="217" ){
                                   $tarifa=sprintf("%.2f", ($fila->precio_economico));
                               }else{//el pais seleccionado si es peru, porque para pero solo hay precio urgente
                                   $tarifa=sprintf("%.2f", $fila->precio_urgente); 
                               }


                    }else{//SI EL VISITANTE NO SE ENCUENTRA EN PERU TODO ES DOLARES

                               //SI EL PAIS SELECCIONADO ES DIFERENTE DE PERU 
                                if($pais_destino!=="156" && $pais_destino!="217" ){
                                    $tarifa=sprintf("%.2f", $fila->precio_economico/ $valor_cambio);
                                }else{//el pais seleccionado si es peru, porque para perú solo hay precio urgente
                                    $tarifa=sprintf("%.2f", $fila->precio_urgente/ $valor_cambio); 
                                }



                    }//endIF
                    
                    
                    
                    ///////////////////////////////////////////////
                    //AHORA HACEMOS UN DESCUENTO POR SUBTOTAL 
                    ///////////////////////////////////////////////

                    //SI EL VISTANTE SE ENCUENTRA EN PERU TODO ES EN SOLES
                    if($code_pais=="PE"){

                                if($pais_destino=="156"){//SI VOY  ENVIAR A PERU LIMA

                                          //SI ES MAYOR A 100 SOLES 
                                          if($subtotal>100){
                                               $tarifa=sprintf("%.2f",0);
                                           }


                                }elseif($pais_destino=="217"){//SI VOY  ENVIAR A PERU PROVINCIA

                                          //SI ES MAYOR A 150 SOLES
                                           if($subtotal>150){
                                               $tarifa=sprintf("%.2f",0);
                                           }

                                }else{////SI VOY  ENVIAR A UN PAIS QUE NO ES PERU

                                          //SI ES MAYOR A 300 DOLARES
                                           if(($subtotal / $valor_cambio) > 300){
                                                $tarifa=sprintf("%.2f",0);
                                            }


                                }//endIF

                    }else{//SI EL COMPRADOR NO ESTA EN PERU

                                if($pais_destino=="156"){//SI VOY  ENVIAR A PERU LIMA

                                         //SI ES MAYOR A 100 SOLES 
                                         if( ($subtotal * $valor_cambio ) > 100){
                                              $tarifa=sprintf("%.2f",0);
                                          }


                               }elseif($pais_destino=="217"){//SI VOY  ENVIAR A PERU PROVINCIA

                                         //SI ES MAYOR A 150 SOLES
                                          if( ($subtotal * $valor_cambio ) > 150){
                                              $tarifa=sprintf("%.2f",0);
                                          }

                               }else{////SI VOY  ENVIAR A UN PAIS QUE NO ES PERU

                                         //SI ES MAYOR A 300 DOLARES
                                          if($subtotal > 300){
                                               $tarifa=sprintf("%.2f",0);
                                           }


                               }//endIF

                  }//endIF

                    
                    
                    
                    return $tarifa;
       
       
   }
       
    
   public function metodo_envio($id){
       
       $strsql="select nombre from metodo_envio where idmetodo_envio='$id' ";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

       if ($fila!="0"){
           return $fila->nombre;
       }else{
           return "";
       }//endIF
       
   }//endFunction
   
   public function simbolo_moneda($id){
           
        $strsql="select simbolo from moneda where idmoneda='$id'";
        $fila=$this->CI->modelo_base->c_una_fila($strsql);
        if ($fila!="0"){
           return $fila->simbolo;
       }else{
           return "";
       }//endIF
       
    }//endFunction
    
    
   
   
}
?>