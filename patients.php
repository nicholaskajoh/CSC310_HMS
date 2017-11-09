<?php include "php/header.php"; ?>

<?php
  if(!is_auth()) redirect_to("/login.php");
?>

<div class="row">
  <div class="col col-25">
    <?php include "php/sidebar.php"; ?>
  </div>
  <div class="col col-75">
    <h1 class="txt-ll">Patients</h1>

    <!-- add patient -->
    <form class="form-panel txt-center" method="post" action="php/add-patient.php">
      <div class="form-grp">
        <label>Patient ID: </label>
        <input type="text" name="patient_id" required>
      </div>

      <div class="form-grp">
        <label>Name: </label>
        <input type="text" name="name" required>
      </div>

      <div class="form-grp">
        <label>DOB: </label>
        <input type="date" name="dob" required>
      </div>

      <div class="form-grp">
        <label>Email: </label>
        <input type="email" name="email" required>
      </div>

      <div class="form-grp">
        <label>Phone: </label>
        <input type="text" name="phone" required>
      </div>

      <div class="form-grp">
        <button class="btn-s" type="submit">Add</button>
      </div>
    </form>
    <!-- ./add patient -->

    <br>

    <div>
      <?php
        $patients_sql = "SELECT * FROM patients ORDER BY id DESC";
        $patients_res = $conn->query($patients_sql);
      ?>

      <table id="patients_tbl">
        <tr>
          <th>Patient ID</th>
          <th>Name</th>
          <th>DOB</th>
          <th>Email</th>
          <th>Phone</th>
        </tr>

        <?php while($patient = $patients_res->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $patient['patient_id']; ?></td>
            <td><?php echo $patient['name']; ?></td>
            <td><?php echo $patient['dob']; ?></td>
            <td><?php echo $patient['email']; ?></td>
            <td><?php echo $patient['phone']; ?></td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>

<?php include "php/footer.php"; ?>