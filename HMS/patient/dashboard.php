<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/loginstatus.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Patient  | Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-zrnmn8R8KkWl12rAZFt4yKjxplaDaT7/EUkKm7AovijfrQItFWR7O/JJn4DAa/gx" crossorigin="anonymous">
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
								<h1 class="mainTitle">Patient | Dashboard</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<a href="logout.php">log out</a>
								</li>
							</ol>
						</div>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-sm-4">
								<div class="panel panel-white no-radius text-center">
									<div class="panel-body">
										<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="far fa-clipboard-user fa-stack-1x fa-inverse"></i> </span>
										<h2 class="StepTitle">Update My Info</h2>

										<p class="links cl-effect-1">
											<a href="update-patient.php">
												<?php $result = mysqli_query($con,"SELECT * FROM users where id='".$_SESSION['id']."'");
												$row = mysqli_fetch_array($result);
												{
													?>
													Current User : <?php echo htmlentities($row['fullName']);  } ?>		
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
														<a href="manage-appointment.php">
															<?php $sql= mysqli_query($con,"SELECT * FROM appointment where userId='".$_SESSION['id']."'");
															$rows2 = mysqli_num_rows($sql);
															{
																?>
																My Appointments :<?php echo htmlentities($rows2);  } ?>	
															</a>
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
