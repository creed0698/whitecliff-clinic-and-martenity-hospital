<?php
session_start();
error_reporting(0);
include("adformheader.php");
include("dbconnection.php");
if (isset($_GET['delid'])) {
  $sql = "DELETE FROM offeredservice WHERE serviceid='$_GET[delid]'";
  $qsql = mysqli_query($con, $sql);
  if (mysqli_affected_rows($con) == 1) {
    echo "<script>alert('Service redcord deleted successfully..');</script>";
  }
}
?>
<div class="container-fluid">
  <div class="block-header">
    <h2>View service list</h2>

  </div>
</div>
<div class="card">

  <section class="container">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">

      <thead>
        <tr>
          <th>Service name</th>
          <th>Service cost</th>
          <th>Payment</th>
          <th>Description</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $sql = "SELECT * FROM offeredservice";
        $qsql = mysqli_query($con, $sql);
        while ($rs = mysqli_fetch_array($qsql)) {
          echo "<tr>
              <td>&nbsp;$rs[servicename]</td>
              <td>&nbsp;$ $rs[servicecost]</td>
              <td>&nbsp;$rs[payment]</td>
              <td>&nbsp;$rs[description]</td>
              <td>&nbsp;$rs[status]</td>
              <td>&nbsp;
              <a href='offeredservices.php?editid=$rs[serviceid]' class='btn btn-raised g-bg-cyan'>Edit</a> 
              <a href='viewofferedservices.php?delid=$rs[serviceid]' class='btn btn-raised g-bg-blush2'>Delete</a></td>
              </tr>";
        }
        ?>
      </tbody>
    </table>
  </section>

</div>
</div>
</div>

</div>
</div>
<?php
include("adformfooter.php");
?>