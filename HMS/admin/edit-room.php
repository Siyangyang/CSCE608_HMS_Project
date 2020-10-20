<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/loginstatus.php');
check_login();
$rid=intval($_GET['id']);// get room id
if(isset($_POST['submit']))
{
	
	
	$status=$_POST['status'];
	$roomtype = $_POST['roomtype'];

	$sql=mysqli_query($con,"Update room set status = '$status', type = '$roomtype' where roomID='$rid' ");
	if($sql)
	{
		$msg="Room Details updated Successfully";

	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | Edit Room Details</title>
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
								<h1 class="mainTitle">Admin | Edit Room Details</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Edit Room Details</span>
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
													<h5 class="panel-title">Edit Room info</h5>
												</div>
												<div class="panel-body">
													<?php $sql=mysqli_query($con,"select * from room where roomID='$rid'");

													while($data=mysqli_fetch_array($sql))
													{
														?>

														<hr />
														<form role="form" name="appointmentedit" method="post" onSubmit="return valid();">

																<div class="form-group">
																	<label for="roomnumber">
																		Room Number
																	</label>
																	<textarea name="roomnumber" class="form-control" readonly="readonly"><?php 
																	echo htmlentities (str_pad((string)$data['roomID'], 5, '0', STR_PAD_LEFT));

																	?></textarea>
																</div>


																<div class="form-group">
																	<label for="roomtype">
																		Type
																	</label>
																	<textarea name="roomtype" class="form-control" required="required"><?php 
																		echo htmlentities ($data['type']);?></textarea>
																</div>

																<div class="form-group">
																	<label for="status">
																		Status
																	</label>
																<select name="status" class="form-control" required="required">
																	 <option value="1">Active</option>
      														<option value="0">Close</option>
																		
																	</select>
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
