<?php
session_start();
// error_reporting(0);
include('include/config.php');
include('include/loginstatus.php');
check_login();


if(isset($_GET['del']))
{
	mysqli_query($con,"delete from users where id = '".$_GET['id']."'");
	$_SESSION['msg']="data deleted !!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | Manage Users</title>

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
								<h1 class="mainTitle">Admin | Manage Patients</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<a href="logout.php">click to log out</a>
								</li>
							</ol>
						</div>
					</section>
					<div class="container-fluid container-fullw bg-white">
						

						<div class="row">
							<div class="col-lg-12">
								<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>
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
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>


										<?php
										$sql=mysqli_query($con,"select * from users");
										$cnt=1;
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
											</td>

											<td >
												<!-- <div class="visible-md visible-lg hidden-sm hidden-xs"> -->
													<a href="edit-patient.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fas fa-edit"></i></a></td>
													<td >
														<!-- <div class="visible-md visible-lg hidden-sm hidden-xs"> -->
															<a href="manage-users.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="far fa-trash"></i></a></td>
														</div>
														<!-- <div class="visible-xs visible-sm hidden-md hidden-lg"> -->
<!-- 												<div class="btn-group" dropdown is-open="status.isopen">
													<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
														<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right dropdown-light" role="menu">
														<li>
															<a href="#">
																Edit
															</a>
														</li>
														<li>
															<a href="#">
																Share
															</a>
														</li>
														<li>
															<a href="#">
																Remove
															</a>
														</li>
													</ul>
												</div>
											</div> -->
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
</div>
</div>
</html>
