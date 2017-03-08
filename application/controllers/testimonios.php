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
class testimonios extends padre {
    //put your code here
    
    public function __construct() {
        parent::__construct();
            
    }
    
    public function index(){
        
      
        $strsql="select title, keyword, description, nombre, titulo, sumilla, descripcion  from secciones 
                 where seo='testimonios' ";
        $fila=$this->modelo_base->c_una_fila($strsql);
        $data["title"]=$fila->title;
        $data["keyword"]=$fila->keyword;
        $data["description"]=$fila->description;
        $data["nombre"]=$fila->nombre;
        $data["titulo"]=$fila->titulo;
        $data["sumilla"]=$fila->sumilla;
        $data["descripcion"]=$fila->descripcion;
        
        
        parent::carga_comun(); 
           
         $strsql="select idtestimonios, contacto, cargo, imagen, sumilla from testimonios where idsw='1'";
         $data["testimonios"]=$this->modelo_base->consulta($strsql);
           
        $data["bg_top_imagen"]="nosotros.jpg";
       
        $data["variable_top"]="fe/includes_fe/cabecera_seccion";
        $data["variable_cuerpo"]="fe/v_testimonios";
        $this->load->view("fe/includes_fe/template_seccion", $data);
        
        
    }
    
    
}

?>
