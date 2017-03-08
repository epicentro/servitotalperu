<div class="section-empty">
        <div class="container content">
            <div class="row">
                <div class="col-md-12">
                    <div class="grid-list one-row-list">
                        <div class="grid-box">



                    <div class="grid-item">
                                <div class="advs-box advs-box-side-img" data-anima="scale-rotate" data-trigger="hover">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a class="img-box" href="#">
                                                <img class="anima" src="<?php echo base_url()."img_articulos/".$imagen; ?>" alt="" />
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            <h2><a href="#"><?php echo $nombre; ?></a></h2>
                                            <hr>
                                            <div class="tag-row icon-row">
                                                <span><i class="fa fa-calendar"></i><?php echo $this->be_funciones->formato_fecha($fecha); ?></span>
                                                <span><i class="fa fa-pencil"></i>Admin</span>
                                                
                                            </div>
                                            <p>
                                                <?php echo $descripcion; ?>
                                            </p>
                                            <a class="anima-button circle-button btn-sm" href="javascript:window.history.back()"><i class="fa fa-long-arrow-right"></i>Regresar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                        </div><!--grid-box-->
                    </div>
                </div>
            </div>
        </div>
    </div>                            