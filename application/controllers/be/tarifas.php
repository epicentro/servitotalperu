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
class tarifas extends CI_Controller {
    //put your code here
     
    public $tabla="tarifas";
    public $idtabla="idtarifas";
    public $tabla_padre="pais";
    public $idtabla_padre="idpais";
    public $carpeta_img="img_tarifas";
    public $estructura_editar;
    
    public $estructura=array( 
        
        // SI EL TIPO DE CAMPO ES VARCHAR, INTEGER, DECIMAL LO PONEMOS COMO VARCHAR PARA CREARLE UN TEXTBOX
        // SI EL TIPO DE CAMPO ES TEXT  LE CREAMOS UN TEXTAREA CON FCKEDITOR
        array('nombre_campo'=>'idtarifas', 'tipo'=>'varchar', 'show'=>'no' ,'clave'=>'primaria', 'rotulo'=>'', 'multinivel'=>'no', 'valor'=>''),
        array('nombre_campo'=>'rango_inicial', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'Rango Inicial (gr)', 'multinivel'=>'no', 'valor'=>''),
        array('nombre_campo'=>'rango_final', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'Rango Final (gr)', 'multinivel'=>'no', 'valor'=>''),
        array('nombre_campo'=>'precio_economico', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'Precio Económico (S/.)', 'multinivel'=>'no', 'valor'=>''),
        array('nombre_campo'=>'precio_urgente', 'tipo'=>'varchar', 'show'=>'si', 'clave'=>'no', 'rotulo'=>'Precio Urgente (S/.)', 'multinivel'=>'no', 'valor'=>''),
        
        
        
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
             //SE LO PASAMOS A LA GRILLA DEL MANTENIMIENTO
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
              
             
             
            //Capturamos el id del producto al cual se le está agregando los comentarios
            //para luego pasarselo por por la url de la paginación  
            $id=$this->uri->segment(4);
            $data["id"]=$id;
              
              
             
            //AQUI EXTRAEMOS LA DATA DE LA TABLA
            $strsql="select $cadena_campos  from 
                     $this->tabla where $this->idtabla_padre=".$id." order by id$this->tabla ";
            
           
            
            $cantidad=$this->modelo_base->cantidad_filas($strsql);

        
            $config['base_url'] = base_url().'be/'.$this->tabla.'/listar/'.$id.'/';
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
    
    
    
    
    public function nuevo(){

        $this->validacion->validacion_login();
        
         $data["id"]=$this->uri->segment(4);
         
        $this->load->view("be/v_".$this->tabla."_add", $data);


    }//endFunction

    public function grabar(){

        $this->validacion->validacion_login();
        $idproductos=$this->uri->segment(4);
        
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
                                
                                if(substr($filas["nombre_campo"], 0, 5)=="fecha"){
                                    
                                    $campo=$this->be_funciones->formato_fecha($campo);    
                                    
                                }//endIF
                                
                                
                                 
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
              
         
         $strsql="insert into $this->tabla ($cadena_campos".",".$this->idtabla_padre.")
                values ($cadena_valores".",".$idproductos.")";
         
         
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
                                 
                                 if(substr($filas["nombre_campo"], 0, 5)=="fecha"){
                                    
                                    $valor=$this->be_funciones->formato_fecha($valor);    
                                    
                                 }//endIF
                                 
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
        $config['max_width']  = '280';
        $config['max_height']  = '210';
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
            $configThumb['width'] = 280;
            $configThumb['height'] = 210;
          
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
                                $configThumb1['width'] = 200;
                                $configThumb1['height'] = 150;

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


   function elimina_tarifas(){

       $this->validacion->validacion_login();

          $sw=$this->input->post('sw');//Esto no nos sirve
          $id=$this->input->post('valores');

         /*

          //Averiguamos si la categoria tiene categorias dependientes
          $strsql="select count(*) as cantidad from $this->tabla where padre_id='$id'";
          $row=$this->modelo_base->c_una_fila($strsql);
          if($row->cantidad > 0 ){

             echo '{"sw":"4", "dato":"categoria_dependiente"}';
             exit();

          }//endIF
         */
          

          //ELIMINAMOS LAS IMAGENES SI LAS HUBIESE
          /*
            $strsql="select imagen from $this->tabla where id$this->tabla='$id'";
            $fila=$this->modelo_base->c_una_fila($strsql);

            if(   strlen(trim($fila->imagen)) > 0 ){

                    $ruta1="./$this->carpeta_img/".$fila->imagen;
                    $ruta2="./$this->carpeta_img/".$this->be_funciones->nombre_thumbs($fila->imagen);
                                @unlink($ruta1);
                                @unlink($ruta2);
            }//endIF
           */
           

           //eliminamos el registro
            $strsql="delete from $this->tabla where id$this->tabla='$id'";
            $this->modelo_base->ejecuta($strsql);

            echo '{"sw":"4", "dato":"ok"}';
     
    }//endFunction
    
    
    


}
?>
