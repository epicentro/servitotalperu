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
class lista_pedidos extends CI_Controller {
    //put your code here
    public function  __construct() {
        parent::__construct();

       
        $this->load->model("modelo_base");
        $this->load->library('pagination');
        $this->load->library('image_lib');
        $this->load->library('login/validacion');
        $this->load->library('be/be_funciones');
        $this->load->library('be/be_categorias');
        $this->load->library('be_parametros');
        
         //Me permite generar numeros aleatorios
        $this->load->helper('string');
        
                
        
        //Zona Horaria
        //http://www.cesarcancino.com/configurar-zona-horaria-con-php-n221.html
        date_default_timezone_set("America/Lima");
        
        
       
                
    }

    
    public function abierto(){

         $this->validacion->validacion_login();
         
        
         
         $seccion=$this->uri->segment(4);
         if($seccion=="entrar"){
             
             //idestado=1 abierto
             $strsql="select idpedidos, idcliente, fecha_y_hora, idtipo_pago, idtipo_registro, idmoneda from pedidos where idestado='1' order by idpedidos desc";
             $filas=$this->modelo_base->consulta($strsql);
             $data["filas"]=$filas;
             
             $data['cuerpo']="be/v_lista_pedidos_abiertos";
             $this->load->view("be/includes_be/template_be", $data);
             
             
             
         }//endIF

   }//endFunction
   
   
   public function cerrado(){

         $this->validacion->validacion_login();
         
         
         
         $seccion=$this->uri->segment(4);
         if($seccion=="entrar"){
             
             $data["filas"]="";
             $data["datepicker1"]="";
             $data["datepicker2"]="";
             $data['cuerpo']="be/v_lista_pedidos_cerrado";
             $this->load->view("be/includes_be/template_be", $data);
             
             
         }elseif($seccion=="mostrar"){
             
             
                       

                       $datepicker1=trim($this->input->post("datepicker1"));
                       $datepicker2=trim($this->input->post("datepicker2"));
                       
                       if(strlen($datepicker1)>0 && strlen($datepicker2)>0  ){

                                $datepicker1=$this->be_funciones->formato_fecha($datepicker1);
                                $datepicker2=$this->be_funciones->formato_fecha($datepicker2);

                                 //idestado=2 cerrado 
                                $strsql="select idpedidos, idcliente, fecha_y_hora, idtipo_pago, idtipo_registro, idmoneda from pedidos 
                                          where idestado='2' and fecha BETWEEN '$datepicker1' and '$datepicker2' order by idpedidos desc";

                                 $filas=$this->modelo_base->consulta($strsql);
                                 $data["filas"]=$filas;

                                 $data['datepicker1']=$this->be_funciones->formato_fecha($datepicker1);
                                 $data['datepicker2']=$this->be_funciones->formato_fecha($datepicker2);
                       }else{
                            $data["filas"]="";
                            $data["datepicker1"]="";
                            $data["datepicker2"]="";
                           
                       }//endIF        

                        $data['cuerpo']="be/v_lista_pedidos_cerrado";
                        $this->load->view("be/includes_be/template_be", $data);
        

         }//endIF
         
         
         
         
         
         
         

   }//endFunction
   
   
   
   public function rechazado(){

         $this->validacion->validacion_login();
         
         
         
         $seccion=$this->uri->segment(4);
         if($seccion=="entrar"){
             
             $data["filas"]="";
             $data["datepicker1"]="";
             $data["datepicker2"]="";
             $data['cuerpo']="be/v_lista_pedidos_rechazado";
             $this->load->view("be/includes_be/template_be", $data);
             
             
         }elseif($seccion=="mostrar"){
             
             
                        //idestado=2 cerrado

                       $datepicker1=trim($this->input->post("datepicker1"));
                       $datepicker2=trim($this->input->post("datepicker2"));
                       
                       if(strlen($datepicker1)>0 && strlen($datepicker2)>0  ){

                                $datepicker1=$this->be_funciones->formato_fecha($datepicker1);
                                $datepicker2=$this->be_funciones->formato_fecha($datepicker2);
                                 //idestado=3 rechazado
                                $strsql="select idpedidos, idcliente, fecha_y_hora, idtipo_pago, idtipo_registro, idmoneda from pedidos 
                                          where idestado='3' and fecha BETWEEN '$datepicker1' and '$datepicker2' order by idpedidos desc";

                                 $filas=$this->modelo_base->consulta($strsql);
                                 $data["filas"]=$filas;

                                 $data['datepicker1']=$this->be_funciones->formato_fecha($datepicker1);
                                 $data['datepicker2']=$this->be_funciones->formato_fecha($datepicker2);
                       }else{
                            $data["filas"]="";
                            $data["datepicker1"]="";
                            $data["datepicker2"]="";
                           
                       }//endIF        

                        $data['cuerpo']="be/v_lista_pedidos_rechazado";
                        $this->load->view("be/includes_be/template_be", $data);
        

         }//endIF
         
         
         
         
         
         
         

   }//endFunction
    



    
   

 

}
?>
