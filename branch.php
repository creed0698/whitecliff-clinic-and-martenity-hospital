<?php
session_start();
error_reporting(0);
include("adheader.php");
include("dbconnection.php");
if (isset($_POST['submit'])) {
	if (isset($_GET['editid'])) {
		$sql = "UPDATE branch SET branchname='$_POST[branchname]',description='$_POST[textarea]',status='$_POST[select]' WHERE branchid='$_GET[editid]'";
		if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('branch record updated successfully...');</script>";
		} else {
			echo mysqli_error($con);
		}
	} else {
		$sql = "INSERT INTO branch(branchname,description,status) values('$_POST[branchname]','$_POST[textarea]','$_POST[select]')";
		if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('branch record inserted successfully...');</script>";
		} else {
			echo mysqli_error($con);
		}
	}
}
if (isset($_GET['editid'])) {
	$sql = "SELECT * FROM branch WHERE branchid='$_GET[editid]' ";
	$qsql = mysqli_query($con, $sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>
<div class="container-fluid">
	<div class="block-header">
		<h2>Add New Branch </h2>
	</div>
	<div class="card">
		<form method="post" action="" name="frmdept" onSubmit="return validateform()">
			<table class="table table-hover">
				<tbody>
					<tr>
						<td width="34%">Branch Name</td>
						<td width="66%"><input placeholder=" Enter Here " class="form-control" type="text" name="branchname" id="branchname" value="<?php echo $rsedit['branchname']; ?>" /></td>
					</tr>
					<tr>
						<td>Description</td>
						<td><textarea placeholder=" Enter Here " class="form-control no-resize" name="textarea" id="textarea" cols="45" rows="5"><?php echo $rsedit['description']; ?></textarea></td>
					</tr>
					<tr>
						<td>Status</td>
						<td> <select name="select" id="select" class="form-control show-tick">
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
							</select></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input class="btn btn-default" type="submit" name="submit" id="submit" value="Submit" /></td>
					</tr>
				</tbody>
			</table>
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
<script type="application/javascript">
	var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
	var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
	var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

	function validateform() {
		if (document.frmdept.branchname.value == "") {
			alert("Branch name should not be empty..");
			document.frmdept.branchname.focus();
			return false;
		} else if (!document.frmdept.branchname.value.match(alphaExp)) {
			alert("Branch name not valid..");
			document.frmdept.branchname.focus();
			return false;
		} else if (document.frmdept.select.value == "") {
			alert("Kindly select the status..");
			document.frmdept.select.focus();
			return false;
		} else {
			return true;
		}
	}
</script>