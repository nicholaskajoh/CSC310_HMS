<?php
  require_once "../functions.php";

  db_connect();

  $sql = "UPDATE inventory SET quantity = ? WHERE id = ?";
  $statement = $conn->prepare($sql);
  $statement->bind_param('ii', $_POST['quantity'], $_POST['item_id']);

  if ($statement->execute()) {
    redirect_to("/inventory.php");
  } else {
    echo "Error: " . $conn->error;
  }