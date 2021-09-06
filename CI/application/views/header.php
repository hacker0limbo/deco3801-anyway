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
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>booking">{{ $t("header.onlineBooking") }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>information">{{ $t("header.medicalInformation") }}</a>
            </li>
            <li class="nav-item">
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
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>login">
                  <i class="bi bi-person-plus"></i>
                  {{ $t("header.login") }}
                </a>
              </li>
            <?php else: ?>
              <!-- user logged in, show dropdown list with profile and logout button -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="authDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bi bi-person-check"></i>
                  <?php echo $this->session->userdata("username"); ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="authDropdown">
                  <a class="dropdown-item" href="<?php echo base_url(); ?>profile">
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

    


