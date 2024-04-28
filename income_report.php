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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Income Report</title>

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
				.dt-buttons button {
        background-color: #007bff; /* Blue color */
        color: white;
        border: none;
        border-radius: 4px;
        padding: 8px 12px;
        margin-right: 5px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Hover effect */
    .dt-buttons button:hover {
        background-color: #0056b3; /* Darker blue color */
    }

    /* Make buttons inline */
    .dt-buttons {
        display: inline-block;
        margin-bottom: 10px; /* Add some space below the buttons */
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
					
						<h3 style="color: black;" class = "py-3">Income Report</h3><br>


						<form method="get" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<table style="width: 100%">
							<tr>
								<td>
									<label style="color: black;">From Date</label><br>
									
									<input type="Date" id="min" name="fromdate" required class="input2" value="<?php if(isset($_GET['fromdate'])){echo $_GET['fromdate'];} ?>">
								</td>
								<td>
									<label style="color: black;">To Date</label><br>
						   			<input type="Date" id="max" name="todate" required class="input2" value="<?php if(isset($_GET['todate'])){echo $_GET['todate'];} ?>">
								</td>
							</tr>
						</table>
						<br>
						   <button type="submit" style="background-color: blue;color: white;" class="btn" name="submit">Search Cafeteria Details</button>
						   <button type="button" style="background-color: blue;color: white;" class="btn" onclick="location.href='income_report.php'">Show All</button>
						</form>
					
					<br>
					<br>
					
				
					
					<table id="example" class="display nowrap" style="width: 100%">
            
						<thead>
							<tr>
								<th>Date</th>
								<th>Source</th>
								<th>Income</th>
								<th>Expenses</th>
								<th>Profit</th>
							</tr>
						</thead>
  
						<tbody>
			  
						  <?php
						  	if(isset($_GET['fromdate']) && isset($_GET['todate'])){
								$s="SELECT DISTINCT(ca_date) FROM cafe WHERE ca_date BETWEEN '{$_GET["fromdate"]}' AND '{$_GET["todate"]}'";
							} else {
								$s="SELECT DISTINCT(ca_date) FROM cafe";
							}
							  
							  $res=$db->query($s);
							  if($res->num_rows>0)
							  {
								  while($r=$res->fetch_assoc())
								  {
									  //While In While
									  
									$sql="SELECT SUM(ca_inc) AS sum_ca_inc, 
									SUM(ca_exp) AS sum_ca_exp
									FROM cafe
									WHERE ca_date='{$r["ca_date"]}'";
  
									  $res2=$db->query($sql);
									  if($res2->num_rows>0)
									  {
										  while($r2=$res2->fetch_assoc())
										  {
						  ?>
  
						  <tr>
							  <td><?php echo $r["ca_date"]?></td>
							  <td>Cafeteria</td>
							  <td><?php echo $r2["sum_ca_inc"]?></td>
							  <td><?php echo $r2["sum_ca_exp"]?></td>
							  <td><?php echo $r2["sum_ca_inc"] - $r2["sum_ca_exp"]?></td>
						  </tr>
  
						  <?php
										  }
									  }
								  }
							  }
							  
							  if(isset($_GET['fromdate']) && isset($_GET['todate'])){
								$sql_pay="SELECT DISTINCT(pay_date) FROM payment WHERE pay_date BETWEEN '{$_GET["fromdate"]}' AND '{$_GET["todate"]}'";
							  } else {
								$sql_pay="SELECT DISTINCT(pay_date) FROM payment";
							  }

							  
							  $res_pay=$db->query($sql_pay);
							  if($res_pay->num_rows>0)
							  {
								  while($r_pay=$res_pay->fetch_assoc())
								  {
									  //While In While
									  $sql_pay2="SELECT SUM(amount) AS sum_class_inc
									  FROM payment
									  WHERE pay_date='{$r_pay["pay_date"]}'";
  
									  $res_pay2=$db->query($sql_pay2);
									  if($res_pay2->num_rows>0)
									  {
										  while($r_pay2=$res_pay2->fetch_assoc())
										  {
									  
						  ?>
						  <tr>
							  <td><?php echo $r_pay["pay_date"]; ?></td>
							  <td>Class Fees</td>
							  <td><?php echo $r_pay2["sum_class_inc"]; ?></td>
							  <td><?php echo 0; ?></td>
							  <td><?php echo $r_pay2["sum_class_inc"] - 0; ?></td>
						  </tr>
						  <?php
										  }
									  }
								  }
							  }
  
						?>
						</tbody>
				  </table>
				</div>
			</div>
	
			<script src="DataTables/jquery-3.5.1.js"></script>
			<script src="DataTables/jquery.dataTables.min.js"></script>
			<script src="DataTables/dataTables.buttons.min.js"></script>
			<script src="DataTables/buttons.flash.min.js"></script>
			<script src="DataTables/jszip.min.js"></script>
			<script src="DataTables/pdfmake.min.js"></script>
			<script src="DataTables/vfs_fonts.js"></script>
			<script src="DataTables/buttons.html5.min.js"></script>
			<script src="DataTables/buttons.print.min.js"></script>
			<!-- <script src="DataTables/date_range.js"></script> -->

			<script>
			$(document).ready(function () {
				$("#example").DataTable({
				// bFilter: false,
				dom: "Bfrtip",
				buttons: ["copy", "csv", "excel", "pdf", "print"],
				});
			});
			</script>
			
		<!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    		
	</body>
</html>