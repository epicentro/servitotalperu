<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria
 *
 * @author Yasser
 */
class servicios_imagenes extends CI_Controller {
    //put your code here
     
    public $tabla="servicios_imagenes";
    public $idtabla="idservicios_imagenes";
    public $carpeta_img="img_servicios";
    
    public $tabla_padre="servicios";
    public $idtabla_padre="idservicios";
    
    
    public $imagen_ancho=500;
    public $imagen_alto=500;
    public $imagen_thumb_ancho=100;
    public $imagen_thumb_alto=100;    
     
    
    public function  __construct() {
        parent::__construct();


        $this->load->model("modelo_base");
        $this->load->library('pagination');
        $this->load->library('image_lib');
        $this->load->library('login/validacion');
        $this->load->library('be/be_funciones');
        $this->load->library('be/be_categorias');
        $this->load->library('be_parametros');
        
    }

    public function listar(){
             $this->validacion->validacion_login();
             
             //ID DEL PRODUCTO QUE LE VAMOS A INGRESAR IMAGENES
             $id=$this->uri->segment(4);
             $data['id']=$id;
             
             
             $data["idtabla"]=$this->idtabla;
             
             
             //AVERIGUAMOS EL NOMBRE DEL PRODUCTO QUE LE VAMOS A INGRESAR IMAGENES
                $strsql="select nombre from $this->tabla_padre where $this->idtabla_padre='$id'";
                $row=$this->modelo_base->c_una_fila($strsql);

                $data["nombre"]=$row->nombre;
            
            //AQUI EXTRAEMOS LAS FOTOS
            $strsql="select $this->idtabla, imagen, orden, idsw, idprimera_foto  from $this->tabla 
                    where $this->idtabla_padre='$id' order by orden ";          
            
         $cantidad=$this->modelo_base->cantidad_filas($strsql);

        
        $config['base_url'] = base_url().'be/'.$this->tabla.'/listar/'.$id."/";
        $config['total_rows'] = $cantidad;
        $num=$this->be_parametros->valor("be_elementos_x_pagina");
        $config['per_page'] = $num;
        $config['uri_segment'] = 5;


        /*ESTE full_tag_open ME PERMITE PONER UNA ETIQUETA CONTENEDORA PARA LUEGO AGARRARME DE ELLA
          Y PONER ESTILOS A LOS ENLACES QUE ESTAN DENTRO DE ELLA  */
        
        $config['full_tag_open'] = "<p class='p_paginacion'>";
        $config['full_tag_close'] = "</p>";

        //ESTILO PARA LA PAGINACION SELECCIONADA.
        $config['cur_tag_open'] = "&nbsp;<span style='color:#fff; background-color:#069; border:0; ' >";
        $config['cur_tag_close'] = "</span>";

      

        $this->pagination->initialize($config);

        $offset=$this->uri->segment(5);
        if ($offset == '') $offset=0;

            $strsql.=" limit   $offset ,  $num";

      
        $filas=$this->modelo_base->consulta($strsql);

        $data['filas']=$filas;

                  
            
            $data['cuerpo']="be/v_".$this->tabla."_mnto";
            $this->load->view("be/includes_be/template_be", $data);
            
        
    }//endFunction
    
    
    
    
    
    
    public function v_imagen_pf(){

       
       $this->validacion->validacion_login();
       $id=$this->uri->segment(4);
       $data["id"]=$id;
       
       //AQUI ALMACENAMOS EL ID DE LA IMAGEN A EDITAR
       $idtabla=$this->uri->segment(5);
       $data["idtabla"]=$idtabla;
       
       //AVERIGUAMOS EL ORDEN
       $strsql="select idprimera_foto from $this->tabla where $this->idtabla='$idtabla'";
       $fila=$this->modelo_base->c_una_fila($strsql);
       $data["idprimera_foto"]=$fila->idprimera_foto;
       
       
      
       $this->load->view("be/v_".$this->tabla."_imagen_pf.php", $data);
     
     
   }
   
   public function imagen_pf(){
       
       $this->validacion->validacion_login();
       $idtabla=$this->uri->segment(4);
       $data["id"]=$idtabla;
       
       
       
       $strsql="update $this->tabla set idprimera_foto='2' where 
                $this->idtabla_padre='$idtabla'";
       
       
       $valor=$this->modelo_base->ejecuta($strsql);
       
       //AQUI ALMACENAMOS EL ID DE LA IMAGEN A EDITAR
       $idtabla=$this->uri->segment(5);
       
       $pf=$this->input->post("pf");
       
       $strsql="update $this->tabla set idprimera_foto='$pf' where 
                $this->idtabla='$idtabla'";
       
       $valor=$this->modelo_base->ejecuta($strsql);
       
       if($valor==1){

                             $data['recarga_padre']="si";
                             $this->load->view("be/v_".$this->tabla."_imagen_orden", $data);

       }//endIF
       
   }
    
    
    
    
    
    
    public function v_imagen_orden(){

       
       $this->validacion->validacion_login();
       $id=$this->uri->segment(4);
       $data["id"]=$id;
       
       
       
       
      
       //AQUI ALMACENAMOS EL ID DE LA IMAGEN A EDITAR
       $idtabla=$this->uri->segment(5);
       $data["idtabla"]=$idtabla;
       
       //AVERIGUAMOS EL ORDEN
       $strsql="select orden from $this->tabla where $this->idtabla='$idtabla'";
       $fila=$this->modelo_base->c_una_fila($strsql);
       $data["orden"]=$fila->orden;
       
       
      
       $this->load->view("be/v_".$this->tabla."_imagen_orden.php", $data);
     
     
   }
   
   public function imagen_orden(){
       
       $this->validacion->validacion_login();
       $idtabla=$this->uri->segment(4);
       $data["id"]=$id;
       
       //AQUI ALMACENAMOS EL ID DE LA IMAGEN A EDITAR
       $idtabla=$this->uri->segment(5);
       
       $orden=$this->input->post("orden");
       
       $strsql="update $this->tabla set orden='$orden' where 
                $this->idtabla='$idtabla'";
       
       $valor=$this->modelo_base->ejecuta($strsql);
       
       if($valor==1){

                             $data['recarga_padre']="si";
                             $this->load->view("be/v_".$this->tabla."_imagen_orden", $data);

       }//endIF
       
   }
   
   
   
    public function v_imagen(){

       $this->validacion->validacion_login();
       $id=$this->uri->segment(4);
       $data["id"]=$id;
       
       //LE PONEMOS EL VALOR DE CERO PORQUE AQUÍ SE VA REGISTRAR UN NUEVO POR LO TANTO TODAVIA NO EXISTE
       $data["idtabla"]="0";
       $data["orden"]="";
       
       
      
       $this->load->view("be/v_".$this->tabla."_imagen.php", $data);
     
   }
   
   
   public function v_imagen_editar(){

       $this->validacion->validacion_login();
       $id=$this->uri->segment(4);
       $data["id"]=$id;
       
       
       
       
       //AQUI ALMACENAMOS EL ID DE LA IMAGEN A EDITAR
       $idtabla=$this->uri->segment(5);
       $data["idtabla"]=$idtabla;
       
       //AVERIGUAMOS EL ORDEN
       $strsql="select orden from $this->tabla where $this->idtabla='$idtabla'";
       $fila=$this->modelo_base->c_una_fila($strsql);
       $data["orden"]=$fila->orden;
       
       
      
       $this->load->view("be/v_".$this->tabla."_imagen.php", $data);
     
   }


   
   public function imagen_new(){

      
      $this->validacion->validacion_login();

       $id=$this->uri->segment(4);
       $aleatorio=random_string('alnum', 5);   

        $config['upload_path'] = './'.$this->carpeta_img.'/';
        $config['allowed_types'] = 'doc|docx|xls|xlsx|pdf|txt|gif|jpg|png';
        //$config['allowed_types'] = '*';
        $config['max_size'] = '20000';
        $config['max_width']  = '250';
        $config['max_height']  = '100';
        //$config['encrypt_name'] = TRUE;  //SI NO LO COMENTAMOS ENTONCES NO FUNCIONARA file_name porque el nombre estaria encriptado
        $config['file_name']=$this->tabla."_".$id."_".$aleatorio;
        $config['overwrite']=true;
        $config['remove_spaces']=true;//cual espacio en el nombre lo conviere en un guion subrayado

        $this->load->library('upload', $config);


        if ( ! $this->upload->do_upload("imagen")){//En esta linea es que subimos la imagen

            echo  $this->upload->display_errors();
            
            
        }else{

            $data = $this->upload->data();
            $file = $data['file_name'];

           

            

                                 $nuevo=explode(".", $file);
                                 $thumb=$nuevo[0]."_thumb.".$nuevo[1];
           
            
           
                                $configThumb1['image_library'] = 'gd2';
                                $configThumb1['source_image'] = $data['full_path'];
                                $configThumb1['new_image'] = $data['file_path'].$thumb;
                                $configThumb1['maintain_ratio'] = TRUE;
                                $configThumb1['width'] = '150';
                                $configThumb1['height'] = '60';

                                $this->image_lib->clear();
                                $this->load->library('image_lib');
                                $this->image_lib->initialize($configThumb1);

                                
                                
                                if ( ! $this->image_lib->resize()){//En esta linea redimensionamos la imagen a 170 x 220

                                    echo $this->image_lib->display_errors();

                                }else{
                                    
                                        $idtabla=$this->uri->segment(5);
                                        if($idtabla=="0"){//si es igual a cero es nuevo registro

                                                //Ya tenemos creado la imagen y el Thumbnails, ahora grabamos
                                                
                                                $strsql="insert into $this->tabla ( imagen, $this->idtabla_padre )values ('$file','$id')";
                                                $valor=$this->modelo_base->ejecuta($strsql);
                                                
                                        }else{//si $idtabla no es cero entonces es una actualizacion
                                            
                                            
                                                //ANTES DE GRABAR BORRAMOS EL LAS IMAGENES ANTERIORES
                                                $strsql="select imagen from $this->tabla where $this->idtabla_padre='$id' and $this->idtabla='$idtabla'";
                                                
                                                $fila=$this->modelo_base->c_una_fila($strsql);

                                                if(   strlen(trim($fila->imagen)) > 0 ){

                                                        $ruta1="./$this->carpeta_img/".$fila->imagen;
                                                        $ruta2="./$this->carpeta_img/".$this->be_funciones->nombre_thumbs($fila->imagen);
                                                                    @unlink($ruta1);
                                                                    @unlink($ruta2);
                                                }//endIF
                                               
                                                //ACTUALIZAMOS
                                                $strsql="update $this->tabla set imagen='$file', $this->idtabla_padre='$id' where 
                                                        $this->idtabla='$idtabla'";
                                                
                                                $valor=$this->modelo_base->ejecuta($strsql);
                                            
                                        }//endIF

                                                if($valor==1){

                                                    $data['recarga_padre']="si";

                                                    $this->load->view("be/v_".$this->tabla."_imagen", $data);


                                                }//endIF
                                }//endIF
           
                      
                        
             
              
           

            
        }//endIF

       
        
    }//endFunction
   
   function equi_foto($file, $ruta, $ancho_deseado, $alto_deseado){
                $imagen_subida=$file; //Le ponemos el mismo nombre para que chanque el subido

                // Creamos una imagen con fondo blanco para el thumbnail 
                $imagen_nueva=imagecreatetruecolor($ancho_deseado,$alto_deseado); 
                $fondo=imagecolorallocate($imagen_nueva, 255, 255, 255);     
                imagefill($imagen_nueva, 0, 0, $fondo);  

                 // Cargamos la fotografía y guardamos sus dimensiones y ratio 

                $extension = strtolower(strrchr($file, '.'));

                switch ($extension) {
                    case '.jpg':
                    case '.jpeg':
                        $foto_entera = @imagecreatefromjpeg($ruta.$file);
                        break;
                    case '.gif':
                        $foto_entera = @imagecreatefromgif($ruta.$file);
                        break;
                    case '.png':
                        $foto_entera = @imagecreatefrompng($ruta.$file);
                        break;

                }
                
                $ancho_foto=imagesx($foto_entera); 
                $alto_foto=imagesy($foto_entera); 
                
                if($ancho_foto<$ancho_deseado && $alto_foto<$alto_deseado){
                    $top=($alto_deseado-$alto_foto)/2;
                    $left=($ancho_deseado-$ancho_foto)/2;
                    imagecopyresampled($imagen_nueva,$foto_entera,$left,$top,0,0,$ancho_foto,$alto_foto,$ancho_foto,$alto_foto);
                    
                }else{
                
                        if($ancho_foto>$alto_foto){

                            $ratio_foto=$ancho_foto/$alto_foto;
                            $top=($alto_deseado - ($ancho_deseado/$ratio_foto))/2;
                            imagecopyresampled($imagen_nueva,$foto_entera,0,$top,0,0,$ancho_deseado,($ancho_deseado/$ratio_foto),$ancho_foto,$alto_foto);  

                        }elseif($alto_foto>$ancho_foto){

                            $ratio_foto=$alto_foto/$ancho_foto; 
                            $left=($ancho_deseado - ($alto_deseado/$ratio_foto))/2;
                            imagecopyresampled($imagen_nueva,$foto_entera,$left,0,0,0,($alto_deseado/$ratio_foto),$alto_deseado,$ancho_foto,$alto_foto);  
                            
                        }else{//cuando es un cuadrado
                            
                            if($ancho_foto<$ancho_deseado){
                                 $top=($ancho_deseado - $ancho_foto)/2;
                                imagecopyresampled($imagen_nueva,$foto_entera,$top,0,0,0,$ancho_foto,$alto_deseado,$ancho_foto,$alto_foto);          
                            
                            
                            }elseif($alto_foto<$alto_deseado){
                                $left=($alto_deseado - $alto_foto)/2;
                                imagecopyresampled($imagen_nueva,$foto_entera,0,$left,0,0,$ancho_deseado,$alto_foto,$ancho_foto,$alto_foto);          
                                
                            }else{
                               
                               imagecopyresampled($imagen_nueva,$foto_entera,0,0,0,0,$ancho_foto,$alto_foto,$ancho_foto,$alto_foto);                                     
                            }
                            
                        }//endIF
                }//endIF
                
               
     
                switch ($extension) {
                            case '.jpg':
                            case '.jpeg':
                                imagejpeg($imagen_nueva,$ruta.$imagen_subida,100); 
                                break;
                            case '.gif':
                                imagegif($imagen_nueva,$ruta.$imagen_subida,100); 
                                break;
                            case '.png':
                                //En png va del 1 a 9
                                imagepng($imagen_nueva,$ruta.$imagen_subida,9); 
                                break;

                 }
        
    }//endFunction

 public function imagen(){

      $this->validacion->validacion_login();
      
    
      $ancho_deseado=$this->imagen_ancho;
      $alto_deseado=$this->imagen_alto;
      
      $ancho_thumb=$this->imagen_thumb_ancho;
      $alto_thumb=$this->imagen_thumb_alto;
      
      $ruta = './'.$this->carpeta_img.'/'; 

       $id=$this->uri->segment(4);
       $aleatorio=random_string('alnum', 5);   

        $config['upload_path'] = './'.$this->carpeta_img.'/';
        $config['allowed_types'] = 'doc|docx|xls|xlsx|pdf|txt|gif|jpg|png';
        //$config['allowed_types'] = '*';
        $config['max_size'] = '20000';
        $config['max_width']  = '2000';
        $config['max_height']  = '1800';
        //$config['encrypt_name'] = TRUE;  //SI NO LO COMENTAMOS ENTONCES NO FUNCIONARA file_name porque el nombre estaria encriptado
        $config['file_name']=$this->tabla."_".$id."_".$aleatorio;
        $config['overwrite']=true;
        $config['remove_spaces']=true;//cual espacio en el nombre lo conviere en un guion subrayado

        $this->load->library('upload', $config);


        if ( ! $this->upload->do_upload("imagen")){//En esta linea es que subimos la imagen

            echo  $this->upload->display_errors();
            
            
        }else{

                            $data = $this->upload->data();
                            $file = $data['file_name'];

                           list($ancho, $alto, $tipo, $atributos) = getimagesize($ruta.$file);

                            if($ancho<$ancho_deseado && $alto<$alto_deseado){

                               $this->equi_foto($file, $ruta, $ancho_deseado, $alto_deseado);

                            }//endIF   
                                          
                   
                                          
                             $configThumb['image_library'] = 'gd2';
                             $configThumb['source_image'] = $data['full_path'];
                             //$configThumb['create_thumb'] = TRUE;
                             $configThumb['maintain_ratio'] = TRUE;
                             $configThumb['width'] = $ancho_deseado;
                             $configThumb['height'] = $alto_deseado;

                             $this->load->library('image_lib');
                             $this->image_lib->initialize($configThumb);


                              if ( ! $this->image_lib->resize()){//En esta linea redimensionamos la imagen 

                                 echo $this->image_lib->display_errors();

                              }else{

                                        $this->equi_foto($file, $ruta, $ancho_deseado, $alto_deseado);
                                        
                                        
                                        
                                            $nuevo=explode(".", $file);
                                            $thumb=$nuevo[0]."_thumb.".$nuevo[1];



                                           $configThumb1['image_library'] = 'gd2';
                                           $configThumb1['source_image'] = $data['full_path'];
                                           $configThumb1['new_image'] = $data['file_path'].$thumb;
                                           $configThumb1['maintain_ratio'] = TRUE;
                                           $configThumb1['width'] = $ancho_thumb;
                                           $configThumb1['height'] = $alto_thumb;

                                           $this->image_lib->clear();
                                           $this->load->library('image_lib');
                                           $this->image_lib->initialize($configThumb1);



                                           if ( ! $this->image_lib->resize()){//En esta linea redimensionamos la imagen a 170 x 220

                                               echo $this->image_lib->display_errors();

                                           }else{
                                               
                                               
                                                        $idservicios_imagenes=$this->uri->segment(5);
                                                        if($idservicios_imagenes=="0"){//si es igual a cero es nuevo registro

                                                                //Ya tenemos creado la imagen y el Thumbnails, ahora grabamos

                                                                $strsql="insert into $this->tabla ( imagen, idservicios )values ('$file','$id')";
                                                                $valor=$this->modelo_base->ejecuta($strsql);

                                                        }else{//si $idservicios_imagenes no es cero entonces es una actualizacion


                                                                //ANTES DE GRABAR BORRAMOS EL LAS IMAGENES ANTERIORES
                                                                $strsql="select imagen from $this->tabla where id$this->tabla='$idservicios_imagenes'";

                                                                $fila=$this->modelo_base->c_una_fila($strsql);

                                                                if(   strlen(trim($fila->imagen)) > 0 ){

                                                                        $ruta1="./$this->carpeta_img/".$fila->imagen;
                                                                        $ruta2="./$this->carpeta_img/".$this->be_funciones->nombre_thumbs($fila->imagen);
                                                                                    @unlink($ruta1);
                                                                                    @unlink($ruta2);
                                                                }//endIF

                                                                //ACTUALIZAMOS
                                                                $strsql="update $this->tabla set imagen='$file', idservicios='$id' where 
                                                                        idservicios_imagenes='$idservicios_imagenes'";

                                                                $valor=$this->modelo_base->ejecuta($strsql);

                                                        }//endIF

                                                        if($valor==1){

                                                            $data['recarga_padre']="si";

                                                            $this->load->view("be/v_".$this->tabla."_imagen", $data);


                                                        }//endIF
                                               
                                                 
                                           }//endIF
           
                              }//endIF
                      
                  
            
        }//endIF
        
    }//endFunction


   function elimina_servicios_imagenes(){

       $this->validacion->validacion_login();

          $sw=$this->input->post('sw');//Esto no nos sirve
          $id=$this->input->post('valores');

          
            
            
             //ELIMINAMOS LAS IMAGENES SI LAS HUBIESE
            $strsql="select imagen from $this->tabla where id$this->tabla='$id'";
            $fila=$this->modelo_base->c_una_fila($strsql);

            if(   strlen(trim($fila->imagen)) > 0 ){

                    $ruta1="./$this->carpeta_img/".$fila->imagen;
                    $ruta2="./$this->carpeta_img/".$this->be_funciones->nombre_thumbs($fila->imagen);
                                @unlink($ruta1);
                                @unlink($ruta2);
            }//endIF



           //eliminamos el registro
            $strsql="delete from $this->tabla where id$this->tabla='$id'";
            $this->modelo_base->ejecuta($strsql);

            echo '{"sw":"4", "dato":"ok"}';
            
     
    }//endFunction


}
?>
