
<link rel="stylesheet" href="vue/style/slider.css"/>


<div id="carouselExampleFade" class="carousel slide carousel-fade w-75" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php
    
    $i = 0;
    foreach ($lesImages as $lImage) {
      $actives = '';
      if($i == 0){
        $actives ='active';
    }    
      ?>
    <div class="carousel-item <?= $actives; ?>">
      <?php echo "<img class='d-block w-100' src=".$lImage['adresse'].">"; ?>
        <div class="carousel-caption d-none d-md-block">
          <h5 id="titre_Img"><?php echo $lImage['titre'];  ?></h5>
        </div>
    </div>
   <?php
    $i++;
    } ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"  data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"  data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>

</div>

