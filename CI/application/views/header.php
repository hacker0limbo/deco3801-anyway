<html>
  <head>
    <title>Anyway - Your Perfect Medical Help In Australia</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
  </head>
    
  <body class="h-100 d-flex flex-column">
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
            <a class="nav-link" href="<?php echo base_url(); ?>booking">Online Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>information">Medical Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>checker">Symptom Checker</a>
          </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>

        <!-- 做一个if 判断登陆没有-->
        <!-- logout 要在login的controller里加function-->
        <ul class="navbar-nav">
          <?php if(!$this->session->userdata('logged_in')): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>login">
                <i class="bi bi-person-plus"></i>
                Login
              </a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>login/logout">
                <i class="bi bi-person-x"></i>
                Logout
              </a>
            </li>
          <?php endif; ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Languages
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <span class="dropdown-item" href="#">English</span>
              <span class="dropdown-item" href="#">简体中文</span>
            </div>
          </li>
        </ul>
      </div>

    </nav>

    


