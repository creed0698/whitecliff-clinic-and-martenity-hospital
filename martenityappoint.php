<?php
session_start();
error_reporting(0);
include("adheader.php");
include("dbconnection.php");
$dt = date("Y-m-d");
$tim = date("H:i:s");
if (isset($_POST['submit'])) {
    if (isset($_GET['editid'])) {
        $sql = "UPDATE maternityap SET maternityid='$_POST[select4]',branchid='$_POST[select5]',appointmentdate='$_POST[appointmentdate]',appointmenttime='$_POST[time]',serviceid='$_POST[select6]',payid='$_POST[select7]',status='$_POST[select]' WHERE maternityappointid='$_GET[editid]'";
        if ($qsql = mysqli_query($con, $sql)) {
            echo "<script>alert('Appointment Record Updated Successfully...');</script>";
        }
        else {
            echo mysqli_error($con);
        }
    }
    else {
        $sql = "UPDATE maternity SET status='Active' WHERE maternityid='$_POST[select4]'";
        $qsql = mysqli_query($con, $sql);

        $sql = "INSERT INTO maternityap(maternityid, branchid, appointmentdate, appointmenttime, serviceid,payid, status) values('$_POST[select4]','$_POST[select5]','$_POST[appointmentdate]','$_POST[time]','$_POST[select6]','$_POST[select7]','$_POST[select]')";
        if ($qsql = mysqli_query($con, $sql)) {

            include("insertbillingrecord.php");
            echo "<script>alert('Appointment Record Inserted Successfully.');</script>";
        }
        else {
            echo mysqli_error($con);
        }
    }
}
if (isset($_GET['editid'])) {
    $sql = "SELECT * FROM maternityap WHERE maternityappointid='$_GET[editid]' ";
    $qsql = mysqli_query($con, $sql);
    $rsedit = mysqli_fetch_array($qsql);
}
?>


<div class="container-fluid">
    <div class="block-header">
        <h2>Book Appointment</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Appointment Information </h2>

                </div>
                <form method="post" action="" name="frmappnt" onSubmit="return validateform()">
                    <input type="hidden" name="select2" value="Offline">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php
if (isset($_GET['patid'])) {
    $sqlpatient = "SELECT * FROM maternity WHERE maternityid='$_GET[patid]'";
    $qsqlpatient = mysqli_query($con, $sqlpatient);
    $rspatient = mysqli_fetch_array($qsqlpatient);
    echo $rspatient['maternityname'] . " (Patient ID - $rspatient[maternityid])";
    echo "<input type='hidden' name='select4' value='$rspatient[maternityid]'>";
}
else {
?>
                                            <select name="select4" id="select4" class=" form-control show-tick">
                                                <option value="">Select Patient</option>
                                                <?php
    $sqlpatient = "SELECT * FROM maternity WHERE status='Active'";
    $qsqlpatient = mysqli_query($con, $sqlpatient);
    while ($rspatient = mysqli_fetch_array($qsqlpatient)) {
        if ($rspatient['maternityid'] == $rsedit['maternityid']) {
            echo "<option value='$rspatient[maternityid]' selected>$rspatient[maternityid] - $rspatient[maternityname]</option>";
        }
        else {
            echo "<option value='$rspatient[maternityid]'>$rspatient[maternityid] - $rspatient[maternityname]</option>";
        }
    }
?>
                                            </select>
                                        <?php
}
?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="select5" id="select5" class=" form-control show-tick">
                                            <option value="">Select Branch</option>
                                            <?php
$sqlbranch = "SELECT * FROM branch WHERE status='Active'";
$qsqlbranch = mysqli_query($con, $sqlbranch);
while ($rsbranch = mysqli_fetch_array($qsqlbranch)) {
    if ($rsbranch['branchid'] == $rsedit['branchid']) {
        echo "<option value='$rsbranch[branchid]' selected>$rsbranch[branchname]</option>";
    }
    else {
        echo "<option value='$rsbranch[branchid]'>$rsbranch[branchname]</option>";
    }
}
?>
                                        </select>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" type="date" name="appointmentdate" id="appointmentdate" value="<?php echo $rsedit['appointmentdate']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" type="time" name="appointmenttime" id="appointmenttime" value="<?php echo $rsedit['appointmenttime']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="sel" id="sel" class=" form-control show-tick">
                                            <option value="">Select Doctor</option>
                                            <php
                                            $sqldoctor = "SELECT * FROM doctor INNER JOIN branch ON branch.branchid=doctor.branchid WHERE doctor.status='Active'";
                                            $qsqldoctor = mysqli_query($con, $sqldoctor);
                                            while ($rsdoctor = mysqli_fetch_array($qsqldoctor)) {
                                                if ($rsdoctor['doctorid'] == $rsedit['doctorid']) {
                                                    echo "<option value='$rsdoctor[doctorid]' selected>$rsdoctor[doctorname] ( $rsdoctor[branchname] ) </option>";
                                                } else {
                                                    echo "<option value='$rsdoctor[doctorid]'>$rsdoctor[doctorname] ( $rsdoctor[branchname] )</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="select6" id="select6" class=" form-control show-tick">
                                            <option value="">Select Service</option>
                                            <?php
$sqloffer = "SELECT * FROM offeredservice WHERE status='Active'";
$qsqloffer = mysqli_query($con, $sqloffer);
while ($rsoffer = mysqli_fetch_array($qsqloffer)) {
    if ($rsoffer['serviceid'] == $rsedit['serviceid']) {
        echo "<option value='$rsoffer[serviceid]' selected>$rsoffer[servicename]</option>";
    }
    else {
        echo "<option value='$rsoffer[serviceid]'>$rsoffer[servicename]</option>";
    }
}
?>
                                        </select>

                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="select7" id="select7" class=" form-control show-tick">
                                            <option value="">Select Option</option>
                                            <?php
$sqlpay = "SELECT * FROM payopt WHERE status='Active'";
$qsqlpay = mysqli_query($con, $sqlpay);
while ($rspay = mysqli_fetch_array($qsqlpay)) {
    if ($rspay['payid'] == $rsedit['payid']) {
        echo "<option value='$rspay[payid]' selected>$rspay[payname]</option>";
    }
    else {
        echo "<option value='$rspay[payid]'>$rspay[payname]</option>";
    }
}
?>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-4 ">
                                <div class="form-group drop-custum">
                                    <select name="select" id="select" class=" form-control show-tick">

                                        <option value="">Select Status</option>
                                        <?php
$arr = array("Active", "Inactive");
foreach ($arr as $val) {
    if ($val == $rsedit['status']) {
        echo "<option value='$val' selected>$val</option>";
    }
    else {
        echo "<option value='$val'>$val</option>";
    }
}
?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input class="btn btn-raised g-bg-cyan" type="submit" name="submit" id="submit" value="Submit">

                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'adfooter.php'; ?>
<script type="application/javascript">
    function validateform() {
        if (document.frmappnt.select4.value == "") {
            alert("Patient name should not be empty..");
            document.frmappnt.select4.focus();
            return false;
        } else if (document.frmappnt.select3.value == "") {
            alert("Room type should not be empty..");
            document.frmappnt.select3.focus();
            return false;
        } else if (document.frmappnt.select5.value == "") {
            alert("Department name should not be empty..");
            document.frmappnt.select5.focus();
            return false;
        } else if (document.frmappnt.appointmentdate.value == "") {
            alert("Appointment date should not be empty..");
            document.frmappnt.appointmentdate.focus();
            return false;
        } else if (document.frmappnt.time.value == "") {
            alert("Appointment time should not be empty..");
            document.frmappnt.time.focus();
            return false;
        } else if (document.frmappnt.select6.value == "") {
            alert("Doctor name should not be empty..");
            document.frmappnt.select6.focus();
            return false;
        } else if (document.frmappnt.select.value == "") {
            alert("Kindly select the status..");
            document.frmappnt.select.focus();
            return false;
        } else {
            return true;
        }
    }
</script>