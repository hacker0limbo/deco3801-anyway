<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>service"><?php echo $medicalInsurance?> </a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $visitors.' '; echo $medicalInsurance?> </li>
    </ol>
  </nav>
</div>

<div class="container my-5">
  <div class="row">
    <div class="col-md-3">
      <div class="toc position-sticky" style="top: 2rem; overflow: auto; text-align: center;">
        <ul class="list-group list-group-flush my-4" style="width: 220; ">
          <li class="list-group-item" style="background-color: #42A5F5; color:#FFFFFF;"><a href = "#visiterInsurance" style="color:#FFFFFF;"><?php echo $visitors.' '; echo $medicalInsurance?></a></li>
          <li class="list-group-item" style="background-color: #007bff; color:#FFFFFF;"><a href = "#OVHC" style="color:#FFFFFF;"><?php echo $OVHC?></a></li>
          <li class="list-group-item" style="background-color: #42A5F5; color:#FFFFFF;"><a href = "#coverage" style="color:#FFFFFF;"><?php echo $coverage?></a></li>
          <li class="list-group-item" style="background-color: #007bff; color:#FFFFFF;"><a href = "#purchase" style="color:#FFFFFF;"><?php echo $purchase?></a></li>
        </ul>
      </div>
    </div> 


    <div class="col-md-9">
      <h1 style="text-align: center" id="visiterInsurance"><?php echo $visitors.' '; echo $medicalInsurance?> </h1>
      <hr class="my-3" style="margin: auto; width: 10%;">

      <div style="margin-top: 4em; margin-bottom: 5em;" >
        <h3 id="OVHC"><?php echo $OVHC?></h3>
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
</div>
</div>