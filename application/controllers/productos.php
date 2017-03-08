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
class productos extends padre {
    //put your code here
    
    public function __construct() {
        parent::__construct();
             
    }
    
   
    
    
    public function index(){
        
                       $seocat=$this->uri->segment(2);
                       //OBTENEMOS DATOS DE LA CATEGORIA
                       $strsql="select idcategoria_productos,  title, keyword, description, nombre from categoria_productos where seo='$seocat'";
                       $fila=$this->modelo_base->c_una_fila($strsql);
                       
                       $idcategoria=$fila->idcategoria_productos;
                       $data["title"]=$fila->title;
                       $data["keyword"]=$fila->keyword;
                       $data["description"]=$fila->description;
                       $data["titulo"]=$fila->nombre;
                        $data["current"]="productos";                              



                        parent::carga_comun(); 


                      
                        /*CARGAMOS TODOS LOS PRODUCTOS*/
                        $strsql="select idproductos, nombre, seo  from productos where idcategoria_productos='$idcategoria' and idsw='1'";
                        $cantidad=$this->modelo_base->cantidad_filas($strsql);
       
                        $config['base_url'] = base_url().'productos/'.$seocat."/";
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
                        
                        
                        
                        
                        $data['productos']=$this->modelo_base->consulta($strsql);

                       
                        $data["seccion"]="fe/v_productos";
        
                        $this->load->view("fe/includes_fe/template_productos", $data);
                        
    
   }
     
    
    
}

?>
