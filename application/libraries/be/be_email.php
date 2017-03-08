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
class be_email {

    public $CI;
    public function  __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model("modelo_base");
        $this->CI->load->library('be/be_funciones');
        $this->CI->load->library('fe/fe_email');
        $this->CI->load->library('fe/fe_pedido');

    }

   public function email_pedido($idpedidos){
       
       
       //
       
       
       //AVERIGUAMOS EL TIPO DE PAGO PARA ARMAR LA ESTRUCTURA DEL EMAIL;
       $strsql="select idtipo_pago, idcliente  from pedidos where idpedidos='$idpedidos'";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);
        
       //AVERIGUAMOS EL EMAIL DEL CLIENTE
       $strsql="select email from cliente where idcliente='$fila->idcliente'";
       $cliente=$this->CI->modelo_base->c_una_fila($strsql);
       $para=$cliente->email;
       
       
        //////////////////////////////
        //MANDAMOS EL EMAIL
        /////////////////////////////
        if($fila->idtipo_pago=='1'){
            $strsql="SELECT de, asunto, inicio, final from emails where nombre='contra_entrega'";
        }elseif($fila->idtipo_pago=='2'){
            $strsql="SELECT de, asunto, inicio, final from emails where nombre='transferencia'";
        }elseif($fila->idtipo_pago=='3'){
            $strsql="SELECT de, asunto, inicio, final from emails where nombre='pago_online'";
        }elseif($fila->idtipo_pago=='4'){    
             $strsql="SELECT de, asunto, inicio, final from emails where nombre='tarjeta'";
        }
        
        $email=$this->CI->modelo_base->c_una_fila($strsql);
        $de=$email->de; 
        $asunto=$email->asunto; 
        $parte1=$email->inicio;  
        $parte2=$email->final; 
        
        /////////////////////////////////////////////////////
        //CARGAMOS EL CORAZON DE ESTE EMAIL QUE ES EL PEDIDO
        ///////////////////////////////////////////////////////
        $strhtml=$this->CI->fe_pedido->mostrar_pedido($idpedidos);
        
        
        
        $total_html=$parte1;
        $total_html.="<br/>";
        $total_html.=$strhtml;
        $total_html.="<br/>";
        $total_html.=$parte2;
        
        
        $config['mailtype'] = 'html';
        $this->CI->email->initialize($config);
        
        $this->CI->email->from($de);
        $this->CI->email->to($para); 
        $this->CI->email->cc($de);//Para que se envie el mismo el email 
        $this->CI->email->bcc('ycalle@solucionesajax.com, blamacsachainchiusa@gmail.com, msv610@gmail.com '); 

        $this->CI->email->subject($asunto);
        
        $this->CI->email->message($total_html); 
        

        @$this->CI->email->send();
        
        //return $total_html;
        return  "ok";
         
         
         
         
         
       
   }//endFunction   
    
    
    public function email_rpta_comentario($idcomentario){
       
       
        //////////////////////////
        //AVERIGUAMOS EL CLIENTE
        ///////////////////////////
        $strsql="select idcliente from comentarios where idcomentarios='$idcomentario'";
        $fila=$this->CI->modelo_base->c_una_fila($strsql);
        $idcliente=$fila->idcliente;
        
        
        //////////////////////////////////
        //AVERIGUAMOS DATOS DEL CLIENTE
        /////////////////////////////////
        $strsql="select nombres, email from cliente where idcliente='$idcliente'";
        $fila=$this->CI->modelo_base->c_una_fila($strsql);
        $nombre=$fila->nombres;
        $email=$fila->email;
        
        
        //////////////////////////
        //AVERIGUAMOS LA RESPUESTA
        ///////////////////////////
        $strsql="select respuesta from rpta_comentarios where idcomentarios='$idcomentario'";
        $fila=$this->CI->modelo_base->c_una_fila($strsql);
        $respuesta=$fila->respuesta;
        
         if($fila!="0"){
          

                            $strhtml="<table  width='500'>";
                            $strhtml.="<tr>";
                            $strhtml.="<td colspan='2' style='background-color:#8c407e; color:#fff; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; font-weight:bold;'>Información</td>";
                            $strhtml.="</tr>";

                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#8c407e; color:#fff; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; width:150px;' >Respuesta</td>";
                            $strhtml.="<td style='border:1px solid #8c407e; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$respuesta;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";

                            
                            $strhtml.="</table>";





                           //////////////////////////////
                           //MANDAMOS EL EMAIL
                           /////////////////////////////

                           $strsql="SELECT de, asunto, parte1, parte2 from email where clave='respuesta-comentario'";


                           $fila=$this->CI->modelo_base->c_una_fila($strsql);
                           $de=$fila->de; 
                           $asunto=$fila->asunto; 
                           $parte1=$fila->parte1;  
                           $parte2=$fila->parte2; 


                           $total_html="Estimado ".$nombre.",";
                           $total_html.="<br/>";
                           $total_html.=$parte1;
                           $total_html.="<br/>";
                           $total_html.=$strhtml;
                           $total_html.="<br/>";
                           $total_html.=$parte2;


                           $config['mailtype'] = 'html';
                           $this->CI->email->initialize($config);

                           $this->CI->email->from($de);
                           $this->CI->email->to($email); 
                           //$this->email->cc($copia); 
                          // $this->email->bcc('ellos@su-ejemplo.com'); 

                           $this->CI->email->subject($asunto);

                           $this->CI->email->message($total_html); 


                           $this->CI->email->send();

                          
                           return  "ok";
         }else{
             
             return  "no";
         }//endIF                
         
         
       
   }//endFunction   
       
    
   
}
?>