<?php
session_start();
error_reporting(0);
include("adheader.php");
if (isset($_POST['submit'])) {
	if (isset($_GET['editid'])) {
		$sql = "UPDATE maternityap SET maternityid='$_POST[select4]',branchid='$_POST[select5]',appointmentdate='$_POST[appointmentdate]',appointmenttime='$_POST[time]',serviceid='$_POST[select6]',payid='$_POST[select7]',status='$_POST[select]' WHERE maternityappointid='$_GET[editid]'";
		if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('Appointment Record Updated Successfully!');</script>";
		}
		else {
			echo mysqli_error($con);
		}
	}
	else {
		$sql = "INSERT INTO maternityap(maternityid,branchid,appointmentdate,appointmenttime,serviceid,payid,status) values('$_POST[select4]','$_POST[select5]','$_POST[appointmentdate]','$_POST[time]','$_POST[select6]','$_POST[select7]','$_POST[select]')";
		if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('Appointment Record Inserted Successfully!');</script>";
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

<div class="wrapper col2">
	<div id="breadcrumb">

		<h1></h1>
	</div>
</div>

<div class="container-fluid">
	<div class="block-header">
		<h2>Patient Report Panel</h2>
	</div>
	<div class="card">
		<p>
			<!-- jQuery Library -->
			<script src="js/jquery.min.js"></script>
			<script type="text/javascript">
				jQuery(document).ready(function($) {

					// Find the toggles and hide their content
					$('.toggle').each(function() {
						$(this).find('.toggle-content').hide();
					});

					// When a toggle is clicked (activated) show their content
					$('.toggle a.toggle-trigger').click(function() {
						var el = $(this),
							parent = el.closest('.toggle');

						if (el.hasClass('active')) {
							parent.find('.toggle-content').slideToggle();
							el.removeClass('active');
						} else {
							parent.find('.toggle-content').slideToggle();
							el.addClass('active');
						}
						return false;
					});

				}); //End
			</script>
			<!-- Toggle CSS -->
			<style type="text/css">
				/* Main toggle */
				.toggle {
					font-size: 13px;
					line-height: 20px;
					font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
					background: #ffffff;
					/* Main background */
					margin-bottom: 10px;
					border: 1px solid #e5e5e5;
					-webkit-border-radius: 5px;
					-moz-border-radius: 5px;
					border-radius: 5px;
				}

				/* Toggle Link text */
				.toggle a.toggle-trigger {
					display: block;
					padding: 10px 20px 15px 20px;
					position: relative;
					text-decoration: none;
					color: #666;
				}

				/* Toggle Link hover state */
				.toggle a.toggle-trigger:hover {
					opacity: .8;
					text-decoration: none;
				}

				/* Toggle link when clicked */
				.toggle a.active {
					text-decoration: none;
					border-bottom: 1px solid #e5e5e5;
					-webkit-box-shadow: 0 8px 6px -6px #ccc;
					-moz-box-shadow: 0 8px 6px -6px #ccc;
					box-shadow: 0 8px 6px -6px #ccc;
					color: #000;
				}

				/* Lets add a "-" before the toggle link */
				.toggle a.toggle-trigger:before {
					content: "-";
					/* You can add any symbol, font icon, or graphic icon */
					margin-right: 10px;
					font-size: 1.3em;
				}

				/* When the toggle is active, change the "-" to a "+" */
				.toggle a.active.toggle-trigger:before {
					content: "+";
				}

				/* The content of the toggle */
				.toggle .toggle-content {
					padding: 10px 20px 15px 20px;
					color: #666;
				}
			</style>
			<!-- Toggle #1 -->
		<div class="toggle">
			<!-- Toggle Link -->
			<a href="#" title="Title of Toggle" class="toggle-trigger">Patient Profile</a>
			<!-- Toggle Content to display -->
			<div class="toggle-content">
				<p><?php include("martenitydetail.php"); ?></p>
			</div><!-- .toggle-content (end) -->
		</div><!-- .toggle (end) -->

		<!-- Toggle #2 -->
		<div class="toggle">
			<!-- Toggle Link -->
			<a href="#" title="Title of Toggle" class="toggle-trigger">Appointment record</a>
			<!-- Toggle Content to display -->
			<div class="toggle-content">
				<p><?php include("martenityapdetail.php"); ?></p>
			</div><!-- .toggle-content (end) -->
		</div><!-- .toggle (end) -->


		<?php
if (isset($_SESSION['adminid'])) {
?>
		
		<?php
}
?>
		</p>
	</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<?php
include("adfooter.php");
?>