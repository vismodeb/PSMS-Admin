<?php require_once('header.php');

    $teacher_id = $_GET['id'];

    if(isset($_POST['updateTeacher'])){
        $t_name = $_POST['t_name'];
        $t_email = $_POST['t_email'];
        $t_mobile = $_POST['t_mobile'];
        $t_address = $_POST['t_address'];
        $ut_gender = $_POST['ut_gender'];

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
        else if(!is_numeric($t_mobile)){
            $error = 'Teacher Mobile Number is Must be Number!';
        }
        else if(strlen($t_mobile) != 11){
            $error = 'Teacher Mobile Number Must be 11 Digit!';
        }
        else if(empty($t_address)){
            $error = "Teacher Address is Required!";
        }
        else if(empty($ut_gender)){
            $error = "Teacher Gender is Required!";
        }

        else{
            // Teacher Data Update
            $stm = $pdo->prepare("UPDATE teachers SET name=?,email=?,mobile=?,address=?,gender=? WHERE id=?");
            $result = $stm->execute(array($t_name,$t_email,$t_mobile,$t_address,$ut_gender,$teacher_id));

            if($result == true){
                $success = 'Teacher Data update Successfully!';
                // header('location:teacher-edit.php?success=Teacher Data Update Successfully!');
            }
            else{
                $error = 'Teacher Data update Failed!';
            }
        }
    }
?>

    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-plus"></i>                 
            </span>
            Teacher Edit
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
                                <h3>1. Teacher Edit</h3>
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

                <?php
                    // Teacher Data fetch and update
                    $stm = $pdo->prepare("SELECT * FROM teachers WHERE id=?");
                    $stm->execute(array($teacher_id));
                    $result = $stm->fetch(PDO::FETCH_ASSOC);
                ?>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="t_name">Teacher Name :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="t_name" name="t_name" type="text" placeholder="Teacher Name" value="<?php echo $result['name']; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="t_email">Teacher Email :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="t_email" name="t_email" type="text" value="<?php echo $result['email']; ?>" placeholder="Teacher Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="t_mobile">Teacher Mobile :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="t_mobile" name="t_mobile" type="text" value="<?php echo $result['mobile']; ?>" placeholder="Teacher Mobile">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="t_address">Teacher Address :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="t_address" name="t_address" type="text" value="<?php echo $result['address']; ?>" placeholder="Teacher Address">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gender :</label>
                        <div class="col-sm-10">
                            <label><input 
                            <?php 
                                if($result['gender'] == 'Male'){echo 'checked';}
                            ?>
                            name="ut_gender" value="Male" type="radio" checked> Male</label> &nbsp;
                            <label><input 
                            <?php 
                                if($result['gender'] == 'Female'){echo 'checked';}
                            ?>
                            name="ut_gender" value="Female" type="radio"> Female</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-7">
                            <button type="submit" name="updateTeacher" class="btn btn-gradient-primary mr-2">Teacher Update</button>
                            <a href="teacher-all.php" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                        
                </form>

            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>