<?php
  require_once "../functions.php";
  
  db_connect();

  $sql = "UPDATE beds SET available = ? WHERE id = ?";
  $statement = $conn->prepare($sql);
  $statement->bind_param('ii', $_GET['to'], $_GET['id']);

  if ($statement->execute()) {
    redirect_to("/beds.php");
  } else {
    echo "Error: " . $conn->error;
  }