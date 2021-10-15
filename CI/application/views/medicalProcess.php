<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>service"><?php echo $medicalService?> </a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $medicalProcess?> </li>
    </ol>
  </nav>
</div>

<div class="container my-5">
  <div class="row">
    <div class="col-md-3">
      <div class="toc position-sticky" style="top: 2rem; overflow: auto; text-align: center;">
        <ul class="list-group list-group-flush my-4" style="width: 220; ">
          <li class="list-group-item" style="background-color: #42A5F5; color:#FFFFFF;"><a href = "#medicalProcess" style="color:#FFFFFF;"><?php echo $medicalProcess?></a></li>
          <li class="list-group-item" style="background-color: #007bff; color:#FFFFFF;"><a href = "#nonEmergency" style="color:#FFFFFF;"><?php echo $nonEmergency?></a></li>
          <li class="list-group-item" style="background-color: #42A5F5; color:#FFFFFF;"><a href = "#emergency" style="color:#FFFFFF;"><?php echo $emergency?></a></li>
        </ul>
      </div>
    </div> 


    <div class="col-md-9">
      <h1 style="text-align: center" id="medicalProcess"><?php echo $medicalProcess?></h1>
      <hr class="my-3" style="margin: auto; width: 10%;">
      <div style="margin-top: 4em; margin-bottom: 5em;" >
        <h3 id="nonEmergency"><?php echo $nonEmergency?></h3>
        <hr class="my-3" style="margin: auto;">
        <p class="text-justify"><?php echo $nonEmergency_p1 ?></p>
        <p class="text-justify"><?php echo $nonEmergency_p2 ?></p>
        <p class="text-justify"><?php echo $nonEmergency_p3 ?></p>
      </div>

      <div style="margin-top: 1em; margin-bottom: 5em;" >
        <h3 id="emergency"><?php echo $emergency?></h3>
        <hr class="my-3" style="margin: auto;">
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

  </div>
</div>
