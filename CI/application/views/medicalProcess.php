<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>service"><?php echo $medicalService?> </a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $medicalProcess?> </li>
    </ol>
  </nav>
</div>

<div class="container my-5 text-center">
  <h1><?php echo $medicalProcess?></h1>
  <hr class="my-3" style="margin: auto; width: 10%;">
  <div style="margin-top: 3em; margin-bottom: 3em;" >
    <h3><?php echo $nonEmergency?></h3>
    <hr class="my-3" style="margin: auto; width: 10%;">
    <p class="text-justify"><?php echo $nonEmergency_p1 ?></p>
    <p class="text-justify"><?php echo $nonEmergency_p2 ?></p>
    <p class="text-justify"><?php echo $nonEmergency_p3 ?></p>
  </div>

  <div style="margin-top: 3em; margin-bottom: 3em;" >
    <h3><?php echo $emergency?></h3>
    <hr class="my-3" style="margin: auto; width: 10%;">
    <p class="text-justify"><?php echo $emergency_p1 ?></p>
    <ul style="text-align: left; padding-left: 4em;">
      <li ><?php echo $emergency_p1_i1 ?></li>
      <li><?php echo $emergency_p1_i2 ?></li>
      <li><?php echo $emergency_p1_i3 ?></li>
      <li><?php echo $emergency_p1_i4 ?></li>
    </ul>
    <p class="text-justify"><?php echo $emergency_p2 ?></p>
    <p class="text-justify"><?php echo $emergency_p3 ?></p>
    <ul style="text-align: left; padding-left: 4em;">
      <li ><?php echo $emergency_p3_i1 ?></li>
      <li><?php echo $emergency_p3_i2 ?></li>
      <li><?php echo $emergency_p3_i3 ?></li>
      <li><?php echo $emergency_p3_i4 ?></li>
      <li><?php echo $emergency_p3_i5 ?></li>
    </ul>
  </div>


</div>
