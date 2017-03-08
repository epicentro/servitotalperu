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
class banners extends CI_Controller {
    //put your code here
     
    public $tabla="banners";
    public $idtabla="idbanners";
    public $carpeta_img="img_banners";
    
    public $tabla_padre="categoria_banners";
    public $idtabla_padre="idcategoria_banners";
    
    public $estructura_editar;
    
    public $estructura=array( 
        
        // SI EL TIPO DE CAMPO ES VARCHAR, INTEGER, DECIMAL LO PONEMOS COMO VARCHAR PARA CREARLE UN TEXTBOX
        // SI EL TIPO DE CAMPO ES TEXT  LE CREAMOS UN TEXTAREA CON FCKEDITOR
        
        //idproductos, idcategoria_productos, title, keyword, description, nombre, seo, codigo, sumilla, descripcion, ficha_tecnica, idsw
        array('nombre_campo'=>'idbanners', 'tipo'=>'varchar', 'show'=>'no' ,'clave'=>'primaria', 'rotulo'=>'', 'multinivel'=>'no', 'valor'=>''),
        array('nombre_campo'=>'idcategoria_banners', 'tipo'=>'varchar', 'show'=>'si' ,'clave'=>'foranea', 'rotulo'=>'Categoria', 'multinivel'=>'si', 'valor'=>''),
        array('nombre_campo'=>'nombre', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'Nombre', 'multinivel'=>'no', 'valor'=>''),
        array('nombre_campo'=>'alt', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'ALT', 'multinivel'=>'no', 'valor'=>''),
        array('nombre_campo'=>'link', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'Link', 'multinivel'=>'no', 'valor'=>''),
        array('nombre_campo'=>'sumilla', 'tipo'=>'text', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'Sumilla', 'multinivel'=>'no', 'valor'=>''),
        array('nombre_campo'=>'imagen', 'tipo'=>'text', 'show'=>'no', 'clave'=>'no', 'rotulo'=>'Imagen', 'multinivel'=>'no', 'valor'=>''),
        array('nombre_campo'=>'orden', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'Orden', 'multinivel'=>'no', 'valor'=>''),
        array('nombre_campo'=>'idsw', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'foranea', 'rotulo'=>'Visible', 'multinivel'=>'no', 'valor'=>''),
        
        
        );
    
    
     
    
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
             
            //ESTE TIENE QUE ESTAR EN TODOS LOS MANTENIMIENTOS, 
             //SE LO PASAMOS A LA GRILLA DEL MANETENIMIENTO
             //$this->idtabla ES UNA VARIABLE GLOBAL DECLARADO LINEAS ARRIBA
             $data["idtabla"]=$this->idtabla;
             
             $cadena_campos="";
             foreach($this->estructura as $filas){
                   
                     
                     $cadena_campos.=$filas["nombre_campo"].",";
                     
             }//endFor
              //HACEMOS UN ARTIFICIO Y LE COLOCAMOS UNA COMA MAS AL FINAL PARA QUE TENGA DE 2 COMAS
              //PARA AGARRARNOS DE ESTAS 2 COMAS  Y QUITARLE LA ULTIMA COMA
              $cadena_campos.=",";
              $parte=explode(",,", $cadena_campos);
              $cadena_campos=$parte[0];
             
              //BUSCAR, PARA EFECTUAR UNA BUSQUEDA NOS VAMOS A LA VALER DE UNA 
              //VARIABLE DE SESSION QUE SE CREAR DESDE LA VENTANA POPUP DE V_BUSCAR
              $buscar1="";
              if($this->session->userdata($this->tabla_padre."buscar")){
                 $buscar1=$this->session->userdata($this->tabla_padre."buscar"); 
                 $buscar1=" where nombre like '%$buscar1%' ";
              }//endIF
              
              //TAMBIÉN PODEMOS BUSCAR POR CATEGORIA
              $buscar2="";
              if($this->session->userdata($this->tabla_padre."categoria")){
                 $buscar2=$this->session->userdata($this->tabla_padre."categoria"); 
                 $buscar2=" where $this->idtabla_padre='$buscar2'  ";
                 
                 //averiguamos el nombre de la categoria

                  $strsql="select nombre from $this->tabla_padre where $this->idtabla_padre='".$this->session->userdata($this->tabla_padre."categoria")."'";
                  $fila=$this->modelo_base->c_una_fila($strsql);
                  $data["nombre_categoria_filtro"]=$fila->nombre;
              }//endIF
            
            //JAMAS BUSCAREMOS POR $buscar1 Y $buscar1  ambos son excluyentes
            // Por lo tanto uno de ellos siempre estara vacia  
             $strsql="select $cadena_campos  from $this->tabla $buscar1 $buscar2 order by orden ";
          
            
         $cantidad=$this->modelo_base->cantidad_filas($strsql);

        
        $config['base_url'] = base_url().'be/'.$this->tabla.'/listar/';
        $config['total_rows'] = $cantidad;
        $num=$this->be_parametros->valor("be_elementos_x_pagina");
        $config['per_page'] = $num;
        $config['uri_segment'] = 4;


        /*ESTE full_tag_open ME PERMITE PONER UNA ETIQUETA CONTENEDORA PARA LUEGO AGARRARME DE ELLA
          Y PONER ESTILOS A LOS ENLACES QUE ESTAN DENTRO DE ELLA  */
        
        $config['full_tag_open'] = "<p class='p_paginacion'>";
        $config['full_tag_close'] = "</p>";

        //ESTILO PARA LA PAGINACION SELECCIONADA.
        $config['cur_tag_open'] = "&nbsp;<span style='color:#fff; background-color:#069; border:0; ' >";
        $config['cur_tag_close'] = "</span>";

      

        $this->pagination->initialize($config);

        $offset=$this->uri->segment(4);
        if ($offset == '') $offset=0;
            
             //Si no existe busqueda entonces aplicamos la paginacion
             //porque en una busqueda puede mostrar vacio apesar que existe el producto
             // por ejemplo que pasa si estamos en la paginacion 200 
             // y el productos esta en paginacion 10 simplemente no los mostrará
             if(!$this->session->userdata($this->tabla_padre."buscar") && !$this->session->userdata($this->tabla_padre."categoria")){
                $strsql.=" limit   $offset ,  $num";
             }//endIF
             
      
       
             
         $filas=$this->modelo_base->consulta($strsql);
        
        

        $data['filas']=$filas;

            
            
            
             
             
            
            $data['cuerpo']="be/v_".$this->tabla."_mnto";
            $this->load->view("be/includes_be/template_be", $data);
            
        
    }//endFunction
    
    
    
    public function v_buscar(){

        $this->validacion->validacion_login();
        $data['combo']=$this->be_categorias->html_combo('', $this->tabla_padre, $this->idtabla_padre,'');
        $this->load->view("be/v_".$this->tabla."_buscar", $data);


    }//endFunction
    
    public function buscar(){

                  $buscar=$this->input->post("buscar");
                  if($buscar!=""){
                      //CREAMOS LA VARIABLE SESSION USANDO EL NOMBRE DE LA TABLA
                      //ESTA MANERA ES UNICA PARA CADA MNTO Y NO FILTRARA PARA CUANDO ENTREMOS 
                      //A OTROS MANTENIMIENTOS
                      $this->session->set_userdata($this->tabla_padre."buscar", $buscar);
                      
                        //Me aseguro y elimino el otro filtro por siaca
                      $this->session->unset_userdata($this->tabla_padre."categoria", $buscar);
                  }//end
                  
                  $categoria=$this->input->post("categoria");
                  if($categoria!="0"){
                      $this->session->set_userdata($this->tabla_padre."categoria", $categoria);
                      
                      //Me aseguro y elimino el otro filtro por siaca
                      $this->session->unset_userdata($this->tabla_padre."buscar", $buscar);
                  }//end
                  

                  $data['recarga_padre']="si";

                  $this->load->view("be/v_".$this->tabla."_buscar", $data);


         

    }//endFunction
    
    public function buscar_elimina_filtro(){

                  
                  //Eliminamos el filtro    
                  $this->session->unset_userdata($this->tabla_padre."buscar");
                  
                  //Eliminamos el filtro    
                  $this->session->unset_userdata($this->tabla_padre."categoria");
                  
                  echo "Eliminando Filtro...";
                      
                  $data['recarga_padre']="si";

                  $this->load->view("be/v_".$this->tabla."_buscar", $data);


         

    }//endFunction
    
    
    
    public function nuevo(){

        $this->validacion->validacion_login();

        //Aquí traemos las categorias de la librería
        //que prediseñadas en html desde la libreria "be/be_funciones";
        
        $data['combo']=$this->be_categorias->html_combo('', $this->tabla_padre, $this->idtabla_padre, '');
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
       
             //SI LA TABLA TIENE UN CAMPO MULTINIVEL LO ALMACENAMOS
             $idcategoria="";
             
             
              //PONEMOS CADA FILA DEL ARRAY EN UNA VARIABLE $fila 
              foreach($this->estructura as $filas){
                   
                   //EXTRAEMOS EL VALOR DE CADA CAMPO
                  $strsql="select ".$filas["nombre_campo"]." from $this->tabla where id$this->tabla='$id'";
                  $campo=$this->modelo_base->c_una_fila($strsql);
                  
                  //AGREGAMOS UN NUEVO ELEMENTO AL ARREGLO $fila que este está anidado 
                  //dentro del arreglo global $estructura;  
                  $filas["valor"]=$campo->$filas["nombre_campo"];
                  $this->estructura_editar[]=$filas;
                  
                  //Capturamos el id de la categoria padre para luego lanzar el combo lineas más abajo
                  if($filas["nombre_campo"]==$this->idtabla_padre){
                      $idcategoria=$campo->$filas["nombre_campo"];
                      
                  }//endIF
                     
                     
                   
       
              }//endFor
              
            
              // SI HAY PADRE ID ENTONCES LANZAMOS EL COMBO
              if($idcategoria!=""){
               
                $data['combo']=$this->be_categorias->html_combo($idcategoria, $this->tabla_padre, $this->idtabla_padre,'');
             
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

       $id=$this->uri->segment(4);
       $aleatorio=random_string('alnum', 5);   

        $config['upload_path'] = './'.$this->carpeta_img.'/';
        $config['allowed_types'] = 'doc|docx|xls|xlsx|pdf|txt|gif|jpg|png';
        //$config['allowed_types'] = '*';
        $config['max_size'] = '20000';
        $config['max_width']  = '1920';
        $config['max_height']  = '700';
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

           

            $configThumb['image_library'] = 'gd2';
            $configThumb['source_image'] = $data['full_path'];
            //$configThumb['create_thumb'] = TRUE;
            $configThumb['maintain_ratio'] = TRUE;
            $configThumb['width'] = '1920';
            $configThumb['height'] = '700';
          
            $this->load->library('image_lib');
            $this->image_lib->initialize($configThumb);
            
          
             if ( ! $this->image_lib->resize()){//En esta linea redimensionamos la imagen 

                echo $this->image_lib->display_errors();

             }else{

                                 $nuevo=explode(".", $file);
                                 $thumb=$nuevo[0]."_thumb.".$nuevo[1];
           
            
           
                                $configThumb1['image_library'] = 'gd2';
                                $configThumb1['source_image'] = $data['full_path'];
                                $configThumb1['new_image'] = $data['file_path'].$thumb;
                                $configThumb1['maintain_ratio'] = TRUE;
                                $configThumb1['width'] = 256;
                                $configThumb1['height'] = 90;

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


   function elimina_banners(){

       $this->validacion->validacion_login();

          $sw=$this->input->post('sw');//Esto no nos sirve
          $id=$this->input->post('valores');

          /*
           //Averiguamos si la categoria tiene productos dependiente
          $strsql="select count(*) as cantidad from producto where idcategoria='$id'";
          $row=$this->modelo_base->c_una_fila($strsql);
          if($row->cantidad > 0 ){

            echo '{"sw":"4", "dato":"producto_dependiente"}';
             exit();

          }//endIF
           * 
           */

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
