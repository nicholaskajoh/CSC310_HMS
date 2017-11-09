<?php include "php/header.php"; ?>

<?php
  if(!is_auth()) redirect_to("/login.php");
?>

<div class="row">
  <div class="col col-25">
    <?php include "php/sidebar.php"; ?>
  </div>
  <div class="col col-75">
    <h1 class="txt-ll">Doctors</h1>

    <div>
      <?php
        $doctors_sql = "SELECT * FROM doctors ORDER BY id DESC";
        $doctors_res = $conn->query($doctors_sql);
      ?>

      <table>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Office</th>
          <th>Consultation time</th>
        </tr>

        <?php while($doctor = $doctors_res->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $doctor['name']; ?></td>
            <td><?php echo $doctor['email']; ?></td>
            <td><?php echo $doctor['phone']; ?></td>
            <td><?php echo $doctor['office']; ?></td>
            <td><?php echo $doctor['consultation_time']; ?></td>
          </tr>
          <?php } ?>
      </table>
    </div>
  </div>
</div>

<?php include "php/footer.php"; ?>