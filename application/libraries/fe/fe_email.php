<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of validacion
 *
 * @author Yasser
 */
class fe_email {

    public $CI;
    public function  __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model("modelo_base");
        
        $this->CI->load->library('email');
        $this->CI->load->library('be_parametros');
        $this->CI->load->library('be/be_funciones');

    }

   
    public function email_regitro($email){
        
        
        //datos del cliente
        $strsql="select idcliente, nombres, apellidos, 
                 email, pass from cliente where email='$email'";
        $fila=$this->CI->modelo_base->c_una_fila($strsql);
        
           
        
        
         
         if($fila!="0"){
             
             //dirección de envio, se asume que cuando uno se registra solo hay una direccion de envio
            $strsql="select idpais, direccion, codigo_postal, poblacion, provincia, telefono, celular from direcciones where idcliente='$fila->idcliente' limit 1";
            $dir=$this->CI->modelo_base->c_una_fila($strsql);    
             
             
                            $strhtml="<table  width='500'>";
                            $strhtml.="<tr>";
                            $strhtml.="<td colspan='2' style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; font-weight:bold;'>Datos Personales</td>";
                            $strhtml.="</tr>";

                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; width:150px;' >Nombre</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->nombres;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";

                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Apellidos</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->apellidos;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            
                            
                            
                            
                            /*
                            
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Población</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->poblacion;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            */
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Dirección</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$dir->direccion;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Código Postal</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$dir->codigo_postal;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Población</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$dir->poblacion;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Provincia</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$dir->provincia;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Teléfono</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$dir->telefono;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Celular</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>&nbsp;";
                            $strhtml.=$dir->celular;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >País</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$this->CI->be_funciones->nombre_pais($dir->idpais);
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td colspan='2' style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; font-weight:bold;'>Datos de Acceso</td>";
                            $strhtml.="</tr>";
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Email</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->email;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Contraseña</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->pass;
                            $strhtml.="</td>";
                            
                            
                            
                            $strhtml.="</table>";
                            
                           //////////////////////////////
                           //MANDAMOS EL EMAIL
                           /////////////////////////////

                           $strsql="SELECT de, asunto, inicio, final from emails where nombre='registro_cliente'";


                           $fila=$this->CI->modelo_base->c_una_fila($strsql);
                           $de=$fila->de; 
                           $asunto=$fila->asunto; 
                           $parte1=$fila->inicio;  
                           $parte2=$fila->final; 


                           $total_html=$parte1;
                           $total_html.="<br/>";
                           $total_html.=$strhtml;
                           $total_html.="<br/>";
                           $total_html.=$parte2;


                           $config['mailtype'] = 'html';
                           $this->CI->email->initialize($config);

                           $this->CI->email->from($de);
                           $this->CI->email->to($email); 
                           //$this->email->cc($copia); 
                          // $this->email->bcc('ellos@su-ejemplo.com'); 

                           $this->CI->email->subject($asunto);

                           $this->CI->email->message($total_html); 


                           @$this->CI->email->send();

                           //return $total_html;
                           return  "ok";
             
             
         }else{
             
             return  "no";
         }//endIF       
        
        
    }//EndFunction
    
    
    public function email_recuperar_clave($email){
       
       
         ///////////////////////
         //RECUPERAR EMAIL
         //////////////////////
         
         $strsql="select pass from cliente where email='$email'";
         $fila=$this->CI->modelo_base->c_una_fila($strsql);
         
         if($fila!="0"){
         
                            $pass=$fila->pass; 

                            $strhtml="<table  width='500'>";
                            $strhtml.="<tr>";
                            $strhtml.="<td colspan='2' style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; font-weight:bold;'>Datos de Acceso</td>";
                            $strhtml.="</tr>";

                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; width:150px;' >Email</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$email;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";

                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Contraseña</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$pass;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            $strhtml.="</table>";





                           //////////////////////////////
                           //MANDAMOS EL EMAIL
                           /////////////////////////////

                           $strsql="SELECT de, asunto, inicio, final from emails where nombre='recuperar_clave'";
                           
                           

                           $fila=$this->CI->modelo_base->c_una_fila($strsql);
                           $de=$fila->de; 
                           $asunto=$fila->asunto; 
                           $parte1=$fila->inicio;  
                           $parte2=$fila->final; 


                           $total_html=$parte1;
                           $total_html.="<br/>";
                           $total_html.=$strhtml;
                           $total_html.="<br/>";
                           $total_html.=$parte2;


                           $config['mailtype'] = 'html';
                           $this->CI->email->initialize($config);

                           $this->CI->email->from($de);
                           $this->CI->email->to($email); 
                           //$this->email->cc($copia); 
                          // $this->email->bcc('ellos@su-ejemplo.com'); 

                           $this->CI->email->subject($asunto);

                           $this->CI->email->message($total_html); 


                           $this->CI->email->send();

                           return $total_html;
                          // return  "ok";
         }else{
             
             return  "no";
         }//endIF                
         
         
       
   }//endFunction   
   
   
    public function email_cambiar_clave($id){
       
       
         ///////////////////////
         //RECUPERAR EMAIL
         //////////////////////
         
         $strsql="select email, pass from cliente where idcliente='$id'";
         $fila=$this->CI->modelo_base->c_una_fila($strsql);
         
         if($fila!="0"){
                            
                            $email=$fila->email; 
                            $pass=$fila->pass; 

                            $strhtml="<table  width='500'>";
                            $strhtml.="<tr>";
                            $strhtml.="<td colspan='2' style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; font-weight:bold;'>Datos de Acceso</td>";
                            $strhtml.="</tr>";

                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; width:150px;' >Email</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$email;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";

                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Contraseña</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$pass;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            $strhtml.="</table>";





                           //////////////////////////////
                           //MANDAMOS EL EMAIL
                           /////////////////////////////

                           $strsql="SELECT de, asunto, inicio, final from emails where nombre='cambiar-clave'";


                           $fila=$this->CI->modelo_base->c_una_fila($strsql);
                           $de=$fila->de; 
                           $asunto=$fila->asunto; 
                           $parte1=$fila->parte1;  
                           $parte2=$fila->parte2; 


                           $total_html=$parte1;
                           $total_html.="<br/>";
                           $total_html.=$strhtml;
                           $total_html.="<br/>";
                           $total_html.=$parte2;


                           $config['mailtype'] = 'html';
                           $this->CI->email->initialize($config);

                           $this->CI->email->from($de);
                           $this->CI->email->to($email); 
                           //$this->email->cc($copia); 
                          // $this->email->bcc('ellos@su-ejemplo.com'); 

                           $this->CI->email->subject($asunto);

                           $this->CI->email->message($total_html); 


                           @$this->CI->email->send();

                           //return $total_html;
                           return  "ok";
         }else{
             
             return  "no";
         }//endIF                
         
         
       
   }//endFunction   
   
   
   
   public function  email_contacto($id){
       
       
         ///////////////////////
         //EMAIL CONTACTO
         //////////////////////
         
         $strsql="select  nombre, correo, telefono, asunto, mensaje, fecha,link from mensajes where idmensajes='$id'";
         $fila=$this->CI->modelo_base->c_una_fila($strsql);
         
         if($fila!="0"){
         
                           

                            $strhtml="<table  width='500'>";
                            $strhtml.="<tr>";
                            $strhtml.="<td colspan='2' style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; font-weight:bold;'>Contacto</td>";
                            $strhtml.="</tr>";

                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; width:150px;' >Nombre</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->nombre;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; width:150px;' >Email</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->correo;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";

                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Sección de la Web</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->link;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                           
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Asunto</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->asunto;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                           
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Mensaje</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->mensaje;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Fecha</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->fecha;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            
                            
                            $strhtml.="</table>";





                           //////////////////////////////
                           //MANDAMOS EL EMAIL
                           /////////////////////////////

                                                      
                           $para=$this->CI->be_parametros->valor('correo_contacto');
                           $copia=$this->CI->be_parametros->valor('copia_correo_contacto');

                           $asunto="Consulta Formulario de contacto de: ".$fila->nombre;


                           $config['mailtype'] = 'html';
                           $this->CI->email->initialize($config);

                           $this->CI->email->from($fila->correo);
                           $this->CI->email->to($para); 
                           $this->CI->email->cc($copia); 
                           //$this->CI->email->bcc('ycalle@solucionesajax.com'); 

                           $this->CI->email->subject($asunto);

                           $this->CI->email->message($strhtml); 


                           @$this->CI->email->send();

                           //return $strhtml;
                           return  "ok";
         }else{
             
             return  "no";
         }//endIF                
         
         
       
   }//endFunction   
   
   
   public function email_boletin($id){
       
       
         ///////////////////////
         //EMAIL CONTACTO
         //////////////////////
         
         $strsql="select  email, fecha from boletin where idboletin='$id'";
         $fila=$this->CI->modelo_base->c_una_fila($strsql);
         
         if($fila!="0"){
         
                           

                            $strhtml="<table  width='500'>";
                            $strhtml.="<tr>";
                            $strhtml.="<td colspan='2' style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; font-weight:bold;'>Boletin</td>";
                            $strhtml.="</tr>";

                           
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; width:150px;' >Email</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->email;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";

                            
                           
                            
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Fecha</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->fecha;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            
                            
                            $strhtml.="</table>";





                           //////////////////////////////
                           //MANDAMOS EL EMAIL
                           /////////////////////////////

                                                      
                           $para=$this->CI->be_parametros->valor('correo_contacto');
                           $copia=$this->CI->be_parametros->valor('copia_correo_contacto');

                           
                           $asunto="Prospecto: ".$fila->nombre;

                           $config['mailtype'] = 'html';
                           $this->CI->email->initialize($config);

                           $this->CI->email->from($fila->correo);
                           $this->CI->email->to($para); 
                           $this->CI->email->cc($copia); 
                           //$this->CI->email->bcc('ycalle@solucionesajax.com'); 

                           $this->CI->email->subject($asunto);

                           $this->CI->email->message($strhtml); 


                           @$this->CI->email->send();

                           //return $strhtml;
                           return  "ok";
         }else{
             
             return  "no";
         }//endIF                
         
         
       
   }//endFunction   
   
   
   public function email_consulta($id){
       
       
         ///////////////////////
         //EMAIL CONTACTO
         //////////////////////
         
         $strsql="select  nombre, edad, sexo,correo, telefono, asunto, mensaje, fecha, producto from consultas where idconsultas='$id'";
         $fila=$this->CI->modelo_base->c_una_fila($strsql);
         
         if($fila!="0"){
         
                           

                            $strhtml="<table  width='500'>";
                            $strhtml.="<tr>";
                            $strhtml.="<td colspan='2' style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; font-weight:bold;'>Consulta al Dr. Blamac</td>";
                            $strhtml.="</tr>";

                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; width:150px;' >Nombre</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->nombre;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; width:150px;' >Email</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->correo;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; width:150px;' >Edad</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->edad;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            /*
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif; width:150px;' >Sexo</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->sexo;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                                
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Teléfono</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->telefono;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            */
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Producto</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->producto;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Mensaje</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->mensaje;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            
                            $strhtml.="<tr>";
                            $strhtml.="<td style='background-color:#ffc600; color:#963e1a; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;' >Fecha</td>";
                            $strhtml.="<td style='border:1px solid #ffc600; padding:5px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;'>";
                            $strhtml.=$fila->fecha;
                            $strhtml.="</td>";
                            $strhtml.="</tr>";
                            
                            
                            
                            $strhtml.="</table>";





                           //////////////////////////////
                           //MANDAMOS EL EMAIL
                           /////////////////////////////

                                                      
                           $para=$this->CI->be_parametros->valor('doctor_email');
                           $copia=$this->CI->be_parametros->valor('copia_correo_contacto');
                           $asunto="Consulta de ". $fila->nombre;
                           


                           $config['mailtype'] = 'html';
                           $this->CI->email->initialize($config);

                           $this->CI->email->from($fila->correo);
                           $this->CI->email->to($para); 
                           $this->CI->email->cc($copia); 
                           //$this->CI->email->bcc('ycalle@solucionesajax.com'); 

                           $this->CI->email->subject($asunto);

                           $this->CI->email->message($strhtml); 


                           @$this->CI->email->send();

                           //return $strhtml;
                           return  "ok";
         }else{
             
             return  "no";
         }//endIF                
         
         
       
   }//endFunction   
    
    
    
       
    
   
}
?>