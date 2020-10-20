<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/loginstatus.php');
check_login();


if(isset($_POST['submit']))
{
	
$doctorid=$_POST['doctor'];
$userid=$_SESSION['id'];
$roomId=$_POST['room'];
$apptime=$_POST['appointment-time'];

	$sql=mysqli_query($con, "insert into appointment(doctorId, userId, roomId,appointmentDate,status)
		 values('$doctorid' ,'$userid', '$roomId','$apptime' ,'1')");
	if($sql)
	{
		$msg="Appointment Details Added Successfully";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Patient | Add Appointment</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-zrnmn8R8KkWl12rAZFt4yKjxplaDaT7/EUkKm7AovijfrQItFWR7O/JJn4DAa/gx" crossorigin="anonymous">
	
	<script>

function getdoctor(val) {
	$.ajax({
	type: "POST",
	url: "find_doctor.php",
	data:'specilizationid='+val,
	success: function(data){
		$("#doctor").html(data);
	}
	});
}
</script>	


<script>
function getfee(val) {
	$.ajax({
	type: "POST",
	url: "find_doctor.php",
	data:'doctor='+val,
	success: function(data){
		$("#fees").html(data);
	}
	});
}
</script>	
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
								<h1 class="mainTitle">Patient | New Appoinment Details</h1>
							</div>
							<ol class="breadcrumb">

								<li class="active">
									<span> New Appoinment Details</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<!-- <h5 style="color: green; font-size:18px; "> -->
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
										<h5 style="color: green; font-size:18px; ">
											<?php if($msg) { echo htmlentities($msg);}?> </h5>
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Edit Appoinment info</h5>
												</div>
												<div class="panel-body">
													<?php $sql=mysqli_query($con,"select * from appointment where userId='".$_SESSION['id']."'");

													while($data=mysqli_fetch_array($sql))
													{
														?>

														<hr />
														<form role="form" name="appointmentedit" method="post" onSubmit="return valid();">


																<div class="form-group">
																	<label for="specialization">
																		Specialization
																	</label>
																<select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
																	<option value="">select Specialization</option>
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
							<select name="doctor" class="form-control" id="doctor"  onChange="getfee(this.value);" required="required">
						<option value="">Select Doctor</option>
						</select>																
						</label>

																</div>


																<div class="form-group">
																	<label for="patientname">
																		Patient Name
																	</label>
																	<textarea name="patientname" class="form-control" readonly="readonly"><?php 
																	$sql=mysqli_query($con,"select users.fullName from users where id= '".$_SESSION['id']."' ");
																	$data1 = mysqli_fetch_array($sql);
																	echo htmlentities($data1['fullName']);?></textarea>
																</div>

																<div class="form-group">
																	<label for="room">
																		Available Room Type and Room Number
																	</label>
																<select name="room" class="form-control" required="required">
																	<option value="">select your Available Room Type and Number </option>
																		<?php $ret=mysqli_query($con,"select * from room where status ='1' ");
																		while($row=mysqli_fetch_array($ret))
																		{
																			?>
																			<option value="<?php echo htmlentities($row['roomID']);?>">
																				<?php echo htmlentities($row['type']);
																							echo "  ";
																							echo htmlentities (str_pad((string)$row['roomID'], 5, '0', STR_PAD_LEFT));?>
																			</option>
																		<?php } ?>
																		
																	</select>
																</div>



																<div class="form-group">
																	<label for="Fee">
																		Consultancy Fee
																	</label>
																<select name="fees" class="form-control" id="fees"  readonly></select>
																</div>

																<div class="form-group">
<label for="meeting-time">Choose a time for your appointment:</label>

<input  type="datetime-local"  id="appointment-time"
       name="appointment-time" value="2000-01-01T00:00:00+05:00">
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
	</div>
</body>
</html>
