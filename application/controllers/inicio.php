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
class inicio extends padre {
    //put your code here
    
    public function __construct() {
        parent::__construct();
            
    }
    
    public function index(){
        
      
        //EXTRAEMOS LAS ETIQUETAS SEO
        $strsql="select title, keyword, description, nombre, titulo, sumilla, descripcion  from secciones 
                 where seo='inicio' ";
        $fila=$this->modelo_base->c_una_fila($strsql);
        $data["title"]=$fila->title;
        $data["keyword"]=$fila->keyword;
        $data["description"]=$fila->description;
        $data["nombre"]=$fila->titulo;
        $data["titulo"]=$fila->titulo;
        $data["sumilla"]=$fila->sumilla;
        $data["descripcion"]=$fila->descripcion;
        $data["current"]="inicio";        
        
        parent::carga_comun(); 

        $data["servicios"]=$this->servicios;

        

        //INICIO OFRECE
        $strsql="select nombre, titulo, descripcion  from secciones 
                 where seo='inicio-ofrece' ";
        $fila=$this->modelo_base->c_una_fila($strsql);
        $data["nombre_ofrece"]=$fila->nombre;
        $data["titulo_ofrece"]=$fila->titulo;
        $data["descripcion_ofrece"]=$fila->descripcion;        
        
         
        //INICIO MAQUINARIA
        $strsql="select nombre, titulo, descripcion  from secciones 
                 where seo='inicio-maquinarias' ";
        $fila=$this->modelo_base->c_una_fila($strsql);
        $data["nombre_maquinarias"]=$fila->nombre;
        $data["titulo_maquinarias"]=$fila->titulo;
        $data["descripcion_maquinarias"]=$fila->descripcion;      
             
                
        //EXTRAEMOS LOS BANNERS CENTRALES PARA EL SLIDE
        $strsql="select idbanners, nombre,  link, alt, imagen, sumilla "
                . "  from banners where idsw='1' ORDER by orden";
        $data["banners"]=$this->modelo_base->consulta($strsql);
        
        
        //TESTIMONIOS PRIMERA HOJA
        //$strsql="select contacto, empresa, sumilla, orden from testimonios where   idsw='1' order by orden";
        //$data["testimonios"]=$this->modelo_base->consulta($strsql);
        
       
        //MAQUINARIAS
        $strsql="select m.*,i.imagen from maquinarias m left join maquinarias_imagenes i on i.idmaquinarias=m.idmaquinarias where m.idsw='1' and m.idprimera_hoja='1' and i.idprimera_foto='1' order by m.orden";
        $data["maquinarias"]=$this->modelo_base->consulta($strsql);
        
        //BLOG
        //$strsql="select nombre, sumilla, fecha, seo, imagen from articulos order by fecha desc limit 2";
        //$data["blog"]=$this->modelo_base->consulta($strsql);
        
        //$data["lado_izquierdo"]="fe/menu_categorias";
        //$data["lado_derecho"]="fe/v_productos";
        
        
        
        //$data["variable_top"]="fe/includes_fe/banner";
        
        $this->load->view("fe/includes_fe/template_home", $data);
        
        
        
        
        
    }
    
    
}

?>
