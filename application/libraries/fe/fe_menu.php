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
class fe_menu {

    public $CI;
    public function  __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model("modelo_base");
        

    }

   public function treeview(){

       $strsql="select max(nivel) as nivel from categoria";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

        $strhtml="";
        $combo_nuevo="";

        if( $fila!="0" ){

            $nivel_maximo=$fila->nivel;

            for($i=1; $i<=$nivel_maximo; $i++){

                    ////////////////////////////////////////////////////
                    //PRIMERO ENTRAMOS AL PRIMER NIVEL  QUE LO HAREMOS
                    //DE FORMA INDEPENDIENTE
                    //////////////////////////////////////////

                    if($i==1){



                            $strsql="select idcategoria, nombre, orden, seo, tipo from categoria where nivel='".$i."' order by orden";
                            $filas=$this->CI->modelo_base->consulta($strsql);

                                 foreach ($filas as $fila){

                                     $idcategoria=$fila->idcategoria;
                                     $nombre=$fila->nombre;
                                     $orden=$fila->orden;
                                     $seo_categoria=$fila->seo;
                                     //AVERIGUAMOS SI TIENE HIJOS
                                     $strsql="select count(*) as hijos from categoria where padre_id='".$idcategoria."'";
                                     $row=$this->CI->modelo_base->c_una_fila($strsql);
                                     $hijos=$row->hijos;

                                     if($hijos>0){

                                            
                                            $strhtml.="<li><span class='folder'>".$nombre."</span>";
                                            $strhtml.="hijo".$idcategoria."hijo";
                                            


                                     }else{
                                          
                                         
                                          
                                           
                                         
                                         if ($fila->tipo=='1'){ //si es tipo 1 es una seccion 
                                         
                                           
                                           $strhtml.="<li><span class='especial'>";
                                           $strhtml.="<a href='".base_url()."especial/item/$seo_categoria/'>".$nombre."</a>";
                                           $strhtml.="</span></li>";
                                            
                                           
                                              
                                          }else{
                                              
                                                $strhtml.="<li><span class='folder'>".$nombre."</span>";
                                                $strhtml.="<ul>";
                                                $strsql="select p.idmarca, m.nombre, m.seo from categoria c, producto p, marca m 
                                                          where c.idcategoria=p.idcategoria and p.idmarca=m.idmarca 
                                                          and p.stock>0 and c.idcategoria='$idcategoria' GROUP by p.idmarca";

                                                $categoria=$this->CI->modelo_base->consulta($strsql);
                                                if($categoria!="0"){
                                                foreach($categoria as $cat ){

                                                     $strhtml.="<li><span class='file'>";
                                                     $strhtml.="<a href='".base_url()."productos/item/$seo_categoria/$cat->seo/'>".$cat->nombre."</a>";
                                                     $strhtml.="</span></li>";

                                                }//endFor
                                                }//endIF
                                                $strhtml.="</ul>";
                                                $strhtml.="</li>";
                                              
                                              
                                          }//endIf
                                            
                                          
                                         
                                         
                                                                                 
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                           
                                     }//endIF



                                 }//endforeach




                    }elseif ($i>1){


                        


                        $strsql="select padre_id from categoria where nivel='".$i."' group by padre_id order by  padre_id";
                        $filas=$this->CI->modelo_base->consulta($strsql);



                        foreach($filas as $fila ){

                                 $padre_id=$fila->padre_id;



                                //SACAMOS TODOS LOS HIJOS QUE PERTENECEN AL PADRE_ID
                                 $strsql="select idcategoria, nombre, orden, tipo, seo from categoria where padre_id='".$padre_id."' order by orden";
                                 //echo $strsql."<br/>";
                                 $rows=$this->CI->modelo_base->consulta($strsql);

                                 $combo_nuevo="";
                                 foreach($rows as $row ){

                                     $idcategoria=$row->idcategoria;
                                     $nombre=$row->nombre;
                                     $seo_categoria=$row->seo;
                                      //AVERIGUAMOS SI TIENE HIJOS
                                     $strsql="select count(*) as hijos from categoria where padre_id='".$idcategoria."'";
                                     $row_1=$this->CI->modelo_base->c_una_fila($strsql);
                                     $hijos=$row_1->hijos;
                                      

                                     if($hijos>0){

                                            
                                            $combo_nuevo.="<li><span class='folder'>".$nombre."</span>";
                                            $combo_nuevo.="hijo".$idcategoria."hijo";
                                            
                                            



                                     }else{
                                            
                                          
                                         
                                         if ($row->tipo=='1'){ //si es tipo 1 es una seccion 
                                         
                                           
                                           $combo_nuevo.="<li><span class='especial'>";
                                           $combo_nuevo.="<a href='".base_url()."especial/item/$seo_categoria/'>".$nombre."</a>";
                                           $combo_nuevo.="</span></li>";
                                            
                                           
                                              
                                          }else{
                                              
                                                $combo_nuevo.="<li><span class='folder'>".$nombre."</span>";
                                                $combo_nuevo.="<ul>";
                                                $strsql="select p.idmarca, m.nombre, m.seo from categoria c, producto p, marca m 
                                                          where c.idcategoria=p.idcategoria and p.idmarca=m.idmarca 
                                                          and p.stock>0 and c.idcategoria='$idcategoria' GROUP by p.idmarca";

                                                $categoria=$this->CI->modelo_base->consulta($strsql);
                                                if($categoria!="0"){
                                                foreach($categoria as $cat ){

                                                     $combo_nuevo.="<li><span class='file'>";
                                                     $combo_nuevo.="<a href='".base_url()."productos/item/$seo_categoria/$cat->seo'>".$cat->nombre."</a>";
                                                     $combo_nuevo.="</span></li>";

                                                }//endFor
                                                }//endIF
                                                $combo_nuevo.="</ul>";
                                                $combo_nuevo.="</li>";
                                              
                                              
                                          }//endIf
                                            
                                           
                                         
                                            

                                     }//endIF


                                }//endForEach

                                //AQUI INSERTAMOS UN SUBNIVEL A UN PADRE, HACIENDO USO DEL
				//str_replace BUSCAMOS NUESTRO ARTIFICIO submenu+$idmenu+submenu
				//Y LO REEMPLAZAMOS POR EL HIJO QUE ESTA ALMACENADO EN $str_nuevo




						//AQUI INSERTAMOS UN SUBNIVEL A UN PADRE, HACIENDO USO DEL
						//str_replace BUSCAMOS NUESTRO ARTIFICIO submenu+$idmenu+submenu
						//Y LO REEMPLAZAMOS POR EL HIJO QUE ESTA ALMACENADO EN $str_nuevo
                                               
                                                //AQUÍ TAMBIEN PASA ALGO MUY ESPCECIAL QUE LOS LI ADEMAS DE CONTENER
                                                //UNA CATEGORIA TAMBIEN CONTIENE SUBNIVELES POR LO TANTO CONTIENEN UL
                                                //Y ESTO OCURRE SOLO CUANDO EXISTEN SUBCATEGORIAS (HIJOS), ES POR ESTA
                                                // RAZON QUE EN LA PARTE INFERIOR ESTAMOS CERRANDO EL UL CON UN LI
                                                
                                                $combo_nuevo="<ul>".$combo_nuevo."</ul></li>";
                                                
                                               
						$buscada="hijo".$padre_id."hijo";
                                                
                                                

						$strhtml=str_replace ( $buscada, $combo_nuevo, $strhtml );
                        }//endForeach



                    }//endIF



            }//endFor
            
             //Regresamos el HTML listo para poner
             return $strhtml;



        }else{//Si es Igual a cero es que no hay ninguna categoría

            return "";
        }//endIF


   }//endFunction

  


public function menu_lista(){

       $strsql="select max(nivel) as nivel from categoria";
       $fila=$this->CI->modelo_base->c_una_fila($strsql);

        $strhtml="";
        $combo_nuevo="";

        if( $fila!="0" ){

            $nivel_maximo=$fila->nivel;

            for($i=1; $i<=$nivel_maximo; $i++){

                    ////////////////////////////////////////////////////
                    //PRIMERO ENTRAMOS AL PRIMER NIVEL  QUE LO HAREMOS
                    //DE FORMA INDEPENDIENTE
                    //////////////////////////////////////////

                    if($i==1){



                            $strsql="select idcategoria, nombre, orden, seo from categoria where nivel='".$i."' order by orden";
                            $filas=$this->CI->modelo_base->consulta($strsql);

                                 foreach ($filas as $fila){

                                     $idcategoria=$fila->idcategoria;
                                     $nombre=$fila->nombre;
                                     $orden=$fila->orden;
                                     $seo=$fila->seo;
                                     //AVERIGUAMOS SI TIENE HIJOS
                                     $strsql="select count(*) as hijos from categoria where padre_id='".$idcategoria."'";
                                     $row=$this->CI->modelo_base->c_una_fila($strsql);
                                     $hijos=$row->hijos;

                                     if($hijos>0){

                                            
                                            $strhtml.="<li><a href='#'>".$nombre."</a>";
                                            $strhtml.="hijo".$idcategoria."hijo";
                                            


                                     }else{
                                           $strhtml.="<li>";
                                           $strhtml.="<a href='".base_url()."producto/categoria/$seo'>".$nombre."</a>";
                                           $strhtml.="</li>";
                                           
                                     }//endIF



                                 }//endforeach




                    }elseif ($i>1){


                        


                        $strsql="select padre_id from categoria where nivel='".$i."' group by padre_id order by  padre_id";
                        $filas=$this->CI->modelo_base->consulta($strsql);



                        foreach($filas as $fila ){

                                 $padre_id=$fila->padre_id;



                                //SACAMOS TODOS LOS HIJOS QUE PERTENECEN AL PADRE_ID
                                 $strsql="select idcategoria, nombre, orden, seo from categoria where padre_id='".$padre_id."' order by orden";
                                 //echo $strsql."<br/>";
                                 $rows=$this->CI->modelo_base->consulta($strsql);

                                 $combo_nuevo="";
                                 foreach($rows as $row ){

                                     $idcategoria=$row->idcategoria;
                                     $nombre=$row->nombre;
                                     $seo=$row->seo;
                                      //AVERIGUAMOS SI TIENE HIJOS
                                     $strsql="select count(*) as hijos from categoria where padre_id='".$idcategoria."'";
                                     $row_1=$this->CI->modelo_base->c_una_fila($strsql);
                                     $hijos=$row_1->hijos;
                                      

                                     if($hijos>0){

                                            
                                            $combo_nuevo.="<li><a href='#'>".$nombre."</a>";
                                            $combo_nuevo.="hijo".$idcategoria."hijo";
                                            
                                            



                                     }else{
                                            
                                           $combo_nuevo.="<li>";
                                           $combo_nuevo.="<a href='".base_url()."producto/categoria/$seo'>".$nombre."</a>";
                                           $combo_nuevo.="</li>";
                                            
                                            

                                     }//endIF


                                }//endForEach

                                //AQUI INSERTAMOS UN SUBNIVEL A UN PADRE, HACIENDO USO DEL
				//str_replace BUSCAMOS NUESTRO ARTIFICIO submenu+$idmenu+submenu
				//Y LO REEMPLAZAMOS POR EL HIJO QUE ESTA ALMACENADO EN $str_nuevo




						//AQUI INSERTAMOS UN SUBNIVEL A UN PADRE, HACIENDO USO DEL
						//str_replace BUSCAMOS NUESTRO ARTIFICIO submenu+$idmenu+submenu
						//Y LO REEMPLAZAMOS POR EL HIJO QUE ESTA ALMACENADO EN $str_nuevo
                                               
                                                //AQUÍ TAMBIEN PASA ALGO MUY ESPCECIAL QUE LOS LI ADEMAS DE CONTENER
                                                //UNA CATEGORIA TAMBIEN CONTIENE SUBNIVELES POR LO TANTO CONTIENEN UL
                                                //Y ESTO OCURRE SOLO CUANDO EXISTEN SUBCATEGORIAS (HIJOS), ES POR ESTA
                                                // RAZON QUE EN LA PARTE INFERIOR ESTAMOS CERRANDO EL UL CON UN LI
                                                
                                                $combo_nuevo="<ul>".$combo_nuevo."</ul></li>";
                                                
                                               
						$buscada="hijo".$padre_id."hijo";
                                                
                                                

						$strhtml=str_replace ( $buscada, $combo_nuevo, $strhtml );
                        }//endForeach



                    }//endIF



            }//endFor
            
             //Regresamos el HTML listo para poner
             return $strhtml;



        }else{//Si es Igual a cero es que no hay ninguna categoría

            return "";
        }//endIF


   }//endFunction







}
?>