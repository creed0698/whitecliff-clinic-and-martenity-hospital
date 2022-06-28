<?php
session_start();
error_reporting(0);
include("adformheader.php");
include("dbconnection.php");
if (isset($_GET['delid'])) {
  $sql = "DELETE FROM branch WHERE branchid='$_GET[delid]'";
  $qsql = mysqli_query($con, $sql);
  if (mysqli_affected_rows($con) == 1) {
    echo "<script>
    Swal.fire({
      title: 'Done!',
      text: 'branch deleted successfully',
      type: 'success',
      
    })</script>";
  }
}
?>

<div class="container-fluid">
  <div class="block-header">
    <h2>View branch record</h2>

  </div>
  <div class="card">

    <section class="container">
      <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <tbody>
          <tr>
            <td><strong>Branch Name</strong></td>
            <td><strong>Branch Description</strong></td>
            <td><strong>Status</strong></td>
            <?php
            if (isset($_SESSION['adminid'])) {
            ?>
              <td><strong>Action</strong></td>
            <?php
            }
            ?>
          </tr>
          <?php
          $sql = "SELECT * FROM branch";
          $qsql = mysqli_query($con, $sql);
          while ($rs = mysqli_fetch_array($qsql)) {
            echo "<tr>
          <td>$rs[branchname]</td>
          <td> $rs[description]</td>
          
          <td>&nbsp;$rs[status]</td>";
            if (isset($_SESSION['adminid'])) {
              echo "<td>&nbsp;
            <a href='branch.php?editid=$rs[branchidid]'>Edit</a> | <a href='viewbranch.php?delid=$rs[branchid]'>Delete</a> </td>";
            }
            echo "</tr>";
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