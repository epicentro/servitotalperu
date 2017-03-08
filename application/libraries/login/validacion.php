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
class validacion {
    
    public $CI;
    public function  __construct() {
        $this->CI =& get_instance();
               
    }

    public function validacion_login(){

        
         if(!$this->CI->session->userdata('usuario')){

                        $url = base_url().'login/';
                        redirect($url);
            
         }
        

    }
    
    public function validacion_cliente(){

        
         if(!$this->CI->session->userdata('idcliente')){

                        $url = base_url();
                        redirect($url);
            
         }
        

    }
    
    public function validacion_carrito(){

        
         if(!$this->CI->session->userdata('carrito')){

                        $url = base_url();
                        redirect($url);
            
         }
        

    }

   

    
}
?>
