<?php
session_start();
error_reporting(0);
include('include/config.php');
// include('include/checklogin.php');
// check_login();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin  | Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-zrnmn8R8KkWl12rAZFt4yKjxplaDaT7/EUkKm7AovijfrQItFWR7O/JJn4DAa/gx" crossorigin="anonymous">
	<style>
		body
		{
			background-image:url("./img/bg.jpg");
			background-size: 100% 200%;
		}

	</style>
</head>
<body>
	<div id="app">	
		<?php include("include/title.php"); ?>	
		<div class="app-content">
			<div class="main-content" >
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Admin Dashboard</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<a href="logout.php">Log out</a>
								</li>
							</ol>
						</div>
					</div>
				</section>

				<div class="container-fluid container-fullw bg-white">
					<div class="row">
						<div class="col-sm-4">
							<div class="panel panel-white no-radius text-center">
								<div class="panel-body">
									<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fas fa-hand-holding-heart fa-stack-1x fa-inverse"></i> </span>
									<h2 class="StepTitle">Manage Patients Data</h2>

									<p class="links cl-effect-1">
										<a href="manage-patient.php">
											<?php $result = mysqli_query($con,"SELECT * FROM users");
											$num_rows = mysqli_num_rows($result);
											{
												?>
												Total Patients :<?php echo htmlentities($num_rows);  } ?>		
											</a>
										</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="panel panel-white no-radius text-center">
									<div class="panel-body">
										<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
										<h2 class="StepTitle">Manage Doctors Data</h2>

										<p class="cl-effect-1">
											<a href="manage-doctors.php">
												<?php $result1 = mysqli_query($con,"SELECT * FROM doctors ");
												$num_rows1 = mysqli_num_rows($result1);
												{
													?>
													Total Doctors :<?php echo htmlentities($num_rows1);  } ?>		
												</a>

											</p>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fas fa-book-medical fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle"> Appointments</h2>

											<p class="links cl-effect-1">
												<a href="book-appointment.php">
													<a href="manage-appointment.php">
														<?php $sql= mysqli_query($con,"SELECT * FROM appointment");
														$num_rows2 = mysqli_num_rows($sql);
														{
															?>
															Total Appointments :<?php echo htmlentities($num_rows2);  } ?>	
														</a>
													</a>
												</p>
											</div>
										</div>
									</div>

									<div class="col-sm-4">
										<div class="panel panel-white no-radius text-center">
											<div class="panel-body">
												<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="far fa-hospital fa-stack-1x fa-inverse"></i> </span>
												<h2 class="StepTitle">Manage Room</h2>

												<p class="links cl-effect-1">
													<a href="manage-room.php">
														<?php $result = mysqli_query($con,"SELECT * FROM room ");
														$num_rows = mysqli_num_rows($result);
														{
															?>
															Total Rooms :<?php echo htmlentities($num_rows);  
														} ?>		
													</a>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</body>
		</html>
