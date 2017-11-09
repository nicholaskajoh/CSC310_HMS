<?php
  require_once "../functions.php";
  
  db_connect();

  $sql = "INSERT INTO inventory (item, quantity) VALUES (?, ?)";
  $statement = $conn->prepare($sql);
  $statement->bind_param('ss', $_POST['item'], $_POST['quantity']);

  if ($statement->execute()) {
    redirect_to("/inventory.php");
  } else {
    echo "Error: " . $conn->error;
  }