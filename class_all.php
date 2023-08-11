<?php require_once('header.php'); ?>

    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-multiple"></i>                 
            </span>
            All Class
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
                    <h3>All Class</h3>
                </div>
            </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><b>#</b></th>
                            <th><b>Class Name</b></th>
                            <th><b>Start Date</b></th>
                            <th><b>End Date</b></th>
                            <th><b>Subjects</b></th>
                            <th><b>Action</b></th>
                        </tr>
                    </thead>
                    <thead>

                    <?php
                        $stm = $pdo->prepare("SELECT * FROM class");
                        $stm->execute();
                        $classList = $stm->fetchAll(PDO::FETCH_ASSOC);
                        $i=1;
                        foreach($classList as $class):
                    ?>                       
                        <tr>
                            <th><?php echo $i; $i++;?></th>
                            <th><?php echo $class['class_name'];?></th>
                            <th><?php echo date('d-m-Y',strtotime($class['start_date']));?></th>
                            <th><?php echo date('d-m-Y',strtotime($class['end_date']));?></th>
                            <th><?php
                                //Get Subject Name and Code
                                $subject_list = json_decode($class['subjects']);
                                foreach($subject_list as $new_subject){
                                    echo getSubjectName($new_subject)."<br>";
                                }
                            ?></th>

                            <th>
                                <a href="class_edit.php?id=<?php echo $class['id'] ?>" class="btn btn-sm btn-gradient-dark"><i class="mdi mdi-table-edit"></i></a>
                                <a href="class_view.php?id=<?php echo $class['id'] ?>" class="btn btn-sm btn-success"><i class="mdi mdi-eye"></i></a>
                                <a onclick="return confirm('Are You Sure?');" href="class_delete.php?id=<?php echo $class['id'] ?>" class="btn btn-sm btn-danger"><i class="mdi mdi-delete-forever"></i></a>
                            </th>
                        </tr>
                    <?php endforeach;?>

                    </thead>
                </table>

            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>