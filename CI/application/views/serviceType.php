<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>service"><?php echo $medicalService?> </a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $serviceType?> </li>
    </ol>
  </nav>
</div>

<div class="container my-5 text-center">
  <div class="row">
    <div class="col-md-3">
      <div class="toc position-sticky" style="top: 2rem; overflow: auto;">
        <ul class="list-group list-group-flush my-4 border-right ">
          <li class="list-group-item">An item</li>
          <li class="list-group-item">A second item</li>
          <li class="list-group-item">A third item</li>
          <li class="list-group-item">A fourth item</li>
          <li class="list-group-item">And a fifth one</li>
        </ul>
      </div>
    </div> 

    <div class="col-md-9">
      <h1><?php echo $serviceType?></h1>
      <hr class="mt-4" style="margin: auto; width: 10%;">
      <div style="margin-top: 2em; margin-bottom: 2em;" >
        <p class="text-justify">
          <?php echo $p1 ?>
        </p>
        <p class="text-justify"><?php echo $p2?></p>
        <ul style="text-align: left; padding-left: 4em;">
          <li ><?php echo $p2_i1 ?></li>
          <li><?php echo $p2_i2 ?></li>
          <li><?php echo $p2_i3 ?></li>
          <li><?php echo $p2_i4 ?></li>
          <li><?php echo $p2_i5 ?></li>
          <li><?php echo $p2_i6 ?></li>
        </ul>
      </div>

      <div style="margin-top: 3em; margin-bottom: 3em;" >
        <h3><?php echo $gp_primary?></h3>
        <hr class="my-3" style="margin: auto; width: 10%;">
        <p class="text-justify"><?php echo $gp_primary_p1?></p>
      </div>

      <div style="margin-top: 3em; margin-bottom: 3em;" >
        <h3><?php echo $specialist?></h3>
        <hr class="my-3" style="margin: auto; width: 10%;">
        <p class="text-justify"><?php echo $specialist_p1?></p>
      </div>

      <div class="col-md-12" style="margin-top: 4em; margin-bottom: 3em;" >
          <h3><?php echo $differences_primary_specialist?></h3>

          <div class="border rounded p-4">
            <ul class="nav nav-tabs nav-fill mb-3" id="primaryTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="primary-tab" data-toggle="tab" href="#primary" role="tab" aria-controls="primary" aria-selected="true"><?php echo $primary_care?></a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="specialist-tab" data-toggle="tab" href="#specialist" role="tab" aria-controls="specialist" aria-selected="false"><?php echo $specialist_care?></a>
              </li>
            </ul>
            <div class="tab-content" id="primaryTabContent">
              <div class="tab-pane fade show active" id="primary" role="tabpanel" aria-labelledby="primary-tab">
                <p>
                  <?php echo $primary_care_des?>
                </p>
              </div>
              <div class="tab-pane fade" id="specialist" role="tabpanel" aria-labelledby="specialist-tab">
                <p>
                <?php echo $specialist_care_des?>
                </p>
              </div>
            </div>
            
          </div>
      </div>

      <div style="margin-top: 3em; margin-bottom: 3em;" >
        <h3><?php echo $allied?></h3>
        <hr class="my-3" style="margin: auto; width: 10%;">
        <p class="text-justify"><?php echo $allied_p1?></p>
      </div>

      <div style="margin-top: 3em; margin-bottom: 3em;" >
        <h3><?php echo $ed?></h3>
        <hr class="my-3" style="margin: auto; width: 10%;">
        <p class="text-justify"><?php echo $ed_p1?></p>
        <p class="text-justify" style="font-weight: bold;"><?php echo $ed_p2?></p>
      </div>

      <div style="margin-top: 3em; margin-bottom: 3em;" >
        <h3><?php echo $hospitals?></h3>
        <hr class="my-3" style="margin: auto; width: 10%;">
        <p class="text-justify"><?php echo $hospitals_p1?></p>
      </div>

      <div class="col-md-12" style="margin-top: 4em; margin-bottom: 3em;" >
          <h3><?php echo $differences_hospital_clinic?></h3>

          <div class="border rounded p-4">
            <ul class="nav nav-tabs nav-fill mb-3" id="clinicsTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="clinics-tab" data-toggle="tab" href="#clinics" role="tab" aria-controls="clinics" aria-selected="true"><?php echo $clinics?></a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="hospital_sector-tab" data-toggle="tab" href="#hospital_sector" role="tab" aria-controls="hospital_sector" aria-selected="false"><?php echo $hospital_sector?></a>
              </li>
            </ul>
            <div class="tab-content" id="clinicsTabContent">
              <div class="tab-pane fade show active" id="clinics" role="tabpanel" aria-labelledby="clinics-tab">
                <p>
                  <?php echo $clinics_des?>
                </p>
              </div>
              <div class="tab-pane fade" id="hospital_sector" role="tabpanel" aria-labelledby="hospital_sector-tab">
                <p>
                <?php echo $hospital_sector_des?>
                </p>
              </div>
            </div>
            
          </div>
      </div>

      <div style="margin-top: 3em; margin-bottom: 3em;" >
        <h3><?php echo $medicines?></h3>
        <hr class="my-3" style="margin: auto; width: 10%;">
        <p class="text-justify"><?php echo $medicines_p1?></p>
      </div>

    </div>
  </div>
</div>