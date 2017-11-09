<?php include "php/header.php"; ?>

<?php
  if(!(is_auth() && $_SESSION['user_role'] == "doctor")) {
    redirect_to("/login.php");
  }
?>

<div class="row">
  <div class="col col-25">
    <?php include "php/sidebar.php"; ?>
  </div>
  <div class="col col-75">
    <h1 class="txt-ll">Reports</h1>

    <div>
      <?php
        $reports_sql = "SELECT * FROM reports ORDER BY id DESC";
        $reports_res = $conn->query($reports_sql);
      ?>

      <table>
        <tr>
          <th>Patient ID</th>
          <th>Test</th>
          <th>Result</th>
          <th>Remarks</th>
        </tr>

        <?php while($report = $reports_res->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $report['patient_id']; ?></td>
            <td><?php echo $report['test']; ?></td>
            <td><?php echo $report['result']; ?></td>
            <td><?php echo $report['remarks']; ?></td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>

<?php include "php/footer.php"; ?>