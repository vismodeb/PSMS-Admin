<?php require_once('header.php');

    if(isset($_POST['AddSubject'])){
        $sub_name = $_POST['sub_name'];
        $sub_code = $_POST['sub_code'];
        $sub_type = $_POST['sub_type'];

        //subject code cound
        $subject_code = getCount('subject','code',$sub_code);

        if(empty($sub_name)){
            $error = 'Subject Name is Required!';
        }
        else if(empty($sub_code)){
            $error = 'Subject Code is Required!';
        }
        else if(empty($sub_type)){
            $error = 'Subject Type is Required!';
        }
        else if($subject_code != 0){
            $error = 'Subject Code Already Used!';
        }
        else{
            $stm = $pdo->prepare("INSERT INTO subject(name,code,type) VALUES(?,?,?)");
            $stm->execute(array($sub_name,$sub_code,$sub_type));
            $success = 'Subject Create Successfully!';
        }
    }
   

?>

    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-plus"></i>                 
            </span>
            New Subject Add
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
                            <h3>1. New Subject</h3>
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
                        <label class="col-sm-2 col-form-label" for="sub_name">Subject Name :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="sub_name" name="sub_name" type="text" value="" placeholder="Subject Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="sub_code">Subject Code :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="sub_code" name="sub_code" type="text" value="" placeholder="Subject Code">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Subject Type :</label>
                        <div class="col-sm-10">
                            <label><input name="sub_type" value="Theroy" type="radio" checked> Theroy</label> &nbsp;
                            <label><input name="sub_type" value="Practical" type="radio"> Practical</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-7">
                            <button type="submit" name="AddSubject" class="btn btn-gradient-primary mr-2">New Subject Add</button>
                            <a href="index.php" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>