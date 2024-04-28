<?php
error_reporting(0);
	include"database.php";
	session_start();
	if (isset($_SESSION["AID"])){
		$logged_user = $_SESSION["ANAME"];
	} elseif (isset($_SESSION["TID"])) {
		$logged_user = $_SESSION["TNAME"];
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
					
						<h3 style="color: black;" class = "py-3"> Attendance Details</h3><br>
						
			<?php
			if(isset($_POST["submit"]))
			{
				$sq="insert into attendance(DATE,CLASS,STUDENT_ID,PAR) values('{$_POST["date"]}','{$_POST["stu_class"]}','{$_POST["stuno"]}','{$_POST["par"]}')";
				echo $sq;
				if($db->query($sq))
				{
					echo "<script>window.open('attendance.php?stu_class={$_POST["stu_class"]}&attendance&success','_self');</script>";   
				}
				else
				{
					echo "<script>window.open('attendance.php?stu_class={$_POST["stu_class"]}&attendance&success','_self');</script>";   
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
			<div class="lbox">

					 <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					 <label style="color: black;">Class</label><br>
						 <select name="stu_class" class="input2" readonly>
							<?php
								$stu_class = "";
								if(isset($_GET['attendance']) && isset($_GET['stu_class'])){
									$stu_class = $_GET['stu_class'];
								}
							
								$sql="SELECT * FROM class
								JOIN lecturer ON class.TID = lecturer.TID
								JOIN sub ON class.SID = sub.SID
								WHERE CID = '{$stu_class}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
								while($r=$re->fetch_assoc())
								{
								echo "<option value='{$r["CID"]}'>{$r["CID"]} - {$r["CNAME"]} {$r["SNAME"]} - {$r["TNAME"]}</option>";
								}
								}
							?>
						 </select>
						 <input type="text" name="stu_class" value='<?php echo $_GET['stu_class'];?>' hidden>
						 <br><br>

					 <label style="color: black;" value="">Date</label><br>
					 <input type="date" class="input2" name="date" required>
						
					<br><br>
						
				
						</div>
						 <div class="rbox">	

						<label style="color: black;">Student ID</label><br>
						 <select name="stuno" class="input2" required>
							<?php 
								if(isset($_GET['attendance']) && isset($_GET['stu_class'])){
									$sql="SELECT * FROM `student_class`
									JOIN student ON student_class.stu_id = student.ID
									WHERE CID={$_GET['stu_class']}";
								} else {
									$sql="";
								}
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
								echo"<option value=''>Select</option>";
								while($r=$re->fetch_assoc())
								{
								echo "<option value='{$r["stu_id"]}'>{$r["RNO"]} - {$r["NAME"]} {$r["FNAME"]}</option>";
								}
								}
							?>
						 </select><br><br>		

						 
                        <label style="color: black;">Participation</label><br>
					     	<select name="par"  required class="input2">
								<option value="">Select</option>
								<option value="Present">Present</option>
								<option value="Absence">Absence</option>
							</select><br><br> 
							
					</div>
				</div>
						
						 <button type="submit" class="btn" style="background-color: blue;color: white;" name="submit">Add Attendance</button>
					
					</form>
				</div>	
			</div>
            
			
				
	</body>
</html>