<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/loginstatus.php');
check_login();

$did=intval($_GET['id']);// get doctor id
if(isset($_POST['submit']))
{
	$docspecialization=$_POST['Doctorspecialization'];
	$docname=$_POST['docname'];
	$docfees=$_POST['docfees'];
	$docphone=$_POST['doccontact'];
	$docemail=$_POST['docemail'];
	$sql=mysqli_query($con,"Update doctors set specialityID='$docspecialization',doctorName='$docname',docFees='$docfees',docphone='$docphone',docEmail='$docemail' where id='$did'");
	if($sql)
	{
		$msg="Doctor Details updated Successfully";
	}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | Edit Doctor Details</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-zrnmn8R8KkWl12rAZFt4yKjxplaDaT7/EUkKm7AovijfrQItFWR7O/JJn4DAa/gx" crossorigin="anonymous">
</head>
<body>
	<div id="app">		
		<div class="app-content">
<?php include("include/title.php"); ?>
		<?php include("sideNav.php"); ?>	
			<!-- end: TOP NAVBAR -->
			<div class="main-content" >
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Admin | Edit Doctor Details</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Edit Doctor Details</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<h5 style="color: green; font-size:18px; ">
									<?php if($msg) { echo htmlentities($msg);}?> </h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-body">
													<?php $sql=mysqli_query($con,"select * from doctors where id='$did'");
																// $spec=mysqli_query($con,"select * from doctorspecilization");
																// $specdata  = mysqli_fetch_array($spec);
													while($data=mysqli_fetch_array($sql))
													{
														?>
														<h4><?php echo htmlentities($data['doctorName']);?>'s Profile</h4>

														<hr/>
														<form role="form" name="adddoc" method="post" onSubmit="return valid();">
															<div class="form-group">
																<label for="DoctorSpecialization">
																	Doctor Specialization
																</label>
																<select name="Doctorspecialization" class="form-control" required="required">
																	<option value="<?php echo htmlentities($data['specialityID']);?>">


																		<?php 
																		//showing the specilization but not the ID
																		$tmp = $data['specialityID'];
																		$sql1 = mysqli_query($con,"select specilization from doctorspecilization where id ='$tmp' ");
																		// echo $row['specialityID'];
																			$row1=mysqli_fetch_array($sql1);
																		echo $row1['specilization'];
																		;?>
																			
																		</option>
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

																<div class="form-group">
																	<label for="doctorname">
																		Doctor Name
																	</label>
																	<input type="text" name="docname" class="form-control" value="<?php echo htmlentities($data['doctorName']);?>" >
																</div>


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
