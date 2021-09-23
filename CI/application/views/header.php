<!DOCTYPE html>
<html>
  <head>
    <title>Anyway - Your Perfect Medical Help In Australia</title>
    <!-- global css for all pages -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <!-- global script for all pages -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js" defer></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js" defer></script>
    <script type="module" src="<?php echo base_url(); ?>assets/js/index.js"></script>
    <!-- corresponding script for different pages -->
    <?php if (strcmp(base_url(uri_string()), base_url()) == 0 || strcmp(base_url(uri_string()), base_url() . 'welcome') == 0): ?>
      <script type="module" src="<?php echo base_url(); ?>assets/js/homepage.js"></script>
    <?php elseif (strcmp(base_url(uri_string()), base_url() . 'signup') == 0): ?>
      <!-- Import google reCaptcha API -->
      <script src="https://www.google.com/recaptcha/api.js" defer></script>
    <?php endif; ?>
  </head>
    
  <body>
    <!-- back to top indicator -->
    <div class="back-to-top">
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-up-square text-primary" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
      </svg>
    </div>

    <div class="h-100 d-flex flex-column" id="app">
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Logo(Homepage) & toggle button for responsible size -->
        <a class="navbar-brand" href="<?php echo base_url(); ?>">
          <img class="logo" width="30" height="30" src="<?php echo base_url(); ?>assets/img/logo.png"/>
          <span>Anyway</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- collapsed content for responsible size -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo strcmp(base_url(uri_string()), base_url() . 'booking') == 0 ? 'active' : '' ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>booking">{{ $t("header.onlineBooking") }}</a>
            </li>
            <li class="nav-item dropdown btn-group <?php echo $this->uri->segment(1) == 'service' ? 'active' : '' ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>service" id="medicalServiceDropdown" role="button">
                {{ $t("header.medicalService") }}
              </a>
              <button type="button" class="btn dropdown-toggle dropdown-toggle-split pl-0 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu" aria-labelledby="medicalServiceDropdown">
                <a href="<?php echo base_url(); ?>service/clinic" class="dropdown-item <?php echo strcmp(base_url(uri_string()), base_url() . 'service/clinic') == 0 ? 'active' : '' ?>">
                  Clinic
                </a>
                <a href="<?php echo base_url(); ?>service/medicalCentre" class="dropdown-item <?php echo strcmp(base_url(uri_string()), base_url() . 'service/medicalCentre') == 0 ? 'active' : '' ?>">
                  Medical Centre
                </a>
                <a href="<?php echo base_url(); ?>service/hospital" class="dropdown-item <?php echo strcmp(base_url(uri_string()), base_url() . 'service/hospital') == 0 ? 'active' : '' ?>">
                  Hospital
                </a>
                </div>
            </li>
            <li class="nav-item dropdown btn-group <?php echo $this->uri->segment(1) == 'insurance' ? 'active' : '' ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>insurance" id="medicalInsuranceDropdown" role="button">
                {{ $t("header.medicalInsurance") }}
              </a>
              <button type="button" class="btn dropdown-toggle dropdown-toggle-split pl-0 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu" aria-labelledby="medicalInsuranceDropdown">
                <a href="<?php echo base_url(); ?>insurance/student" class="dropdown-item <?php echo strcmp(base_url(uri_string()), base_url() . 'insurance/student') == 0 ? 'active' : '' ?>">
                  Student
                </a>
                <a href="<?php echo base_url(); ?>insurance/visitor" class="dropdown-item <?php echo strcmp(base_url(uri_string()), base_url() . 'insurance/visitor') == 0 ? 'active' : '' ?>">
                  Visitor
                </a>
                <a href="<?php echo base_url(); ?>insurance/citizen" class="dropdown-item <?php echo strcmp(base_url(uri_string()), base_url() . 'insurance/citizen') == 0 ? 'active' : '' ?>">
                  Citizen
                </a>
              </div>
            </li>
            <li class="nav-item <?php echo strcmp(base_url(uri_string()), base_url() . 'checker') == 0 ? 'active' : '' ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>checker">{{ $t("header.symptomChecker") }}</a>
            </li>
          </ul>

          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">{{ $t("header.search") }}</button>
          </form>

          <!-- 做一个if 判断登陆没有-->
          <!-- logout 要在login的controller里加function-->
          <ul class="navbar-nav">
            <!-- not login, only show login button -->
            <?php if(!$this->session->userdata('logged_in')): ?>
              <li class="nav-item <?php echo strcmp(base_url(uri_string()), base_url() . 'login') == 0 ? 'active' : '' ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>login">
                  <i class="bi bi-person-plus"></i>
                  {{ $t("header.login") }}
                </a>
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
                    Profile
                  </a>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>login/logout">
                    <i class="bi bi-person-x"></i>
                    Logout
                  </a>
                </div>
              </li>
            <?php endif; ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="languagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ $t("header.languages") }}
              </a>
              <div class="dropdown-menu" aria-labelledby="languagesDropdown">
                <span role="button" @click="() => changeLocale('en')" class="dropdown-item" :class="{ active: $i18n.locale === 'en' }">
                  English
                </span>
                <span role="button" @click="() => changeLocale('ch')" class="dropdown-item" :class="{ active: $i18n.locale === 'ch' }">
                  简体中文
                </span>
              </div>
            </li>
          </ul>
        </div>

      </nav>

    


