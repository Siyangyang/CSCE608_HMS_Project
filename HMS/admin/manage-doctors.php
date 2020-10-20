<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/loginstatus.php');
include('include/pagination.php');
check_login();


if(isset($_GET['del']))
{
	mysqli_query($con,"delete from doctors where id = '".$_GET['id']."'");
	$_SESSION['msg']="Doctor data deleted !!";
}

if (isset($_POST['search'])){
	$search = $_POST['search'];
	$search_id = mysqli_query($con, "select * from doctors where docphone = '$search' ");
	$doc_info=mysqli_fetch_array($search_id);

	if($doc_info){
		 header("Location: edit-doctor.php?id= ".intval($doc_info['id'])." ");
	};
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | Manage Doctors</title>
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
								<h1 class="mainTitle">Admin | Manage Doctors</h1>
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
								<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Docters</span></h5>
								<form class="form-group"  method="post">
									<div class="row">
										<div class="col-md-10">
											<input type="text" name="search" class="form-control" placeholder="enter phone#">
										</div>
											<div class="col-md-2">
												<input type="submit" name="doc_search" class="btn btn-primary" value="Search" >
											</div>
									</div>
								</form>

								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th class="center">#</th>
											<th>Specialization</th>
											<th>Doctor Name</th>
											<th>Email</th>
											<th>phone</th>
											<th>fee</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>

									<tbody>
										<?php
										// $sql=mysqli_query($con,"select * from doctors");
$result_per_page = 50;

if(isset($_GET["page"])){
	$page = $_GET["page"];
}else{
	$page = 1; 
}
$start_from = ($page - 1) * $result_per_page;
$sql = mysqli_query($con,"select * from doctors ORDER BY id ASC LIMIT $start_from, $result_per_page ");

										$cnt=1 + $start_from;
										while($row=mysqli_fetch_array($sql))
										{
											?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php 
												$tmp = $row['specialityID'];
												$sql1 = mysqli_query($con,"select specilization from doctorspecilization where id ='$tmp' ");
												// echo $row['specialityID'];
												$row1=mysqli_fetch_array($sql1);
												echo $row1['specilization'];
												?></td>
												<td><?php echo $row['doctorName'];?></td>
												<td><?php echo $row['docEmail'];?>
												<td><?php echo $row['docphone'];?>
												<td><?php echo $row['docFees'];?>

											</td>
											
											<td >
												<!-- <div class="visible-md visible-lg hidden-sm hidden-xs"> -->
													<a href="edit-doctor.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fas fa-edit"></i></a></td>
													<td >		
														<a href="manage-doctors.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="far fa-trash"></i></a>
													</td>
											</tr>
											
											<?php 
											$cnt = $cnt + 1 ;	
										}?>
										
										
									</tbody>

								</table>

<?php 
$sql = "SELECT COUNT(id) AS total FROM doctors";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row["total"] / $result_per_page); // calculate total pages with results

echo '<div class = "pagination">' ; 
for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages

						
            echo "<a href='manage-doctors.php?page=".$i."'";
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
</body>
</html>
