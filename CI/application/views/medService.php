<div class="container my-5 text-center">
  <h1><?php echo $medicalService?></h1>
  <hr class="my-3" style="margin: auto; width: 10%;">
  <p>
    <?php echo $medicalServiceIntro ?>
  </p>
</div>

<div class="container" style="margin-bottom: 6rem;">
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow-sm text-center">
        <img src="<?php echo base_url(); ?>assets/img/placeholder.jpeg" class="card-img-top" alt="clinic">
        <div class="card-body">
          <h5 class="card-title"><?php echo $serviceType?></h5>
          <p class="card-text"><?php echo $serviceTypeDes?></p>
          <a href="<?php echo base_url(); ?>service/servicetype" class="btn btn-outline-primary"><?php echo $readMore?></a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card shadow-sm text-center">
        <img src="<?php echo base_url(); ?>assets/img/placeholder.jpeg" class="card-img-top" alt="medical centre">
        <div class="card-body">
          <h5 class="card-title"><?php echo $medicalProcess?></h5>
          <p class="card-text"><?php echo $medicalProcessDes?></p>
          <a href="<?php echo base_url(); ?>service/medicalProcess" class="btn btn-outline-primary"><?php echo $readMore?></a>
        </div>
      </div>
    </div>
  </div>
</div>

