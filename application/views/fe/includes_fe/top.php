

      <header id="header" data-plugin-options="{&quot;stickyEnabled&quot;: true, &quot;stickyEnableOnBoxed&quot;: true, &quot;stickyEnableOnMobile&quot;: true, &quot;stickyStartAt&quot;: 57, &quot;stickySetTop&quot;: &quot;-28px&quot;, &quot;stickyChangeLogo&quot;: true}" style="min-height: 171px;">
          <div class="header-top header-top-colored header-top-primary">
            <div class="container">
              <div class="nav navbar-nav navbar-left">
                  <span><i class="fa fa-phone"></i><?php echo $this->be_parametros->valor("telefono_frontis"); ?></span>
                  <hr>
                  <span><i class="fa fa-mobile"></i><?php echo $this->be_parametros->valor("celular_frontis"); ?> <i class="fa fa-whatsapp"></i></span>
                  <hr>
                  <span><a href="mailto:<?php echo $this->be_parametros->valor("correo_contacto"); ?>"><i class="fa fa-envelope-o"></i><?php echo $this->be_parametros->valor("correo_contacto"); ?></a></span>
              </div>            
              <ul class="header-social-icons social-icons hidden-xs">
                <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        <div class="header-body" style="top: 0px;">               
          <div class="header-container container">
            <div class="header-row">
              <div class="header-column">
                <div class="header-logo" style="width: 295px; height: 118px;">
                  <a href="http://www.servitotalperu.com/">
                    <img alt="Servitotal" data-sticky-width="200" data-sticky-height="63" data-sticky-top="43" src="<?php echo base_url();?>img/logo_fe.png" style="top: 0px; width: 280px; height: 88px;" width="280" height="88">
                  </a>
                </div>
              </div>
              <div class="header-column">

                <div class="header-row">
                  <div class="header-nav">
                    <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                      <i class="fa fa-bars"></i>
                    </button>                 
                    <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                      <nav>
                        <ul class="nav nav-pills" id="mainNav">
                          <li class="dropdown <?php if(isset($current) and $current=="inicio"){echo "active";}?>">
                            <a href="<?php echo base_url();?>">
                              Inicio
                            </a>
                          </li>
                          <?php
                          //var_dump($this->cat_productos);
                          ?>
                          <li class="dropdown <?php if(isset($current) and $current=="productos"){echo "active";}?>">
                            <a class="dropdown-toggle" href="<?php echo base_url();?>categoria/productos">
                              Productos
                            </a>
                            <?php
                            if($this->cat_productos){?>
                              <ul class="dropdown-menu">
                              <?php
                                foreach($this->cat_productos as $cat_menu){

                                  $strsql="select idcategoria_productos,nombre, seo  from categoria_productos where idsw='1' and  padre_id='$cat_menu->idcategoria_productos' order by orden";
                                  $menu_top_p=$this->modelo_base->consulta($strsql);

                                  if($menu_top_p<>0){?>
                                    <li class="dropdown-submenu">
                                      <a href="<?php echo base_url();?>categoria/<?php echo $cat_menu->seo;?>"><?php echo $cat_menu->nombre;?></a>
                                      <ul class="dropdown-menu">
                                        <?php 
                                        foreach($menu_top_p as $mtp){
                                          $strsql="select idcategoria_productos,nombre, seo  from categoria_productos where idsw='1' and padre_id='$mtp->idcategoria_productos' order by orden";
                                          $menu_top_pp=$this->modelo_base->consulta($strsql);
                                          if($menu_top_pp<>0){
                                            ?>    
                                            <li class="dropdown-submenu">
                                              <a href="<?php echo base_url();?>categoria/<?php echo $mtp->seo;?>"><?php echo $mtp->nombre;?></a>
                                              <ul class="dropdown-menu"><?php
                                              foreach ($menu_top_pp as $mtpp){                                        

                                                $strsql="select idcategoria_productos,nombre, seo  from categoria_productos where idsw='1' and padre_id='$mtpp->idcategoria_productos' order by orden";
                                                $menu_top_ppp=$this->modelo_base->consulta($strsql);
                                                if($menu_top_ppp<>0){
                                                  ?>    
                                                  <li class="dropdown-submenu">
                                                    <a href="<?php echo base_url();?>categoria/<?php echo $mtpp->seo;?>"><?php echo $mtpp->nombre;?></a>
                                                    <ul class="dropdown-menu"><?php
                                                    foreach ($menu_top_ppp as $mtppp){                                        
                                                      ?> 
                                                      <li><a href="<?php echo base_url();?>categoria/<?php echo $mtppp->seo;?>"><?php echo $mtppp->nombre;?></a>
                                                      </li>                       
                                                      <?php
                                                    }?>
                                                    </ul>
                                                  </li>
                                                  <?php
                                                }else{?>
                                                  <li>
                                                    <a href="<?php echo base_url();?>categoria/<?php echo $mtpp->seo;?>"><?php echo $mtpp->nombre;?></a>
                                                  </li>
                                                  <?php
                                                }                      
                                              }?>
                                              </ul>
                                            </li>
                                            <?php
                                          }else{?>
                                            <li>
                                              <a href="<?php echo base_url();?>categoria/<?php echo $mtp->seo;?>"><?php echo $mtp->nombre;?></a>
                                            </li>
                                            <?php
                                          }
                                        }?>
                                      </ul>
                                    </li>
                                    <?php
                                  }else{?>
                                    <li class="">
                                      <a href="<?php echo base_url();?>categoria/<?php echo $cat_menu->seo;?>"><?php echo $cat_menu->nombre;?></a>
                                    </li>
                                    <?php 
                                  }
                                }
                                ?>
                              </ul>
                                <?php
                              }
                              ?>                              
                          </li>

                          <li class="dropdown <?php if(isset($current) and $current=="servicios"){echo "active";}?>">
                            <a class="dropdown-toggle" href="<?php echo base_url();?>categoria-servicios/servicios">
                              Servicios
                            </a>
                            <?php
                            if($this->servicios2){?>
                              <ul class="dropdown-menu">
                              <?php
                                foreach($this->servicios2 as $cat_menu){
                                    ?>
                                    <li>
                                      <a href="<?php echo base_url()."servicio/".$cat_menu->seo;?>"><?php echo $cat_menu->nombre;?></a>
                                       
                                    </li>
                                    <?php
                                  }
                                  ?>
                              </ul>
                              <?php
                            }
                            ?>                              
                          </li>
                          <li class="dropdown <?php if(isset($current) and $current=="maquinarias"){echo "active";}?>">
                            <a class="dropdown-toggle" href="<?php echo base_url();?>categoria-maquinaria/maquinarias">
                              Maquinarias
                            </a>
                            <?php
                            if($this->maquinarias2){?>
                              <ul class="dropdown-menu">
                              <?php
                                foreach($this->maquinarias2 as $cat_menu){
                                    ?>
                                    <li>
                                      <a href="<?php echo base_url()."maquinaria/".$cat_menu->seo;?>"><?php echo $cat_menu->nombre;?></a>
                                       
                                    </li>
                                    <?php
                                  }
                                  ?>
                              </ul>
                              <?php
                            }
                            ?>                              
                          </li>

                          <li class="dropdown <?php if(isset($current) and $current=="nosotros"){echo "active";}?>">
                                                        <a href="<?php echo base_url();?>nosotros">
                                                            Nosotros
                                                        </a>
                                                    </li>
                          <li class="dropdown <?php if(isset($current) and $current=="clientes"){echo "active";}?>">
                                                        <a href="<?php echo base_url();?>clientes">
                                                            Clientes
                                                        </a>
                                                    </li>
                          <li class="dropdown <?php if(isset($current) and $current=="contacto"){echo "active";}?>">
                            <a href="<?php echo base_url();?>contacto/">
                              Contáctanos
                            </a>
                          </li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header> 
      <div role="main" class="main">   