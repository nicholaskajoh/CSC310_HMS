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
    <h1 class="txt-ll">Inventory</h1>

    <!-- add item -->
    <form class="form-panel txt-center" method="post" action="php/add-inventory-item.php">
      <div class="form-grp">
        <label>Item: </label>
        <input type="text" name="item" required>
      </div>

      <div class="form-grp">
        <label>Quantity: </label>
        <input type="number" name="quantity" min="0" required>
      </div>

      <div class="form-grp">
        <button class="btn-s" type="submit">Add</button>
      </div>
    </form>
    <!-- ./add item -->

    <br>

    <div>
      <?php
        $inventory_sql = "SELECT * FROM inventory ORDER BY id DESC";
        $inventory_res = $conn->query($inventory_sql);
      ?>

      <table>
        <tr>
          <th>Item</th>
          <th>Quantity</th>
        </tr>

        <?php while($item = $inventory_res->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $item['item']; ?></td>
            <td>
              <form method="post" action="php/update-inventory-item.php">
                <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                <input type="text" name="quantity" value="<?php echo $item['quantity']; ?>" required>
                <button class="btn-pt" type="submit">Update</button>
                <button class="btn-g" type="button" onclick="window.location.href = 'php/delete-inventory-item.php?id=<?php echo $item['id']; ?>'">Delete</button>
              </form>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>

<?php include "php/footer.php"; ?>