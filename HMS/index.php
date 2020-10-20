<?php
session_start();
error_reporting(0);
include("adminprocess.php");
include("patientprocess.php");
include("doctorprocess.php");
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	<class class="container-fluid">
		<div class="row bg-primary">
			<div class="col-lg-12">
				<p class="text-center text-light display-4 pt-2" style="font-size: 25px">CSCE 608 Hospital Management System</p>
			</div>
		</div>
		
		<div class="container">
			<br>  <p class="text-center">Please Select your portal to login</p>
			<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
			<hr>
			<div class="row">
				<aside class="col-sm-4">
					<p>Admin Login Portal</p>
					<div class="card">
						<article class="card-body">
							<h4 class="card-title text-center mb-4 mt-1">Sign in</h4>
							<hr>
							<p class="text-success text-center">Admin</p>
							<form class="form-group" action="adminprocess.php" method="post">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"> <i class="fa fa-user"></i> </span>
										</div>
										<input name="adminname" class="form-control" placeholder="Email" type="email">
									</div> <!-- input-group.// -->
								</div> <!-- form-group// -->
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
										</div>
										<input name="adminpassword" class="form-control" placeholder="******" type="password">
									</div> <!-- input-group.// -->
								</div> <!-- form-group// -->
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block" name="submit"> Login  </button>
								</div> <!-- form-group// -->
								<!-- <p class="text-center"><a href="#" class="btn">Forgot password?</a></p> -->
							</form>
						</article>
					</div> <!-- card.// -->
				</aside> <!-- col.// -->
			</form>
			<aside class="col-sm-4">
				<p>Patient Login portal</p>

				<div class="card">
					<article class="card-body">
						<h4 class="card-title text-center mb-4 mt-1">Sign in</h4>
						<hr>
						<p class="text-success text-center">Patient</p>
						<form class="form-group" action="patientprocess.php" method="post">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-user"></i> </span>
									</div>
									<input name="patientemail" class="form-control" placeholder="Email" type="email">
								</div> <!-- input-group.// -->
							</div> <!-- form-group// -->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
									</div>
									<input name="patientpassword"class="form-control" placeholder="******" type="password">
								</div> <!-- input-group.// -->
							</div> <!-- form-group// -->
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block" name="submit"> Login  </button>
							</div> <!-- form-group// -->
							<!-- <p class="text-center"><a href="#" class="btn">Forgot password?</a></p> -->
						</form>
					</article>
				</div> <!-- card.// -->
			</aside> <!-- col.// -->

			<aside class="col-sm-4">
				<p>Doctor Login portal</p>

				<div class="card">
					<article class="card-body">
						<h4 class="card-title text-center mb-4 mt-1">Sign in</h4>
						<hr>
						<p class="text-success text-center">Doctor</p>
						<form class="form-group" action="doctorprocess.php" method="post">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-user"></i> </span>
									</div>
									<input name="doctoremail" class="form-control" placeholder="Email" type="email">
								</div> <!-- input-group.// -->
							</div> <!-- form-group// -->
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
									</div>
									<input name="doctorpassword"class="form-control" placeholder="******" type="password">
								</div> <!-- input-group.// -->
							</div> <!-- form-group// -->
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block" name="submit"> Login  </button>
							</div> <!-- form-group// -->
							<!-- <p class="text-center"><a href="#" class="btn">Forgot password?</a></p> -->
						</form>
					</article>
				</div> <!-- card.// -->
			</aside> <!-- col.// -->
		</div> <!-- row.// -->
	</div> 
</class>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
</body>
</html>