<?php
session_start();
error_reporting(0);
include("adheader.php");

include("dbconnection.php");
if (!isset($_SESSION['maternityid'])) {
    echo "<script>window.location='martenitylogin.php';</script>";
}

$sqlpatient = "SELECT * FROM maternity WHERE maternityid='$_SESSION[maternityid]' ";
$qsqlpatient = mysqli_query($con, $sqlpatient);
$rspatient = mysqli_fetch_array($qsqlpatient);

$sqlpatientappointment = "SELECT * FROM maternityap WHERE maternityid='$_SESSION[maternityid]' ";
$qsqlpatientappointment = mysqli_query($con, $sqlpatientappointment);
$rspatientappointment = mysqli_fetch_array($qsqlpatientappointment);
?>
<div class=" container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
        <small class="text-muted">Welcome to Whiteliff Clinic and Maternity Hospital</small>
    </div>
    <div class="card">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="alert bg-blue">
                            <h3>Welcome , <?php echo $rspatient['maternityname']; ?> !! </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home_animation_1" aria-expanded="true">Registration History</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile_animation_1" aria-expanded="false">Appointment</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content" style="padding: 10px">
                    <div role="tabpanel" class="tab-pane animated flipInX active" id="home_animation_1" aria-expanded="true"> <b>Registration History</b>
                        <h3>You are with us from <?php echo $rspatient['admissiondate']; ?>
                            <?php echo $rspatient['admissiontime']; ?></h3>
                    </div>
                    <div role="tabpanel" class="tab-pane animated flipInX" id="profile_animation_1" aria-expanded="false"> <b>Appointment</b>
                        <?php
if (mysqli_num_rows($qsqlpatientappointment) == 0) {
?>
                            <h3>Appointment records not found.. </h3>
                        <?php
}
else {
?>
                            <h3>Last Appointment taken on - <?php echo $rspatientappointment['appointmentdate']; ?>
                                <?php echo $rspatientappointment['appointmenttime']; ?> </h3>
                        <?php
}
?>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>

<?php
include("adfooter.php");
?>