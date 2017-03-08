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


class be_parametros {
    
    public $CI;
    public function  __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model("modelo_base");
        
        
    }

    

    public function valor($llave){
      
        $strsql="select valor from parametros where llave='$llave'";
        $fila=$this->CI->modelo_base->c_una_fila($strsql);
        if($fila=="0"){
            return "10";//SI TODAVIA NO HEMOS INGRESADO ESE PARAMETRO EN LA TABLA QUE POR DEFECTO REGRESE 10
        }else{
            return $fila->valor;
        }
        
        

    }
  
    public function campo_nombre($tabla, $seo){
      
        $strsql="select nombre from ".$tabla." where seo='$seo'";
        $fila=$this->CI->modelo_base->c_una_fila($strsql);
        if($fila=="0"){
            return "";//
        }else{
            return $fila->nombre;
        }
        

    }
    
    public function campo_nombre_id($tabla, $id){
      
        $strsql="select nombre from ".$tabla." where id$tabla='$id'";
        $fila=$this->CI->modelo_base->c_una_fila($strsql);
        if($fila=="0"){
            return "";//
        }else{
            return $fila->nombre;
        }
        

    }
    
    
    public function primera_foto($id){
      
        $strsql="select imagen from productos_imagenes where idproductos='$id' limit 1";
               
        $fila=$this->CI->modelo_base->c_una_fila($strsql);
        if($fila=="0"){
            return "";
        }else{
            return $fila->imagen;
        }
        

    }    

    public function primera_foto_servicios($id){
      
        $strsql="select imagen from servicios_imagenes where idservicios='$id' limit 1";
               
        $fila=$this->CI->modelo_base->c_una_fila($strsql);
        if($fila=="0"){
            return "";
        }else{
            return $fila->imagen;
        }
        

    }

    public function primera_foto_maquinarias($id){
      
        $strsql="select imagen from maquinarias_imagenes where idmaquinarias='$id' limit 1";
               
        $fila=$this->CI->modelo_base->c_una_fila($strsql);
        if($fila=="0"){
            return "";
        }else{
            return $fila->imagen;
        }
        

    }
    
    
    public function primera_foto_home($id){
      
        $strsql="select imagen from productos_imagenes where idproductos='$id' and idprimera_foto='1' limit 1";
               
        $fila=$this->CI->modelo_base->c_una_fila($strsql);
        if($fila=="0"){
            return "";
        }else{
            return $fila->imagen;
        }
        

    }
    
    
    
    function mes_es($fecha){
       
       $parte=explode("-", $fecha);
       
       $mes=$parte[1];
       if($mes=="01"){
           return "Ene";
       }elseif($mes=="02"){
           return "Feb";
       }elseif($mes=="03"){
           return "Mar";
       }elseif($mes=="04"){
           return "Abr";
       }elseif($mes=="05"){
           return "May";
       }elseif($mes=="06"){
           return "Jun";
       }elseif($mes=="07"){
           return "Jul";
       }elseif($mes=="08"){
           return "Ago";
       }elseif($mes=="09"){
           return "Sep";
       }elseif($mes=="10"){
           return "Oct";
       }elseif($mes=="11"){
           return "Nov";
       }elseif($mes=="12"){
           return "Dic";    
       }
         
         
       
   }//endFunction   
   
   function mes_dia($fecha){
       
       $parte=explode("-", $fecha);
       
       $dia=$parte[2];
       
       return $dia;
       
         
         
       
   }//endFunction   

    
}
?>
