<div id="content_main" class="clearfix">

                <div id="dashboard_y">
				<h2 class="ico_mug"> SECCIÓN CAMBIO DE CONTRASEÑA</h2>
				<div class="clearfix">



<script type="text/javascript">



function validar(){

    var clave1=$.trim($("#txt_clave1").val());
    var clave2=$.trim($("#txt_clave2").val());

   if(clave1.length==0){

       var men="Por favor ingrese la clave.";
       alert(men);
       $("#txt_clave1").focus();
        return false;

   }//endIF


   if(clave2.length==0){

       var men="Por favor ingrese la confirmación de la clave.";
       alert(men);
       $("#txt_clave2").focus();
        return false;

   }//endIF


   if(clave1!= clave2){
       var men="La clave y su confirmación no son iguales";
       alert(men);
       $("#txt_clave1").focus();
       return false;
   }




}

</script>

<?php
	  if( $this->session->userdata('grabar') ){


 ?>
             <div id="success" class="info_div"><span class="ico_success">Registro grabado con éxito!</span></div>
 <?php
	     $this->session->unset_userdata('grabar');

          }
?>



 <form id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>be/contrasena/cambio" onsubmit="return validar();" >

        <table cellpadding="0" cellspacing="0" class="tb_mnto"  >


<!--seo_title, seo_descripcion, seo_keywords, text_html-->

            <tr>
                <td>
                    Clave
                </td>
                <td>
                 <input type="password" name="txt_clave1"  id="txt_clave1" style="width:400px;"  /><br/>
                 </td>
            </tr>



            <tr>
                <td>
                   Confirmar Clave
                </td>
                <td>
                 <input type="password" name="txt_clave2"  id="txt_clave2" style="width:400px;"  /><br/>

                </td>

            </tr>




            <tr>
                <td colspan="2">
                   <input type="submit" name="Subir" value="Grabar" id="save" />

                </td>

            </tr>

        </table>

       </form>





                         <br /><br />





				</div>
			</div><!-- end #dashboard -->
</div>