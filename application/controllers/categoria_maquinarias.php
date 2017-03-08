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
class categoria_maquinarias extends padre {
    //put your code here
    
    public function __construct() {
        parent::__construct();
            
    }
    
    public function index(){
        
        
        
         $seocat=$this->uri->segment(2);
            
            //SI NO EXISTE $this->uri->segment(2) ES PORQUE HEMOS HECHO CLIC EN UNA CATEGORIA
            $strsql="select idcategoria_maquinarias, title, keyword, description, nombre, titulo, 
                 sumilla   from categoria_maquinarias 
                 where seo='$seocat' ";
            $fila=$this->modelo_base->c_una_fila($strsql);
            if($fila=='0'){
                show_404(); 
            } 

            //             var_dump($fila);
            // die();
            $idcategoria_maquinarias=$fila->idcategoria_maquinarias;
            $data["idcategoria_maquinarias"]=$idcategoria_maquinarias;
            $data["title"]=$fila->title;
            $data["keyword"]=$fila->keyword;
            $data["description"]=$fila->description;
            $data["nombre"]=$fila->nombre;
            $data["titulo"]=$fila->titulo;
            $data["sumilla"]=$fila->sumilla;
            $data["current"]="maquinarias";
           


            parent::carga_comun(); 

            //////////////////////////////////////////////////////////////////////////////////////////
            //LO PRIMERO QUE TENEMOS QUE PREGUNTAR ES SI TENEMOS maquinarias PARA LA CATEGORIA ACTUAL,
            //SI TENEMOS maquinarias POR MAS QUE TE TENGA SUBCATEGORIAS MOSTRARA LOS maquinarias
            //////////////////////////////////////////////////////////////////////////////////////////
            
            $strsql="select count(*) as cantidad from maquinarias where idcategoria_maquinarias='$idcategoria_maquinarias'";
            $fila=$this->modelo_base->c_una_fila($strsql);
            
            
            //SI LA CATEGORIA NO TIENE PRODCUTOS
            //MOSTRAMOS SUS SUBCATEGORIAS
            if($fila->cantidad==0){
                            

                show_404(); 
                
            
                
            }elseif($fila->cantidad>0){//SI ES MAYOR A CERO ES PORQUE LA CATEGORIA TIENE maquinarias
                                       // POR LO TANTO LOS MOSTRAMOS
                
                
                
                
                
                
                
                
                
                $strsql="select idmaquinarias, nombre, descripcion, seo  from maquinarias where idcategoria_maquinarias='$idcategoria_maquinarias'";
                $data["maquinarias"]=$this->modelo_base->consulta($strsql);
                
                $data["imagen_top"]="cabecera_maquinarias.jpg";
                
                
                //AVERIGUAMOS SI SON maquinarias O maquinarias COMO AMBOS USAN LA TABLA maquinarias
                //PARA LOS maquinarias NO HABRA DETALLE DE SU PRODUCTO
                //PARA LOS maquinarias SI HABRA DETALLE DE SU PRODUCTO
                //PARA SOLUCIONARLO USAREMOS 2 VIEW
                $ids=trim($this->be_categorias->recursivo_padre_origen($idcategoria_maquinarias));
                $parte=explode(" ", $ids);
                $id_origen=$parte[0];
                  
                $data["seccion"]="fe/v_maquinarias_productos";

                $this->load->view("fe/includes_fe/template_maquinarias", $data);
                
                
                
                
            }//endIF
                
            
            
            
           
            
        }//endIF
        
        
        
        
        
   
    
    
}

?>
