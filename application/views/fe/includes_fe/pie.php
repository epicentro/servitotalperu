
            </div>
<style type="text/css">
    #footer .contact p{color: #fff;}
</style>
            <footer id="footer">
                <div class="container">
                    <div class="row">
                        <div class="footer-ribbon">
                            <span>Mapa Web</span>
                        </div>
                        <div class="col-md-5">
                            <div class="contact-details">
                                <ul class="contact">
                                    <li><span class="glyphicon glyphicon-triangle-right"></span> <a href="<?php echo base_url();?>">Inicio</a></li>    
                                    <li><span class="glyphicon glyphicon-triangle-right"></span> <a href="<?php echo base_url();?>categoria/productos">Productos</a></li>
                                    <li><span class="glyphicon glyphicon-triangle-right"></span> <a href="<?php echo base_url();?>categoria-servicios/servicios">Servicios</a></li>    
                                    <li><span class="glyphicon glyphicon-triangle-right"></span> <a href="<?php echo base_url();?>categoria-maquinaria/maquinarias">Maquinarias</a></li>
                                    <li><span class="glyphicon glyphicon-triangle-right"></span> <a href="<?php echo base_url();?>nosotros">Nosotros</a></li>    
                                    <li><span class="glyphicon glyphicon-triangle-right"></span> <a href="<?php echo base_url();?>clientes">Clientes</a></li>
                                    <li><span class="glyphicon glyphicon-triangle-right"></span> <a href="<?php echo base_url();?>contacto">Contáctanos</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="contact-details">
                                <h4>Contacto</h4>
                                <ul class="contact">
                                    <li><p><i class="fa fa-map-marker"></i> <strong>Dirección:</strong> <?php echo $this->be_parametros->valor("direccion"); ?></p></li>
                                    <li><p><i class="fa fa-phone"></i> <strong>Teléfono:</strong> <?php echo $this->be_parametros->valor("telefono_frontis")." / ".$this->be_parametros->valor("celular_frontis"); ?></p></li>
                                    <li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:<?php echo $this->be_parametros->valor("correo_contacto"); ?>"><?php echo $this->be_parametros->valor("correo_contacto"); ?></a></p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <h4>Síguenos</h4>
                            <ul class="social-icons">
                                <li class="social-icons-facebook"><a href="<?php echo $this->be_parametros->valor("link_facebook"); ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-icons-twitter"><a href="<?php echo $this->be_parametros->valor("link_twitter"); ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-icons-linkedin"><a href="<?php echo $this->be_parametros->valor("link_linkeding"); ?>" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <p>SERVITOTAL PERU © Copyright 2016. Todos los derechos reservados.</p>
                            </div>
                            <div class="col-md-4">
                                <nav id="sub-menu">
                                    <ul>
                                        <li>Desarrollado por: <a href="http://www.solucionesajax.com">Soluciones Ajax</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>



        <!-- Vendor -->
        <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/jquery.appear/jquery.appear.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/jquery.easing/jquery.easing.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/jquery-cookie/jquery-cookie.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/common/common.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/jquery.validation/jquery.validation.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/jquery.stellar/jquery.stellar.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/jquery.gmap/jquery.gmap.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/isotope/jquery.isotope.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/vide/vide.min.js"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="<?php echo base_url(); ?>js/theme.js"></script>

        <!-- Current Page Vendor and Views -->
        <script src="<?php echo base_url(); ?>vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/circle-flip-slideshow/js/jquery.flipshow.min.js"></script>
        <script src="<?php echo base_url(); ?>js/views/view.home.js"></script>

        <!-- Theme Custom -->
        <script src="<?php echo base_url(); ?>js/custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="<?php echo base_url(); ?>js/theme.init.js"></script>
        <script src='https://maps.googleapis.com/maps/api/js?sensor=false'></script>

         <script>
$(document).ready(function()
{
             $(".ok_sms").hide();
             $(".fail_sms").hide();
             $(".loading").hide();

             $( "#demo-form" ).submit(function(e) {

                $(".loading").show("slow");
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url()."procesar/grabar_ajax/"; ?>',
                    data: $("#demo-form").serialize(),
                    success: function(data) {

                        $(".ok_sms").show("slow");

                        if(data == "true") {
                            $(".loading").hide();

                            //setTimeout("window.location.href='http://45.55.138.105/servitotal/page_services.html'", 1500);


                        }else{

                            $(".fail_sms").show("slow");

                        }
                    }
                });


              });
});


// Activate Carousel



</script>



</body>
</html>
