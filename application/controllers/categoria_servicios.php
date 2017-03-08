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
class categoria_servicios extends padre {
    //put your code here
    
    public function __construct() {
        parent::__construct();
            
    }
    
    public function index(){
        
        
        
         $seocat=$this->uri->segment(2);
            
            //SI NO EXISTE $this->uri->segment(2) ES PORQUE HEMOS HECHO CLIC EN UNA CATEGORIA
            $strsql="select idcategoria_servicios, title, keyword, description, nombre, titulo, 
                 sumilla   from categoria_servicios 
                 where seo='$seocat' ";
            $fila=$this->modelo_base->c_una_fila($strsql);
            $idcategoria_servicios=$fila->idcategoria_servicios;
            $data["idcategoria_servicios"]=$idcategoria_servicios;
            $data["title"]=$fila->title;
            $data["keyword"]=$fila->keyword;
            $data["description"]=$fila->description;
            $data["nombre"]=$fila->nombre;
            $data["titulo"]=$fila->titulo;
            $data["sumilla"]=$fila->sumilla;
            $data["current"]="servicios";
           


            parent::carga_comun(); 

            //////////////////////////////////////////////////////////////////////////////////////////
            //LO PRIMERO QUE TENEMOS QUE PREGUNTAR ES SI TENEMOS servicios PARA LA CATEGORIA ACTUAL,
            //SI TENEMOS servicios POR MAS QUE TE TENGA SUBCATEGORIAS MOSTRARA LOS servicios
            //////////////////////////////////////////////////////////////////////////////////////////
            
            $strsql="select count(*) as cantidad from servicios where idcategoria_servicios='$idcategoria_servicios'";
            $fila=$this->modelo_base->c_una_fila($strsql);
            
            
            //SI LA CATEGORIA NO TIENE PRODCUTOS
            //MOSTRAMOS SUS SUBCATEGORIAS
            if($fila->cantidad==0){
                
                show_404(); 
                
            
                
            }elseif($fila->cantidad>0){//SI ES MAYOR A CERO ES PORQUE LA CATEGORIA TIENE servicios
                                       // POR LO TANTO LOS MOSTRAMOS
                
                
                
                
                
                
                
                
                
                $strsql="select idservicios, nombre, descripcion, seo  from servicios where idcategoria_servicios='$idcategoria_servicios'";
                $data["servicios"]=$this->modelo_base->consulta($strsql);
                
                $data["imagen_top"]="cabecera_servicios.jpg";
                
                
                //AVERIGUAMOS SI SON SERVICIOS O servicios COMO AMBOS USAN LA TABLA servicios
                //PARA LOS SERVICIOS NO HABRA DETALLE DE SU PRODUCTO
                //PARA LOS servicios SI HABRA DETALLE DE SU PRODUCTO
                //PARA SOLUCIONARLO USAREMOS 2 VIEW
                $ids=trim($this->be_categorias->recursivo_padre_origen($idcategoria_servicios));
                $parte=explode(" ", $ids);
                $id_origen=$parte[0];
                
                  
                $data["seccion"]="fe/v_servicios_productos";
              
                
               

                $this->load->view("fe/includes_fe/template_servicios", $data);
                
                
                
                
            }//endIF
                
            
            
            
           
            
        }//endIF
        
        
        
        
        
   
    
    
}

?>
