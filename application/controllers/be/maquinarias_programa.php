<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria
 *
 * @author Yasser
 */
class productos_programa extends CI_Controller {
    //put your code here
     
    public $tabla="productos";
    public $idtabla="idproductos";
   
    
    public function  __construct() {
        parent::__construct();


        $this->load->model("modelo_base");
        $this->load->library('pagination');
        $this->load->library('image_lib');
        $this->load->library('login/validacion');
        $this->load->library('be/be_funciones');
        $this->load->library('be/be_categorias');
        $this->load->library('be_parametros');
        
    }

    public function listar(){
             $this->validacion->validacion_login();
             
             //ID DEL PRODUCTO QUE LE VAMOS A INGRESAR IMAGENES
             $id=$this->uri->segment(4);
             $data['id']=$id;
             
             
             $data["idtabla"]=$this->idtabla;
             
             
             //AVERIGUAMOS EL NOMBRE DEL PRODUCTO QUE LE VAMOS A INGRESAR IMAGENES
                $strsql="select nombre from $this->tabla where $this->idtabla='$id'";
                $row=$this->modelo_base->c_una_fila($strsql);

                $data["nombre"]=$row->nombre;
            
            //AQUI EXTRAEMOS LA PRESENTACION
            $strsql="select  sumilla from $this->tabla 
                    where $this->idtabla='$id' ";          
            
          
        $fila=$this->modelo_base->c_una_fila($strsql);

        $data['valor']=$fila->sumilla;

                  
            
            $data['cuerpo']="be/v_".$this->tabla."_programa_mnto";
            $this->load->view("be/includes_be/template_be", $data);
            
        
    }//endFunction
    
    
    
   
  
  
   
   public function grabar(){

       $this->validacion->validacion_login();
       $id=$this->uri->segment(4);
       $data["id"]=$id;
       $valor=$this->input->post("programa");
       $valor=addslashes($valor);
       $strsql="update productos set sumilla='$valor' where idproductos='$id'";
       
       
       $this->modelo_base->ejecuta($strsql);
       $url=base_url()."be/productos_programa/listar/$id";
                        
               
       redirect($url);
       
      
       
       
      
      
     
   }


   
   

   


   


}
?>
