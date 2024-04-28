<?php
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

				<title>Cafeteria</title>

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
					
						<h3 style="color: black;"> Cafeteria Revenue</h3><br>
						<?php
							if(isset($_POST["submit"]))
							{
								$sq="insert into cafe(ca_date,ca_inc,ca_exp) values ('{$_POST["date"]}','{$_POST["income"]}','{$_POST["expense"]}')";
								if($db->query($sq))
								{
									echo "<div class='success'>Insert Success..</div>";
								}
								else
								{
									echo "<div class='error'>Insert Failed..</div>";
								}
							}
						?>
						
						<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                        <label style="color: black;">Date</label><br>
						   <input type="Date" name="date" required class="input">
						   <br><br>
                        <label style="color: black;">Income Amount</label><br>
						   <input type="number" name="income" required class="input">
						   <br><br>
						   <label style="color: black;">Expenditure Amount</label><br>
						   <input type="number" name="expense" required class="input">
						   <button type="submit" class="btn" name="submit" style="background-color: blue;color: white;" name="class_val_sent"> Add Cafeteria Details</button>
						</form>
				
				
					</div>
				
				
				<div class="tbox" >
					<h3 style="margin-top:30px; color: black;">Cafeteria Revenue</h3><br>
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" >
						<tr>
							<th>Date</th>
							<th>Income Amount</th>
							<th>Expenditure Amount</th>
							<th>Delete</th>
						</tr>
						<?php
							$s="select * from cafe";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
								
									echo "
										<tr>
										<td>{$r["ca_date"]}</td>
                                        <td>{$r["ca_inc"]}</td>
                                        <td>{$r["ca_exp"]}</td>
										<td><a href='cafeteria_delete.php?id={$r["caid"]}' style='color: white; background-color: red;' class='btnr'>Delete</a></td>
										</tr>
									
									";
									
								}
								
							}
							else
							{
								echo "No Records Found";
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