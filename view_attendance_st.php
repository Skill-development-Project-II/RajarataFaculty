<?php
	include"database.php";
	session_start();

	if (isset($_SESSION["ID"]))
		$logged_user = $_SESSION["NAME"];

	 else {
		echo"<script>window.open('Student_login.php?mes=Access Denied...','_self');</script>";
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

    <title>View Mark</title>

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
				<h3 style="color: black;" class = "py-3">View My Attendance Details</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label style="color: black;">Class</label><br>
					<select name="stu_class" class="input2">
						<?php 
							$sql="SELECT * FROM class
							JOIN lecturer ON class.TID = lecturer.TID
							JOIN sub ON class.SID = sub.SID
							ORDER BY CID ASC ";
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
							
				</div>
				<div class="rbox">
				<br>
					<label style="color: black; margin-left: 20px;">Date</label><br>
					<input type="date" style="margin-left: 20px;"name="date" class="input2">
						<br><br>
				</div>
					<button type="submit" style="background-color: blue;color: white; margin-left: 20px;" class="btn" name="view"> View Attendance</button>
				
						
					</form>
					<br>
					<br>
					<br>
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								
								echo "<h3 style=\"color: black; margin-left: 20px;\">Student's Attendance Details</h3><br>";

								if(!empty($_POST['stu_class']) && !empty($_POST['date'])) {

									$sql="SELECT attendance.*, CLASS.*, student.ID, student.RNO, student.NAME, student.FNAME, lecturer.TNAME, sub.SNAME
								FROM attendance
									JOIN class ON attendance.CLASS = class.CID
									JOIN student ON attendance.STUDENT_ID = student.ID
									JOIN lecturer ON class.TID = lecturer.TID
									JOIN sub ON class.SID = sub.SID
									WHERE CID = '{$_POST['stu_class']}' AND DATE = '{$_POST['date']}'";

								} elseif (!empty($_POST['stu_class'])) {

									$sql="SELECT attendance.*, CLASS.*, student.ID, student.RNO, student.NAME, student.FNAME, lecturer.TNAME, sub.SNAME
								FROM attendance
									JOIN class ON attendance.CLASS = class.CID
									JOIN student ON attendance.STUDENT_ID = student.ID
									JOIN lecturer ON class.TID = lecturer.TID
									JOIN sub ON class.SID = sub.SID
									WHERE CID = '{$_POST['stu_class']}'";

								} elseif (!empty($_POST['date'])) {
									$sql="SELECT attendance.*, CLASS.*, student.ID, student.RNO, student.NAME, student.FNAME, lecturer.TNAME, sub.SNAME
								FROM attendance
									JOIN class ON attendance.CLASS = class.CID
									JOIN student ON attendance.STUDENT_ID = student.ID
									JOIN lecturer ON class.TID = lecturer.TID
									JOIN sub ON class.SID = sub.SID
									WHERE DATE = '{$_POST['date']}'";
								} else {
									$sql="SELECT attendance.*, CLASS.*, student.ID, student.RNO, student.NAME, student.FNAME, lecturer.TNAME, sub.SNAME
								FROM attendance
									JOIN class ON attendance.CLASS = class.CID
									JOIN student ON attendance.STUDENT_ID = student.ID
									JOIN lecturer ON class.TID = lecturer.TID
									JOIN sub ON class.SID = sub.SID";
								}

								$re=$db->query($sql);
								if($re->num_rows>0)
								{ 
									echo '
										<table border="1px">
										<tr>
											<th>S.No</th>
											<th>Date</th>
											<th>Class</th>
											<th>Student</th>
											<th>Participation</th>
										</tr>
									
									
									';
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$i++;
										echo "
										<tr>
											<td>{$i}</td>
											<td>{$r["DATE"]}</td>
											<td>{$r["CID"]} - {$r["CNAME"]} {$r["SNAME"]} - {$r["TNAME"]}</td>
											<td>{$r["RNO"]} - {$r["FNAME"]} {$r["NAME"]}</td>
											<td>{$r["PAR"]}</td>
										</tr>
										";
										
									}
								}
							else
							{
								echo "<div style='margin-left: 20px; color: black;'>No record found</div>";

							}
								echo "</table>";
							}
						
						
						?>
					
					</div>
				</div>
				
				
			</div>
	
			
		<script src="js/jquery.js"></script>
		 <script>
		$(document).ready(function(){
			$(".error").fadeTo(1000, 100).slideUp(1000, function(){
					$(".error").slideUp(1000);
			});
			
			$(".success").fadeTo(1000, 100).slideUp(1000, function(){
					$(".success").slideUp(1000);
			});
		});
	</script>
				
	</body>
</html>