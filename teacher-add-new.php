<?php

    require_once('header.php');

    if(isset($_POST['addTeacher'])){
        $t_name = $_POST['t_name'];
        $t_email = $_POST['t_email'];
        $t_mobile = $_POST['t_mobile'];
        $t_address = $_POST['t_address'];
        $up_gender = $_POST['up_gender'];
        $t_password = $_POST['t_password'];

        $admin_id = $_SESSION['admin_loggedin'][0]['id'];
        // Teacher Email Count
        $emailCount = teacherCount('email',$t_email);
        // Teacher Mobile Count
        $mobileCount = teacherCount('mobile',$t_mobile);

        if(empty($t_name)){
            $error = 'Teacher Name is Required!';
        }
        else if(empty($t_email)){
            $error = 'Teacher Email is Required!';
        }
        else if(!filter_var($t_email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid Teacher Email Format!";
          }
        else if(empty($t_mobile)){
            $error = 'Teacher Mobile is Required!';
        }
        // Teacher Email Count
        else if($emailCount != 0){
            $error = 'Teacher Email is Already Used!';
        }
        else if(!is_numeric($t_mobile)){
            $error = 'Teacher Mobile Number is Must be Number!';
        }
        else if(strlen($t_mobile) != 11){
            $error = 'Teacher Mobile Number Must be 11 Digit!';
        }
        // Teacher Email Count
        else if($mobileCount != 0){
            $error = 'Teacher Mobile is Already Used!';
        }
        else if(empty($t_address)){
            $error = "Teacher Address is Required!";
        }
        else if(empty($up_gender)){
            $error = "Teacher Gender is Required!";
        }
        else if(empty($t_password)){
            $error = 'Teacher Password is Required!';
        }
        else{
            $password = SHA1($t_password);
            $created_at = date('d-m-y H:i:s');

            $insert = $pdo->prepare("INSERT INTO teachers(name,email,mobile,address,gender,password,created_at) VALUES(?,?,?,?,?,?,?)");
            $insert->execute(array($t_name,$t_email,$t_mobile,$t_address,$up_gender,$password,$created_at));
            $success = "Teaceher Account Create Success!";
        }
    }

?>

    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-lock"></i>                 
            </span>
            New Teacher Add
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
                                <h3>1. New Teacher</h3>
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
                        <label class="col-sm-2 col-form-label" for="t_name">Teacher Name :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="t_name" name="t_name" type="text" value="" placeholder="Teacher Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="t_email">Teacher Email :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="t_email" name="t_email" type="text" value="" placeholder="Teacher Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="t_mobile">Teacher Mobile :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="t_mobile" name="t_mobile" type="text" value="" placeholder="Teacher Mobile">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="t_address">Teacher Address :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="t_address" name="t_address" type="text" value="" placeholder="Teacher Address">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gender :</label>
                        <div class="col-sm-10">
                            <label><input 
                            <?php 
                                // if($gender == 'Male'){echo 'checked';}
                            ?>
                            name="up_gender" value="Male" type="radio" checked> Male</label> &nbsp;
                            <label><input 
                            <?php 
                                // if($gender == 'Female'){echo 'checked';}
                            ?>
                            name="up_gender" value="Female" type="radio"> Female</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="t_password">Teacher Password :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="t_password" name="t_password" type="password" value="" placeholder="Teacher Password">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-7">
                            <button type="submit" name="addTeacher" class="btn btn-gradient-primary mr-2">Submit</button>
                            <a href="index.php" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                        
                </form>

            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>