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

<style>
    .back-to-top {
        display: none;
        position: fixed;
        bottom: 1.5rem;
        right: 1.5rem;
        z-index: 99;
        cursor: pointer;
    }
</style>

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

<h1 class="text-center mt-5">Welcome to Anyway</h1>
<hr class="my-1 w-25" style="margin: auto">
<p class="lead text-center">
  What we will do what we will do what we will do what we will do what we will do.
</p>

<!-- Four section -->
<ul class="homepage-content d-xl-flex align-items-xl-center justify-content-between">
    <li>
        <figure>
            <img class="homepage-content-img" src="assets/img/placeholder.jpeg">
            <figcaption>
                <h3> Symptom Checker </h3>
                <p> Some description here! </p>
                <p> <a href="<?php echo base_url(); ?>checker">Read More</a> </p>
            </figcaption>
        </figure>
    </li>

    <li>
        <figure>
            <img class="homepage-content-img" src="assets/img/placeholder.jpeg">
            <figcaption>
                <h3> Online Booking </h3>
                <p> Some description here! </p>
                <p> <a href="<?php echo base_url(); ?>booking">Read More</a> </p>
            </figcaption>
        </figure>
    </li>

    <li>
        <figure>
            <img class="homepage-content-img" src="assets/img/placeholder.jpeg">
            <figcaption>
                <h3> Medical Service </h3>
                <p> Some description here! </p>
                <p> <a href="<?php echo base_url(); ?>information/loadMedService">Read More</a> </p>
            </figcaption>
        </figure>
    </li>

    <li>
        <figure>
            <img class="homepage-content-img" src="assets/img/placeholder.jpeg">
            <figcaption>
                <h3> Medical Insurance </h3>
                <p> Some description here! </p>
                <p> <a href="<?php echo base_url(); ?>information/loadMedInsurance">Read More</a> </p>
            </figcaption>
        </figure>
    </li>

    <br style="clear: both;" />
</ul>

<?php if($this->session->userdata('logged_in')):?>
    <?php echo $_SESSION['username'];?>
    <?php echo $_SESSION['password'];?>
<?php endif;?>

<script>
const backToTop = document.querySelector('.back-to-top')

backToTop.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' })
})

window.addEventListener('scroll', () => {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        backToTop.style.display = 'block'
    } else {
        backToTop.style.display = 'none'
    }
})

</script>