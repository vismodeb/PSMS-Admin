<?php require_once('header.php'); ?>

    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-multiple"></i>                 
            </span>
            All Subject
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
                    <h3>All Subject</h3>
                </div>
            </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><b>#</b></th>
                            <th><b>Subject Name</b></th>
                            <th><b>Subject Code</b></th>
                            <th><b>Subjcet Type</b></th>
                            <th><b>Action</b></th>
                        </tr>
                    </thead>
                    <thead>

                    <?php
                        $stm = $pdo->prepare("SELECT * FROM subject");
                        $stm->execute();
                        $subjectList = $stm->fetchAll(PDO::FETCH_ASSOC);
                        $i=1;
                        foreach($subjectList as $subject):
                    ?>                       
                        <tr>
                            <th><?php echo $i; $i++;?></th>
                            <th><?php echo $subject['name'];?></th>
                            <th><?php echo $subject['code'];?></th>
                            <th><?php echo $subject['type'];?></th>
                            <th>
                                <a href="subject_edit.php?id=<?php echo $subject['id'] ?>" class="btn btn-sm btn-gradient-dark"><i class="mdi mdi-table-edit"></i></a>
                                <a onclick="return confirm('Are You Sure?');" href="subject_delete.php?id=<?php echo $subject['id'] ?>" class="btn btn-sm btn-danger"><i class="mdi mdi-delete-forever"></i></a>
                            </th>
                        </tr>
                    <?php endforeach;?>

                    </thead>
                </table>

            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>