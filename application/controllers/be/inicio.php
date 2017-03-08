<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inicio
 *
 * @author Yasser
 */
class inicio extends CI_Controller {
    //put your code here

    public function   __construct() {
        parent::__construct();
        $this->load->model("modelo_base");
        $this->load->library('pagination');
        $this->load->library('image_lib');
        $this->load->library('login/validacion');
        
        
    }

    public function index(){

         $this->validacion->validacion_login();
            
          $data["cuerpo"]="be/v_home_be";
          $this->load->view("be/includes_be/template_be", $data);
       
          
        
    }


}
?>
