<div class="container my-5 text-center">
  <h1><?php echo $medicalInsurance?></h1>
  <hr class="my-3" style="margin: auto; width: 10%;">
  <p class="lead">
    <?php echo $medicalInsuranceIntro?>
  </p>
</div>

<div class="container" style="margin-bottom: 6rem;">
  <div class="row">
    <div class="col-md-4">
      <div class="card shadow-sm text-center">
        <img src="<?php echo base_url(); ?>assets/img/SymptomChecker_small.png" class="card-img-top" alt="student">
        <div class="card-body">
          <h5 class="card-title"><?php echo $students?></h5>
          <a href="<?php echo base_url(); ?>insurance/student" class="btn btn-outline-primary"><?php echo $students.' '; echo $medicalInsurance?></a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm text-center">
        <img src="<?php echo base_url(); ?>assets/img/OnlineBooking_small.png" class="card-img-top" alt="visitor">
        <div class="card-body">
          <h5 class="card-title"><?php echo $visitors?></h5>
          <a href="<?php echo base_url(); ?>insurance/visitor" class="btn btn-outline-primary"><?php echo $visitors.' '; echo $medicalInsurance?></a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm text-center">
        <img src="<?php echo base_url(); ?>assets/img/MedicalInsurances_small.png" class="card-img-top" alt="citizen">
        <div class="card-body">
          <h5 class="card-title"><?php echo $citizens?></h5>
          <a href="<?php echo base_url(); ?>insurance/citizen" class="btn btn-outline-primary"><?php echo $citizens.' '; echo $medicalInsurance?></a>
        </div>
      </div>
    </div>
  </div>
</div>

