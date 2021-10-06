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
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo base_url(); ?>assets/img/homepage-slider0.png" class="d-block w-100" alt="slider0">
            <div class="container">
                <div class="carousel-caption text-left">
                    <h1>Simple and fast new mode,</h1>
                    <h1>appointment is no longer limited</h1>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#">Make a appointment</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url(); ?>assets/img/homepage-slider0.png" class="d-block w-100" alt="slider1">
            <div class="container">
                <div class="carousel-caption text-left">
                    <h1>Second slide</h1>
                    <h1>Second slide...</h1>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#">Second Button</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url(); ?>assets/img/homepage-slider0.png" class="d-block w-100" alt="slider2">
            <div class="container">
                <div class="carousel-caption text-left">
                    <h1>Third slide</h1>
                    <h1>Third slide...</h1>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#">Third Button</a>
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

<div class="container my-5 text-center">
    <h1>Welcome to Anyway</h1>
    <hr class="my-3" style="margin: auto; width: 10%;">
    <p class="lead">
        What we will do what we will do what we will do what we will do what we will do.
    </p>
</div>

<!-- router cards -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <img src="<?php echo base_url(); ?>assets/img/placeholder.jpeg" class="card-img-top" alt="symptom checker">
                <div class="card-body">
                    <h5 class="card-title">Symptom Checker</h5>
                    <p class="card-text">Some description here</p>
                    <a href="<?php echo base_url(); ?>checker" class="btn btn-outline-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <img src="<?php echo base_url(); ?>assets/img/placeholder.jpeg" class="card-img-top" alt="online booking">
                <div class="card-body">
                    <h5 class="card-title">Online Booking</h5>
                    <p class="card-text">Some description here</p>
                    <a href="<?php echo base_url(); ?>booking" class="btn btn-outline-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <img src="<?php echo base_url(); ?>assets/img/placeholder.jpeg" class="card-img-top" alt="medical service">
                <div class="card-body">
                    <h5 class="card-title">Medical Service</h5>
                    <p class="card-text">Some description here</p>
                    <a href="<?php echo base_url(); ?>service" class="btn btn-outline-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <img src="<?php echo base_url(); ?>assets/img/placeholder.jpeg" class="card-img-top" alt="medical insurance">
                <div class="card-body">
                    <h5 class="card-title">Medical Insurance</h5>
                    <p class="card-text">Some description here</p>
                    <a href="<?php echo base_url(); ?>insurance" class="btn btn-outline-primary">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <h1 class="text-center">Top Hospital</h1>
    <hr class="my-3" style="margin: auto; width: 10%;">
    <p class="lead text-center">
        What we will do what we will do what we will do what we will do what we will do.
    </p>
</div>

<!-- hospital cards -->
<div class="container" style="margin-bottom: 6rem;">
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <img src="<?php echo base_url(); ?>assets/img/placeholder.jpeg" class="card-img-top" alt="hospitalA">
                <div class="card-body">
                    <h5 class="card-title">PA Hospital A</h5>
                    <p class="card-text">Some description here</p>
                    <a href="#" class="btn btn-outline-info">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <img src="<?php echo base_url(); ?>assets/img/placeholder.jpeg" class="card-img-top" alt="hospitalB">
                <div class="card-body">
                    <h5 class="card-title">PA Hospital B</h5>
                    <p class="card-text">Some description here</p>
                    <a href="#" class="btn btn-outline-info">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <img src="<?php echo base_url(); ?>assets/img/placeholder.jpeg" class="card-img-top" alt="hospitalC">
                <div class="card-body">
                    <h5 class="card-title">PA Hospital C</h5>
                    <p class="card-text">Some description here</p>
                    <a href="#" class="btn btn-outline-info">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <img src="<?php echo base_url(); ?>assets/img/placeholder.jpeg" class="card-img-top" alt="hospitalD">
                <div class="card-body">
                    <h5 class="card-title">PA Hospital D</h5>
                    <p class="card-text">Some description here</p>
                    <a href="#" class="btn btn-outline-info">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($this->session->userdata('logged_in')):?>
    <?php echo $_SESSION['username'];?>
    <?php echo $_SESSION['password'];?>
<?php endif;?>
