/*
$(document).ready(function(){

                 
 
 
 });
*/
 
  
 
 function carrito(idproducto){
     
            if(document.domain=="localhost"){
                        var ruta="http://localhost/blamac2016/carrito/cesta/";
                    }else{
                        var ruta="http://"+document.domain+"/carrito/cesta/";
            }

          
          $.post(ruta, {sw:1, idproducto:idproducto }, llegajson_v3, "json");
          
     
 }//endFunction
 
 function eliminar_item(idproducto){
     
            if(document.domain=="localhost"){
                        var ruta="http://localhost/blamac2016/carrito/eliminar_item/";
                    }else{
                        var ruta="http://"+document.domain+"/carrito/eliminar_item/";
            }

          
          $.post(ruta, {sw:1, idproducto:idproducto }, llegajson_v3, "json");
          
     
 }//endFunction
 
 
 

 
 function tipo_pago(idtipo_pago){
     
     if(idtipo_pago!="0"){
         
         //Ocultamos por mientras el boton de continuar para que no le hagan click
         //hasta que este seleccionado el tipo de pago 
         document.getElementById("btn_cesta_continuar").style.display = "none";

         
         if(document.domain=="localhost"){
                        var ruta="http://localhost/corporaciondecar/carrito/tipo_pago/";
                    }else{
                        var ruta="http://"+document.domain+"/carrito/tipo_pago/";
            }

          
          $.post(ruta, {sw:1, idtipo_pago:idtipo_pago }, llegajson_v3, "json");
     }//endIF      
           
          
     
 }//endFunction
 

function llegajson_v3(data){
	
	       
	  switch (data.sw){
			
			case "1"://AGREGA UN ITEM
						
				
                               
                              
                                if(data.dato=="ok"){
                                    
                                    if(document.domain=="localhost"){
                                                var ruta="http://localhost/blamac2016/carrito/";
                                    }else{
                                                var ruta="http://"+document.domain+"/carrito/";
                                    }//endIF

                                    
                                    window.location.href = ruta;

                               
                                    
                                }//endIF
                              
                              /*
                               men="Producto agregado al carrito.";
                               alert(men);
                               window.location.reload();
                               */
				break;
                                

					
					
												
                        case  "2"://ELIMINA UN ITEM
                            
                                  window.location.reload();
		               

                               
				break;
                                
                                
                         case  "3"://SELECCIONA UN PAIS
                            
                                  window.location.reload();
		               

                               
				break;       
                                
                         case  "4"://TIPO PAGO
                            
                                  window.location.reload();
		               

                               
				break;              
					  
					 
					  	
						
                        
								
	 }//endSwitch
	 
	 
					 
}//endFunction
							   

	
	
	
