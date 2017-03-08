        <div class="container">         
          <div class="row mb-xl">
            <div class="col-md-12 center">
              <br><br><h1 class="mb-xl"><strong><?php echo $titulo;?></strong></h1>
              <h4 class="word-rotator-title mb-sm"><strong></strong>Se caracteriza por ser una empresa que brinda a todos sus clientes.</h4>
              </div>
          </div>
        </div>
        <section class="call-to-action call-to-action-primary call-to-action-front mb-none">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="call-to-action-content align-left pb-md mb-xl ml-none">
                  <h2 class="text-color-light mb-none mt-xl"><?php echo $titulo_ofrece;?></strong></h2>
                  <p class="lead mb-xl"><?php echo $descripcion_ofrece;?></p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="container">
          <div class="row mt-xl mb-xl">
            <div class="col-md-3">
              <img class="img-responsive mt-xl appear-animation" src="<?php echo base_url();?>/img_servicios/<?php echo $servicios[0]->imagen;?>" alt="" data-appear-animation="fadeInLeft">
            </div>
            
            <div class="col-md-9">
              <h2 class="mt-xl">Servicio <strong><?php echo $servicios[0]->nombre;?></strong></h2>
              <p><?php echo $servicios[0]->sumilla;?></p>
              <div class="call-to-action-btn">
                <a id="btn_seccion" href="<?php echo base_url()."servicio/".$servicios[0]->seo;?>" class="btn btn-lg btn-primary mt-xl">
                Ver más 
                </a>
              </div>
            </div>
          </div>
        </div>
        <section class="section section-default">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <h2 class="mt-xl">Servicio <strong><?php echo $servicios[1]->nombre;?></strong></h2>
                <p>
                  <?php echo $servicios[0]->sumilla;?>
                </p>
                <div class="call-to-action-btn">
                  <a id="btn_seccion" href="<?php echo base_url()."servicio/".$servicios[1]->seo;?>" class="btn btn-lg btn-primary mt-xl">
                  Ver más 
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <img class="hidden-xs img-responsive appear-animation"  src="<?php echo base_url();?>/img_servicios/<?php echo $servicios[1]->imagen;?>" alt="" data-appear-animation="fadeInRight">
              </div>
            </div>
          </div>
        </section>
        <section class="call-to-action call-to-action-primary call-to-action-front mb-none">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="call-to-action-content align-left pb-md mb-xl ml-none">
                  <h2 class="text-color-light mb-none mt-xl"><?php echo $titulo_maquinarias;?></h2>
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php
           // var_dump($maquinarias);
            ?>
        <section class="section m-none" style="padding:0">
          <div class="container">
            <div class="row mt-lg wr-machine-ini" style="margin-top: 0px !important;">

              <?php
              foreach ($maquinarias as $value) {
                ?>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item-machine-ini">
                  <div class="row">
                    <div class="col-md-4">
                      <img class="img-responsive mb-lg" src="<?php echo base_url();?>/img_maquinarias/<?php echo $value->imagen;?>" alt="">
                    </div>
                    <div class="col-md-8">
                      <h4 class="mb-xs">Maquinaria (<?php echo $value->nombre;?>)</h4>
                      <p><?php echo $value->sumilla;?></p>
                      <p><a class="btn-flat btn-xs" href="<?php echo base_url()."maquinaria/".$value->seo;?>">Ver más <i class="fa fa-arrow-right"></i></a></p>
                    </div>
                  </div>
                </div>                
                <?php
              }
              ?>

            </div>
          </div>
        </section>