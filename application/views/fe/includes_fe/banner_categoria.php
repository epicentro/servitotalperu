

                <section class="page-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="breadcrumb">
                                    <li><a href="<?php echo base_url();?>">Inicio</a></li>
                                    <?php   echo $this->be_categorias->recursivo_migajas_li($idcategoria_productos);?>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h1><?php echo $titulo; ?></h1>
                            </div>
                        </div>
                    </div>
                </section>    