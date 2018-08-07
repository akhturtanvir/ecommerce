<?php
  include_once "common/header.php";
  Session::checkLogin();
  include_once "../classes/AdminUser.php";
?>

<?php

  $user = new AdminUser();
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $adminUsrRegi = $user->adminRegistration($_POST);
  }
?>

<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
      <div class="row w-100 mx-auto">
        <div class="col-lg-4 mx-auto">
          <h2 class="text-center mb-4">Register</h2>
          <div class="auto-form-wrapper">
            <form action="" method="POST">
              <span id="error_mess" class="text-danger">

                <?php
                  if (isset($adminUsrRegi)) {
                    echo $adminUsrRegi;
                  }
                ?>

              </span><br><br>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group d-flex justify-content-center">
                <div class="form-check form-check-flat mt-0">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" checked> I agree to the terms
                  </label>
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-primary submit-btn btn-block" id="regi-button" name="register">Register</button>
              </div>
              <div class="text-block text-center my-3">
                <span class="text-small font-weight-semibold">Already have and account ?</span>
                <a href="login.php" class="text-black text-small">Login</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>

<?php
  include_once "common/jScript.php";
?>