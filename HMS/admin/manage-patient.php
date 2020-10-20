<?php
session_start();
// error_reporting(0);
error_reporting(E_ALL);
include('include/config.php');
include('include/loginstatus.php');
include('include/pagination.php');
check_login();


if(isset($_GET['del']))
{
	mysqli_query($con,"delete from users where id = '".$_GET['id']."'");
	$_SESSION['msg']="patient data deleted !!";
}

if (isset($_POST['search'])){
	$search = $_POST['search'];
	$search_id = mysqli_query($con, "select * from users where phone = '$search' ");
	$patient_info=mysqli_fetch_array($search_id);

	if($patient_info){
		 header("Location: edit-patient.php?id= ".intval($patient_info['id'])." ");

	};

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
										<div class="col-md-10">
											<input type="text" name="search" class="form-control" placeholder="enter phone#">
										</div>
											<div class="col-md-2">
												<input type="submit" name="patient_search" class="btn btn-primary" value="Search" >
											</div>
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
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>


										<?php
$result_per_page = 50;

if(isset($_GET["page"])){
	$page = $_GET["page"];
}else{
	$page = 1; 
}
$start_from = ($page - 1) * $result_per_page;
$sql = mysqli_query($con,"select * from users ORDER BY id ASC LIMIT $start_from, $result_per_page ");

										$cnt=1 + $start_from;
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
															<a href="manage-patient.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="far fa-trash"></i></a></td>
														</div>

										</td>
									</tr>

									<?php 
									$cnt = $cnt + 1 ;
									// print_r($start_from);	
								}?>


							</tbody>
						</table>
<?php 
$sql = "SELECT COUNT(id) AS total FROM users";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row["total"] / $result_per_page); // calculate total pages with results

echo '<div class = "pagination">' ; 
for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages

						
            echo "<a href='manage-patient.php?page=".$i."'";
            if ($i==$page)  echo " class='curPage'";
            echo ">".$i."</a> "; 

};
echo'</div>';
?>
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
