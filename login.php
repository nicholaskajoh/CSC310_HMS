<?php include "php/header.php"; ?>

<?php
  if(is_auth()) redirect_to("/dashboard.php");
?>

<h1 class="txt-ll">Login</h1>

<div class="row">
  <div class="col"></div>
  <div class="col">
    <?php if(isset($_GET['error'])) { ?>
      <p style="color: red;">Invalid email or password!!!</p>
    <?php } ?>

    <form class="form-panel txt-center" method="post" action="php/process-login.php">
      <div class="form-grp">
        <label>Email: </label>
        <input type="email" name="email">
      </div>

      <div class="form-grp">
        <label>Password: </label>
        <input type="password" name="password">
      </div>

      <div class="form-grp">
        <label>Role: </label>
        <select name="role" required>
          <option value="">== select ==</option>
          <option value="doctor">Doctor</option>
          <option value="staff">Staff</option>
        </select>
      </div>

      <div class="form-grp">
        <button class="btn-ll" type="submit">Login</button>
      </div>
    </form>
  </div>
  <div class="col"></div>
</div>

<?php include "php/footer.php"; ?>