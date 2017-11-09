<?php include "php/header.php"; ?>

<?php
  if(!(is_auth() && $_SESSION['user_role'] == "staff")) {
    redirect_to("/login.php");
  }
?>

<div class="row">
  <div class="col col-25">
    <?php include "php/sidebar.php"; ?>
  </div>
  <div class="col col-75">
    <h1 class="txt-ll">Staff</h1>

    <div>
      <?php
        $staff_sql = "SELECT * FROM staff ORDER BY id DESC";
        $staff_res = $conn->query($staff_sql);
      ?>

      <table>
        <tr>
          <th>Name</th>
          <th>Role</th>
          <th>Email</th>
          <th>Phone</th>
        </tr>

        <?php while($staff = $staff_res->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $staff['name']; ?></td>
            <td><?php echo $staff['role']; ?></td>
            <td><?php echo $staff['email']; ?></td>
            <td><?php echo $staff['phone']; ?></td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>

<?php include "php/footer.php"; ?>