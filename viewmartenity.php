<?php
session_start();
error_reporting(0);
include("adformheader.php");
include("dbconnection.php");
if (isset($_GET['delid'])) {
  $sql = "DELETE FROM martenity WHERE martenityid='$_GET[delid]'";
  $qsql = mysqli_query($con, $sql);
  if (mysqli_affected_rows($con) == 1) {
    echo "<script>alert('patient record deleted successfully..');</script>";
  }
}
?>
<div class="container-fluid">
  <div class="block-header">
    <h2>View Patient records</h2>

  </div>

  <div class="card">

    <section class="container">
      <table class="table table-bordered table-striped table-hover js-basic-example dataTable">

        <thead>
          <tr>
            <th width="15%" height="36">
              <div align="center">Patient Name</div>
            </th>
            <th width="20%">
              <div align="center">Admission details</div>
            </th>
            <th width="28%">
              <div align="center">Address</div>
            </th>
            <th width="20%">
              <div align="center">Patient Profile</div>
            </th>
            <th width="17%">
              <div align="center">Action</div>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM martenity";
          $qsql = mysqli_query($con, $sql);
          while ($rs = mysqli_fetch_array($qsql)) {
            echo "<tr>
        <td>$rs[martenityname]<br>
        <strong>Login ID :</strong> $rs[loginid] </td>
        <td>
        <strong>Date</strong>: &nbsp;$rs[admissiondate]<br>
        <strong>Time</strong>: &nbsp;$rs[admissiontime]</td>
        <td>$rs[address]<br>$rs[city] -  &nbsp;$rs[pincode]<br>
        Mob No. - $rs[mobileno]</td>
        <td><strong>Blood group</strong> - $rs[bloodgroup]<br>
        <strong>Gender</strong> - &nbsp;$rs[gender]<br>
        <strong>DOB</strong> - &nbsp;$rs[dob]</td>
        <td align='center'>Status - $rs[status] <br>";
            if (isset($_SESSION['adminid'])) {
              echo "<a href='martenity.php?editid=$rs[martenityid]' class='btn btn-sm btn-raised g-bg-cyan'>Edit</a>
              <a href='viewmartenity.php?delid=$rs[martenityid]' class='btn btn-sm btn-raised g-bg-blush2'>Delete</a> <hr>
          <a href='martenityreport.php?martenityid=$rs[martenityid]' class='btn btn-sm btn-raised'>View Report</a>";
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