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
class productos_atributos extends CI_Controller {
    //put your code here
      public $tabla="productos_atributos";
      public $idtabla="idproductos_atributos";
      public $tabla_padre="atributos";
      public $idtabla_padre="idatributos";
      public $carpeta_img="img_productos";
   
     
    
    public function  __construct() {
        parent::__construct();


        $this->load->model("modelo_base");
        $this->load->library('pagination');
        $this->load->library('image_lib');
        $this->load->library('login/validacion');
        $this->load->library('be/be_funciones');
        $this->load->library('be/be_categorias');
        $this->load->library('be_parametros');
        
                
        
        //Zona Horaria
        //http://www.cesarcancino.com/configurar-zona-horaria-con-php-n221.html
        date_default_timezone_set("America/Lima");
        
        

    }

    public function inicio(){
             $this->validacion->validacion_login();
             $data['filas']="";
             $data['idatributo_actual']="";
              
               //Agregamos los atributos al combo
               $tabla="atributos";
               $idtabla="idatributos";
               $data['combo']=$this->be_categorias->html_combo('', $tabla, $idtabla,'');
            
             if($this->uri->segment(4)){//SI ENTRA AQUI ES PORQUE YA SELECCIONAMOS UN ESPECIAL EN EL COMBO
                 
                 //el id del atributo actual
                 $idatributo_actual=$this->uri->segment(4);
                 
                 //Agregamos los atributos al combo
                $tabla="atributos";
                $idtabla="idatributos";
                $data['combo']=$this->be_categorias->html_combo($idatributo_actual, $tabla, $idtabla,'');
                 
                 
                 $strsql="select p.idproductos, p.nombre, pa.idproductos_atributos from productos p, productos_atributos pa "
                         . "where p.idproductos=pa.idproductos and pa.idatributos='$idatributo_actual'";
                 
                 $filas=$this->modelo_base->consulta($strsql);
                 $data['filas']=$filas;
                 
             }//endIF
             
             
              $data['cuerpo']="be/v_".$this->tabla."_mnto";
              $this->load->view("be/includes_be/template_be", $data);
            
            
        
    }//endFunction
    
    
    
     function elimina_productos_atributos(){

          $this->validacion->validacion_login();

          $sw=$this->input->post('sw');//Esto no nos sirve
          $id=$this->input->post('valores');

          
           //eliminamos el registro
            $strsql="delete from $this->tabla where id$this->tabla='$id'";
            $this->modelo_base->ejecuta($strsql);

            echo '{"sw":"4", "dato":"ok"}';
     
    }//endFunction
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


}
?>
