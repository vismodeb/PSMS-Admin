<?php

    require_once('header.php');

    if(isset($_POST['chang_pass'])){
        $current_pass = $_POST['current_pass'];
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];

        $admin_id = $_SESSION['admin_loggedin'][0]['id'];

        $stm = $pdo->prepare("SELECT password FROM admin WHERE id=?");
        $stm->execute(array($admin_id));
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        $db_password = $result[0]['password'];

        if(empty($current_pass)){
            $error = 'Current password is wrong!';
        }
        else if(empty($new_pass)){
            $error = 'New Password is Required!';
        }
        else if(empty($confirm_pass)){
            $error = 'Confirem Password is Required!';
        }
        else if($new_pass != $confirm_pass){
            $error = "New Password & Confirm Password does'nt match!";
        }
        else if(SHA1($current_pass) != $db_password){
            $error = 'Current Password is wrong!';
        }
        else{
            $confirm__pass = SHA1($confirm_pass);

            $stm = $pdo->prepare("UPDATE admin SET password=? WHERE id=?");
            $stm->execute(array($confirm__pass,$admin_id));
            $success = "Password Change Successfully!";
        }
    }

?>

    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-lock"></i>                 
            </span>
            Change Password
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Basic elements</li>
            </ol>
        </nav>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            
                <form class="edit-profile" atction="" method="POST">
                    <div class="">
                        <div class="form-group row">
                            <div class="col-sm-10 ml-auto">
                                <h3>1. Password</h3>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">

                                <?php if(isset($error)): ?>
                                    <div class="alert alert-danger">
                                        <?php echo $error; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if(isset($success)): ?>
                                    <div class="alert alert-success">
                                        <?php echo $success; ?>
                                    </div>
                                <?php endif; ?>
                        
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="current_pass">Current Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="current_pass" name="current_pass" type="password" value="" placeholder="Current Password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="new_pass">New Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="new_pass" name="new_pass" type="password" value="" placeholder="New Password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="confirm_pass">Confirm Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="confirm_pass" name="confirm_pass" type="password" value="" placeholder="Confirm Password">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-7">
                            <button type="submit" name="chang_pass" class="btn btn-gradient-primary mr-2">Submit</button>
                            <a href="index.php" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                        
                </form>

            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>