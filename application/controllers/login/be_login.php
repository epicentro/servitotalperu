<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of be_login
 *
 * @author Yasser
 */
class be_login extends CI_Controller {
    //put your code here
    public function  __construct() {
        parent::__construct();
        $this->load->model("modelo_base");
        
    }

    public function index(){

        $this->load->view("login/v_login");

    }

    public function validar(){

                $user=$this->input->post("txt_user");
                $pwd=$this->input->post("txt_pwd");

                $user=$this->db->escape($user);
                $pwd=$this->db->escape($pwd);

                $strsql="select count(*) as cantidad from usuarios where idsw='1' and usuario=".$user." and pass=".$pwd;

                $fila=$this->modelo_base->c_una_fila($strsql);
                
                

                
                if( $fila->cantidad > 0 ){

                    $strsql="select idusuarios, usuario, idtipo_usuarios from usuarios where usuario=".$user." and pass=".$pwd;
                    $row=$this->modelo_base->c_una_fila($strsql);

                    $datos=array(
                        'idusuarios'=>$row->idusuarios,
                        'usuario'=>$row->usuario,
                        'idtipo_usuario'=>$row->idtipo_usuarios

                    );

                    $this->session->set_userdata($datos);
                    
                   // echo $this->session->userdata('usuario');

                    $url=base_url()."be/"; // Aqui no pongo be/inicio porque el controlador "inicio" esta como controlador por defecto
                                             //configurado en en la libreria router.
                    redirect($url);



                }else{

                   $this->session->set_userdata("men_login", "Usuario o Clave Errónea.");
                   $url=base_url()."login/"; // Aqui no pongo login/be_login porque el controlador be_login esta como controlador por defecto
                                             //configurado en en la libreria router.
                   redirect($url);


                }//endIf
                 


        
    }//endFunction

    public function salir(){

         $datos=array(
                        'idusuarios'=>'',
                        'usuario'=>'',
                        'idtipo_usuario'=>''

                    );

           $this->session->unset_userdata($datos);
           
           
           
           
           
           $url=base_url()."login/";
           redirect($url);
        

    }

    

}
?>
