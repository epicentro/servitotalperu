<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contrasena
 *
 * @author Yasser
 */
class contrasena extends CI_Controller {
    //put your code here

    public function  __construct() {
        parent::__construct();

        $this->load->model("modelo_base");
        $this->load->library('login/validacion');
    }


    public function index(){

        $this->validacion->validacion_login();
        
        $data["cuerpo"]='be/v_contrasena';
        $this->load->view("be/includes_be/template_be", $data);
        
    }


    public function cambio(){


        $clave1=htmlspecialchars($this->input->post("txt_clave1"), ENT_QUOTES);
        $clave1=$this->db->escape($clave1);

        $clave2=htmlspecialchars($this->input->post("txt_clave2"), ENT_QUOTES);
        $clave2=$this->db->escape($clave2);


        //Capturamos el Id del Usuario
        $id=$this->session->userdata("idusuarios");

        //grabamos
        $strsql="update usuarios set pass=".$clave1." where idusuarios='".$id."'";

        //echo $strsql;
        
        $valor=$this->modelo_base->ejecuta($strsql);

             if($valor==1){
                   $this->session->set_userdata('grabar', 'grabado con éxito');
                   $url=base_url()."be/contrasena";
                   redirect($url);


            }//endIF
         

    }
    
}
?>
