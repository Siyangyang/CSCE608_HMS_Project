<?php
session_start();
// error_reporting(0);
include('include/config.php');
include('include/loginstatus.php');
include('include/pagination.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Doctor | Appointment History</title>
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
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Doctor  | Appointment List</h1>
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
								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th class="center">#</th>
											<th>Doctor Name</th>
											<th>Patient Name</th>
											<th>Room type</th>
											<th>Consultancy Fee</th>
											<th>Appointment Date / Time </th>											
											<th>Current Status</th>
											<th>action</th>

										</tr>
									</thead>
									<tbody>
										<?php
$sql = mysqli_query($con,"select doctors.doctorName as docname ,
											doctors.specialityID as docspecilization,
											doctors.docFees as consultancyFees, 
											users.fullName as pname,
											room.type as room,
											appointment.*  from appointment 

											join doctors on doctors.id=appointment.doctorId 
											join room    on room.roomID=appointment.roomId
											join users   on users.id=appointment.userId 
											where appointment.doctorId = '".$_SESSION['id']."' "   );
										$cnt=1;
										while($row=mysqli_fetch_array($sql))
										{
											?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['docname'];?></td>
												<td class="hidden-xs"><?php echo $row['pname'];?></td>
												<td><?php echo $row['room'];?></td>
												<!-- <td><?php echo $row['docspecilization'];?></td> -->
												<td><?php echo $row['consultancyFees'];?></td>
												<td><?php echo $row['appointmentDate'];?></td>
											<td>
												<?php if($row['status']==1)   
												{
													echo "Active";
												}else{
													echo "Closed";
												}
												?></td>

												<td>
													<a href="edit-appointment.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fas fa-edit"></i></a>

												</td>
												</tr>

												<?php 
												$cnt=$cnt+1;
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
		
	</body>
	</html>
