<?php require_once('header.php');

    $teacher_id = $_GET['id'];

    $stm = $pdo->prepare("SELECT * FROM teachers WHERE id=?");
    $stm->execute(array($teacher_id));
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

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

                <?php foreach($result as $list): ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="t_name">Teacher Name :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="t_name" name="t_name" type="text" placeholder="Teacher Name" value="<?php echo $list['name']; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="t_email">Teacher Email :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="t_email" name="t_email" type="text" value="<?php echo $list['email']; ?>" placeholder="Teacher Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="t_mobile">Teacher Mobile :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="t_mobile" name="t_mobile" type="text" value="<?php echo $list['mobile']; ?>" placeholder="Teacher Mobile">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="t_address">Teacher Address :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="t_address" name="t_address" type="text" value="<?php echo $list['address']; ?>" placeholder="Teacher Address">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gender :</label>
                        <div class="col-sm-10">
                            <label><input 
                            <?php 
                                if($list['gender'] == 'Male'){echo 'checked';}
                            ?>
                            name="ut_gender" value="Male" type="radio" checked> Male</label> &nbsp;
                            <label><input 
                            <?php 
                                if($list['gender'] == 'Female'){echo 'checked';}
                            ?>
                            name="ut_gender" value="Female" type="radio"> Female</label>
                        </div>
                    </div>
                <?php endforeach; ?>

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-7">
                            <button type="submit" name="updateTeacher" class="btn btn-gradient-primary mr-2">Update Teacher</button>
                            <a href="teacher-all.php" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                        
                </form>

            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>