<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if (isset($_POST['submitapp'])) {
	$sql = "INSERT INTO martenityap(branchid,appointmentdate,appointmenttime,serviceid,payid) values('$_POST[select3]','$_POST[date]','$_POST[time]','$_POST[select5]','$_POST[select6]')";
	if ($qsql = mysqli_query($con, $sql)) {
		echo "<script>alert('appointment record inserted successfully...');</script>";
	} else {
		echo mysqli_error($con);
	}
}

if (isset($_GET['editid'])) {
	$sql = "SELECT * FROM martenityap WHERE martenityappointid='$_GET[editid]' ";
	$qsql = mysqli_query($con, $sql);
	$rsedit = mysqli_fetch_array($qsql);
}

$sqlappointment1 = "SELECT max(martenityappointid) FROM martenityap where martenityid='$_GET[martenityid]' AND (status='Active' OR status='Approved')";
$qsqlappointment1 = mysqli_query($con, $sqlappointment1);
$rsappointment1 = mysqli_fetch_array($qsqlappointment1);

$sqlappointment = "SELECT * FROM martenityap where martenityappointid='$rsappointment1[0]'";
$qsqlappointment = mysqli_query($con, $sqlappointment);
$rsappointment = mysqli_fetch_array($qsqlappointment);

if (mysqli_num_rows($qsqlappointment) == 0) {
	echo "<center><h2>No Appointment records found..</h2></center>";
} else {
	$sqlappointment = "SELECT * FROM martenityap where martenityappointid='$rsappointment1[0]'";
	$qsqlappointment = mysqli_query($con, $sqlappointment);
	$rsappointment = mysqli_fetch_array($qsqlappointment);

	$sqlbranch = "SELECT * FROM branch where branchid='$rsappointment[branchid]'";
	$qsqlbranch = mysqli_query($con, $sqlbranch);
	$rsbranch = mysqli_fetch_array($qsqlbranch);

	$sqlservice = "SELECT * FROM offeredservice where serviceid='$rsappointment[serviceid]'";
	$qsqlservice = mysqli_query($con, $sqlservice);
	$rsservice = mysqli_fetch_array($qsqlservice);

	$sqlpay = "SELECT * FROM payopt where payid='$rsappointment[payid]'";
	$qsqlpay = mysqli_query($con, $sqlpay);
	$rspay = mysqli_fetch_array($qsqlpay);
?>
	<table class="table table-bordered table-striped">
		<tr>
			<td>Branch</td>
			<td>&nbsp;<?php echo $rsbranch['branchname']; ?></td>
		</tr>
		<tr>
			<td>Service</td>
			<td>&nbsp;<?php echo $rsservice['servicename']; ?></td>
		</tr>
		<tr>
			<td>Payment Method</td>
			<td>&nbsp;<?php echo $rspay['payname']; ?></td>
		</tr>
		<tr>
			<td>Appointment Date</td>
			<td>&nbsp;<?php echo date("d-M-Y", strtotime($rsappointment['appointmentdate'])); ?></td>
		</tr>
		<tr>
			<td>Appointment Time</td>
			<td>&nbsp;<?php echo date("h:i A", strtotime($rsappointment['appointmenttime'])); ?></td>
		</tr>
	</table>
<?php
}
?>
<script type="application/javascript">
	function validateform() {

		if (document.frmappntdetail.select.value == "") {
			alert("Appointment type should not be empty..");
			document.frmappntdetail.select.focus();
			return false;
		} else if (document.frmappntdetail.select3.value == "") {
			alert("Branch name should not be empty..");
			document.frmappntdetail.select3.focus();
			return false;
		} else if (document.frmappntdetail.date.value == "") {
			alert("Appointment date should not be empty..");
			document.frmappntdetail.date.focus();
			return false;
		} else if (document.frmappntdetail.time.value == "") {
			alert("Appointment time should not be empty..");
			document.frmappntdetail.time.focus();
			return false;
		} else if (document.frmappntdetail.select5.value == "") {
			alert("Service name should not be empty..");
			document.frmappntdetail.select5.focus();
			return false;
		} else {
			return true;
		}
	}
</script>