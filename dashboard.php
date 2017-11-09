<?php include "php/header.php"; ?>

<?php
  if(!is_auth()) redirect_to("/login.php");
?>

<div class="row">
  <div class="col col-25">
    <?php include "php/sidebar.php"; ?>
  </div>
  <div class="col col-75">
    <h1 class="txt-ll">Dashboard</h1>

    <h4 class="txt-g">Stats</h4>

    <ul>
      <li>
        <?php
          $patients_count_sql = "SELECT COUNT(*) FROM patients";
          $patients_count_res = $conn->query($patients_count_sql);
          echo $patients_count_res->fetch_array()[0] . " patient(s)";
        ?>
      </li>
      <li>
        <?php
          $doctors_count_sql = "SELECT COUNT(*) FROM doctors";
          $doctors_count_res = $conn->query($doctors_count_sql);
          echo $doctors_count_res->fetch_array()[0] . " doctor(s)";
        ?>
      </li>
      <li>
        <?php
          $staff_count_sql = "SELECT COUNT(*) FROM staff";
          $staff_count_res = $conn->query($staff_count_sql);
          echo $staff_count_res->fetch_array()[0] . " staff";
        ?>
      </li>
    </ul>

    <h4 class="txt-g">Patients</h4>

    <ul>
      <li><a href="patients.php#patients_tbl">View patients</a></li>
      <li><a href="patients.php">Add patient</a></li>
    </ul>

    <h4 class="txt-g">Doctors</h4>

    <ul>
      <li><a href="doctors.php">View doctors</a></li>
    </ul>

    <h4 class="txt-g">Staff</h4>

    <ul>
      <li><a href="staff.php">View staff</a></li>
    </ul>
  </div>
</div>

<?php include "php/footer.php"; ?>