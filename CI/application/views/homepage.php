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
<?php endif; ?>

<!-- back to top indicator -->
<div class="back-to-top">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-up-square text-primary" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
    </svg>
</div>

<!-- carousel/slider -->
<div id="homepageCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#homepageCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#homepageCarousel" data-slide-to="1"></li>
        <li data-target="#homepageCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/img/homepage-slider0.png" class="d-block w-100" alt="slider0">
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
            <img src="assets/img/homepage-slider0.png" class="d-block w-100" alt="slider1">
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
            <img src="assets/img/homepage-slider0.png" class="d-block w-100" alt="slider2">
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
                <img src="assets/img/placeholder.jpeg" class="card-img-top" alt="symptom checker">
                <div class="card-body">
                    <h5 class="card-title">Symptom Checker</h5>
                    <p class="card-text">Some description here</p>
                    <a href="<?php echo base_url(); ?>checker" class="btn btn-outline-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <img src="assets/img/placeholder.jpeg" class="card-img-top" alt="online booking">
                <div class="card-body">
                    <h5 class="card-title">Online Booking</h5>
                    <p class="card-text">Some description here</p>
                    <a href="<?php echo base_url(); ?>booking" class="btn btn-outline-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <img src="assets/img/placeholder.jpeg" class="card-img-top" alt="medical service">
                <div class="card-body">
                    <h5 class="card-title">Medical Service</h5>
                    <p class="card-text">Some description here</p>
                    <a href="<?php echo base_url(); ?>service" class="btn btn-outline-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <img src="assets/img/placeholder.jpeg" class="card-img-top" alt="medical insurance">
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
                <img src="assets/img/placeholder.jpeg" class="card-img-top" alt="hospitalA">
                <div class="card-body">
                    <h5 class="card-title">PA Hospital A</h5>
                    <p class="card-text">Some description here</p>
                    <a href="#" class="btn btn-outline-info">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <img src="assets/img/placeholder.jpeg" class="card-img-top" alt="hospitalB">
                <div class="card-body">
                    <h5 class="card-title">PA Hospital B</h5>
                    <p class="card-text">Some description here</p>
                    <a href="#" class="btn btn-outline-info">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <img src="assets/img/placeholder.jpeg" class="card-img-top" alt="hospitalC">
                <div class="card-body">
                    <h5 class="card-title">PA Hospital C</h5>
                    <p class="card-text">Some description here</p>
                    <a href="#" class="btn btn-outline-info">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <img src="assets/img/placeholder.jpeg" class="card-img-top" alt="hospitalD">
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
