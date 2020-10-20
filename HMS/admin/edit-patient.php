<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/loginstatus.php');
check_login();
$pid=intval($_GET['id']);// get patient id
if(isset($_POST['submit']))
{
	$patientname=$_POST['patientname'];
	$patientage=$_POST['patientage'];
	$patientphone=$_POST['patientphone'];
	$patientaddr=$_POST['patientaddr'];
	$patientgender=$_POST['patientgender'];
	$patientemail=$_POST['patientemail'];

	$sql=mysqli_query($con,"Update users set fullName='$patientname',age='$patientage',phone='$patientphone',email='$patientemail',address='$patientaddr' ,gender='$patientgender' where id='$pid'");
	if($sql)
	{
		$msg="Patient Details updated Successfully";
	}else{
		echo("Error");
	}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Doctor | Edit Patients Details</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-zrnmn8R8KkWl12rAZFt4yKjxplaDaT7/EUkKm7AovijfrQItFWR7O/JJn4DAa/gx" crossorigin="anonymous">

</head>
<body>
	<div id="app">		

		<div class="app-content">
			<?php include("include/title.php"); ?>
			<?php include("sideNav.php"); ?>	
			<div class="main-content" >
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Doctor | Edit Patients Details </h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Edit Patients Details</span>
								</li>
							</ol>
						</div>
					</section>
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<h5 style="color: green; font-size:18px; ">
									<?php if($msg) { echo htmlentities($msg);}?> </h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-body">
													<?php $sql=mysqli_query($con,"select * from users where id='$pid'");
													while($data=mysqli_fetch_array($sql))
													{
														?>
														<h4><?php echo htmlentities($data['fullName']);?>'s Profile</h4>

														<form role="form" name="adduser" method="post" onSubmit="return valid();">

																<div class="form-group">
																	<label for="PatientName">
																		Patient Name
																	</label>
																	<input type="text" name="patientname" class="form-control" value="<?php echo htmlentities($data['fullName']);?>" >
																</div>

																<div class="form-group">
																	<label for="gender">
																		 gender
																	</label>
																	<textarea name="patientgender" class="form-control"><?php echo htmlentities($data['gender']);?></textarea>
																</div>


																<div class="form-group">
																	<label for="address">
																		 Address
																	</label>
																	<textarea name="patientaddr" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
																</div>

																<div class="form-group">
																	<label for="age">
																		Age
																	</label>
																	<input type="text" name="patientage" class="form-control" required="required"  value="<?php echo htmlentities($data['age']);?>" >
																</div>
																
																<div class="form-group">
																	<label for="fess">
																		Phone Number
																	</label>
																	<input type="text" name="patientphone" class="form-control" required="required"  value="<?php echo htmlentities($data['phone']);?>">
																</div>

																<div class="form-group">
																	<label for="fess">
																		 Email
																	</label>
																	<input type="email" name="patientemail" class="form-control"  required="required"  value="<?php echo htmlentities($data['email']);?>">
																</div>
																
															<?php } ?>
															
															
															<button type="submit" name="submit" class="btn btn-o btn-primary">
																Update
															</button>
														</form>
													</div>
												</div>
											</div>
											
										</div>
									</div>
									<div class="col-lg-12 col-md-12">
										<div class="panel panel-white">
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
