<?php
session_start();
error_reporting(0);
include("dbconnection.php");
$dt = date("Y-m-d");
$tim = date("H:i:s");
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="author" content="M_Adnan" />
  <!-- Document Title -->
  <title>Whiteliff Clinic and Maternity Hospital</title>

  <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
  <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />

  <!-- StyleSheets -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">

  <!-- Fonts Online -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Raleway:200,300,400,500,600,700,800,900" rel="stylesheet">

  <!-- JavaScripts -->
  <script src="js/vendors/modernizr.js"></script>
  <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body>

  <!-- Page Loader -->
  <div id="loader">
    <div class="position-center-center">
      <div class="cssload-thecube">
        <div class="cssload-cube cssload-c1"></div>
        <div class="cssload-cube cssload-c2"></div>
        <div class="cssload-cube cssload-c4"></div>
        <div class="cssload-cube cssload-c3"></div>
      </div>
    </div>
  </div>
  
  <!-- Header -->
  <header class="header-style-2">
    <!-- Nav -->
    <nav class="navbar ownmenu">
      <div class="container">
        <div class="logo"> <a href="index.php"><img src="images/wcmh.png" alt="" style="height: 50px;"></a> </div>
        <!-- NAV -->
        <div class="collapse navbar-collapse" id="nav-open-btn">
          <ul class="nav">
            <li> <a href="index.php">HOME </a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">APPOINTMENT </a>
              <ul class="dropdown-menu multi-level" style="display: none;">
                <li><a href="patientappointment.php">Patient Booking</a></li>
                <li><a href="martenitybook.php">Maternity Booking</a></li>
              </ul>
            </li>
            <li><a href="contact.php">CONTACT </a></li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">LOGIN </a>
              <ul class="dropdown-menu multi-level" style="display: none;">
                <li><a href="adminlogin.php">Admin</a></li>
                <li><a href="doctorlogin.php">Doctor</a></li>
                <li><a href="patientlogin.php">Patient</a></li>
                <li><a href="martenitylogin.php">Martenity</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>