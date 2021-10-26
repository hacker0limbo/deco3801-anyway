<div class="container" style="margin:0 !important; padding-left:0;">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>service"><?php echo $medicalService?> </a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $serviceType?> </li>
    </ol>
  </nav>
</div>

<div class="container my-6" style="margin: 0 !important; max-width: max-content;">
  <div class="row">
    <div class="col-md-2" style="max-width:260px; padding: 0 !important;">
      <div class="toc" style="top: 2rem; overflow: auto; text-align: left;">
        <ul class="list-group list-group-flush my-4" style="width: 220; margin-top:0 !important; background-color:#42A5F5; height:100%;">
          <li class="list-group-item" style="background-color: #007bff; color:#FFFFFF;"><a href = "#serviceType" style="color:#FFFFFF; font-weight:bold;"><?php echo $serviceType?></a></li>
          <li class="list-group-item" style="background-color: #007bff; color:#FFFFFF;"><a href = "#gp_primary" style="color:#FFFFFF;"><?php echo $gp_primary?></a></li>
          <li class="list-group-item" style="background-color: #007bff; color:#FFFFFF;"><a href = "#specialist" style="color:#FFFFFF;"><?php echo $specialist?></a></li>
          <li class="list-group-item" style="background-color: #007bff; color:#FFFFFF;"><a href = "#differences_primary_specialist" style="color:#FFFFFF;"><?php echo $differences_primary_specialist?></a></li>
          <li class="list-group-item" style="background-color: #007bff; color:#FFFFFF;"><a href = "#allied" style="color:#FFFFFF;"><?php echo $allied?></a></li>
          <li class="list-group-item" style="background-color: #007bff; color:#FFFFFF;"><a href = "#ed" style="color:#FFFFFF;"><?php echo $ed?></a></li>
          <li class="list-group-item" style="background-color: #007bff; color:#FFFFFF;"><a href = "#hospitals" style="color:#FFFFFF;"><?php echo $hospitals?></a></li>
          <li class="list-group-item" style="background-color: #007bff; color:#FFFFFF;"><a href = "#differences_hospital_clinic" style="color:#FFFFFF;"><?php echo $differences_hospital_clinic?></a></li>
          <li class="list-group-item" style="background-color: #007bff; color:#FFFFFF;"><a href = "#medicines" style="color:#FFFFFF;"><?php echo $medicines?></a></li>
        </ul>
      </div>
    </div> 

    <div class="col-md-9" style="padding-left:40px; padding-right:40px; flex:auto; width:990px; max-width:990px;">
      <h1 style="text-align: center;" id='serviceType'><?php echo $serviceType?></h1>
      <hr class="mt-4" style="margin: auto; width: 10%;">
      <div style="margin-top: 1em; margin-bottom: 5em;" >
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

      <div style="margin-top: 1em; margin-bottom: 5em;" >
        <h3 id="gp_primary"><?php echo $gp_primary?></h3>
        <hr class="my-3" style="margin: auto;">
        <p class="text-justify"><?php echo $gp_primary_p1?></p>
      </div>

      <div style="margin-top: 1em; margin-bottom: 5em;" >
        <h3 id="specialist"><?php echo $specialist?></h3>
        <hr class="my-3" style="margin: auto;">
        <p class="text-justify"><?php echo $specialist_p1?></p>
      </div>

      <div class="col-md-12" style="margin-top: 1em; margin-bottom: 5em; padding-left:0px; padding-right:0px;" >
          <h3 id="differences_primary_specialist"><?php echo $differences_primary_specialist?></h3>

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

      <div style="margin-top: 1em; margin-bottom: 5em;" >
        <h3 id = "allied"><?php echo $allied?></h3>
        <hr class="my-3" style="margin: auto;">
        <p class="text-justify"><?php echo $allied_p1?></p>
      </div>

      <div style="margin-top: 1em; margin-bottom: 5em;" >
        <h3 id ="ed"><?php echo $ed?></h3>
        <hr class="my-3" style="margin: auto;">
        <p class="text-justify"><?php echo $ed_p1?></p>
        <p class="text-justify" style="font-weight: bold;"><?php echo $ed_p2?></p>
      </div>

      <div style="margin-top: 1em; margin-bottom: 5em;" >
        <h3 id="hospitals"><?php echo $hospitals?></h3>
        <hr class="my-3" style="margin: auto;">
        <p class="text-justify"><?php echo $hospitals_p1?></p>
      </div>

      <div class="col-md-12" style="margin-top: 1em; margin-bottom: 5em; padding-left:0px; padding-right:0px;" >
          <h3 id="differences_hospital_clinic"><?php echo $differences_hospital_clinic?></h3>

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

      <div style="margin-top: 1em; margin-bottom: 5em;" >
        <h3 id="medicines"><?php echo $medicines?></h3>
        <hr class="my-3" style="margin: auto; width: 10%;">
        <p class="text-justify"><?php echo $medicines_p1?></p>
      </div>


      <div style="margin-top: 4em; margin-bottom: 5em;" >
        <h3 id="nonEmergency">Reference</h3>
        <hr class="my-3" style="margin: auto;">
        <p>
          A Doctor’s Guide to a Good Appointment. (2021). Retrieved 26 October 2021, from https://www.nytimes.com/guides/well/make-the-most-of-your-doctor-appointment
        </p>

        <p>
          Australia, A. (2021). 海外学生医疗保险 (OSHC). Retrieved 26 October 2021, from https://www.allianzcare.com.au/zh/student-visa-oshc.html
        </p>

        <p>
          Difference between Hospital and Clinic | Hospital vs Clinic. (2021). Retrieved 26 October 2021, from http://www.differencebetween.info/difference-between-hospital-and-clinic
        </p>

        <p>
          How to Get Medical Treatment in Australia - Health Guide. (2021). Retrieved 26 October 2021, from https://www.australia-backpackersguide.com/medical-treatment-australia/
        </p>

        <p>
          Migration – 信为移民咨询. (2021). Retrieved 26 October 2021, from https://swmigration.com/cn/migration/
        </p>

        <p>
          Oscar | Smart, simple health insurance. (2021). Retrieved 26 October 2021, from https://www.hioscar.com/faq/pcp-vs-specialist
        </p>

        <p>
          The Australian Health System. (2021). Retrieved 26 October 2021, from https://www.health.gov.au/about-us/the-australian-health-system
        </p>

        <p>
          澳大利亚的全科医学服务体系简介及启示. (2021). Retrieved 26 October 2021, from http://rs.yiigle.com/CN114798201412/598815.htm
        </p>
      </div>


    </div>
  </div>
</div>