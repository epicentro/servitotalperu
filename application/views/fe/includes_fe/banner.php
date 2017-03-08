


<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">

    <?php
       if($banners!="0"){
            $c=0;
            
            foreach ($banners as $b){
              $active="";
                if($c==0)$active="active";
                ?>   

                <li data-target="#myCarousel" data-slide-to="<?php echo $c;?>" class="<?php echo $active;?>"></li>

                <?php
                $c++;
            }
        }
        ?>  

    
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php
       if($banners!="0"){
            $c=1;
            
            foreach ($banners as $b){
              $active="";
                if($c==1)$active="active";
                ?>    
                <div class="item <?php echo $active;?>">
                  <img src="<?php echo base_url()."img_banners/".$b->imagen; ?>" alt="Chania">
                </div>
                <?php
                $c++;
            }
        }
        ?>



  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
