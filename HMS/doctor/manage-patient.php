<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/loginstatus.php');
include('include/pagination.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Doctor | Manage Patients</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-zrnmn8R8KkWl12rAZFt4yKjxplaDaT7/EUkKm7AovijfrQItFWR7O/JJn4DAa/gx" crossorigin="anonymous">
</head>
<body>
	<div id="app">		
<?php include("include/title.php"); ?>
		<?php include("sideNav.php"); ?>	
		<div class="app-content">
			<div class="main-content" >
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Doctor | Manage Patients</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<a href="logout.php">log out</a>
								</li>
							</ol>
						</div>
					</section>
					<div class="container-fluid container-fullw bg-white">
						

						<div class="row">
							<div class="col-lg-12">
								<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>

								<form class="form-group"  method="post">
									<div class="row">
											<div class="col-md-2">
									</div>
								</form>



								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th class="center">#</th>
											<th>Patient Name</th>
											<th>Age</th>
											<th>Gender</th>
											<th>Phone</th>
											<th>Adress</th>
											<th>Email</th>
											<th>Appointment time</th>
										</tr>
									</thead>
									<tbody>


										<?php

$sql = mysqli_query($con,"select users.fullName,
													users.age,
													users.gender,
													users.phone,
													users.address,
													users.email,
													appointment.*  from appointment


													join users on users.id = appointment.userId
													join doctors on doctors.id=appointment.doctorId 

													where appointment.doctorId = '".$_SESSION['id']."' AND
																appointment.status = '1' ");

										$cnt= 1;
										while($row=mysqli_fetch_array($sql))
										{
											?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['fullName'];?></td>
												<td><?php echo $row['age'];?></td>
												<td><?php echo $row['gender'];?></td>
												<td><?php echo $row['phone'];?></td>
												<td><?php echo $row['address'];?></td>
												<td><?php echo $row['email'];?>
												<td><?php echo $row['appointmentDate'];?>
											</td>

														</div>

										</td>
									</tr>

									<?php 
									$cnt = $cnt + 1 ;
									// print_r($start_from);	
								}?>


							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</html>
