<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('lecturer_login.php?mes=Access Denied...','_self');</script>";
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

    <title>University Information</title>

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

				<div class="content">
				
					
					<div class="rbox1">
					
						<h3 style="color: black; " class = "py-3">View Student's Details</h3><br>
					
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" >
						<tr>
							<th>R. No</th>
							<th>Name</th>
							<th>Father Name</th>
							<th>DOB</th>
							<th>Gender</th>
							<th>Phone</th>
							<th>Mail</th>
							<th>Address</th>
							<th>Image</th>
							<!-- <th>Update</th> -->
							<!-- <th>Delete</th> -->
						</tr>
						<?php
							$TID = $_SESSION['TID'];

							$sl="SELECT DISTINCT(student.ID) FROM lecturer
							JOIN class ON lecturer.TID = class.TID
							JOIN student_class ON class.CID = student_class.CID
							JOIN student ON student_class.stu_id = student.ID
							WHERE lecturer.TID = {$TID}
							ORDER BY student.ID ASC";
							$r=$db->query($sl);
							if($r->num_rows>0)
							{
								while($ro=$r->fetch_assoc())
								{
									$sql="SELECT student.*, class.* FROM lecturer 
									JOIN class ON lecturer.TID = lecturer.TID 
									JOIN student_class ON class.CID = student_class.CID 
									JOIN student ON student_class.stu_id = student.id 
									WHERE student.ID = {$ro['ID']}";
									
									$row=$db->query($sql);
									if($row->num_rows>0)
									{
										$ro1=$row->fetch_assoc();
											echo "
										<tr>
											<td>{$ro1["RNO"]}</td>
											<td>{$ro1["NAME"]}</td>
											<td>{$ro1["FNAME"]}</td>
											<td>{$ro1["DOB"]}</td>
											<td>{$ro1["GEN"]}</td>
											<td>{$ro1["PHO"]}</td>
											<td>{$ro1["MAIL"]}</td>
											<td>{$ro1["ADDR"]}</td>
											<td><img src='{$ro1["SIMG"]}' height='70' width='70'></td>
											<!--td><a href='student_update.php?id={$ro1["ID"]}' class='btnr'>Update</a><td-->
											<!--td><a href='student_delete.php?id={$ro1["ID"]}' class='btnr'>Delete</a><td-->
										</tr>
									
										";
										
									} else {
										echo "No Record Found";
									}
								}
							}
						
						?>
						
						</table>
					</div>
				</div>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>