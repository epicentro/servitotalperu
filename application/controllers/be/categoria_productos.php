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
class categoria_productos extends CI_Controller {
    //put your code here
     
    public $tabla="categoria_productos";
    public $carpeta_img="img_categorias";
    public $estructura_editar;

    public $imagen_ancho=500;
    public $imagen_alto=350;
    public $imagen_thumb_ancho=100;
    public $imagen_thumb_alto=75;     
    
    public $estructura=array( 
        
        // SI EL TIPO DE CAMPO ES VARCHAR, INTEGER, DECIMAL LO PONEMOS COMO VARCHAR PARA CREARLE UN TEXTBOX
        // SI EL TIPO DE CAMPO ES TEXT  LE CREAMOS UN TEXTAREA CON FCKEDITOR
        array('nombre_campo'=>'idcategoria_productos', 'tipo'=>'varchar', 'show'=>'no' ,'clave'=>'primaria', 'rotulo'=>'', 'valor'=>''),
        array('nombre_campo'=>'title', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'Title', 'valor'=>''),
        array('nombre_campo'=>'keyword', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'Keyword', 'valor'=>''),
        array('nombre_campo'=>'description', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'Description', 'valor'=>''),
        array('nombre_campo'=>'nombre', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'Nombre', 'valor'=>''),
        array('nombre_campo'=>'seo', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'SEO', 'valor'=>''),
        array('nombre_campo'=>'titulo', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'Título', 'valor'=>''),
        array('nombre_campo'=>'padre_id', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'Categoria Superior', 'valor'=>''),
        array('nombre_campo'=>'sumilla', 'tipo'=>'text', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'Sumilla', 'valor'=>''),
        array('nombre_campo'=>'orden', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'orden', 'valor'=>''),
        array('nombre_campo'=>'idtipo_categoria', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'foranea', 'rotulo'=>'Tipo', 'valor'=>''),
        array('nombre_campo'=>'imagen', 'tipo'=>'varchar', 'show'=>'no', 'clave'=>'no', 'rotulo'=>'Imagen', 'valor'=>''),
       // array('nombre_campo'=>'idprimera_hoja', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'foranea', 'rotulo'=>'Primera Hoja', 'valor'=>''),
        array('nombre_campo'=>'idsw', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'foranea', 'rotulo'=>'Visible', 'valor'=>''),
        array('nombre_campo'=>'nivel', 'tipo'=>'varchar', 'show'=>'no', 'clave'=>'no', 'rotulo'=>'', 'valor'=>'')
        
        );
    
    
     
    
    public function  __construct() {
        parent::__construct();


        $this->load->model("modelo_base");
        $this->load->library('pagination');
        $this->load->library('image_lib');
        $this->load->library('login/validacion');
        $this->load->library('be/be_funciones');
        $this->load->library('be/be_categorias');
        
        

    }

    public function listar(){
             $this->validacion->validacion_login();
             
            
             $data['filas']=$this->be_categorias->html_mnto("$this->tabla", "id$this->tabla", "$this->carpeta_img");
            
            $data['cuerpo']="be/v_".$this->tabla."_mnto";
            $this->load->view("be/includes_be/template_be", $data);
            
        
    }//endFunction
    
    
    public function nuevo(){

        $this->validacion->validacion_login();

        //Aquí traemos las categorias de la librería
         //que prediseñadas en html desde la libreria "be/be_categoria";
        $data['combo']=$this->be_categorias->html_combo('', "$this->tabla", "id$this->tabla", '');
        
        $this->load->view("be/v_".$this->tabla."_add", $data);


    }//endFunction

    public function grabar(){

        $this->validacion->validacion_login();
        
        
         //PONEMOS CADA FILA DEL ARRAY EN UNA VARIABLE $fila 
              
              $cadena_campos="";
              $cadena_valores="";
        
              foreach($this->estructura as $filas){
                   
                     
                     $campo=$filas["nombre_campo"];
                     
                     
                      if($filas["show"]=="si"){
                         
                        $cadena_campos.=$campo.",";
                            
                            if($filas["tipo"]=="varchar"){
                                
                                 
                                 $campo=$this->input->post($campo);
                                 $cadena_valores.=$this->db->escape($campo).",";
                                 
                            }elseif($filas["tipo"]=="text"){
                                
                                 $campo=$this->input->post($campo);
                                 
                                 $campo=addslashes($campo);
                                 $campo=$this->be_funciones->filtrar_iframe($campo);
                                 $cadena_valores.="'".$campo."',";
                                
                            }//endIF
                            
                      }//endIF  
                    
                            
              }//endFOR
              
              
              
                                              
                    
                     
              
              //HACEMOS UN ARTIFICIO Y LE COLOCAMOS UNA COMA MAS AL FINAL PARA QUE TENGA DE 2 COMAS
              //PARA AGARRARNOS DE ESTAS 2 COMAS  Y QUITARLE LA ULTIMA COMA
              $cadena_campos.=",";
              $parte=explode(",,", $cadena_campos);
              $cadena_campos=$parte[0];
              
              //HACEMOS UN ARTIFICIO Y LE COLOCAMOS UNA COMA MAS AL FINAL PARA QUE TENGA DE 2 COMAS
              //PARA AGARRARNOS DE ESTAS 2 COMAS  Y QUITARLE LA ULTIMA COMA
              $cadena_valores.=",";
              $parte=explode(",,", $cadena_valores);
              $cadena_valores=$parte[0];
              
              //echo $cadena_campos."<br/>";
              //echo $cadena_valores."<br/>";
              
         
         $strsql="insert into $this->tabla ($cadena_campos)
                values ($cadena_valores)";
         
         
         $valor=$this->modelo_base->ejecuta($strsql);
          
             if($valor==1){
                   
                  $data['recarga_padre']="si";
                  
                  $this->load->view("be/v_".$this->tabla."_add", $data);


            }//endIF
         

        
    }//endFunction


    
public function v_editar(){

       $this->validacion->validacion_login();
       
       $id=$this->uri->segment(4);
       $data['id']=$id;
       
             //SI LA TABLA TIENE EL CAMPO PADRE_ID LO ALMACENAMOS AQUI
             $padre_id="";
             
             
              //PONEMOS CADA FILA DEL ARRAY EN UNA VARIABLE $fila 
              foreach($this->estructura as $filas){
                   
                   //EXTRAEMOS EL VALOR DE CADA CAMPO
                  $strsql="select ".$filas["nombre_campo"]." from $this->tabla where id$this->tabla='$id'";
                  $campo=$this->modelo_base->c_una_fila($strsql);
                  
                  //AGREGAMOS UN NUEVO ELEMENTO AL ARREGLO $fila que este está anidado 
                  //dentro del arreglo global $estructura;  
                  $filas["valor"]=$campo->$filas["nombre_campo"];
                  $this->estructura_editar[]=$filas;
                  
                  if($filas["nombre_campo"]=="padre_id"){
                      $padre_id=$campo->$filas["nombre_campo"];
                      
                  }//endIF
                     
                     
                   
       
              }//endFor
              
            
              // SI HAY PADRE ID ENTONCES LANZAMOS EL COMBO
              if($padre_id!=""){
               
                $data['combo']=$this->be_categorias->html_combo($padre_id, "$this->tabla", "id$this->tabla", "");
             
              }//endIF
         
           $this->load->view("be/v_".$this->tabla."_editar", $data);
        
       
   }//endFunction




public function editar(){

         $this->validacion->validacion_login();

         $id=$this->uri->segment(4);

        //PONEMOS CADA FILA DEL ARRAY EN UNA VARIABLE $fila 
              
              $cadena_campos="";
        
              foreach($this->estructura as $filas){
                   
                      
                     $campo=$filas["nombre_campo"];
                     
                     
                      if($filas["show"]=="si"){
                         
                        
                            
                            if($filas["tipo"]=="varchar"){
                                
                                 
                                 $valor=$this->input->post($campo);
                                 $valor=$this->db->escape($valor);
                                 
                            }elseif($filas["tipo"]=="text"){
                                
                                 $valor=$this->input->post($campo);
                                 
                                 $valor=addslashes($valor);
                                 $valor=$this->be_funciones->filtrar_iframe($valor);
                                 $valor="'".$valor."'";
                                
                                
                            }//endIF
                            
                            $cadena_campos.=$campo."=".$valor.",";
                            
                      }//endIF  
                    
                            
              }//endFOR
              
              

              
              //HACEMOS UN ARTIFICIO Y LE COLOCAMOS UNA COMA MAS AL FINAL PARA QUE TENGA DE 2 COMAS
              //PARA AGARRARNOS DE ESTAS 2 COMAS  Y QUITARLE LA ULTIMA COMA
              $cadena_campos.=",";
              $parte=explode(",,", $cadena_campos);
              $cadena_campos=$parte[0];
              
              
              
             
              
              
         
         $strsql="update $this->tabla set $cadena_campos where id$this->tabla='$id'";
         
        
         
        
         $valor=$this->modelo_base->ejecuta($strsql);
          

             if($valor==1){

                  $data['recarga_padre']="si";

                  $this->load->view("be/v_".$this->tabla."_editar", $data);


            }//endIF
          
        
   }//endFunction

   
   
   
   
    public function v_imagen(){

       $this->validacion->validacion_login();
       $id=$this->uri->segment(4);
       $data["id"]=$id;
       
       //AVERIGUAMOS SI TIENE IMAGEN
       $strsql="select imagen from $this->tabla where id$this->tabla='$id'";
       $data["foto"]=$this->modelo_base->c_una_fila($strsql);
       

       $this->load->view("be/v_".$this->tabla."_imagen.php", $data);

   }



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
                                               
                                               
                                                //ANTES DE GRABAR BORRAMOS EL LAS IMAGENES ANTERIORES
                                                $strsql="select imagen from $this->tabla where id$this->tabla='$id'";
                                                $fila=$this->modelo_base->c_una_fila($strsql);

                                                if(   strlen(trim($fila->imagen)) > 0 ){

                                                      $ruta1="./$this->carpeta_img/".$fila->imagen;
                                                      $ruta2="./$this->carpeta_img/".$this->be_funciones->nombre_thumbs($fila->imagen);
                                                                  @unlink($ruta1);
                                                                  @unlink($ruta2);
                                                 }//endIF


                                                //Ya tenemos creado la imagen y el Thumbnails, ahora grabamos
                                                $strsql="update $this->tabla set imagen='$file' where id$this->tabla='$id'";
                                                $valor=$this->modelo_base->ejecuta($strsql);

                                                if($valor==1){

                                                    $data['recarga_padre']="si";

                                                    $this->load->view("be/v_".$this->tabla."_imagen", $data);


                                                }//endIF 
                                               
                                                 
                                           }//endIF
           
                              }//endIF
                      
                  
            
        }//endIF
       
        
    }//endFunction


   function elimina_categoria(){

       $this->validacion->validacion_login();

          $sw=$this->input->post('sw');//Esto no nos sirve
          $id=$this->input->post('valores');

          
           //Averiguamos si la categoria tiene productos dependiente
          $strsql="select count(*) as cantidad from productos where id$this->tabla='$id'";
          $row=$this->modelo_base->c_una_fila($strsql);
          if($row->cantidad > 0 ){

            echo '{"sw":"4", "dato":"producto_dependiente"}';
             exit();

          }//endIF
          
          

          
          //Averiguamos si la categoria tiene categorias dependientes
          $strsql="select count(*) as cantidad from $this->tabla where padre_id='$id'";
          $row=$this->modelo_base->c_una_fila($strsql);
          if($row->cantidad > 0 ){

             echo '{"sw":"4", "dato":"categoria_dependiente"}';
             exit();

          }//endIF
         
          
          
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
}
?>
