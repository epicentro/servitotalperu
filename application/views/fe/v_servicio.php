				<div class="container">

					<h2>Servicio <strong><?php echo $titulo; ?></strong></h2>

					<div class="row">
						<div class="col-md-6">
							<p class="lead">
								<?php echo $sumilla; ?>
							</p>
						</div>
						<div class="col-md-6">
							<section class="call-to-action call-to-action-secondary mb-xl">
								<div class="call-to-action-content">
									<p>¿Te gusta lo que ofrecemos? <strong> ¡QUE BIEN!</strong>
									<h3>No esperes más<strong> SOLICÍTALO </strong></h3></p>
								</div>
								<div class="call-to-action-btn">
									<a id="btn_seccion" href="#" class="btn btn-lg btn-primary mt-xl pull-right" data-toggle="modal" data-target="#formModal"><i class="fa fa-envelope"></i> AQUÍ <i class="fa fa-envelope"></i></a><span class="arrow hlb hidden-xs hidden-sm hidden-md" data-appear-animation="rotateInUpLeft" style="top: -94px;"></span>
								</div>
							</section>
							<img src="<?php echo base_url()."img/whatsapp.png"; ?>">
                            <span style="font-size: 18px;margin-left: 10px; font-weight: bold;"><?php echo $this->be_parametros->valor("celular_frontis"); ?></span>
						</div>
					</div>

					<hr>
<!-- 
					<div class="featured-boxes">
						<div class="row">

							<div class="col-md-4 col-sm-6">
								<div class="featured-box featured-box-primary featured-box-effect-1 mt-xlg">
									<div class="box-content">
										<i class="icon-featured fa fa-user"></i>
										<h4 class="text-uppercase">Personal Calificado</h4>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="featured-box featured-box-secondary featured-box-effect-1 mt-xlg">
									<div class="box-content">
										<i class="icon-featured fa fa-book"></i>
										<h4 class="text-uppercase">Atendemos tus necesidades</h4>

									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="featured-box featured-box-tertiary featured-box-effect-1 mt-xlg">
									<div class="box-content">
										<i class="icon-featured fa fa-trophy"></i>
										<h4 class="text-uppercase">Calidad de Servicio</h4>

									</div>
								</div>
							</div>
						</div>
					</div> -->

					<div class="row mb-xlg">
						<div class="col-sm-7">
							<h2><strong>Descripción</strong></h2>

							<p class="mt-xlg">
								 <?php echo $descripcion;?>
							</p>
							<br><br><br>

						</div>
						<div class="col-sm-4 col-sm-offset-1 mt-xlg">
							<img class="img-responsive mt-xlg" src='<?php echo base_url()."img_servicios/".$imagenes[0]->imagen; ?>' alt="">
						</div>
						<br>

						<?php
						
						if(trim($video)<>""){?>
							<div class="col-xs-12 col-sm-12 col-md-11 col-md-offset-1">
								<iframe class="new_video"
								src="<?php echo $video;?>" allowfullscreen></iframe>
								<br><br><br>
							</div>
							<?php
						}
						?>
					</div>
					<a href="javascript: history.back()" class="btn btn-lg btn-primary mt-xl pull-right">Volver</a>
				</div>


<?php echo $formulario_modal;?>			