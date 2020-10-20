<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/loginstatus.php');
include('include/pagination.php');
check_login();


if(isset($_POST['submit']))
{
	$docspecialization=$_POST['Doctorspecialization'];
	$docname=$_POST['doctorname'];
	// $docaddress=$_POST['clinicaddress'];
	$docfees=$_POST['docfees'];
	$docphone=$_POST['doccontact'];
	$docemail=$_POST['docemail'];
	$sql=mysqli_query($con,"Update doctors set specialityID='$docspecialization',doctorName='$docname',docFees='$docfees',docphone='$docphone',docEmail='$docemail' where id='".$_SESSION['id']."'");
	if($sql)
	{
		$msg="Doctor Details updated Successfully";

	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Doctor | Update Info</title>

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
								<h1 class="mainTitle">Doctor | Update Info</h1>
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
							<div class="col-md-12">
								<h5 style="color: green; font-size:18px; ">
									<?php if($msg) { echo htmlentities($msg);}?> </h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-body">
													<?php $sql=mysqli_query($con,"select * from doctors where id='".$_SESSION['id']."'");
													while($data=mysqli_fetch_array($sql))
													{
														?>

														<form role="form" name="adduser" method="post" onSubmit="return valid();">

																<div class="form-group">
																	<label for="PatientName">
																		Doctor Name
																	</label>
																	<input type="text" name="doctorname" class="form-control" value="<?php echo htmlentities($data['doctorName']);?>" >
																</div>

																<div class="form-group">
																<label for="DoctorSpecialization">
																	Doctor Specialization
																</label>
																<select name="Doctorspecialization" class="form-control" required="required">
																	<option value="<?php echo htmlentities($data['specialityID']);?>">
																		<?php 
																		$tmp = $data['specialityID'];
																		$sql1 = mysqli_query($con,"select specilization from doctorspecilization where id ='$tmp' ");
																		// echo $row['specialityID'];
																			$row1=mysqli_fetch_array($sql1);
																		echo $row1['specilization'];

																		?></option>
																		
																		<?php $ret=mysqli_query($con,"select * from doctorspecilization");
																		while($row=mysqli_fetch_array($ret))
																		{
																			?>
																			<option value="<?php echo htmlentities($row['id']);?>">
																				<?php echo htmlentities($row['specilization']);?>
																			</option>
																		<?php } ?>
																	</select>
																</div>

<!-- 																<div class="form-group">
																	<label for="address">
																		 Address
																	</label>
																	<textarea name="patientaddr" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
																</div> -->

																<div class="form-group">
																	<label for="fess">
																		Doctor Consultancy Fees
																	</label>
																	<input type="text" name="docfees" class="form-control" required="required"  value="<?php echo htmlentities($data['docFees']);?>" >
																</div>
																
																<div class="form-group">
																	<label for="fess">
																		Doctor Contact no
																	</label>
																	<input type="text" name="doccontact" class="form-control" required="required"  value="<?php echo htmlentities($data['docphone']);?>">
																</div>

																<div class="form-group">
																	<label for="fess">
																		Doctor Email
																	</label>
																	<input type="email" name="docemail" class="form-control" readonly="readonly"  value="<?php echo htmlentities($data['docEmail']);?>">
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
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</html>
