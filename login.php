<?php

	require_once('confige.php');
  session_start();

    if(isset($_POST['login'])){
        $userName = $_POST['userName'];
        $userPassword = $_POST['userPassword'];

        if(empty($userName)){
          $error = 'Name is required!';
        }
        else if(empty($userPassword)){
          $error = 'Password is required!';
        }
        else{

          $stm = $pdo->prepare("SELECT * FROM admin WHERE username=? and password=?");
          $stm->execute(array($userName,SHA1($userPassword)));
          $adminCount = $stm->rowCount();
          if($adminCount == 1){
            $adminData = $stm->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['admin_loggedin'] = $adminData;

            header('location:index.php');
          }
          else{
            $error = 'Username or Password is Worng!';
          }

        }
    }
    if(isset($_SESSION['admin_loggedin'])){
      header('location:index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <h2 class="text-center">Admin Login</h2>
              </div>
              
              <form class="pt-3" action="" method="POST">
                
                <?php if(isset($error)) : ?>
                  <div class="alert alert-danger">
                    <?php echo $error; ?>
                  </div>
                <?php endif; ?>

                <?php if(isset($success)) : ?>
                  <div class="alert alert-success">
                    <?php echo $success; ?>
                  </div>
                <?php endif; ?>

                <div class="form-group">
                  <input type="text" name="userName" class="form-control form-control-lg" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="userPassword" class="form-control form-control-lg" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" name="login" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
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
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
</body>

</html>
