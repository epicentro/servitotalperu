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
class blog extends padre {
    //put your code here
    
    public function __construct() {
        parent::__construct();
            
    }
    
    public function inicio(){
        
      
        $strsql="select title, keyword, description, nombre, titulo, sumilla, descripcion  from secciones 
                 where seo='blog' ";
        $fila=$this->modelo_base->c_una_fila($strsql);
        $data["title"]=$fila->title;
        $data["keyword"]=$fila->keyword;
        $data["description"]=$fila->description;
        $data["nombre"]=$fila->nombre;
        $data["titulo"]=$fila->titulo;
        $data["sumilla"]=$fila->sumilla;
        $data["descripcion"]=$fila->descripcion;
        
        
        parent::carga_comun(); 
        
        
        //CLIENTES DEL SECTOR PRIVADO
        $strsql="select nombre, fecha, sumilla, seo, imagen from articulos where idsw='1' order by fecha desc";
       
        $cantidad=$this->modelo_base->cantidad_filas($strsql);
       
        $config['base_url'] = base_url().'blog/inicio/';
        $config['total_rows'] = $cantidad;
        $num=$this->be_parametros->valor("fe_elementos_x_pagina");
        $config['per_page'] = $num;
        $config['uri_segment'] = 3;


        /*ESTE full_tag_open ME PERMITE PONER UNA ETIQUETA CONTENEDORA PARA LUEGO AGARRARME DE ELLA
          Y PONER ESTILOS A LOS ENLACES QUE ESTAN DENTRO DE ELLA  */
        
        $config['full_tag_open'] = "<p class='p_paginacion'>";
        $config['full_tag_close'] = "</p>";

        //ESTILO PARA LA PAGINACION SELECCIONADA.
        $config['cur_tag_open'] = "&nbsp;<span class='seleccionado' >";
        $config['cur_tag_close'] = "</span>";

      

        $this->pagination->initialize($config);

        $offset=$this->uri->segment(3);
        if ($offset == '') $offset=0;

            $strsql.=" limit   $offset ,  $num";
        
        
        
        
        $data["blog"]=$this->modelo_base->consulta($strsql);
        
        
        
           
        $data["imagen_top"]="cabecera_blog.jpg";
        $data["seccion"]="fe/v_blog";
        
       $this->load->view("fe/includes_fe/template_secciones", $data);
        
        
        
    }
    
    public function item(){
        
       $seo=$this->uri->segment(3);

       $strsql="select idarticulos, title, keyword, description,  nombre, titulo, seo, descripcion, imagen, fecha, autor "
               . "from articulos where seo='$seo'";
       
       
       
       $fila=$this->modelo_base->c_una_fila($strsql);
        $idarticulos=$fila->idarticulos;
        $data["idarticulos"]=$fila->idarticulos;
        $data["title"]=$fila->title;
        $data["keyword"]=$fila->keyword;
        $data["description"]=$fila->description;
        $data["nombre"]=$fila->nombre;
        $data["titulo"]=$fila->nombre;
        $data["seo"]=$fila->seo;
        $data["descripcion"]=$fila->descripcion;  
        $data["imagen"]=$fila->imagen;  
        $data["fecha"]=$fila->fecha;  
        $data["autor"]=$fila->autor; 
        
        
       
        parent::carga_comun(); 
        
        
        
        
        
       
       $data["imagen_top"]="cabecera_blog.jpg";
        $data["seccion"]="fe/v_blog_detalle";
        
       $this->load->view("fe/includes_fe/template_blog", $data);
       
        
        
    }//endFunction
    
    
}

?>
