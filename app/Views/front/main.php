<div class="container my-5" id="main">
<?php

use CodeIgniter\Database\Query;

                        $db = \Config\Database::connect();
                        if(session()->getFlashdata('logIN')):?>
                            <div class="justify-content-center alert alert-warning alert-dismissible fade show text-center" role="alert">
                                <strong><?php echo session()->get("nombre")?>!</strong> <?php echo session()->getFlashdata('logIN')?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                        <?php elseif(session()->getFlashdata('failed')):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="btn-close flex-row-reverse" data-bs-dismiss="alert"></button>
                                <?php echo session()->getFlashdata('failed') ?>
                            </div>
                    <?php endif; ?>




    <div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>

  <!-- The slideshow/carousel -->
  <div class="carousel-inner d-flex">
    <div class="carousel-item active">
      <img src="img/carrusel/1.jpg" alt="Nachitow" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="img/carrusel/2.jpg" alt="Apolo" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="img/carrusel/3.jpg" alt="Rollup" class="d-block w-100">
    </div>
  </div>

  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

