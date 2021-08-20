<html>
  <head>
    <title>Anyway</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
  </head>
    
  <body>
    <!-- Navigation -->
    <nav>
    <p> header body </p>
    <!-- navigation bar links -->
    <a href="<?php echo base_url(); ?>">Homepage</a>
    <a href="<?php echo base_url(); ?>booking">Online Booking</a>
    <a href="<?php echo base_url(); ?>information">Medical Information</a>
    <a href="<?php echo base_url(); ?>checker">Symptom Checker</a>

    <!-- Search bar -->
    <input type="search" placeholder="Search" name="search" aria-label="Search">

    <!-- 做一个if 判断登陆没有-->
    <!-- logout 要在login的controller里加function-->
    <a href="<?php echo base_url(); ?>login">LogIn</a>
    <a href="<?php echo base_url(); ?>login/logout">LogOut</a>
    <a href="<?php echo base_url(); ?>signup">SignUp</a>
    <a href="<?php echo base_url(); ?>profile">My Profile</a>

    <!-- button 翻译整个页面 -->
    <a href="">Languages</a>

    </nav>

    


