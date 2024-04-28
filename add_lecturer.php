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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Class</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

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
					
						<h3 style="color: black;" class = "py-3">Add Lecturer Details</h3>
						
					<?php
						if(isset($_POST["submit"]))
						{
							$target="lecturer/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file)){

								$TPASS = 123;
								$enc_PASSWORD=md5($TPASS);

								$sq="insert into lecturer(TNAME,TPASS,QUAL,SAL,PNO,MAIL,PADDR,IMG) values('{$_POST["sname"]}',md5($TPASS),'{$_POST["qual"]}','{$_POST["sal"]}','{$_POST["pno"]}','{$_POST["mail"]}','{$_POST["addr"]}','{$target_file}')";
								if($db->query($sq))
								{
									echo "<div class='success'>Insert Success..</div>";
								}
								else
								{
									echo "<div class='error'>Insert Failed..</div>";
								}
							}else {
								echo "<div class='error'>Insert Failed ing..</div>";
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
																				<label style="color: black;">Lecturer Name</label><br>
					     													<input type="text" name="sname" required class="input">
																				<br><br>
																				<label style="color: black;">Qualification</label><br>
					     													<input type="text" name="qual" required class="input">
																				<br><br>
																				<label style="color: black;">Salary</label><br>
					     													<input type="text" name="sal" required class="input">
																				<br><br>
																				<label style="color: black;">Lecturer's Image</label><br>
						 														<input type="file"  class="input3" required name="img">
																		</div>
																</td>
																<td style="text-align:left;">
																		<div class="rbox"> 
																		<label style="color: black;">Phone</label><br>
					     													<input type="tel" name="pno" required class="input" 
						 														pattern="[0-9]{10}">
					     													<br><br>
						 														<label style="color: black;">Email</label><br>
					     													<input type="text" name="mail" required class="input">
					     													<br><br>
						 														<label style="color: black;">Address</label><br>
					     													<input type="text" name="addr" required class="input">
																				<br><br>
						
																				<button type="submit" class="btn" style="background-color: blue;color: white;" name="submit">Add Lecturer</button>
																		</div>
																</td>
														</tr>
												</tbody>
										</table>
								</form>
						</div>
	
						
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