<html>
  <head>
    <title><?php echo $websiteTitle?></title>
    <!-- global css for all pages -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">

    <!-- global script for all pages -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/md5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/hmac-md5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/enc-base64.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="https://unpkg.com/petite-vue"></script>
    <!-- config file for livechat -->
    <script src="<?php echo base_url(); ?>assets/js/liveChatConfig.js"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-615ea5ac83adc8b7"></script>     <!-- corresponding script for different pages -->
    <?php if (strcmp(base_url(uri_string()), base_url()) == 0 || strcmp(base_url(uri_string()), base_url() . 'welcome') == 0): ?>
      <script src="<?php echo base_url(); ?>assets/js/homepage.js" defer></script>
    <?php elseif (strcmp(base_url(uri_string()), base_url() . 'signup') == 0): ?>
      <!-- Import google reCaptcha API -->
      <script src="https://www.google.com/recaptcha/api.js" defer></script>
    <?php endif; ?>
  </head>
    
  <body>
    <!-- back to top indicator -->
    <!-- <div class="back-to-top">
      <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-arrow-up-square text-primary" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
      </svg>
    </div> -->

    <!-- live chat indicator, redirect to livechat, hide when in the livechat page -->
    <div class="chat-launcher <?php echo strcmp(base_url(uri_string()), base_url() . 'checker/livechat') == 0 ? 'hide' : '' ?>">
      <a href="<?php echo base_url(); ?>checker/livechat">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-chat-dots text-primary" viewBox="0 0 16 16">
          <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
          <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
        </svg>
      </a>
    </div>

    <div class="h-100 d-flex flex-column" id="app">
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Logo(Homepage) & toggle button for responsible size -->
        <a class="navbar-brand" href="<?php echo base_url(); ?>">
          <img class="logo" width="30" height="30" src="<?php echo base_url(); ?>assets/img/logo.png"/>
          <span><?php echo $websiteName?> </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- collapsed content for responsible size -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo strcmp(base_url(uri_string()), base_url() . 'booking') == 0 ? 'active' : '' ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>booking"><?php echo $onlineBooking ?></a>
            </li>
            <li class="nav-item dropdown btn-group <?php echo $this->uri->segment(1) == 'service' ? 'active' : '' ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>service" id="medicalServiceDropdown" role="button"><?php echo $medicalService ?></a>
              <button type="button" class="btn dropdown-toggle dropdown-toggle-split pl-0 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu" aria-labelledby="medicalServiceDropdown">
                <a href="<?php echo base_url(); ?>service/servicetype" class="dropdown-item <?php echo strcmp(base_url(uri_string()), base_url() . 'service/servicetype') == 0 ? 'active' : '' ?>">
                  <?php echo $serviceType ?>
                </a>
                <a href="<?php echo base_url(); ?>service/medicalProcess" class="dropdown-item <?php echo strcmp(base_url(uri_string()), base_url() . 'service/medicalProcess') == 0 ? 'active' : '' ?>">
                  <?php echo $medicalProcess ?>
                </a>
                
                </div>
            </li>
            <li class="nav-item dropdown btn-group <?php echo $this->uri->segment(1) == 'insurance' ? 'active' : '' ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>insurance" id="medicalInsuranceDropdown" role="button"><?php echo $medicalInsurance ?></a>
              <button type="button" class="btn dropdown-toggle dropdown-toggle-split pl-0 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu" aria-labelledby="medicalInsuranceDropdown">
                <a href="<?php echo base_url(); ?>insurance/student" class="dropdown-item <?php echo strcmp(base_url(uri_string()), base_url() . 'insurance/student') == 0 ? 'active' : '' ?>">
                  <?php echo $students?>
                </a>
                <a href="<?php echo base_url(); ?>insurance/visitor" class="dropdown-item <?php echo strcmp(base_url(uri_string()), base_url() . 'insurance/visitor') == 0 ? 'active' : '' ?>">
                <?php echo $visitors?>
                </a>
                <a href="<?php echo base_url(); ?>insurance/citizen" class="dropdown-item <?php echo strcmp(base_url(uri_string()), base_url() . 'insurance/citizen') == 0 ? 'active' : '' ?>">
                <?php echo $citizens?>
                </a>
              </div>
            </li>
            <li class="nav-item <?php echo strcmp(base_url(uri_string()), base_url() . 'checker') == 0 ? 'active' : '' ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>checker"><?php echo $symptomChecker ?></a>
            </li>
          </ul>

          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="<?php echo $search ?>" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><?php echo $search ?></button>
          </form>

          <!-- 做一个if 判断登陆没有-->
          <!-- logout 要在login的controller里加function-->
          <ul class="navbar-nav">
            <!-- not login, only show login button -->
            <?php if(!$this->session->userdata('logged_in')): ?>
              <li class="nav-item <?php echo strcmp(base_url(uri_string()), base_url() . 'login') == 0 ? 'active' : '' ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>login"><i class="bi bi-person-plus"></i><?php echo $login ?></a>
              </li>
            <?php else: ?>
              <!-- user logged in, show dropdown list with profile and logout button -->
              <li class="nav-item dropdown <?php echo strcmp(base_url(uri_string()), base_url() . 'profile') == 0 ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="#" id="authDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bi bi-person-check"></i>
                  <?php echo $this->session->userdata("username"); ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="authDropdown">
                  <a class="dropdown-item <?php echo strcmp(base_url(uri_string()), base_url() . 'profile') == 0 ? 'active' : '' ?>" href="<?php echo base_url(); ?>profile">
                    <i class="bi bi-person"></i>
                    <?php echo $profile?>
                  </a>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>login/logout">
                    <i class="bi bi-person-x"></i>
                    <?php echo $logout?>
                  </a>
                </div>
              </li>
            <?php endif; ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="languagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $languages?></a>
              <div class="dropdown-menu" aria-labelledby="languagesDropdown">
                <a href="<?php echo base_url(); ?>welcome/toEnglish" class="dropdown-item btn action-button <?php echo strcmp($this->session->userdata('language'), 'english') == 0 ? 'active' : '' ?>" role="button">English</a>
                <a href="<?php echo base_url(); ?>welcome/toChinese" class="dropdown-item btn action-button <?php echo strcmp($this->session->userdata('language'), 'chinese') == 0 ? 'active' : '' ?>" role="button">简体中文</a>
              </div>
            </li>
          </ul>
        </div>

      </nav>

    


