<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Router
 *
 * @author Casa
 */
//Yasser:Hemos extenido de este ejemplo
/*http://www.davidrojas.net/index.php/desarrollo-web/urls-amigables-en-codeigniter-controlador-catch-all/
 * 
 */
class MY_Router extends CI_Router {
 
   /*
    function __construct() {
   
       
        parent::__construct();
    }
 */
    function _validate_request($segments)
    {
        //var_dump($segments);
        //exit(); 
        
         $segmento=str_replace("-", "_", $segments[0]);
        
        // Comprueba que el controlador no existe y ademas si no es un subdirectorio
        if (!file_exists(APPPATH.'controllers/'.$segmento.EXT) && !is_dir(APPPATH.'controllers/'.$segmento) && !is_dir(APPPATH.'controllers/'.$segments[0]))
        {
            $segments = array("paginas", "cargar", $segments[0]);
 
        }elseif(file_exists(APPPATH.'controllers/'.$segmento.EXT) ){//SI ES UN CONTROLADOR ENTONCES QUE PASE CON LAS RAYAS ABAJO
            
            $segments[0]=$segmento;
        }
        
        return parent::_validate_request($segments);
    }
   
}