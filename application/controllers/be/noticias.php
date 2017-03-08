<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of marcas
 *
 * @author Yasser
 */
class noticias extends CI_Controller {
    //put your code here
    public function  __construct() {
        parent::__construct();


        $this->load->model("modelo_base");
        $this->load->library('pagination');
        $this->load->library('image_lib');
        $this->load->library('login/validacion');
        $this->load->library('be/be_funciones');
        $this->load->library('parametros');        
        //Me permite generar numeros aleatorios
        $this->load->helper('string');
                
    }

    public function listar(){
        $this->validacion->validacion_login();


        $strsql="select idnoticias, titulo, foto, fecha, clave, primera_hoja from noticias ";


        $cantidad=$this->modelo_base->cantidad_filas($strsql);

        
        $config['base_url'] = base_url().'be/noticias/listar/';
        $config['total_rows'] = $cantidad;
        $num=10;
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

            $strsql.=" limit   $offset ,  $num";

      
        $filas=$this->modelo_base->consulta($strsql);

        $data['filas']=$filas;
        

         $data['cuerpo']="be/v_noticias_mnto";
         $this->load->view("be/includes_be/template_be", $data);
        
    }

    public function nuevo(){
        $this->validacion->validacion_login();

       


         $this->load->view("be/v_noticias_add");
    }

    public function grabar(){
        $this->validacion->validacion_login();


       $txt_title=$this->input->post("txt_title");
       $txt_title=htmlspecialchars($txt_title, ENT_QUOTES);
       $txt_title=$this->db->escape($txt_title);

       $txt_keyword=$this->input->post("txt_keyword");
       $txt_keyword=htmlspecialchars($txt_keyword, ENT_QUOTES);
       $txt_keyword=$this->db->escape($txt_keyword);


       $txt_description=$this->input->post("txt_description");
       $txt_description=htmlspecialchars($txt_description, ENT_QUOTES);
       $txt_description=$this->db->escape($txt_description);

       
       $txt_titulo=$this->input->post("txt_titulo");
       $txt_titulo=htmlspecialchars($txt_titulo, ENT_QUOTES);
       $txt_titulo=$this->db->escape($txt_titulo);
       
       $txt_seo=$this->input->post("txt_seo");
       $txt_seo=$this->db->escape($txt_seo);

       $resumen=$this->input->post("resumen");
       $resumen=addslashes($resumen);
       $resumen=$this->be_funciones->filtrar_iframe($resumen);
       
       $ampliacion=$this->input->post("ampliacion");
       $ampliacion=addslashes($ampliacion);
       $ampliacion=$this->be_funciones->filtrar_iframe($ampliacion);
       
       
      $txt_fecha=$this->input->post("txt_fecha");
      $txt_fecha=$this->be_funciones->formato_fecha($txt_fecha);
      
     
      
     
      $cbo_ph=$this->input->post("cbo_ph");
      $cbo_visible=$this->input->post("cbo_visible");
       
      $strsql="insert into noticias (title, keyword, description, titulo, seo,
              resumen, ampliacion,  fecha, primera_hoja, sw)
              values(".$txt_title.",".$txt_keyword.",".$txt_description.",".$txt_titulo.",".$txt_seo.",
                     '".$resumen."','".$ampliacion."','".$txt_fecha."','".$cbo_ph."','".$cbo_visible."')";

     
     
      $valor=$this->modelo_base->ejecuta($strsql);

             if($valor==1){

                  $data['recarga_padre']="si";

                  $this->load->view("be/v_noticias_add", $data);


            }//endIF
       
       
    }//endFunction


    

    public function v_editar(){

       $this->validacion->validacion_login();

       
       $id=$this->uri->segment(4);

     
           $strsql="select title, keyword, description, titulo, seo,
                    resumen, ampliacion,  fecha, primera_hoja, sw 
                    from noticias where idnoticias='$id'";          
           
           $fila=$this->modelo_base->c_una_fila($strsql);

           
           $data['id']=$id;
           $data['title']=$fila->title;
           $data['keyword']=$fila->keyword;
           $data['description']=$fila->description;
           $data['titulo']=$fila->titulo;
           $data['seo']=$fila->seo;
           $data['resumen']=$fila->resumen;
           $data['ampliacion']=$fila->ampliacion;
           $data['fecha']=$this->be_funciones->formato_fecha($fila->fecha);
           $data['ph']=$fila->primera_hoja;
           $data['sw']=$fila->sw;
           
           
            
           $this->load->view("be/v_noticias_editar", $data);
           


   }//endFunction

   public function editar(){

        $this->validacion->validacion_login();

        $id=$this->uri->segment(4);

       $txt_title=$this->input->post("txt_title");
       $txt_title=htmlspecialchars($txt_title, ENT_QUOTES);
       $txt_title=$this->db->escape($txt_title);

       $txt_keyword=$this->input->post("txt_keyword");
       $txt_keyword=htmlspecialchars($txt_keyword, ENT_QUOTES);
       $txt_keyword=$this->db->escape($txt_keyword);


       $txt_description=$this->input->post("txt_description");
       $txt_description=htmlspecialchars($txt_description, ENT_QUOTES);
       $txt_description=$this->db->escape($txt_description);

       
       $txt_titulo=$this->input->post("txt_titulo");
       $txt_titulo=htmlspecialchars($txt_titulo, ENT_QUOTES);
       $txt_titulo=$this->db->escape($txt_titulo);
       
       $txt_seo=$this->input->post("txt_seo");
       $txt_seo=$this->db->escape($txt_seo);

              
       $resumen=$this->input->post("resumen");
       $resumen=addslashes($resumen);
       $resumen=$this->be_funciones->filtrar_iframe($resumen);
       
       $ampliacion=$this->input->post("ampliacion");
       $ampliacion=addslashes($ampliacion);
       $ampliacion=$this->be_funciones->filtrar_iframe($ampliacion);
       
    
       
      $txt_fecha=$this->input->post("txt_fecha");
      $txt_fecha=$this->be_funciones->formato_fecha($txt_fecha);

      $cbo_ph=$this->input->post("cbo_ph");
      $cbo_visible=$this->input->post("cbo_visible");
         
     $strsql="update noticias set title=".$txt_title.", keyword=".$txt_keyword.", description=".$txt_description.", 
              titulo=".$txt_titulo.", seo=".$txt_seo.", resumen='$resumen', 
              ampliacion='$ampliacion',  fecha='$txt_fecha', primera_hoja='$cbo_ph', sw='$cbo_visible' where idnoticias='$id'";

 


         $valor=$this->modelo_base->ejecuta($strsql);

             if($valor==1){

                  $data['recarga_padre']="si";

                  $this->load->view("be/v_noticias_editar", $data);


            }//endIF
 
   }//endFunction

   


    public function v_foto(){

       $this->validacion->validacion_login();
       $id=$this->uri->segment(4);

       $data["id"]=$id;

       $this->load->view("be/v_noticias_foto.php", $data);

   }



   public function foto(){

      
      $this->validacion->validacion_login();

       $id=$this->uri->segment(4);
       $aleatorio=random_string('alnum', 5);   

        $config['upload_path'] = './img_noticias/';
        $config['allowed_types'] = 'doc|docx|xls|xlsx|pdf|txt|gif|jpg|png';
        $config['max_size'] = '20000';
        $config['max_width']  = '300';
        $config['max_height']  = '300';
        //$config['encrypt_name'] = TRUE;  //SI NO LO DESCOMENTAMOS ENTONCES NO FUNCIONARA file_name porque el nombre estaria encriptado
        $config['file_name']=$id."_".$aleatorio;
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
            $configThumb['create_thumb'] = TRUE;
            $configThumb['maintain_ratio'] = TRUE;
            $configThumb['width'] = 100;
            $configThumb['height'] = 100;
          
             $this->load->library('image_lib');
             $this->image_lib->initialize($configThumb);


             if ( ! $this->image_lib->resize()){//En esta linea es que creamos en Thumbnails

                echo $this->image_lib->display_errors();

             }else{

              //Ya tenemos creado la imagen y el Thumbnails, ahora grabamos
                 $strsql="update noticias set foto='$file' where idnoticias='$id'";
                 $valor=$this->modelo_base->ejecuta($strsql);

                        if($valor==1){

                            $data['recarga_padre']="si";

                            $this->load->view("be/v_noticias_foto", $data);


                        }//endIF


             }//endIF

            
        }//endIF

       
        
    }//endFunction
    
    
   



   
    
    
   



  
    
    
    
   



   
    
    


     function elimina_producto(){

          $this->validacion->validacion_login();

          $sw=$this->input->post('sw');//Esto no nos sirve
          $id=$this->input->post('valores');


          $strsql="select especificacion, foto from producto where idproducto='$id'";
          $row=$this->modelo_base->c_una_fila($strsql);

         //Eliminamos la especificacion
          if(strlen(trim($row->especificacion))>0){

              $ruta="./especificaciones/".$row->especificacion;
              @unlink($ruta);
          }//endIF

          //Eliminamos la foto y el foto pequeña
          if(strlen(trim($row->foto))>0){

              $ruta1="./img_producto/".$row->foto;
              $ruta2="./img_producto/".$this->be_funciones->nombre_thumbs($row->foto);
              @unlink($ruta1);
              @unlink($ruta2);
          }//endIF

          
           //eliminamos el registro
            $strsql="delete from producto where idproducto='$id'";
            $this->modelo_base->ejecuta($strsql);

             echo "{'sw':'1', 'dato':'ok'}";
           

    }//endFunction


}
?>
