<?php
session_start();
include"database.php";
if (isset($_SESSION["AID"])){
    $logged_user = $_SESSION["ANAME"];
} elseif (isset($_SESSION["NAID"])) {
    $logged_user = $_SESSION["NANAME"];
} else {
    echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
}
?>
<?php
date_default_timezone_set('Asia/Colombo');
$date = date("Y-m-d");

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

		<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #343a40;
            color: white;
        }
    </style>

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
                
					<h3 style="color: black;" class = "py-3">Add Class Details</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							 $sq="insert into class(CNAME,SID,TID,COMM_DATE,CLASS_DAY,CLASS_TIME) 
							 values('{$_POST["cname"]}','{$_POST["subject"]}','{$_POST["lec"]}','{$_POST["commdate"]}','{$_POST["classday"]}','{$_POST["classtime"]}')";
							if($db->query($sq))
							{
								echo "<script>window.open('add_class.php?success','_self');</script>";
							}
							else
							{
								echo "<script>window.open('add_class.php?failed','_self');</script>";
							}
						}
					?>

				<?php
                    if (isset($_GET["success"])) {
                        echo "<div class='success'>Insert Success</div>";
                    } elseif (isset($_GET["failed"])){
                        echo "<div class='error'>Insert Failed</div>";
                    }
                ?>		
				
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

				<table width="100%">
					<tr>
						<td width="50%" style="text-align:left;">
							<label style="color: black;">Faculties </label><br>
							<select name="cname"  required class="input2">
									<option value="">Select</option>
									<option value="Technology">Technology</option>
									<option value="Mangment Studies">Mangment Studies</option>
									<!-- <option value="Grade 8">Grade 8</option>
									<option value="Grade 9">Grade 9</option>
									<option value="Grade 10">Grade 10</option>
									<option value="Grade 11">Grade 11</option>
									<option value="Grade 12">Grade 12</option>
									<option value="Grade 13">Grade 13</option> -->
							</select><br><br>

							<label style="color: black;">Lecturer Assigned </label><br>
							<select name="lec"  required class="input2">
									<option value="">Select</option>
								<?php
										$s="SELECT * FROM lecturer";
										$res=$db->query($s);
										if($res->num_rows>0)
										{
											$i=0;
											while($r=$res->fetch_assoc())
											{
												$i++;
												echo "<option value='{$r["TID"]}'>{$r["TNAME"]}</option>";
												
											}
											
										}
									?>
								
							</select><br><br>

								<label style="color: black;">Subject </label><br>
									<select name="subject"  required class="input2">
										<option value="">Select</option>
											<?php
												$s="SELECT * FROM sub";
												$res=$db->query($s);
												if($res->num_rows>0)
												{
													$i=0;
													while($r=$res->fetch_assoc())
													{
														$i++;
														echo "<option value='{$r["SID"]}'>{$r["SNAME"]}</option>";
														
													}
													
												}
											?>
										
									</select>
								<br><br>
						</td>
						<td style="text-align:left;">
							<label style="color: black;">Commencement Date</label><br>
							<input type="date" class="input2" name="commdate"><br><br>
							
							<label style="color: black;">Class Day</label><br>
							<select name="classday"  required class="input2">
									<option value="">Select</option>
									<option value="Monday">Monday</option>
									<option value="Tuesday">Tuesday</option>
									<option value="Wednesday">Wednesday</option>
									<option value="Thursday">Thursday</option>
									<option value="Friday">Friday</option>
									<option value="Saturday">Saturday</option>
									<option value="Sunday">Sunday</option>

							</select><br><br>
							
							<label style="color: black;">Class Time</label><br>
							<input type="time" class="input2" name="classtime"><br><br>
						</td>
					</tr>
				</table>
					<button type="submit" class="btn" name="submit" style="background-color: blue;color: white;">Add Class</button>
				</form>
				
				
				</div>
				
				
				<div class="tbox">
				
				<h3 style="margin-top:30px; color: black; text-align:center;">Student's Class Details</h3><br>
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" class = "mx-3 mb-5">
						<tr>
							<th style="width:5%">S.No</th>
							<th style="width:15%">Class Name</th>
							<th style="width:15%">Lecturer Assigned</th>
							<th style="width:15%">Subject</th>
							<th style="width:15%">Subject Fee</th>
							<th style="width:15%">Student</th>
							<th style="width:10%">Update</th>
							<th style="width:10%">Delete</th>
						</tr>
						<?php
							$s="SELECT * FROM sub 
							JOIN class ON sub.SID = class.SID 
							JOIN lecturer ON class.TID = lecturer.TID 
							ORDER BY `class`.`CID` DESC";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo "
										<tr>
											<td>{$r["CID"]}</td>
											<td>{$r["CNAME"]}</td>
											<td>{$r["TNAME"]}</td>
											<td>{$r["SNAME"]}</td>
											<td>{$r["SFEE"]}</td>
											
											

											<td><a href='add_class_student.php?cid={$r["CID"]}' style='color: white; background-color: blue;' class='btnb'>Manage Students</a></td>
											<td><a href='add_class_update.php?cid={$r["CID"]}' style='color: white; background-color: blue;' class='btnr'>Update</a></td>
											<td><a href='delete.php?id={$r["CID"]}' style='color: white; background-color: red;' class='btnr'>Delete</a></td>

										</tr>
										";
									
								}
								
							}
						?>
					
					</table>
				</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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