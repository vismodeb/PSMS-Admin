<?php require_once('header.php');

    $class_id = $_GET['id'];

    if(isset($_POST['classupdate'])){
        $class_name = $_POST['class_name'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        if(empty($class_name)){
            $error = 'Class Name is Required!';
        }
        else if(empty($start_date)){
            $error = 'Start Date is Required!';
        }
        else if(empty($end_date)){
            $error = 'End Date is Required!';
        }

        else{
            // Teacher Data Update
            $stm = $pdo->prepare("UPDATE class SET class_name=?,start_date=?,end_date=? WHERE id=?");
            $result = $stm->execute(array($class_name,$start_date,$end_date,$class_id));

            if($result == true){
                $success = 'Class Data update Successfully!';
                // header('location:teacher-edit.php?success=Teacher Data Update Successfully!');
              }
              else{
                $error = 'Class Data update Failed!';
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
                    $stm = $pdo->prepare("SELECT * FROM class WHERE id=?");
                    $stm->execute(array($class_id));
                    $result = $stm->fetch(PDO::FETCH_ASSOC);
                ?>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="class_name">Class Name :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="class_name" name="class_name" type="text" placeholder="Class Name" value="<?php echo $result['class_name']; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="start_date">Start Date :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="start_date" name="start_date" type="date" value="<?php echo $result['start_date']; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="end_date">End Date :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="end_date" name="end_date" type="date" value="<?php echo $result['end_date']; ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-7">
                            <button type="submit" name="classupdate" class="btn btn-gradient-primary mr-2">Class Update</button>
                            <a href="class_all.php" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                        
                </form>

            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>