<?php
session_start();
error_reporting(0);
include("dbconnection.php");
$dt = date("Y-m-d");
$tim = date("H:i:s");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title></title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- JQuery DataTable Css -->
    <link href="assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <!-- Custom Css -->

    <!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="assets/css/themes/all-themes.css" rel="stylesheet" />
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-cyan">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Morphing Search  -->

    <!-- Top Bar -->
    <nav class="navbar clearHeader">
        <div class="col-12">
            <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="#">Whiteliff Clinic and Maternity Hospital</a> </div>
            <ul class="nav navbar-nav navbar-right">
                <!-- Notifications -->
                <li>
                    <a data-placement="bottom" title="Full Screen" href="logout.php"><i class="zmdi zmdi-sign-in"></i></a>
                </li>

            </ul>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <?php
            if (isset($_SESSION['adminid'])) {
            ?>
                <!--Admin Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active open"><a href="adminaccount.php"><i class="zmdi zmdi-home"></i><span>DASHBOARD</span></a></li>


                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>Profile</span> </a>
                            <ul class="ml-menu">
                                <li><a href="adminprofile.php">ADMIN PROFILE</a></li>
                                <li><a href="adminchangepassword.php">Change Password</a></li>
                                <li><a href="admin.php">Add Admin</a></li>
                                <li><a href="viewadmin.php">View Admin</a></li>
                            </ul>
                        </li>

                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>APPOINTMENT</span> </a>
                            <ul class="ml-menu">
                                <li><a href="appointment.php">Patient Appointment</a></li>
                                <li><a href="viewappointmentpending.php">View Pending Appointments</a></li>
                                <li><a href="viewappointmentapproved.php">View Approved Appointments</a></li>
                                <li><a href="martenityappoint.php">Maternity Appointment</a></li>
                                <li><a href="viewmartenityappending.php">Marternity Pending Appointments</a></li>
                                <li><a href="viewmartenityapapproved.php">Maternity Approved Appointments</a></li>

                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-add"></i><span>DOCTORS</span> </a>
                            <ul class="ml-menu">
                                <li><a href="doctor.php">Add Doctor</a>
                                </li>
                                <li><a href="viewdoctor.php">View Doctor</a></li>

                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>PATIENTS</span> </a>
                            <ul class="ml-menu">
                                <li><a href="patient.php">Add Patient</a></li>
                                <li><a href="viewpatient.php">View Patient Records</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>MARTENITY</span> </a>
                            <ul class="ml-menu">
                                <li><a href="martenity.php">Add Patient</a></li>
                                <li><a href="viewmartenity.php">View Patient Records</a></li>
                            </ul>
                        </li>


                        <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-settings-square"></i><span>SERVICES</span> </a>
                            <ul class="ml-menu">
                                <li><a href="branch.php">Add Branch</a></li>
                                <li><a href="viewbranch.php">View Branch</a></li>
                                <li><a href="offeredservices.php">Add Service</a></li>
                                <li><a href="viewofferedservices.php">View Services</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- Admin Menu -->
            <?php } ?>


            <!-- doctor Menu -->
            <?php
            if (isset($_SESSION['doctorid'])) {
            ?>
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active open"><a href="doctoraccount.php"><i class="zmdi zmdi-home"></i><span>DASHBOARD</span></a></li>


                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>PROFILE</span> </a>
                            <ul class="ml-menu">
                                <li><a href="doctorprofile.php">Profile</a></li>
                                <li><a href="doctorchangepassword.php">Change Password</a></li>
                            </ul>
                        </li>

                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>APPOINTMENT</span> </a>
                            <ul class="ml-menu">
                                <li><a href="viewappointmentpending.php" style="width:250px;">Pending Appointments</a></li>
                                <li><a href="viewappointmentapproved.php" style="width:250px;">Approved Patients</a></li>
                                <li><a href="viewmartenityappending.php" style="width:250px;">Pending Maternity</a></li>
                                <li><a href="viewmartenityapapproved.php" style="width:250px;">Approved Maternity</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-add"></i><span>DOCTORS</span> </a>
                            <ul class="ml-menu">

                                <li><a href="doctortimings.php">Add Visiting Hour</a></li>
                                <li><a href="viewdoctortimings.php">View Visiting Hour</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>PATIENTS</span> </a>
                            <ul class="ml-menu">
                                <li><a href="viewpatient.php">View Patient</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>MATERNITY</span> </a>
                            <ul class="ml-menu">
                                <li><a href="viewmartenity.php">View Patient</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            <?php }; ?>
            <!-- doctor Menu -->

            <!-- patient Menu -->
            <?php
            if (isset($_SESSION['patientid'])) {
            ?>
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active open"><a href="patientaccount.php"><i class="zmdi zmdi-home"></i><span>DASHBOARD</span></a></li>


                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>PROFILE</span> </a>
                            <ul class="ml-menu">
                                <li><a href="patientprofile.php">View Profile</a></li>
                                <li><a href="patientchangepassword.php">Change Password</a></li>
                            </ul>
                        </li>

                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>APPOINTMENT</span> </a>
                            <ul class="ml-menu">
                                <li><a href="patientappointment.php">Add Appointment</a></li>
                                <li><a href="viewappointment.php">View Appointments</a></li>
                            </ul>
                        </li>
                    </ul>
                    </li>
                    </ul>
                </div>

            <?php }; ?>
            <!-- patient Menu -->



                <!-- martenity Menu -->
            <?php
            if (isset($_SESSION['martenityid'])) {
            ?>
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active open"><a href="martenityaccount.php"><i class="zmdi zmdi-home"></i><span>DASHBOARD</span></a></li>


                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>PROFILE</span> </a>
                            <ul class="ml-menu">
                                <li><a href="martenityprofile.php">View Profile</a></li>
                                <li><a href="martenitychangepass.php">Change Password</a></li>
                                <li><a href="martenitymanage.php">File Manager</a></li>
                            </ul>
                        </li>

                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>APPOINTMENT</span> </a>
                            <ul class="ml-menu">
                                <li><a href="martenityappoint.php">Add Appointment</a></li>
                                <li><a href="viewmartenitybook.php">View Appointments</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            <?php }; ?>
            <!-- martenity Menu -->

        </aside>
        <!-- #END# Left Sidebar -->

    </section>
    <section class="content home">   
</body>