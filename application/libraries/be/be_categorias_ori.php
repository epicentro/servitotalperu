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
class be_categorias {

    public $CI;
    public function  __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model("modelo_base");
        $this->CI->load->library("be/be_funciones");
       

    }

   
    
    public function html_mnto($tabla, $idtabla, $carpeta_imagen){

        
            $strsql="select $idtabla, nombre, orden, idtipo_categoria, imagen  from $tabla 
                where padre_id='0' order by orden ";

            $filas=$this->CI->modelo_base->consulta($strsql);
            $strhtml="";
        

            if( $filas!="0" ){

                $strhtml.="<table  cellpadding='0' cellspacing='0' class='tb_mnto'>";
                $strhtml.="<thead><tr>";
                $strhtml.="<th>Id</th>";
                $strhtml.="<th >Nombre</th>";

                $strhtml.="<th>Orden</th>";
                $strhtml.="<th>Tipo</th>";
                $strhtml.="<th>Imagen</th>";
                $strhtml.="<th colspan='2'>Control</th>";

                $strhtml.="</tr></thead>";


                foreach($filas as $fila){

                            if($fila->idtipo_categoria==1){
                                    $tipo="Categoría";    
                            }else{
                                    $tipo="<span class='seccion'>Sección</span>";    
                            }//endIF

                            $strhtml.="<tr/>";
                            $strhtml.="<td>";
                            $strhtml.=$fila->$idtabla;
                            $strhtml.="</td>";
                            $strhtml.="<td>";
                            $strhtml.=$fila->nombre;
                            $strhtml.="</td>";
                            $strhtml.="<td>";
                            $strhtml.=$fila->orden;
                            $strhtml.="</td>";
                            $strhtml.="<td>";
                            $strhtml.=$tipo;
                            $strhtml.="</td>";
                            $strhtml.="<td style='text-align:center'>";
                            if($fila->imagen!=""){
                                $strhtml.="<img class='img_link' src='".base_url().$carpeta_imagen."/".$this->CI->be_funciones->nombre_thumbs($fila->imagen)."'/><br/>";
                            }//endIF

                            $strhtml.="<img class='img_link' onclick='abrir_popup(\"".base_url()."be/$tabla/v_imagen/".$fila->$idtabla."\",1000,300);' src='".base_url()."img/edit.png' width='16' height='16' title='Actualizar'/>";
                            $strhtml.="</td>";
                            $strhtml.="<td style='text-align:center'>";
                            $strhtml.="<img class='img_link' onclick='abrir_popup(\"".base_url()."be/$tabla/v_editar/".$fila->$idtabla."\",1000,650);' src='".base_url()."img/edit.png' width='16' height='16' title='Actualizar'/>";
                            $strhtml.="&nbsp;&nbsp;&nbsp;&nbsp;";
                            $strhtml.="<img class='img_link' onclick = 'javascript:elimina_$tabla(\"".$fila->$idtabla."\")' src='".base_url()."img/cancel.png' width='16' height='16' title='Eliminar'/>";
                            $strhtml.="</td>";
                            $strhtml.="<tr/>";

                            $filas=$this->html_recursivo_hijo($tabla, $idtabla, $fila->$idtabla, $carpeta_imagen,"&nbsp;&nbsp;+&nbsp;&nbsp;");
                            $strhtml.=$filas;


                        }//endFor

                $strhtml.="</table>";  
                
            }//endif
        
        
        
        return $strhtml;
            
            

            

    }//endFunction

   
    public function html_recursivo_hijo($tabla, $idtabla, $id ,$carpeta_imagen, $separador){
        
        
        $strsql="select count(*) as hijos from $tabla where padre_id='$id'";
        $r=$this->CI->modelo_base->c_una_fila($strsql);
        
        $strhtml="";
        if($r->hijos>0){
                     
                $strsql="select $idtabla, nombre, orden, idtipo_categoria, imagen from $tabla 
                            where padre_id='$id' order by orden ";
                $filas=$this->CI->modelo_base->consulta($strsql);
               

                    foreach($filas as $fila){

                            if($fila->idtipo_categoria==1){
                                $tipo="Categoría";    
                            }else{
                                    $tipo="<span class='seccion'>Sección</span>";    
                            }//endIF

                            $strhtml.="<tr/>";
                            $strhtml.="<td>";
                            $strhtml.=$fila->$idtabla;
                            $strhtml.="</td>";
                            $strhtml.="<td>";
                            $strhtml.=$separador.$fila->nombre;
                            $strhtml.="</td>";
                            $strhtml.="<td>";
                            $strhtml.=$fila->orden;
                            $strhtml.="</td>";
                            $strhtml.="<td>";
                            $strhtml.=$tipo;
                            $strhtml.="</td>";
                            $strhtml.="<td style='text-align:center'>";
                            if($fila->imagen!=""){
                                $strhtml.="<img class='img_link' src='".base_url().$carpeta_imagen."/".$this->CI->be_funciones->nombre_thumbs($fila->imagen)."'/><br/>";
                            }//endIF

                            $strhtml.="<img class='img_link' onclick='abrir_popup(\"".base_url()."be/$tabla/v_imagen/".$fila->$idtabla."\",1000,300);' src='".base_url()."img/edit.png' width='16' height='16' title='Actualizar'/>";
                            $strhtml.="</td>";
                            $strhtml.="<td style='text-align:center'>";
                            $strhtml.="<img class='img_link' onclick='abrir_popup(\"".base_url()."be/$tabla/v_editar/".$fila->$idtabla."\",1000,650);' src='".base_url()."img/edit.png' width='16' height='16' title='Actualizar'/>";
                            $strhtml.="&nbsp;&nbsp;&nbsp;&nbsp;";
                            $strhtml.="<img class='img_link' onclick = 'javascript:elimina_$tabla(\"".$fila->$idtabla."\")' src='".base_url()."img/cancel.png' width='16' height='16' title='Eliminar'/>";
                            $strhtml.="</td>";

                            $strhtml.="<tr/>";


                            $strsql="select count(*) as hijos from $tabla where padre_id='".$fila->$idtabla."'";
                            $res=$this->CI->modelo_base->c_una_fila($strsql);
                            if($res->hijos>0){
                                $separador.="&nbsp;&nbsp;+&nbsp;&nbsp;";
                                $strhtml.=$this->html_recursivo_hijo($tabla, $idtabla, $fila->$idtabla ,$carpeta_imagen, $separador);


                            }//endIF


                    }//endFor
            
                        
            
        }//endIF
        
        
        return $strhtml;
        
        
    }//endFunction
   
    
    
    public function html_combo($idselection, $tabla, $idtabla){
        
        $strsql="select $idtabla, nombre  from $tabla 
                where padre_id='0' order by orden ";

            $filas=$this->CI->modelo_base->consulta($strsql);
            $strhtml="";
        

            if( $filas!="0" ){

               

                foreach($filas as $fila){

                          if($fila->$idtabla==$idselection){
                              
                            $strhtml.="<option value=".$fila->$idtabla." selected>";
                            $strhtml.=$fila->nombre;
                            $strhtml.="</option>";
                              
                          }else{
                              
                            $strhtml.="<option value=".$fila->$idtabla." >";
                            $strhtml.=$fila->nombre;
                            $strhtml.="</option>";
                              
                          } //endIF
                          
                            
                            

                            $filas=$this->combo_recursivo_hijo($tabla, $idtabla, $fila->$idtabla, $idselection, "&nbsp;&nbsp;+&nbsp;&nbsp;");
                            $strhtml.=$filas;


                        }//endFor

                
                
            }//endif
        
        
        
            return $strhtml;

    }//EndFuntion
    
    
    public function combo_recursivo_hijo($tabla, $idtabla, $id, $idselection, $separador ){
        
        
        $strsql="select count(*) as hijos from $tabla where padre_id='$id'";
        $r=$this->CI->modelo_base->c_una_fila($strsql);
        
        $strhtml="";
        if($r->hijos>0){
                     
                $strsql="select $idtabla, nombre  from $tabla 
                            where padre_id='$id' order by orden ";
                $filas=$this->CI->modelo_base->consulta($strsql);
                

                    foreach($filas as $fila){

                            if($fila->$idtabla==$idselection){
                              
                                $strhtml.="<option value=".$fila->$idtabla." selected>";
                                $strhtml.=$separador.$fila->nombre;
                                $strhtml.="</option>";

                            }else{

                                $strhtml.="<option value=".$fila->$idtabla." >";
                                $strhtml.=$separador.$fila->nombre;
                                $strhtml.="</option>";

                            } //endIF

                            $strsql="select count(*) as hijos from $tabla where padre_id='".$fila->$idtabla."'";
                            $res=$this->CI->modelo_base->c_una_fila($strsql);
                            if($res->hijos>0){
                                $separador.="&nbsp;&nbsp;+&nbsp;&nbsp;";
                                $strhtml.=$this->combo_recursivo_hijo($tabla, $idtabla, $fila->$idtabla, $idselection, $separador);


                            }//endIF


                    }//endFor
            
                        
            
        }//endIF
        
        
        return $strhtml;
        
        
    }//endFunction
   
    
   
}
?>