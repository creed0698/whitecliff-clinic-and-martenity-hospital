<?php
session_start();
error_reporting(0);
include("adheader.php");
if (isset($_POST['submit'])) {
	if (isset($_GET['editid'])) {
		$sql = "UPDATE payopt SET payname='$_POST[payname]',amount='$_POST[amount]',description='$_POST[description]',status='$_POST[status]' WHERE payid='$_GET[editid]'";
		if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('Payment method  record updated successfully...');</script>";
		} else {
			echo mysqli_error($con);
		}
	} else {
		$sql = "INSERT INTO payopt(payname,amount,description,status) values('$_POST[payname]','$_POST[amount]','$_POST[description]','$_POST[status]')";
		if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('Payment method record inserted successfully...');</script>";
		} else {
			echo mysqli_error($con);
		}
	}
}
if (isset($_GET['editid'])) {
	$sql = "SELECT * FROM payopt WHERE payid='$_GET[editid]' ";
	$qsql = mysqli_query($con, $sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>


<div class="container-fluid">
	<div class="block-header">
		<h2>Payment Method</h2>

	</div>
	<div class="card">

		<form method="post" action="" name="frmpay" onSubmit="return validateform()">
			<table class="table table-hover">
				<tbody>
					<tr>
						<td width="34%">Method</td>
						<td width="66%"><input placeholder="Enter Here" class="form-control" type="text" name="payname" id="payname" value="<?php echo $rsedit['payname']; ?>" /></td>
					</tr>
					<tr>
						<td width="34%">Amount</td>
						<td width="66%"><input placeholder="Enter Here" class="form-control" type="text" name="amount" id="amount" value="<?php echo $rsedit['amount']; ?>" /></td>
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