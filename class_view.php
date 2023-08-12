<?php

    require_once('header.php');

	$class_id = $_REQUEST['id'];

	$stm = $pdo->prepare("SELECT * FROM class WHERE id=?");
	$stm->execute(array($class_id));
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);

	$class_name = $result[0]['class_name'];
	$start_date = $result[0]['start_date'];
	$end_date  = $result[0]['end_date'];
	$subjects = $result[0]['subjects'];
	$created_at = $result[0]['created_at'];

?>

    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-multiple"></i>                 
            </span>
            Students Class View
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
                    <h3>Class View</h3>
                </div>
            </div>

                <table class="table table-bordered">
                    <thead>

                        <div class="widget-inner">
							<div class="">
								<div class="row">
									<div class="col-sm-2">
										<b>Class Name :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $class_name; ?>
									</div>
								</div>
							</div>

							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Start Date :</b>
									</div>
									<div class="col-sm-7">
                                        <?php echo date('d-m-Y',strtotime($start_date));?>
									</div>
								</div>
							</div>

							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>End Date :</b>
									</div>
									<div class="col-sm-7">
                                        <?php echo date('d-m-Y',strtotime($end_date));?>
									</div>
								</div>
							</div>

							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Subjects :</b>
									</div>
									<div class="col-sm-7">
                                        <?php
                                            //Get Subject Name and Code
                                            $subject_list = json_decode($subjects);
                                            foreach($subject_list as $new_subject){
                                                echo getSubjectName($new_subject)."<br>";
                                            }
                                        ?>
									</div>
								</div>
							</div>

							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>created_at :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $created_at; ?>
									</div>
								</div>
							</div>
							
							<div class="">
								<div class="row mt-3">
									<div class="col-sm-7">
										<a href="class_all.php" class="btn btn-light">Cancel</a>
									</div>
								</div>
							</div>
						</div>

                    </thead>
                </table>

            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>