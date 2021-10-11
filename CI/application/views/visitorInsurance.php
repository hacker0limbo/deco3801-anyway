<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>service"><?php echo $medicalInsurance?> </a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $visitors.' '; echo $medicalInsurance?> </li>
    </ol>
  </nav>
</div>


<div class="container my-5">
  <h1 style="text-align: center"><?php echo $visitors.' '; echo $medicalInsurance?> </h1>
  <hr class="my-3" style="margin: auto; width: 10%;">

  <div style="margin-top: 4em; margin-bottom: 5em;" >
    <h3><?php echo $OVHC?></h3>
    <hr class="my-3" style="margin: auto;">
    <p class="text-justify"><?php echo $OVHC_des ?></p>
  </div>

  <div style="margin-top: 1em; margin-bottom: 5em;" >
    <h3><?php echo $coverage?></h3>
    <hr class="my-3" style="margin: auto;">
    <p class="text-justify"><?php echo $coverage_des ?></p>
  </div>



  <div style="margin-top: 1em; margin-bottom: 5em;" >
    <h3><?php echo $purchase?></h3>
    <hr class="my-3" style="margin: auto;">
    <p class="text-justify"><?php echo $purchase_p1 ?></p>
    <p class="text-justify"><?php echo $purchase_p2 ?></p>
  </div>

</div>