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

    <title>Class Report</title>

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
					
						<h3 style="color: black;" class = "py-3">Class Schedule Report</h3><br>


						<form method="get" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<table style="width: 100%">
							<tr>
								<td>
									<label style="color: black;">Grade</label><br>
									<select name="grade" class="input2">
										<option value="">Select</option>
										<option value="Grade 6">Grade 6</option>
										<option value="Grade 7">Grade 7</option>
										<option value="Grade 8">Grade 8</option>
										<option value="Grade 9">Grade 9</option>
										<option value="Grade 10">Grade 10</option>
										<option value="Grade 11">Grade 11</option>
										<option value="Grade 12">Grade 12</option>
										<option value="Grade 13">Grade 13</option>
									</select>
								</td>

								<td>
									<label style="color: black;">Class Day</label><br>
									<select name="classday" class="input2">
										<option value="">Select</option>
										<option value="Monday">Monday</option>
										<option value="Tuesday">Tuesday</option>
										<option value="Wednesday">Wednesday</option>
										<option value="Thursday">Thursday</option>
										<option value="Friday">Friday</option>
										<option value="Saturday">Saturday</option>
										<option value="Sunday">Sunday</option>
									</select>
								</td>
							</tr>
						</table>
					
						   <button type="submit" style="background-color: blue;color: white;" class="btn" name="submit">Search Class Details</button>
						   <button type="button" style="background-color: blue;color: white;" class="btn" onclick="location.href='class_report.php'">Show All</button>
						</form>
					
					<br>
					<br>
					<br>
					
					
		
				
				</div>

				<table id="example" class="display nowrap" style="width: 100%; ">
            
			<thead>
				<tr>
					<th>Class ID</th>
					<th>Grade</th>
					<th>Subject</th>
					<th>Lecturer</th>
					<th>Commencement</th>
					<th>Class Day</th>
					<th>Class Time</th>
					<th>Total Students</th>
				</tr>
			</thead>

			<tbody>
  
			  <?php
				  if(!empty($_GET['grade']) && !empty($_GET['classday'])){
					$s="SELECT * 
					FROM class
					JOIN lecturer ON class.TID = lecturer.TID
					JOIN sub ON class.SID = sub.SID
					WHERE CNAME = '{$_GET["grade"]}' AND CLASS_DAY = '{$_GET["classday"]}'";
				} else if (!empty($_GET['grade'])){
					$s="SELECT * 
					FROM class
					JOIN lecturer ON class.TID = lecturer.TID
					JOIN sub ON class.SID = sub.SID
					WHERE CNAME = '{$_GET["grade"]}'";
				} else if (!empty($_GET['classday'])){ 
					$s="SELECT * 
					FROM class
					JOIN lecturer ON class.TID = lecturer.TID
					JOIN sub ON class.SID = sub.SID
					WHERE CLASS_DAY = '{$_GET["classday"]}'";
				} else {
					$s="SELECT * 
					FROM class
					JOIN lecturer ON class.TID = lecturer.TID
					JOIN sub ON class.SID = sub.SID";
				}

				  
				$res=$db->query($s);
				if($res->num_rows>0)
				{
					while($r=$res->fetch_assoc())
					{
					$commencement = $r["COMM_DATE"];
					date_default_timezone_set('Asia/Colombo');
					$today = date("Y-m-d"); 
					if ($today<$commencement){
						$commencement = "Commences on ".$r["COMM_DATE"];
					} else if ($today==$commencement){
						$commencement = "Commences today";
					} else if ($today>$commencement) {
						$commencement = "Commenced";
					}
						 
			?>

			  <tr>
				  <td><?php echo $r["CID"] ?></td>
				  <td><?php echo $r["CNAME"] ?></td>
				  <td><?php echo $r["SNAME"] ?></td>
				  <td><?php echo $r["TNAME"] ?></td>
				  <td><?php echo $commencement ?></td>
				  <td><?php echo $r["CLASS_DAY"] ?></td>
				  <td><?php echo $r["CLASS_TIME"] ?></td>
				  <?php
					  $sql = "SELECT COUNT(stu_id) AS stu_count FROM student_class WHERE CID={$r["CID"]}";
					 $res1=$db->query($sql);
					 if($res1->num_rows>0)
					 {
						$r2=$res1->fetch_assoc()
				  ?>
				  <td><?php echo $r2["stu_count"] ?></td>
				  <?php } ?>
			  </tr>

			  <?php
					  }
				  }
				?>
			</tbody>
	  </table>
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