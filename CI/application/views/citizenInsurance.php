<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>service"><?php echo $medicalInsurance?> </a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $citizens.' '; echo $medicalInsurance?> </li>
    </ol>
  </nav>
</div>

<div class="container my-5">
  <div class="row">
    <div class="col-md-3">
      <div class="toc position-sticky" style="top: 2rem; overflow: auto; text-align: center;">
        <ul class="list-group list-group-flush my-4" style="width: 220; ">
          <li class="list-group-item" style="background-color: #42A5F5; color:#FFFFFF;"><a href = "#citizenInsurance" style="color:#FFFFFF;"><?php echo $citizens.' '; echo $medicalInsurance?></a></li>
          <li class="list-group-item" style="background-color: #007bff; color:#FFFFFF;"><a href = "#medicare" style="color:#FFFFFF;"><?php echo $medicare?></a></li>
        </ul>
      </div>
    </div> 
    <div class="col-md-9">
      <h1 style="text-align: center" id="citizenInsurance"><?php echo $citizens.' '; echo $medicalInsurance?> </h1>
      <hr class="my-3" style="margin: auto; width: 10%;">

      <div style="margin-top: 4em; margin-bottom: 5em;" >
        <h3 id="medicare"><?php echo $medicare?></h3>
        <hr class="my-3" style="margin: auto;">
        <p class="text-justify"><?php echo $medicare_des1 ?></p>
        <p class="text-justify"><?php echo $medicare_des2 ?></p>
        <p class="text-justify"><?php echo $medicare_des3 ?></p>
      </div>

    </div>