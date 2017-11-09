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
    <h1 class="txt-ll">Beds</h1>

    <div>
      <?php
        $beds_sql = "SELECT * FROM beds ORDER BY id DESC";
        $beds_res = $conn->query($beds_sql);
      ?>

      <table>
        <tr>
          <th>Bed no.</th>
          <th>Room</th>
          <th>Ward</th>
          <th>Available</th>
        </tr>

        <?php while($bed = $beds_res->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $bed['bed_no']; ?></td>
            <td><?php echo $bed['room']; ?></td>
            <td><?php echo $bed['ward']; ?></td>
            <td>
              <?php if($bed['available'] == 1) { ?>
                Yes <?php $to = 0; ?>
              <?php } else { ?>
                No <?php $to = 1; ?>
              <?php } ?>
              (<a href="php/change-bed-availability.php?to=<?php echo $to; ?>&id=<?php echo $bed['id']; ?>">change</a>)
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>

<?php include "php/footer.php"; ?>