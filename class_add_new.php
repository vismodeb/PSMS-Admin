<?php require_once('header.php');

    if(isset($_POST['classAdd'])){
        $class_name = $_POST['class_name'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        if(isset($_POST['subjects'])){
            $subjects = $_POST['subjects'];
        }
        else{
            $subjects = '';
        }
        


        if(empty($class_name)){
            $error = 'Class Name is Required!';
        }
        else if(empty($start_date)){
            $error = 'Start Date is Required!';
        }
        else if(empty($end_date)){
            $error = 'End Date is Required!';
        }
        else if(empty($subjects)){
            $error = 'Subject is Required!';
        }
        
        else{
            $subjects = json_encode($subjects);

            $insert = $pdo->prepare("INSERT INTO class(class_name,start_date,end_date,subjects) VALUES(?,?,?,?)");
            $insert->execute(array($class_name,$start_date,$end_date,$subjects));
            $success = 'Class Create Successfully!';
        }
    }
   
?>

    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-plus"></i>                 
            </span>
            New Class Add
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
                    <div class="form-group row">
                        <div class="col-sm-10 ml-auto">
                            <h3>1. New Class</h3>
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

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="class_name">Class Name :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="class_name" name="class_name" type="text" value="" placeholder="Class Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="start_date">Start Date :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="start_date" name="start_date" type="date" value="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="end_date">End Date :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="end_date" name="end_date" type="date" value="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2">Subject :</label>
                        <div class="col-sm-10">

                            <?php
                                $stm = $pdo->prepare("SELECT * FROM subject");
                                $stm->execute();
                                $result = $stm->fetchAll(PDO::FETCH_ASSOC);

                                foreach($result as $row):
                            ?>
                            <label><input type="checkbox" name="subjects[]" value="<?php echo $row['id'];?>"> <?php echo $row['name'];?> - <?php echo $row['code'];?></label><br>
                            <?php endforeach; ?>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-7">
                            <button type="submit" name="classAdd" class="btn btn-gradient-primary mr-2">New Class Add</button>
                            <a href="" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>