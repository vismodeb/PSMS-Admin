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

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><b>#</b></th>
                            <th><b>ID</b></th>
                            <th><b>Name</b></th>
                            <th><b>Email</b></th>
                            <th><b>Mobile</b></th>
                            <th><b>Address</b></th>
                            <th><b>Gender</b></th>
                            <th><b>Action</b></th>
                        </tr>
                    </thead>
                    <thead>

                        <?php
                            $stm = $pdo->prepare("SELECT * FROM teachers ORDER BY id DESC");
                            $stm->execute();
                            $teacherList = $stm->fetchAll(PDO::FETCH_ASSOC);
                            $i=1;
                            foreach($teacherList as $teacher):
                        ?>
                        <tr>
                            <th><?php echo $i; $i++;?></th>
                            <th><?php echo $teacher['id']?></th>
                            <th><?php echo $teacher['name']?></th>
                            <th><?php echo $teacher['email']?></th>
                            <th><?php echo $teacher['mobile']?></th>
                            <th><?php echo $teacher['address']?></th>
                            <th><?php echo $teacher['gender']?></th>
                            <th>
                                <a href="teacher-edit.php?id=<?php echo $teacher['id'] ?>" class="btn btn-sm btn-gradient-dark"><i class="mdi mdi-table-edit"></i></a>
                                <a href="teacher-delete.php?id=<?php echo $teacher['id'] ?>" class="btn btn-sm btn-danger"><i class="mdi mdi-delete-forever"></i></a>
                            </th>
                        </tr>
                        <?php endforeach; ?>

                    </thead>
                </table>

            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>