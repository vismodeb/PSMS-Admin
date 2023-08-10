<?php

    require_once('header.php');

	$user_id = $_REQUEST['id'];

	$stm = $pdo->prepare("SELECT * FROM students WHERE id=?");
	$stm->execute(array($user_id));
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);

	$name = $result[0]['name'];
	$email = $result[0]['email'];
	$mobile  = $result[0]['mobile'];
	$father_name = $result[0]['father_name'];
	$mother_name = $result[0]['mother_name'];
	$address = $result[0]['address'];
	$birthday = $result[0]['birthday'];
	$gender = $result[0]['gender'];
	$roll = $result[0]['roll'];
	$currend_class = $result[0]['currend_class'];
	$registration_date = $result[0]['registration_date'];

?>

    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-multiple"></i>                 
            </span>
            Students Profile View
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
                    <h3>Profile View</h3>
                </div>
            </div>

                <table class="table table-bordered">
                    <thead>

                        <div class="widget-inner">
							<div class="">
								<div class="row">
									<div class="col-sm-2">
										<b>Name :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $name; ?>
									</div>
								</div>
							</div>

							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Email :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $email; ?>
									</div>
								</div>
							</div>

							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Mobile Number :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $mobile; ?>
									</div>
								</div>
							</div>

							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Father Name :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $father_name; ?>
									</div>
								</div>
							</div>

							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Mother Name :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $mother_name; ?>
									</div>
								</div>
							</div>

							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Address :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $address; ?>
									</div>
								</div>
							</div>

							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Birthday :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $birthday; ?>
									</div>
								</div>
							</div>

							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Gender :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $gender; ?>
									</div>
								</div>
							</div>

							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Roll :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $roll; ?>
									</div>
								</div>
							</div>

							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Currend Class :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $currend_class; ?>
									</div>
								</div>
							</div>

							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Registration Date :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $registration_date; ?>
									</div>
								</div>
							</div>
							
							<div class="">
								<div class="row mt-3">
									<div class="col-sm-7">
										<a href="student_all.php" class="btn btn-light">Cancel</a>
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