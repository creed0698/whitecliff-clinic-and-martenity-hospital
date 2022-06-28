<?php
session_start();
error_reporting(0);
include("adformheader.php");
include("dbconnection.php");
if (isset($_GET['delid'])) {
  $sql = "DELETE FROM payopt WHERE payid='$_GET[delid]'";
  $qsql = mysqli_query($con, $sql);
  if (mysqli_affected_rows($con) == 1) {
    echo "<script>alert('Payment record deleted successfully..');</script>";
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
          <th>Payment Name</th>
          <th>Amount</th>
          <th>Description</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $sql = "SELECT * FROM payopt";
        $qsql = mysqli_query($con, $sql);
        while ($rs = mysqli_fetch_array($qsql)) {
          echo "<tr>
              <td>&nbsp;$rs[payname]</td>
              <td>&nbsp;$ $rs[amount]</td>
              <td>&nbsp;$rs[description]</td>
              <td>&nbsp;$rs[status]</td>
              <td>&nbsp;
              <a href='paymentmethods.php?editid=$rs[payid]' class='btn btn-raised g-bg-cyan'>Edit</a> 
              <a href='viewpaymethod.php?delid=$rs[payid]' class='btn btn-raised g-bg-blush2'>Delete</a></td>
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