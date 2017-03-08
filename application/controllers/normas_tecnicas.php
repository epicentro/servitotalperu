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
class normas_tecnicas extends padre {
    //put your code here
    
    public function __construct() {
        parent::__construct();
            
    }
    
    public function index(){
        
      
        $strsql="select title, keyword, description, nombre, titulo, sumilla, descripcion  from secciones 
                 where seo='normas-tecnicas' ";
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
        $strsql="select nombre, fecha, sumilla, descripcion, seo, imagen from normas where idsw='1' order by fecha desc";
       
        $cantidad=$this->modelo_base->cantidad_filas($strsql);
       
        $config['base_url'] = base_url().'normas-tecnicas/';
        $config['total_rows'] = $cantidad;
        $num=$this->be_parametros->valor("fe_elementos_x_pagina");
        $config['per_page'] = $num;
        $config['uri_segment'] = 2;


        /*ESTE full_tag_open ME PERMITE PONER UNA ETIQUETA CONTENEDORA PARA LUEGO AGARRARME DE ELLA
          Y PONER ESTILOS A LOS ENLACES QUE ESTAN DENTRO DE ELLA  */
        
        $config['full_tag_open'] = "<p class='p_paginacion'>";
        $config['full_tag_close'] = "</p>";

        //ESTILO PARA LA PAGINACION SELECCIONADA.
        $config['cur_tag_open'] = "&nbsp;<span class='seleccionado' >";
        $config['cur_tag_close'] = "</span>";

      

        $this->pagination->initialize($config);

        $offset=$this->uri->segment(2);
        if ($offset == '') $offset=0;

            $strsql.=" limit   $offset ,  $num";
        
        
        
        
        $data["normas"]=$this->modelo_base->consulta($strsql);
        
        
        
           
        $data["imagen_top"]="cabecera_normas.jpg";
        $data["seccion"]="fe/v_normas_tecnicas";
        
        $this->load->view("fe/includes_fe/template_secciones", $data);
        
        
        
    }
    
   
    
    
}

?>
