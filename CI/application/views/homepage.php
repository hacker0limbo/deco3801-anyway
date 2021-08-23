<!-- Image banner -->
<div id="banner-container">
    <main id="main-banner">
        <div class="banner-bg"></div>
        <section>
            <div class="banner-imagebox">
                <img src="assets/img/banner-placeholder1.png" class="banner-image">
            </div>

            <div class="banner-select">
                <!-- <div class="banner-dot"></div>
                    <div class="banner-dot-check"></div> -->
            </div>

            <div class="banner-left"><span class="banner-button">&lt</span></div>
            <div class="banner-right"><span class="banner-button">&gt</span></div>
        </section>
    </main>
</div>


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






<!-- script for banner moving -->
<script>
    var images = ['assets/img/banner-placeholder1.png', 'assets/img/banner-placeholder2.png', 'assets/img/banner-placeholder3.png'];

    var mainBanner = document.getElementById('main-banner');
    var bannerBg = document.querySelector('.banner-bg');
    var bannerImage = document.querySelector('.banner-image');
    var bannerSelect = document.querySelector('.banner-select');
    var bannerDot = document.getElementsByClassName('banner-dot');
    var bannerLeft = document.querySelector('.banner-left');
    var bannerRight = document.querySelector('.banner-right');


    var idx = 0;

    // add dots 
    for (let i = 0; i < images.length; i++) {
        let dot = document.createElement('div');
        dot.classList.add('banner-dot');
        bannerSelect.appendChild(dot);
        dot.number = i;
    }


    // clear dot format
    function clear() {
        for (let i = 0; i < bannerDot.length; i++) {
            bannerDot[i].classList.remove('banner-dot-check');
        }
    }

    // move to next image
    function moveImage() {
        idx = idx + 1;
        if (idx == images.length) {
            idx = 0;
        }

        bannerImage.src = images[idx];

        clear();
        bannerDot[idx].classList.add('banner-dot-check');

        if (idx == images.length - 1) {
            idx = -1;
        }
    }

    // click right button
    bannerRight.addEventListener('click', function() {
        moveImage();
    })

    // click left button
    bannerLeft.addEventListener('click', function() {
        idx = idx - 1;
        if (idx == -1) {
            idx = images.length - 1;
        }
        bannerImage.src = images[idx];

        clear();
        bannerDot[idx].classList.add('banner-dot-check');
    })


    // automatic move images stops when mouse over
    mainBanner.addEventListener('mouseover', function() {
        clearInterval(continuousMoving);
        bannerImage.classList.remove('moving');
    })

    // automatic moving starts when mouse leave the div
    mainBanner.addEventListener('mouseout', function() {
        continuousMoving = setInterval(moveImage, 5000);

        bannerImage.classList.add('moving');
        bannerImage.style.animationDelay = '5s';
    })


    // click on dots
    for (let i = 0; i < images.length; i++) {
        bannerDot[i].addEventListener('click', function() {
            clear();
            this.classList.add('banner-dot-check');
            idx = i;
            bannerImage.src = images[idx];
        })
    }

    // set up automatic timer and initial moving states
    continuousMoving = setInterval(moveImage, 5000);
    bannerImage.classList.add('moving');
    bannerDot[0].classList.add('banner-dot-check');

</script>