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
class categoria extends padre {
    //put your code here
    
    public function __construct() {
        parent::__construct();
            
    }
    
    public function index(){
        
        
        
         $seocat=$this->uri->segment(2);
            
            //SI NO EXISTE $this->uri->segment(2) ES PORQUE HEMOS HECHO CLIC EN UNA CATEGORIA
            $strsql="select idcategoria_productos, title, keyword, description, nombre, titulo, 
                 sumilla   from categoria_productos 
                 where seo='$seocat' ";
            $fila=$this->modelo_base->c_una_fila($strsql);
            $idcategoria_productos=$fila->idcategoria_productos;
            $data["idcategoria_productos"]=$idcategoria_productos;
            $data["title"]=$fila->title;
            $data["keyword"]=$fila->keyword;
            $data["description"]=$fila->description;
            $data["nombre"]=$fila->nombre;
            $data["titulo"]=$fila->titulo;
            $data["sumilla"]=$fila->sumilla;
            $data["current"]="productos";
           
            

            parent::carga_comun(); 

            //////////////////////////////////////////////////////////////////////////////////////////
            //LO PRIMERO QUE TENEMOS QUE PREGUNTAR ES SI TENEMOS PRODUCTOS PARA LA CATEGORIA ACTUAL,
            //SI TENEMOS PRODUCTOS POR MAS QUE TE TENGA SUBCATEGORIAS MOSTRARA LOS PRODUCTOS
            //////////////////////////////////////////////////////////////////////////////////////////
            
            $strsql="select count(*) as cantidad from productos where idcategoria_productos='$idcategoria_productos'";
            $fila=$this->modelo_base->c_una_fila($strsql);
            
            
            //SI LA CATEGORIA NO TIENE PRODCUTOS
            //MOSTRAMOS SUS SUBCATEGORIAS
            if($fila->cantidad==0){
                
                $strsql="select idcategoria_productos, nombre, seo, imagen from categoria_productos "
                    . " where idsw='1' and padre_id='$idcategoria_productos' order by orden";
                $data["cat_servicios"]=$this->modelo_base->consulta($strsql);

                $data["imagen_top"]="cabecera_servicios.jpg";
                $data["seccion"]="fe/v_categoria";

                $this->load->view("fe/includes_fe/template_categoria", $data);
                
            
                
            }elseif($fila->cantidad>0){//SI ES MAYOR A CERO ES PORQUE LA CATEGORIA TIENE PRODUCTOS
                                       // POR LO TANTO LOS MOSTRAMOS
                
                
                
                
                
                
                
                
                
                $strsql="select idproductos, nombre, descripcion, seo  from productos where idcategoria_productos='$idcategoria_productos'";
                $data["productos"]=$this->modelo_base->consulta($strsql);
                
                $data["imagen_top"]="cabecera_servicios.jpg";
                
                
                //AVERIGUAMOS SI SON SERVICIOS O PRODUCTOS COMO AMBOS USAN LA TABLA PRODUCTOS
                //PARA LOS SERVICIOS NO HABRA DETALLE DE SU PRODUCTO
                //PARA LOS PRODUCTOS SI HABRA DETALLE DE SU PRODUCTO
                //PARA SOLUCIONARLO USAREMOS 2 VIEW
                $ids=trim($this->be_categorias->recursivo_padre_origen($idcategoria_productos));
                $parte=explode(" ", $ids);
                $id_origen=$parte[0];
                
                if($id_origen=="1"){//ES SERVICIO
                    
                    $data["seccion"]="fe/v_servicios_productos";
                    
                }else{ //ES PRODUCTO
                    
                     $data["seccion"]="fe/v_productos_productos";
                    
                }//endIF
                
                
                
                

                $this->load->view("fe/includes_fe/template_categoria", $data);
                
                
                
                
            }//endIF
                
            
            
            
           
            
        }//endIF
        
        
        
        
        
   
    
    
}

?>
