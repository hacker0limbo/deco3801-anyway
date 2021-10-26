<div class="container" style="margin:0 !important; padding-left:0;">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>insurance"><?php echo $medicalInsurance?> </a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $citizens.' '; echo $medicalInsurance?> </li>
    </ol>
  </nav>
</div>

<div class="container my-6" style="margin: 0 !important; max-width: max-content;">
  <div class="row">
    <div class="col-md-2" style="max-width:260px; padding: 0 !important;">
      <div class="toc position-sticky" style="top: 2rem; overflow: auto; text-align: center;">
        <ul class="list-group list-group-flush my-4" style="width: 220; margin-top:0 !important; background-color:#42A5F5; height:100%;">
          <li class="list-group-item" style="background-color: #007bff; color:#FFFFFF;"><a href = "#citizenInsurance" style="color:#FFFFFF;"><?php echo $citizens.' '; echo $medicalInsurance?></a></li>
          <li class="list-group-item" style="background-color: #007bff; color:#FFFFFF;"><a href = "#medicare" style="color:#FFFFFF;"><?php echo $medicare?></a></li>
        </ul>
      </div>
    </div> 

    <div class="col-md-9" style="padding-left:40px; padding-right:40px; flex:auto; width:990px; max-width:990px;">
      <h1 style="text-align: center" id="citizenInsurance"><?php echo $citizens.' '; echo $medicalInsurance?> </h1>
      <hr class="mt-4" style="margin: auto; width: 10%;">

      <div style="margin-top: 4em; margin-bottom: 5em;" >
        <h3 id="medicare"><?php echo $medicare?></h3>
        <hr class="my-3" style="margin: auto;">
        <p class="text-justify"><?php echo $medicare_des1 ?></p>
        <p class="text-justify"><?php echo $medicare_des2 ?></p>
        <p class="text-justify"><?php echo $medicare_des3 ?></p>
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