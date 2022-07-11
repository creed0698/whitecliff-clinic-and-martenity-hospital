<?php
session_start();
error_reporting(0);
include("adformheader.php");
include("dbconnection.php");
if (isset($_GET['delid'])) {
	$sql = "DELETE FROM martenityap WHERE martenityappointid='$_GET[delid]'";
	$qsql = mysqli_query($con, $sql);
	if (mysqli_affected_rows($con) == 1) {
		echo "<script>alert('appointment record deleted successfully..');</script>";
	}
}
if (isset($_GET['approveid'])) {
	$sql = "UPDATE martenityap SET status='Approved' WHERE martenityappointid='$_GET[approveid]'";
	$qsql = mysqli_query($con, $sql);
	if (mysqli_affected_rows($con) == 1) {
		echo "<script>alert('Appointment record Approved successfully..');</script>";
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

						<td>Patient detail</td>
						<td>Registration Date & Time</td>
						<td>Branch</td>
						<td>Service</td>
						<td>Payment</td>
						<td>Status</td>
						<td>
							<div align="center">Action</div>
						</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM martenityap WHERE (status='Approved' OR status='Active')";
					if (isset($_SESSION['martenityid'])) {
						$sql  = $sql . " AND martenityid='$_SESSION[martenityid]'";
					}
					if (isset($_SESSION['serviceid'])) {
						$sql  = $sql . " AND serviceid='$_SESSION[serviceid]'";
					}
					$qsql = mysqli_query($con, $sql);
					while ($rs = mysqli_fetch_array($qsql)) {
						$sqlpat = "SELECT * FROM martenity WHERE martenityid='$rs[martenityid]'";
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

					<td>&nbsp;$rspat[martenityname]<br>&nbsp;$rspat[mobileno]</td>		 
					<td>&nbsp;$rs[appointmentdate]&nbsp;$rs[appointmenttime]</td> 
					<td>&nbsp;$rsdept[branchname]</td>
					<td>&nbsp;$rsdoc[servicename]</td>
					<td>&nbsp;$rspay[payname]</td>
					<td>&nbsp;$rs[status]</td>
					<td><div align='center'>";
						if ($rs['status'] != "Approved") {
							if (!(isset($_SESSION['martenityid']))) {
								echo "<a href='martenityapapproval.php?editid=$rs[martenityappointid]' class='btn btn-raised g-bg-cyan>Approve</a><hr>";
							} 
							else {
								echo "  <a href='viewmartenitybook.php?delid=$rs[martenityappointid]' class='btn btn-raised g-bg-blush2'>Delete</a>";
							}
						} else {
							echo "<a href='martenityreport.php?martenityid=$rs[martenityid]&martenityappointid=$rs[martenityappointid]' class='btn btn-raised'>View Report</a>";
						}
		
						echo "</center></td></tr>";
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