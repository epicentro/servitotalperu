<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modelo_base
 *
 * @author Yasser
 */
class modelo_base extends CI_Model {
    //put your code here

    public function  __construct() {
        parent::__construct();
    }

    public function insertar($nombre_tabla, $arreglo){
        $str = $this->db->insert_string($nombre_tabla, $arreglo);
    }

    public function actualizar($nombre_tabla, $arreglo,$condicion){
        $str = $this->db->update_string($nombre_tabla, $arreglo, $condicion);
    }

    function consulta($strsql){


                  $query = $this->db->query($strsql);

                   if($query->num_rows>0){

			foreach ($query->result() as $fila) {
				$data[] = $fila;
			}
                            return $data;
                    }else{

                        return "0";
                    }


        }

        function c_una_fila($strsql){

             $query = $this->db->query($strsql);

                   if($query->num_rows>0){

			return $query->row();
                        
                    }else{

                        return "0";
                    }
        }

        


       function cantidad_filas($strsql){

                   $query = $this->db->query($strsql);
                   return $query->num_rows();


        }

        //Eliminar lo hacemos por aqui con ejecuta
        function ejecuta($strsql){

                 $query = $this->db->query($strsql);
                  return $query;

        }

    
}
?>
