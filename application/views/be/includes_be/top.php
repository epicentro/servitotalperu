<div class="container" id="container"  >

        <div  id="header">
                <div id="profile_info">
                        <img src="<?php echo base_url(); ?>img/avatar.jpg" id="avatar" alt="avatar" />
                        <p>Bienvenido<strong> <?php echo $this->session->userdata("usuario"); ?></strong>. <a href="<?php echo base_url()."login/be_login/salir" ?>">Salir?</a></p>
                        <p>Google Apps <a href="http://mail.servitotalperu.com/" target="_blank" >Leer email?</a></p>
                        <p class="last_login">Fecha: <?php date_default_timezone_set('America/Bogota'); echo date("d-m-Y G:i:s"); ?></p>
                </div>
                <div id="logo"><h1><a href="<?php echo base_url()."be/" ?>">AdmintTheme</a></h1></div>
        </div><!-- end header -->
        
        