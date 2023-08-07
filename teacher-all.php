<?php require_once('header.php'); ?>

    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-multiple"></i>                 
            </span>
            All Teacher
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
            
                <!-- <form class="edit-profile" atction="" method="POST">
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
                            <label><input name="up_gender" value="Male" type="radio" checked> Male</label> &nbsp;
                            <label><input name="up_gender" value="Female" type="radio"> Female</label>
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
                        
                </form> -->

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <thead>

                        <?php
                            $stm = $pdo->prepare("SELECT * FROM teachers");
                            $stm->execute();
                            $teacherList = $stm->fetchAll(PDO::FETCH_ASSOC);

                            foreach($teacherList as $teacher):
                        ?>
                        <tr>
                            <th><?php echo $teacher['id']?></th>
                            <th><?php echo $teacher['name']?></th>
                            <th><?php echo $teacher['email']?></th>
                            <th><?php echo $teacher['mobile']?></th>
                            <th><?php echo $teacher['address']?></th>
                            <th><?php echo $teacher['gender']?></th>
                            <th><?php echo $teacher['password']?></th>
                            <th><?php echo $teacher['created_at']?></th>
                        </tr>
                        <?php endforeach; ?>

                    </thead>
                </table>

            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>