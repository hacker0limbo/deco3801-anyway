<!-- Display only when new user sign up successfully -->
<?php if($this->session->flashdata('login')): ?>
    <?php 
    echo 
    '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">'
        . $this->session->flashdata('login')
        . ' '
        . '<strong>' . $this->session->userdata("username") . '</strong>'
        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
    .'</div>';
    ;?>
    <?php $this->session->unset_userdata('login'); ?>
<?php endif; ?>

<!-- carousel/slider -->
<div id="homepageCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#homepageCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#homepageCarousel" data-slide-to="1"></li>
        <li data-target="#homepageCarousel" data-slide-to="2"></li>
        <li data-target="#homepageCarousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo base_url(); ?>assets/img/OnlineBooking.png" class="d-block w-100" alt="slider0">
            <div class="container">
                <div class="carousel-caption text-left" style="bottom: 50px;">
                    <h1><?php echo $findDoctorh11 ?></h1>
                    <h1><?php echo $findDoctorh12 ?></h1>
                    <p style="margin-top: 2rem;">
                        <a class="btn btn-lg btn-info homepage-button" href="<?php echo base_url(); ?>booking"><?php echo $onlineBooking ?></a>
                    </p>
                </div>
            </div>
        </div>
        
        <div class="carousel-item">
            <img src="<?php echo base_url(); ?>assets/img/MedicalInsurances.png" class="d-block w-100" alt="slider1">
            <div class="container">
                <div class="carousel-caption text-left" style="bottom: 50px;">
                    <h1><?php echo $medicalInfoh11 ?></h1>
                    <h1><?php echo $medicalInfoh12 ?></h1>
                    <p style="margin-top: 2rem;">
                        <a class="btn btn-lg btn-info homepage-button" href="<?php echo base_url(); ?>service"><?php echo $medicalService?></a>
                        <a class="btn btn-lg btn-info homepage-button" href="<?php echo base_url(); ?>insurance"><?php echo $medicalInsurance?></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url(); ?>assets/img/SymptomChecker.png" class="d-block w-100" alt="slider2">
            <div class="container">
                <div class="carousel-caption text-left" style="bottom: 50px;">
                    <h1><?php echo $symptomCheckerh11 ?></h1>
                    <h1><?php echo $symptomCheckerh12 ?></h1>
                    <p style="margin-top: 2rem;">
                        <a class="btn btn-lg btn-info homepage-button" href="<?php echo base_url(); ?>checker"><?php echo $symptomChecker?></a>
                    </p>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <img src="<?php echo base_url(); ?>assets/img/MedicalServices.png" class="d-block w-100" alt="slider3">
            <div class="container">
                <div class="carousel-caption text-left" style="bottom: 50px;">
                    <h1><?php echo $liveChath11 ?></h1>
                    <h1><?php echo $liveChath12 ?></h1>
                    <p style="margin-top: 2rem;">
                        <a class="btn btn-lg btn-info homepage-button" href="<?php echo base_url(); ?>checker/livechat"><?php echo $liveChat?></a>
                    </p>
                </div>
            </div>
        </div>

    </div>
    <a class="carousel-control-prev" href="#homepageCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#homepageCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container my-5 text-center" style="padding-left:0px; padding-right:0px; margin: auto;">
    <h1 style="margin-top: 2em;"><?php echo $welcomeMessage ?></h1>
	<hr class="my-3" style="width: 100%; height:2px; color:transparent; background-image:linear-gradient(to right, #CAE1FF, #ADD8E6, #42C0FB, #1D7CF2, #27408B)">
	<p class="lead" style="width:100%; text-align: left; margin-top: 2em; margin-bottom: 2em;">
        <?php echo $introduction?>
    </p>
</div>

<!-- router cards -->
<div class="container mb-5" style="padding-left:0px; padding-right:0px; margin: auto;">
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm text-center h-100">
                <img src="<?php echo base_url(); ?>assets/img/SymptomChecker_small.png" class="card-img-top" alt="symptom checker">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $symptomChecker?></h5>
                    <p class="card-text"><?php echo $symptomCheckerh11; echo $symptomCheckerh12?></p>
                    <a href="<?php echo base_url(); ?>checker" class="btn btn-outline-primary"><?php echo $readMore?></a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center h-100">
                <img src="<?php echo base_url(); ?>assets/img/OnlineBooking_small.png" class="card-img-top" alt="online booking">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $onlineBooking?></h5>
                    <p class="card-text"><?php echo $findDoctorh11; echo $findDoctorh12 ?></p>
                    <a style="margin-top:20px;" href="<?php echo base_url(); ?>booking" class="btn btn-outline-primary"><?php echo $readMore?></a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center h-100">
                <img src="<?php echo base_url(); ?>assets/img/MedicalServices_small.png" class="card-img-top" alt="medical service">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $medicalService?></h5>
                    <p class="card-text"><?php echo $medicalServiceDes?> </p>
                    <a style="margin-top:0;" href="<?php echo base_url(); ?>service" class="btn btn-outline-primary"><?php echo $readMore?></a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center h-100">
                <img src="<?php echo base_url(); ?>assets/img/MedicalInsurances_small.png" class="card-img-top" alt="medical insurance">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $medicalInsurance?></h5>
                    <p class="card-text"><?php echo $medicalInsuranceDes?></p>
                    <a style="margin-top:20px;" href="<?php echo base_url(); ?>insurance" class="btn btn-outline-primary"><?php echo $readMore?></a>
                </div>
            </div>
        </div>
    </div>
</div>