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
class nosotros extends padre {
    //put your code here
    
    public function __construct() {
        parent::__construct();
            
    }
    
    public function index(){
        
      
        $strsql="select title, keyword, description, nombre, titulo, sumilla, descripcion  from secciones 
                 where seo='nosotros' ";
        $fila=$this->modelo_base->c_una_fila($strsql);
        $data["title"]=$fila->title;
        $data["keyword"]=$fila->keyword;
        $data["description"]=$fila->description;
        $data["nombre"]=$fila->nombre;
        $data["titulo"]=$fila->titulo;
        $data["sumilla"]=$fila->sumilla;
        $data["descripcion"]=$fila->descripcion;
        $data["current"]="nosotros";        
        
        
        parent::carga_comun(); 
        
        
         

       
        
        
           
        
        $data["imagen_top"]="cabecera_nosotros.jpg";
        $data["seccion"]="fe/v_nosotros";
        
        $this->load->view("fe/includes_fe/template_secciones", $data);
        
        
        
    }
    
    
}

?>
