<?php
  require_once "../functions.php";

  db_connect();

  $table = ($_POST['role'] == "doctor") ? "doctors" : "staff";

  $sql = "SELECT id, email FROM {$table} WHERE email = ? AND password = ?";
  $statement = $conn->prepare($sql);
  $statement->bind_param('ss', $_POST['email'], $_POST['password']);
  $statement->execute();
  $statement->store_result();
  $statement->bind_result($id, $email);
  $statement->fetch();

  if ($statement->execute()) {
    if(!is_null($id)) {
      $_SESSION['user_id'] = $id;
      $_SESSION['user_email'] = $email;
      $_SESSION['user_role'] = $_POST['role'];
      redirect_to("/dashboard.php");
    } else {
      redirect_to("/login.php?error=true");
    }
  } else {
    echo "Error: " . $conn->error;
  }