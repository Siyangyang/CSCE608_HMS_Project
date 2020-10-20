<?php
session_start();
// error_reporting(0);
include('include/config.php');
include('include/loginstatus.php');
check_login();



if(isset($_GET['del']))
{
	mysqli_query($con,"delete from doctors where id = '".$_GET['id']."'");
	$_SESSION['msg']="data deleted !!";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | Manage Room</title>
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
								<h1 class="mainTitle">Admin | Manage Room</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<a href="logout.php">log out</a>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						

						<div class="row">
							<div class="col-lg-12">
								<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Room</span></h5>
								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th class="center">#</th>
											<th>Room number</th>
											<th>Room Type</th>
											<th>Status</th>
											<th>Edit</th>
										</tr>
									</thead>

									<tbody>
										<?php
										$sql=mysqli_query($con,"select * from room");
										$cnt=1;
										while($row=mysqli_fetch_array($sql))
										{
											?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo str_pad((string)$row['roomID'], 5, '0', STR_PAD_LEFT);?></td>
												<td><?php echo $row['type'];?></td>
												<td><?php if ($row['status'] == 1)
																		echo "Available";
																	else
																		echo "Occupied";
												?>
												</td>

											<td >
												<!-- <div class="visible-md visible-lg hidden-sm hidden-xs"> -->
													<a href="edit-room.php?id=<?php echo $row['roomID'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fas fa-edit"></i></a></td>
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
</body>
</html>
