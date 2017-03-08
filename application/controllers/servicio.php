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
class servicio extends padre {
    //put your code here
    
    public function __construct() {
        parent::__construct();
            
    }
    
    public function index(){
        
      
        $seo=$this->uri->segment(2);   
        $strsql="select title, keyword, description, nombre, nombre, descripcion from  productos  
                 where seo='$seo' ";
        //echo $strsql;
        //exit();    
        
        $fila=$this->modelo_base->c_una_fila($strsql);
        $data["title"]=$fila->title;
        $data["keyword"]=$fila->keyword;
        $data["description"]=$fila->description;
        $data["nombre"]=$fila->nombre;
        $data["descripcion"]=$fila->descripcion;
        
        
        parent::carga_comun(); 
   
           
        $data["seccion"]="fe/v_servicio";
        $this->load->view("fe/includes_fe/template_secciones", $data);
        
        
        
    }
    
    
}

?>
