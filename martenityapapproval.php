<?php
session_start();
error_reporting(0);
include("adheader.php");
include("dbconnection.php");
if (isset($_POST['submit'])) {
	if (isset($_GET['editid'])) {
		$sql = "UPDATE martenity SET status='Active' WHERE martenityid='$_GET[martenityid]'";
		$qsql = mysqli_query($con, $sql);
		$roomid = 0;
		$sql = "UPDATE martenityap SET branchid='$_POST[select5]',serviceid='$_POST[select6]',payid='$_POST[select7]',status='Approved',appointmentdate='$_POST[appointmentdate]',appointmenttime='$_POST[time]' WHERE martenityappointid='$_GET[editid]'";
		if ($qsql = mysqli_query($con, $sql)) {
			$roomid = $_POST['select3'];
			$billtype = "Room Rent";
			include("insertbillingrecord.php");
			echo "<script>alert('appointment record updated successfully...');</script>";
		} else {
			echo mysqli_error($con);
		}
	} else {
		$sql = "UPDATE martenity SET status='Active' WHERE martenityid='$_POST[select4]'";
		$qsql = mysqli_query($con, $sql);

		$sql = "INSERT INTO martenityap(martenityid,branchid,appointmentdate,appointmenttime,serviceid,payid,status) values('$_POST[select4]','$_POST[select5]','$_POST[appointmentdate]','$_POST[time]','$_POST[select6]','$_POST[select7]','$_POST[select]')";
		if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('Appointment record inserted successfully...');</script>";
		} else {
			echo mysqli_error($con);
		}
	}
}
if (isset($_GET['editid'])) {
	$sql = "SELECT * FROM martenityap WHERE martenityappointid='$_GET[editid]' ";
	$qsql = mysqli_query($con, $sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>
<div class="card ">
	<h2>Appointment Record Approval Process</h2>
	<form method="post" action="" name="frmappnt" onSubmit="return validateform()">
		<table class="table table-striped">
			<tr>
				<td>Patient</td>
				<td>
					<?php
					if (isset($_GET['martenityid'])) {
						$sqlpatient = "SELECT * FROM martenity WHERE martenityid='$_GET[martenityid]'";
						$qsqlpatient = mysqli_query($con, $sqlpatient);
						$rspatient = mysqli_fetch_array($qsqlpatient);
						echo $rspatient['martenityname'] . " (Patient ID - $rspatient[martenityid])";
					} else {
						$sqlpatient = "SELECT * FROM martenity WHERE status='Active'";
						$qsqlpatient = mysqli_query($con, $sqlpatient);
						while ($rspatient = mysqli_fetch_array($qsqlpatient)) {
							if ($rspatient['martenityid'] == $rsedit['martenityid']) {
								echo "<option value='$rspatient[martenityid]' selected> $rspatient[martenityname](Patient ID - $rspatient[martenityid])</option>";
							}
						}
					}
					?>
				</td>
			</tr>
			<tr>
				<td>Branch</td>
				<td><select name="select5" id="select5" class="form-control show-tick">
						<option value="">Select</option>
						<?php
						$sqlbranch = "SELECT * FROM branch WHERE status='Active'";
						$qsqlbranch = mysqli_query($con, $sqlbranch);
						while ($rsbranch = mysqli_fetch_array($qsqlbranch)) {
							if ($rsbranch['branchid'] == $rsedit['branchid']) {
								echo "<option value='$rsbranch[branchid]' selected>$rsbranch[branchname]</option>";
							} else {
								echo "<option value='$rsbranch[branchid]'>$rsbranch[branchname]</option>";
							}
						}
						?>
					</select></td>
			</tr>
			<tr>
				<td>Service</td>
				<td><select name="select6" id="select6" class="form-control show-tick">
						<option value="">Select</option>
						<?php
						$sqlbranch = "SELECT * FROM offeredservice WHERE status='Active'";
						$qsqlbranch = mysqli_query($con, $sqlbranch);
						while ($rsbranch = mysqli_fetch_array($qsqlbranch)) {
							if ($rsbranch['serviceid'] == $rsedit['serviceid']) {
								echo "<option value='$rsbranch[serviceid]' selected>$rsbranch[servicename]</option>";
							} else {
								echo "<option value='$rsbranch[serviceid]'>$rsbranch[servicename]</option>";
							}
						}
						?>
					</select></td>
			</tr>
			<tr>
				<td>Payment Option</td>
				<td><select name="select7" id="select7" class="form-control show-tick">
						<option value="">Select</option>
						<?php
						$sqlpay = "SELECT * FROM payopt WHERE status='Active'";
						$qsqlpay = mysqli_query($con, $sqlpay);
						while ($rspay = mysqli_fetch_array($qsqlpay)) {
							if ($rspay['payid'] == $rsedit['payid']) {
								echo "<option value='$rspay[payid]' selected>$rspay[payname]</option>";
							} else {
								echo "<option value='$rspay[payid]'>$rspay[payname]</option>";
							}
						}
						?>
					</select></td>
			</tr>
			
			<tr>
				<td>Appointment Date</td>
				<td><input class="form-control" type="date" name="appointmentdate" id="appointmentdate" value="<?php echo $rsedit['appointmentdate']; ?>" /></td>
			</tr>
			<tr>
				<td>Appointment Time</td>
				<td><input class="form-control" type="time" name="time" id="time" value="<?php echo $rsedit['appointmenttime']; ?>" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input class="btn btn-default" type="submit" name="submit" id="submit" value="Submit" /></td>
			</tr>
			</tbody>
		</table>
	</form>
	<p>&nbsp;</p>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
include("adfooter.php");
?>
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
			alert("Branch name should not be empty..");
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
			alert("Service name should not be empty..");
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
	$('.out_patient').hide();
	$('#apptype').change(function() {
		apptype = $('#apptype').val();
		if (apptype == 'InPatient') {
			$('.out_patient').show();
		} else {
			$('.out_patient').hide();
		}
	});
</script>