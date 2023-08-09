<?php require_once('header.php');

    $student_id = $_GET['id'];

    if(isset($_POST['updateStudent'])){
        $s_name = $_POST['s_name'];
        $s_email = $_POST['s_email'];
        $s_mobile = $_POST['s_mobile'];
        $s_class = $_POST['s_class'];
        $s_roll = $_POST['s_roll'];
        $s_address = $_POST['s_address'];
        $s_gender = $_POST['s_gender'];

        if(empty($s_name)){
            $error = 'Teacher Name is Required!';
        }
        else if(empty($s_email)){
            $error = 'Teacher Email is Required!';
        }
        else if(!filter_var($s_email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid Teacher Email Format!";
          }
        else if(empty($s_mobile)){
            $error = 'Teacher Mobile is Required!';
        }
        else if(!is_numeric($s_mobile)){
            $error = 'Teacher Mobile Number is Must be Number!';
        }
        else if(strlen($s_mobile) != 11){
            $error = 'Teacher Mobile Number Must be 11 Digit!';
        }
        else if(empty($s_address)){
            $error = "Teacher Address is Required!";
        }
        else if(empty($s_gender)){
            $error = "Teacher Gender is Required!";
        }

        else{
            // Teacher Data Update
            $stm = $pdo->prepare("UPDATE students SET name=?,email=?,mobile=?,currend_class=?,roll=?,address=?,gender=? WHERE id=?");
            $result = $stm->execute(array($s_name,$s_email,$s_mobile,$s_class,$s_roll,$s_address,$s_gender,$student_id));

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
            Students Edit
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
                                <h3>1. Students Edit</h3>
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
                    $stm = $pdo->prepare("SELECT * FROM students WHERE id=?");
                    $stm->execute(array($student_id));
                    $result = $stm->fetch(PDO::FETCH_ASSOC);
                ?>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="s_name">Student Name :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="s_name" name="s_name" type="text" placeholder="Student Name" value="<?php echo $result['name']; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="s_email">Student Email :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="s_email" name="s_email" type="text" value="<?php echo $result['email']; ?>" placeholder="Student Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="s_mobile">Student Mobile :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="s_mobile" name="s_mobile" type="text" value="<?php echo $result['mobile']; ?>" placeholder="Student Mobile">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="s_class">Student Class :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="s_class" name="s_class" type="text" value="<?php echo $result['currend_class']; ?>" placeholder="Currend Class">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="s_roll">Student Roll :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="s_roll" name="s_roll" type="text" value="<?php echo $result['roll']; ?>" placeholder="Student Roll">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="s_address">Student Address :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="s_address" name="s_address" type="text" value="<?php echo $result['address']; ?>" placeholder="Student Address">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gender :</label>
                        <div class="col-sm-10">
                            <label><input 
                            <?php 
                                if($result['gender'] == 'Male'){echo 'checked';}
                            ?>
                            name="s_gender" value="Male" type="radio" checked> Male</label> &nbsp;
                            <label><input 
                            <?php 
                                if($result['gender'] == 'Female'){echo 'checked';}
                            ?>
                            name="s_gender" value="Female" type="radio"> Female</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-7">
                            <button type="submit" name="updateStudent" class="btn btn-gradient-primary mr-2">Student Update</button>
                            <a href="student_all.php" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                        
                </form>

            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>