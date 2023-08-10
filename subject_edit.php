<?php require_once('header.php');

    $subject_id = $_GET['id'];

    if(isset($_POST['up_Subject'])){
        $sub_name = $_POST['sub_name'];
        $sub_code = $_POST['sub_code'];
        $sub_type = $_POST['sub_type'];

        if(empty($sub_name)){
            $error = 'Subject Name is Required!';
        }
        else if(empty($sub_code)){
            $error = 'Subject Code is Required!';
        }
        else if(empty($sub_type)){
            $error = 'Subject Type is Required!';
        }
        else{
            $stm = $pdo->prepare("UPDATE subject set name=?, code=?, type=? WHERE id=?");
            $result = $stm->execute(array($sub_name,$sub_code,$sub_type,$subject_id));

            if($result == true){
                $success = "Subject Data Update Successfully!";
            }
            else{
                $error = "Subject Data Update Failed";
            }
        }
    }
?>

    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-plus"></i>                 
            </span>
            Subject Edit
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
                                <h3>1. Subject Edit</h3>
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
                    // subject Data fetch and update
                    $stm = $pdo->prepare("SELECT * FROM subject WHERE id=?");
                    $stm->execute(array($subject_id));
                    $result = $stm->fetch(PDO::FETCH_ASSOC);
                ?>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="sub_name">Subject Name :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="sub_name" name="sub_name" type="text" value="<?php echo $result['name']; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="sub_code">Subject Code :</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="sub_code" name="sub_code" type="text" value="<?php echo $result['code']; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Subject Type :</label>
                        <div class="col-sm-10">
                            <label><input 
                            <?php 
                                if($result['type'] == 'Theroy'){echo 'checked';}
                            ?>
                            name="sub_type" value="Theroy" type="radio" checked> Theroy</label> &nbsp;
                            <label><input 
                            <?php 
                                if($result['type'] == 'Practical'){echo 'checked';}
                            ?>
                            name="sub_type" value="Practical" type="radio"> Practical</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-7">
                            <button type="submit" name="up_Subject" class="btn btn-gradient-primary mr-2">Subject Update</button>
                            <a href="subject_all.php" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                        
                </form>

            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>