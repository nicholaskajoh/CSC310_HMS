<?php
  require_once "../functions.php";
  
  db_connect();

  $patient_id = $_POST['patient_id'];
  $name = $_POST['name'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $sql = "INSERT INTO patients (patient_id, name, dob, email, phone) VALUES (?, ?, ?, ?, ?)";
  $statement = $conn->prepare($sql);
  $statement->bind_param('sssss', $patient_id, $name, $dob, $email, $phone);

  if ($statement->execute()) {
    redirect_to("/patients.php");
  } else {
    echo "Error: " . $conn->error;
  }