<?php
error_reporting(0);
	include"database.php";
	session_start();
	if (isset($_SESSION["AID"])){
		$logged_user = $_SESSION["ANAME"];
	}elseif (isset($_SESSION["TID"])){
		$logged_user = $_SESSION["TID"];
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

    <title>Add Student</title>

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
					
						<h3 style="color: black;" class = "py-3">Set Student's Details</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							$edate=$_POST["da"].'-'.$_POST["mo"].'-'.$_POST["ye"];
							$target="student/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							{
								$PASS = 123;
								$enc_PASSWORD=md5($PASS);

								$sq="INSERT INTO student(RNO,pass,NAME,FNAME,DOB,GEN,PHO,MAIL,ADDR,SIMG) values('{$_POST["rno"]}','{$enc_PASSWORD}','{$_POST["name"]}','{$_POST["fname"]}','{$edate}','{$_POST["gen"]}','{$_POST["pho"]}','{$_POST["email"]}','{$_POST["addr"]}','{$target_file}')";
								
								if($db->query($sq))
								{
									echo "<div class='success'>Insert Success</div>";
								}
								else
								{
									echo "<div class='error'>Insert Failed</div>";
								}
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
																			<label style="color: black;">ID</label><br>
																				<?php
																					$no="S101";
																					$sql="select * from student order by ID desc limit 1";
																					$res=$db->query($sql);
																					if($res->num_rows>0)
																					{
																						$row1=$res->fetch_assoc();
																						$no=substr($row1["RNO"],1,strlen($row1["RNO"]));
																						$no++;
																						$no="S".$no;
																					}						
																				?>
																			<input type="text" class="input3" name="rno" value="<?php echo $no;?>" readonly  >
																			<br><br>
																			<label style="color: black;">Student Name</label><br>
																			<input type="text" class="input3" name="name">
																			<br><br>
																			<label style="color: black;">Father Name</label><br>
																			<input type="text" class="input3" name="fname">
																			<br><br>
																			<label style="color: black;">Date of Birth</label><br>
																			<select name="da" class="input5">
																				<option value="">Date</option>
																				<option value="1">1 </option>
																				<option value="2">2 </option>
																				<option value="3">3 </option>
																				<option value="4">4 </option>
																				<option value="5">5 </option>
																				<option value="6">6 </option>
																				<option value="7">7 </option>
																				<option value="8">8 </option>
																				<option value="9">9 </option>
																				<option value="10">10</option>
																				<option value="11">11</option>
																				<option value="12">12</option>
																				<option value="13">13</option>
																				<option value="14">14</option>
																				<option value="15">15</option>
																				<option value="16">16</option>
																				<option value="17">17</option>
																				<option value="18">18</option>
																				<option value="19">19</option>
																				<option value="20">20</option>
																				<option value="21">21</option>
																				<option value="22">22</option>
																				<option value="23">23</option>
																				<option value="24">24</option>
																				<option value="25">25</option>
																				<option value="26">26</option>
																				<option value="27">27</option>
																				<option value="28">28</option>
																				<option value="29">29</option>
																				<option value="30">30</option>
																				<option value="31">31</option>
																			</select>
																			<select name="mo" class="input5">
																				<option> Month</option>
																				<option value="01">Jan</option>
																				<option value="02">Feb</option>
																				<option value="03">Mar</option>
																				<option value="04">Apr</option>
																				<option value="05">May</option>
																				<option value="06">Jun</option>
																				<option value="07">Jul</option>
																				<option value="08">Aug</option>
																				<option value="09">Sep</option>
																				<option value="10">Oct</option>
																				<option value="11">Nov</option>
																				<option value="12">Dec</option>
																			</select>
																			<select name="ye" class="input5">
																				<option value="">Select Year</option>
																				<option value="2025">2025</option>
																				<option value="2024">2024</option>
																				<option value="2023">2023</option>
																				<option value="2022">2022</option>
																				<option value="2021">2021</option>
																				<option value="2020">2020</option>
																				<option value="2019">2019</option>
																				<option value="2018">2018</option>
																				<option value="2017">2017</option>
																				<option value="2016">2016</option>
																				<option value="2015">2015</option>
																				<option value="2014">2014</option>
																				<option value="2013">2013</option>
																				<option value="2012">2012</option>
																				<option value="2011">2011</option>
																				<option value="2010">2010</option>
																				<option value="2009">2009</option>
																				<option value="2008">2008</option>
																				<option value="2007">2007</option>
																				<option value="2006">2006</option>
																				<option value="2005">2005</option>
																				<option value="2004">2004</option>
																				<option value="2003">2003</option>
																				<option value="2002">2002</option>
																				<option value="2021">2001</option>
																				<option value="2000">2000</option>
																			</select>
																			<br><br>
																			<label style="color: black;">Gender</label>
																			<select name="gen" required class="input3">
																					<option value="">Select</option>
																					<option value="Male">Male</option>
																					<option value="Female">Female</option>
																			</select>
																			<br><br>
																			<label style="color: black;">Phone No</label><br>
																			<input type="text" class="input3" maxlength="10" name="pho">
																			<br><br>
																		</div>
																</td>
																<td style="text-align:left;">
																		<div class="rbox"> 
																			<label style="color: black;">Parent's Mail Id</label><br>
																			<input type="email" class="input3" name="email">
																			<br><br>
																			<label style="color: black;">  Address</label><br>
																			<textarea rows="5" name="addr"></textarea>
																			<br><br>
																			<br><br>
																			<label style="color: black;">Image</label><br>
																			<input type="file"  class="input3" required name="img"><br><br>
														
																	<button type="submit"  class="btn" style="background-color: blue;color: white;" name="submit" name="submit">Add Student</button>
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