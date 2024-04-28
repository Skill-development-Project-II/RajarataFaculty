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

				<title>Add Payment</title>

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
					
						<h3 style="color: black;" class = "py-3"> Payment Details</h3><br>

						
						<form method="post" action="payment.php">
                        
						<label style="color: black;">Class</label><br>
						<select name="stu_class_sent" class="input2" required>
							<?php 
								$class_id = "";
								if(isset($_POST['stu_class_sent'])){
									$class_id = $_POST['stu_class_sent'];
								}

								$sql="SELECT * FROM class
								JOIN lecturer ON class.TID = lecturer.TID
								JOIN sub ON class.SID = sub.SID
								ORDER BY CID ASC";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
								echo"<option value=''>Select</option>";
								while($r=$re->fetch_assoc())
								{
								echo "<option value='{$r["CID"]}'>{$r["CID"]} - {$r["CNAME"]} {$r["SNAME"]} - {$r["TNAME"]}</option>";
								}
								}
							?>
						</select>
                           <br><br>
						   
						   <button type="submit" class="btn" style="background-color: blue;color: white;" name="class_val_sent">Make Payment</button>
						</form>
				
				
					</div>
				
				
			</div>


			<div class="tbox" >
					<h3 style="margin-top:30px; color: black;"> Payment Details</h3><br>
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					?>

					<?php
						if (isset($_GET["success"])) {
							echo "<div class='success'>Payment Success</div>";
						} elseif (isset($_GET["failed"])){
							echo "<div class='error'>Payment Failed</div>";
						}
               		 ?>
					<table border="1px" >
						<tr>
							<th>P.Id</th>
                            <th>Class</th>
							<th>Student RNO</th>
                            <th>Payment Date</th>
                            <th>Payment Time</th>
							<th>Month</th>
                            <th>Year</th>
							<th>Amount</th>
                            <th>Payment Method</th>
                            <th>Delete</th>
						</tr>
						<?php
							$s="select * from payment
							JOIN student ON payment.stu_id = student.ID";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
								
									echo "
										<tr>
                                        <td>{$r["pay_id"]}</td>
                                        <td>{$r["class_id"]}</td>
                                        <td>{$r["RNO"]}</td>
                                        <td>{$r["pay_date"]}</td>
                                        <td>{$r["pay_time"]}</td>
                                        <td>{$r["month"]}</td>
                                        <td>{$r["year"]}</td>
                                        <td>{$r["amount"]}</td>
                                        <td>{$r["pay_method"]}</td>
										<td><a href='payment_delete.php?id={$r["pay_id"]}' style='color: white; background-color: red;' 'class='btnr'>Delete</a></td>
										</tr>
									
									";
									
								}
								
							}
							else
							{
								echo "No Record Found";
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