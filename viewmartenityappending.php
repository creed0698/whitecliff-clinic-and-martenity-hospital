<?php
session_start();
error_reporting(0);
include("adformheader.php");
include("dbconnection.php");
if (isset($_GET['delid'])) {
	$sql = "DELETE FROM maternityap WHERE maternityappointid='$_GET[delid]'";
	$qsql = mysqli_query($con, $sql);
	if (mysqli_affected_rows($con) == 1) {
		echo "<script>alert('appointment record deleted successfully..');</script>";
	}
}
if (isset($_GET['approveid'])) {
	$sql = "UPDATE maternity SET status='Active' WHERE maternityid='$_GET[maternityid]'";
	$qsql = mysqli_query($con, $sql);

	$sql = "UPDATE maternityap SET status='Approved' WHERE maternityappointid='$_GET[approveid]'";
	$qsql = mysqli_query($con, $sql);
	if (mysqli_affected_rows($con) == 1) {
		echo "<script>alert('Appointment record Approved successfully..');</script>";
		echo "<script>window.location='viewmartenityappending.php';</script>";
	}
}
?>
<div class="container-fluid">
	<div class="block-header">
		View Appointment records
	</div>


	<div class="card">
		<section class="container">
			<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
				<thead>

					<tr>

						<th>Patient detail</th>
						<th>Appointment Date & Time</th>
						<th>Branch</th>
						<th>Service</th>
						<th>Payment</th>
						<th>Status</th>
						<th width="15%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
$sql = "SELECT * FROM maternityap WHERE (status='Pending' OR status='Inactive')";
if (isset($_SESSION['maternityid'])) {
	$sql = $sql . " AND maternityid='$_SESSION[maternityid]'";
}
$qsql = mysqli_query($con, $sql);
while ($rs = mysqli_fetch_array($qsql)) {
	$sqlpat = "SELECT * FROM maternity WHERE maternityid='$rs[maternityid]'";
	$qsqlpat = mysqli_query($con, $sqlpat);
	$rspat = mysqli_fetch_array($qsqlpat);


	$sqldept = "SELECT * FROM branch WHERE branchid='$rs[branchid]'";
	$qsqldept = mysqli_query($con, $sqldept);
	$rsdept = mysqli_fetch_array($qsqldept);

	$sqldoc = "SELECT * FROM offeredservice WHERE serviceid='$rs[serviceid]'";
	$qsqldoc = mysqli_query($con, $sqldoc);
	$rsdoc = mysqli_fetch_array($qsqldoc);

	$sqlpay = "SELECT * FROM payopt WHERE payid='$rs[payid]'";
	$qsqlpay = mysqli_query($con, $sqlpay);
	$rspay = mysqli_fetch_array($qsqlpay);
	echo "<tr>

					<td>&nbsp;$rspat[maternityname]<br>&nbsp;$rspat[mobileno]</td>		 
					<td>&nbsp;" . date("d-M-Y", strtotime($rs['appointmentdate'])) . " &nbsp; " . date("H:i A", strtotime($rs['appointmenttime'])) . "</td> 
					<td>&nbsp;$rsdept[branchname]</td>
					<td>&nbsp;$rsdoc[servicename]</td>
					<td>&nbsp;$rspay[payname]</td>
					<td>&nbsp;$rs[status]</td>
					<td>";
	if ($rs['status'] != "Approved") {
		if (!(isset($_SESSION['maternityid']))) {
			echo "<a href='martenitypending.php?editid=$rs[maternityappointid]&maternityid=$rs[maternityid]' class='btn btn-sm btn-raised g-bg-cyan'>Pending</a>";
		}
		echo "  <a href='viewmartenitybook.php?delid=$rs[maternityappointid]' class='btn btn-sm btn-raised g-bg-blush2'>Delete</a>";
	}
	else {
		echo "<a href='martenityreport.php?maternityid=$rs[maternityid]&maternityappointid=$rs[maternityappointid]' class='btn btn-raised'>View Report</a>";
	}
	echo "</td></tr>";
}
?>
				</tbody>
			</table>
		</section>

	</div>
</div>

<?php
include("adformfooter.php");
?>