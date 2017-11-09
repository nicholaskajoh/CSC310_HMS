<ul class="sidebar">
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="patients.php">Patients</a></li>
  <li><a href="doctors.php">Doctors</a></li>
  <?php if($_SESSION['user_role'] == "doctor") { ?>
    <li><a href="reports.php">Reports</a></li>
  <?php } else { ?>
    <li><a href="beds.php">Beds</a></li>
    <li><a href="inventory.php">Inventory</a></li>
    <li><a href="staff.php">Staff</a></li>
  <?php } ?>
</ul>