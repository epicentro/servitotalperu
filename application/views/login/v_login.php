<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
	<meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
	<!--[if IE]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection" /><![endif]-->
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/style.css" />
     <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/login_personal.css" />

	<link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>css/smoothness/jquery-ui-1.7.1.custom.css"  />
	<!--[if IE]>
		<style type="text/css">
		  .clearfix {
		    zoom: 1;     /* triggers hasLayout */
		    display: block;     /* resets display for IE/Win */
		    }  /* Only IE can see inside the conditional comment
		    and read this CSS rule. Don't ever use a normal HTML
		    comment inside the CC or it will close prematurely. */
		</style>
	<![endif]-->
	<!-- JavaScript -->
    <!--
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.7.1.custom.min.js"></script>
    -->



	</head>
	 <!--[if IE]><script language="javascript" type="text/javascript" src="excanvas.pack.js"></script><![endif]-->
</head>
<body>
<div  id="login_container">
    <div  id="header">

		<div id="logo1"><h1><a href="/">AdmintTheme</a></h1></div>

    </div><!-- end header -->

	    <div id="login" class="section">

           <?php if(isset($error) && $error==1){ ?>
            <div id="fail" class="info_div" ><span class="ico_cancel">Usuario o contraseña incorrecta!</span></div>
           <?php } ?>
            
	    	<form name="loginform" id="loginform" action="<?php echo base_url();?>login/be_login/validar" method="post">

			<label><strong>Usuario</strong></label><input type="text" name="txt_user" id="txt_user"  size="28" class="input" />
			<br />
			<label><strong>Contraseña</strong></label><input type="password" name="txt_pwd" id="txt_pwd"  size="28" class="input"/>


			<br />

			<input id="save"  type="submit" class="submit" value="Ingresar" />


			</form>
            
            <span style="color:#900;">
			<?php 
			       echo $this->session->userdata("men_login");
				   $this->session->unset_userdata("men_login");
			?>
            </span>  
	    </div>





</div><!-- end container -->

</body>
</html>
