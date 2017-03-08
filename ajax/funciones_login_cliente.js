/*
$(document).ready(function(){

                 
 
 
 });
*/


  
 
 function logueo(){
     
     var txt_caja_email=$.trim($("#txt_caja_email").val());
     var txt_caja_clave=$.trim($("#txt_caja_clave").val());
     
     if(txt_caja_email.length==0){

       var men="Por favor ingrese su Email.";
       alert(men);
       $("#txt_caja_email").focus();
        return false;

     }//endIF
     
     if(txt_caja_clave.length==0){

       var men="Por favor ingrese su Contraseña.";
       alert(men);
       $("#txt_caja_clave").focus();
        return false;

     }//endIF
     
            if(document.domain=="localhost"){
                        var ruta="http://localhost/corporaciondecar/perfil/validar/";
                    }else{
                        var ruta="http://"+document.domain+"/perfil/validar/";
            }

          
          $.post(ruta, {sw:1, email:txt_caja_email, clave:txt_caja_clave}, llegajson_v2, "json");
          
    
     
    
 }//endFunction
 

function llegajson_v2(data){
	
	       
	  switch (data.sw){
			
			case "1":
						
				
                              // alert(data.dato);
                               
                                if(data.dato=="ok"){

                                    //var men="Registro eliminado en forma satisfactoria";
                                    //alert(men);
                                    window.location.reload();

                                }else{

                                    var men="Usuario y/o Contraseña erronea.";
                                    alert(men);
                                    
                                }//endIF
                               
				break;
                                

					
					
												
                        case  "2":
		               

                               
				break;
					  
					 
					  	
						
                        
								
	 }//endSwitch
	 
	 
					 
}//endFunction
							   

	
	
	
