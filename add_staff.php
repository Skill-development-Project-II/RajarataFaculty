<?php
error_reporting(0);
	include"database.php";
	session_start();
	if (isset($_SESSION["AID"])){
		$logged_user = $_SESSION["ANAME"];
	} elseif (isset($_SESSION["NAID"])) {
		$logged_user = $_SESSION["NANAME"];
	} else {
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
	}	
?>

<!DOCTYPE html>
<html>
<head>

				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<meta name="description" content="">
				<meta name="author" content="">

				<title>Add Staff</title>

				<!-- Custom fonts for this template -->
				<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
				<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
						rel="stylesheet">
				<link href="css/sb-admin-2.min.css" rel="stylesheet">
				<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
	
	<body>
	<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php
				include('sidebar2.php');
		?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<?php include "navbar.php";?>
				<div id="content">
						<!-- Begin Page Content -->
						<div class="container-fluid">
						
			<h3 style="color: black;" class = "py-3">Add Staff Details</h3><br>
						
					<?php
						if(isset($_POST["submit"]))
						{
							$target="staff/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file)){

								$NAPASS = 123;
								$enc_PASSWORD=md5($NAPASS);

								$sq="insert into staff(NANAME,NAPASS,NAQUAL,NASAL,NAPNO,NAMAIL,NAADDR,NAIMG,ROLE) values('{$_POST["NANAME"]}', '{$enc_PASSWORD}','{$_POST["NAQUAL"]}','{$_POST["NASAL"]}','{$_POST["NAPNO"]}','{$_POST["NAMAIL"]}','{$_POST["NAADDR"]}','{$target_file}', '{$_POST["srole"]}')";
								if($db->query($sq))
								{
									echo "<div class='success'>Insert Success..</div>";
								}
								else
								{
									echo "<div class='error'>Insert Failed..</div>";
								}
							} else {
								echo "<div class='error'>Insert Failed..</div>";
							}
							
						}
						
					?>

						<div class="content">
								<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
										<table width="100%">
												<tbody>
														<tr>
																<td width="50%" style="text-align:left;">
																		<div class="lbox"> 	    
																				<label style="color: black;">Staff Name</label><br>
																				<input type="text" name="NANAME" required class="input"><br><br>
																				<label style="color: black;">Staff Role</label><br>
																				<select name="srole" required class="input">
																						<option value="">Select</option>
																						<option value="hr">HR Staff</option>
																						<option value="cafeteria">Cafeteria Staff</option>
																						<option value="front_office">Front Office Clerk</option>
																						<option value="finance">Finance Staff</option>
																				</select><br><br>
																				<label style="color: black;">Qualification</label><br>
																				<input type="text" name="NAQUAL" required class="input"><br><br>
																				<label style="color: black;">Salary</label><br>
																				<input type="text" name="NASAL" required class="input"><br><br>
																				<button type="submit" class="btn" style="background-color: blue;color: white;" name="submit">Add Staff</button>
																		</div>
																</td>
																<td style="text-align:left;">
																		<div class="rbox"> 
																				<label style="color: black;">Phone</label><br>
																				<input type="text" name="NAPNO" required class="input"><br><br>
																				<label style="color: black;">Email</label><br>
																				<input type="text" name="NAMAIL" required class="input"><br><br>
																				<label style="color: black;">Address</label><br>
																				<input type="text" name="NAADDR" required class="input"><br><br>
																				<label style="color: black;">Staff Image</label><br>
																				<input type="file" class="input" required name="img">
																		</div>
																</td>
														</tr>
												</tbody>
										</table>
								</form>
						</div>

	
			<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   <!-- Scroll to Top Button-->
	 <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
	</body>
</html>