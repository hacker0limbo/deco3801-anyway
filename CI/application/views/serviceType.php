<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>service"><?php echo $medicalService?> </a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $serviceType?> </li>
    </ol>
  </nav>
</div>

<div class="container my-5 text-center">
  <h1><?php echo $serviceType?></h1>
  <hr class="my-3" style="margin: auto; width: 10%;">
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


<!-- 

  <h1>Clinic or Surgery</h1>
  <hr class="my-3" style="margin: auto; width: 10%;">
  <p class="lead">
    What we will do what we will do what we will do what we will do what we will do.
  </p>
  <p class="text-justify">
    Clinic is a place where outpatients are provided medical treatment, 
    checkup or advice for their health. Clinic was derived from the Greek word ‘Klinein’, 
    meaning to ‘slope, lean or recline’. An outpatient means they go to a clinic for diagnosis, treatment, 
    or therapy and then leave without staying all night. 
    It is a  kind of hospital department; where a doctor visits to talk to people about their particular health matter.  
    The patient discusses their problem with the doctor and the doctor may pescribe them medicines. 
    A clinic  is usually run for about 4 to 5 hours a day.
  </p>
</div>

<div class="container" style="margin-bottom: 6rem;">
  <div class="row">
    <div class="col-md-6">
      <h3>Have an Appointment</h3>
      <p class="lead text-secondary">
        How to have an appointment for a clinic surgery
      </p>
      
      <div class="border rounded p-4">
        <div class="accordion" id="clinicAccordion">
          <div class="card">
            <div class="card-header bg-white" id="clinicBookHeader">
              <h2 class="mb-0">
                <div class="btn btn-block text-left text-primary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Book a Doctor
                </div>
              </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="clinicBookHeader" data-parent="#clinicAccordion">
              <div class="card-body">
                Whether you are just checking to make sure things are on track, 
                or have a specific symptom you are concerned about, 
                choosing your doctor is the first step.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header bg-white" id="clinicSetHeader">
              <h2 class="mb-0">
                <div class="btn btn-block text-left text-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Set Your Goals
                </div>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="clinicSetHeader" data-parent="#clinicAccordion">
              <div class="card-body">
                Some placeholder content for the second accordion panel. This panel is hidden by default.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header bg-white" id="clinicWaitHeader">
              <h2 class="mb-0">
                <div class="btn btn-block text-left text-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Waiting Room
                </div>
              </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="clinicWaitHeader" data-parent="#clinicAccordion">
              <div class="card-body">
                And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <div class="col-md-6">
      <h3>Differences</h3>
      <p class="lead text-secondary">
        Differences between clinic and hospital
      </p>

      <div class="border rounded p-4">
        <ul class="nav nav-tabs nav-fill mb-3" id="clinicTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="clinic-tab" data-toggle="tab" href="#clinic" role="tab" aria-controls="clinic" aria-selected="true">Clinic</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="hospital-tab" data-toggle="tab" href="#hospital" role="tab" aria-controls="hospital" aria-selected="false">Hospital</a>
          </li>
        </ul>
        <div class="tab-content" id="clinicTabContent">
          <div class="tab-pane fade show active" id="clinic" role="tabpanel" aria-labelledby="clinic-tab">
            <p>
              Clinic can also be privately functioned or publicly handled and financed, 
              and it can characteristically cover the primarily health care needs of populations in local communities. 
              Clinics are frequently linked with a general medical practice, run by one or several general practitioners. 
              Some clinics are also operated in-house by employers or government organizations.
            </p>
          </div>
          <div class="tab-pane fade" id="hospital" role="tabpanel" aria-labelledby="hospital-tab">
            <p>
              Hospital...
            </p>
          </div>
        </div>
        
      </div>
    </div> -->
  </div>
</div>