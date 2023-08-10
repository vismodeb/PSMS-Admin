<?php require_once('header.php'); ?>

    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-multiple"></i>                 
            </span>
            All Students
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

            <div class="form-group row">
                <div class="col-sm-7 ml-auto">
                    <h3>All Students</h3>
                </div>
            </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><b>#</b></th>
                            <th><b>ID</b></th>
                            <th><b>Name</b></th>
                            <th><b>Email</b></th>
                            <th><b>Mobile</b></th>
                            <th><b>Currend Class</b></th>
                            <th><b>Class Roll</b></th>
                            <th><b>Address</b></th>
                            <th><b>Gender</b></th>
                            <th><b>Action</b></th>
                        </tr>
                    </thead>
                    <thead>

                    <?php
                        $stm = $pdo->prepare("SELECT * FROM students");
                        $stm->execute();
                        $studentList = $stm->fetchAll(PDO::FETCH_ASSOC);
                        $i=1;
                        foreach($studentList as $student):
                    ?>                       
                        <tr>
                            <th><?php echo $i; $i++;?></th>
                            <th><?php echo $student['id'];?></th>
                            <th><?php echo $student['name'];?></th>
                            <th><?php echo $student['email'];?></th>
                            <th><?php echo $student['mobile'];?></th>
                            <th><?php echo $student['currend_class'];?></th>
                            <th><?php echo $student['roll'];?></th>
                            <th><?php echo $student['address'];?></th>
                            <th><?php echo $student['gender'];?></th>
                            <th>
                                <a href="student_edit.php?id=<?php echo $student['id'] ?>" class="btn btn-sm btn-gradient-dark"><i class="mdi mdi-table-edit"></i></a>
                                <a href="student_view.php?id=<?php echo $student['id'] ?>" class="btn btn-sm btn-success"><i class="mdi mdi-eye"></i></a>
                                <a onclick="return confirm('Are You Sure?');" href="student_delete.php?id=<?php echo $student['id'] ?>" class="btn btn-sm btn-danger"><i class="mdi mdi-delete-forever"></i></a>
                            </th>
                        </tr>
                    <?php endforeach;?>

                    </thead>
                </table>

            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>