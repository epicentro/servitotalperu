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
class contacto extends padre {
    //put your code here
    
    public function __construct() {
        parent::__construct();
            
    }
    
    public function index(){
        
      
        $strsql="select title, keyword, description, nombre, titulo, sumilla, descripcion  from secciones 
                 where seo='contacto' ";
        $fila=$this->modelo_base->c_una_fila($strsql);
        $data["title"]=$fila->title;
        $data["keyword"]=$fila->keyword;
        $data["description"]=$fila->description;
        $data["nombre"]=$fila->titulo;
        $data["titulo"]=$fila->titulo;
        $data["sumilla"]=$fila->sumilla;
        $data["descripcion"]=$fila->descripcion;
        $data["current"]="contacto";
        
        
        parent::carga_comun(); 
         
        /*
        $strsql="select latitud_punto, longitud_punto, zoom from mapa limit 1";
        $fila=$this->modelo_base->c_una_fila($strsql);
        $data["latitud"]=$fila->latitud_punto;
        $data["longitud"]=$fila->longitud_punto;
        $data["zoom"]=$fila->zoom;
       */
        
        
        $data["imagen_top"]="cabecera_clientes.jpg";
        $data["seccion"]="fe/v_contacto";
        
        $this->load->view("fe/includes_fe/template_contacto", $data);
        
        
        
    }
    
    
}

?>
