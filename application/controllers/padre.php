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
class padre extends CI_Controller {
    //put your code here
    
    
    
    
    

    //ESTAS VARIABLES SE CONTROLAN MENU
    public $productos_naturales="";
    public $tratamiento_natural="";
    public $cosmetica_natural="";
    
    public $cat_actual="";
    public $subcat_actual="";
    
    //Simbolo de la Moneda, Pais, CamposPrecio
    public $moneda="";
    public $pais="";
    public $campos_precio="";
    
    public $menu="";
    
    public $inicio_bienvenida="";
   
    public $cat_servicios="";
    public $cat_productos="";
    public $servicios="";
    public $servicios2="";    
    public $maquinarias="";
    public $maquinarias2="";    
    
    public $paises="";
    
    
    public function __construct() {
        parent::__construct();
             $this->load->library('pagination'); 
             $this->load->model("modelo_base");
             $this->load->library('be/be_funciones');
             $this->load->library('be/be_categorias');
             $this->load->library('be_parametros');
             $this->load->library('fe/fe_email');
             $this->load->library('login/validacion');
             
             
             
             //Este es para saber el Ip de que Pais es
             $this->load->library('geoip_lib');
             
             //http://www.cesarcancino.com/configurar-zona-horaria-con-php-n221.html
             date_default_timezone_set("America/Lima");
    }
    
    public function carga_comun(){
        
        
         //Categoria_productos
        $strsql="select idcategoria_productos, nombre, seo, imagen from categoria_productos where idsw='1' and padre_id='2' order by orden";
        $this->cat_productos=$this->modelo_base->consulta($strsql);
         
        
        //servicios
        $strsql="select s.*,i.imagen from servicios s right join servicios_imagenes i on i.idservicios=s.idservicios  where s.idsw='1' and i.idprimera_foto=1 order by s.orden asc";
        $this->servicios=$this->modelo_base->consulta($strsql);


        //servicios2
        $strsql="select s.* from servicios s where s.idsw='1' order by s.orden asc";
        $this->servicios2=$this->modelo_base->consulta($strsql);
        

        //maquinarias
        // $strsql="select s.*,i.imagen,i.idprimera_foto from maquinarias s left join maquinarias_imagenes i on i.idmaquinarias=s.idmaquinarias where s.idsw='1' and i.idprimera_foto=1 order by s.orden asc";
        // $this->maquinarias=$this->modelo_base->consulta($strsql);        

        //maquinarias2
        $strsql="select s.* from maquinarias s where s.idsw='1' order by s.orden asc";
        $this->maquinarias2=$this->modelo_base->consulta($strsql);    

        /*
        //EXTRAEMOS LAS CATEGORIAS PADRES
        $strsql="select idcategoria_productos, nombre, seo, imagen from categoria_productos 
                  where padre_id='0' and idsw='1' order by orden";
        $this->categorias=$this->modelo_base->consulta($strsql);
        */
        
        
     
        
    }//endFunction
    
    
}

?>
