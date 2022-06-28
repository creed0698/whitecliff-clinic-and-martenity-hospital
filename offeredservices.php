<?php
session_start();
error_reporting(0);
include("adheader.php");
include("dbconnection.php");
if (isset($_POST['submit'])) {
	if (isset($_GET['editid'])) {
		$sql = "UPDATE offeredservice SET servicename='$_POST[servicename]',servicecost='$_POST[servicecost]',payment='$_POST[payment]',description='$_POST[description]',status='$_POST[status]' WHERE serviceid='$_GET[editid]'";
		if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('Service record updated successfully...');</script>";
		} else {
			echo mysqli_error($con);
		}
	} else {
		$sql = "INSERT INTO offeredservice(servicename,servicecost,payment,description,status) values('$_POST[servicename]','$_POST[servicecost]','$_POST[payment]','$_POST[description]','$_POST[status]')";
		if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('Service record inserted successfully...');</script>";
		} else {
			echo mysqli_error($con);
		}
	}
}
if (isset($_GET['editid'])) {
	$sql = "SELECT * FROM offeredservice WHERE serviceid='$_GET[editid]' ";
	$qsql = mysqli_query($con, $sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>


<div class="container-fluid">
	<div class="block-header">
		<h2>Add new Service record</h2>

	</div>
	<div class="card">

		<form method="post" action="" name="frmservice" onSubmit="return validateform()">
			<table class="table table-hover">
				<tbody>
					<tr>
						<td width="34%">Service Name</td>
						<td width="66%"><input placeholder="Enter Here" class="form-control" type="text" name="servicename" id="servicename" value="<?php echo $rsedit['servicename']; ?>" /></td>
					</tr>
					<tr>
						<td width="34%">Service cost</td>
						<td width="66%"><input placeholder="Enter Here" class="form-control" type="text" name="servicecost" id="servicecost" value="<?php echo $rsedit['servicecost']; ?>" /></td>
					</tr>
					<tr>
						<td>Payment Option</td>
						<td>
                            <select class="form-control show-tick" name="payment" id="payment">
                                <option value="">Select</option>
                                <?php
                                $sqldept = "SELECT * FROM payopt WHERE status='Active'";
                                $qsqldept = mysqli_query($con, $sqldept);
                                while ($rsdept = mysqli_fetch_array($qsqldept)) {
                                    echo "<option value='$rsdept[payname]'>$rsdept[payname]</option>";
                                }
                                ?>
                            </select>
						</td>
					</tr>
					<tr>
						<td>Description</td>
						<td><textarea placeholder="Enter Here" class="form-control no-resize" name="description" id="description" cols="45" rows="5"><?php echo $rsedit['description']; ?></textarea></td>
					</tr>
					<tr>
						<td>Status</td>
						<td> <select class="form-control show-tick" name="status" id="status">
								<option value="">Select</option>
								<?php
								$arr = array("Active", "Inactive");
								foreach ($arr as $val) {
									if ($val == $rsedit['status']) {
										echo "<option value='$val' selected>$val</option>";
									} else {
										echo "<option value='$val'>$val</option>";
									}
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center"></td>
					</tr>
				</tbody>
			</table>
			<input class="btn btn-default" type="submit" name="submit" id="submit" value="Submit">
		</form>
		<p>&nbsp;</p>
	</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<?php
include("adfooter.php");
?>
</script>