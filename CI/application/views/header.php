<html>
  <head>
    <title><?php echo $websiteTitle?></title>
    <!-- global css for all pages -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC&family=Noto+Serif+SC&display=swap" rel="stylesheet">
    <!-- global script for all pages -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/crypto-js-core.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/crypto-js-md5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/crypto-js-hmac-md5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/crypto-js-enc-base64.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bs-stepper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/petite-vue.min.js"></script>
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

    <!-- live chat indicator, redirect to livechat, hide when in the livechat page -->
    <div 
      data-container="body" 
      data-trigger="hover focus" 
      data-toggle="popover" 
      data-placement="top" 
      data-content="<?php echo strcmp($this->session->userdata('language'), 'english') == 0 ? 'Need Help?' : '需要帮助吗?'; ?>"
      class="chat-launcher <?php echo strcmp(base_url(uri_string()), base_url() . 'checker/livechat') == 0 ? 'hide' : '' ?> shadow bg-primary rounded"
    >
      <a href="<?php echo base_url(); ?>checker/livechat">
        <img src="<?php echo base_url(); ?>assets/img/chatLauncher.png" width="50" height="50">
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
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: end;">
          <ul class="navbar-nav mr-auto" style ="margin-right: 0 !important;">
            <li class="nav-item <?php echo strcmp(base_url(uri_string()), base_url() . 'checker/livechat') == 0 ? 'active' : '' ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>checker/livechat"><?php echo $liveChat ?></a>
            </li>
            <li class="nav-item <?php echo strcmp(base_url(uri_string()), base_url() . 'booking') == 0 ? 'active' : '' ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>booking"><?php echo $onlineBooking ?></a>
            </li>
            <li class="nav-item dropdown btn-group <?php echo $this->uri->segment(1) == 'service' ? 'active' : '' ?>">
              <!-- <a class="nav-link" href="#" id="medicalServiceDropdown" role="button"><?php echo $medInformation ?></a>
              <button type="button" class="btn dropdown-toggle dropdown-toggle-split pl-0 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button> -->
              <a class="nav-link dropdown-toggle" href="#" id="medicalServiceDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $medInformation ?></a>
              <div class="dropdown-menu" aria-labelledby="medicalServiceDropdown">
                <a href="<?php echo base_url(); ?>service" class="dropdown-item <?php echo strcmp(base_url(uri_string()), base_url() . 'service') == 0 ? 'active' : '' ?>">
                  <?php echo $medicalService ?>
                </a>
                <a href="<?php echo base_url(); ?>insurance" class="dropdown-item <?php echo strcmp(base_url(uri_string()), base_url() . 'insurance') == 0 ? 'active' : '' ?>">
                  <?php echo $medicalInsurance ?>
                </a>
                
                </div>
            </li>
            <li class="nav-item <?php echo strcmp(base_url(uri_string()), base_url() . 'checker') == 0 ? 'active' : '' ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>checker"><?php echo $symptomChecker ?></a>
            </li>

          </ul>

          <ul class="navbar-nav">
            <!-- not login, only show login button -->
            <?php if(!$this->session->userdata('logged_in')): ?>
              <li class="nav-item <?php echo strcmp(base_url(uri_string()), base_url() . 'login') == 0 ? 'active' : '' ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>login"><i class="bi bi-person-circle"></i> </a>
              </li>
            <?php else: ?>
              <!-- user logged in, show dropdown list with profile and logout button -->
              <li class="nav-item dropdown <?php echo strcmp(base_url(uri_string()), base_url() . 'profile') == 0 ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="#" id="authDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bi bi-person-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="authDropdown">
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
              <a class="nav-link dropdown-toggle" href="#" id="languagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-globe2"></i> </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languagesDropdown">
                <a href="<?php echo base_url(); ?>welcome/toEnglish" class="dropdown-item btn action-button <?php echo strcmp($this->session->userdata('language'), 'english') == 0 ? 'active' : '' ?>" role="button">English</a>
                <a href="<?php echo base_url(); ?>welcome/toChinese" class="dropdown-item btn action-button <?php echo strcmp($this->session->userdata('language'), 'chinese') == 0 ? 'active' : '' ?>" role="button">简体中文</a>
              </div>
            </li>
          </ul>
        </div>

      </nav>

<script>
// enable all popover
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>