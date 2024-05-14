<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('lecturer_login.php?mes=Access Denied...','_self');</script>";
	}	
	
	
	$sql="SELECT * FROM lecturer WHERE TID={$_SESSION["TID"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
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
        <?php include 'sidebar2.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <?php include "navbar.php"; ?>
            <div id="content">
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <table width="100%">
                        <tr>
                            <td width="50%" style="text-align:left;">
                                <div class="content">
                                    <h3 style="color: black;" class = "py-3">Update Profile</h3>
                                    <div class="lbox1">
																		<?php
																			if(isset($_POST["submit"]))
																			{
																				$target="staff/";
																				$target_file=$target.basename($_FILES["img"]["name"]);
																				
																				
																				if ($_FILES["img"]["size"]>0) {
																					if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
																					{
																						$sql="update lecturer set PNO='{$_POST["pno"]}',MAIL='{$_POST["mail"]}',PADDR='{$_POST["addr"]}',IMG='{$target_file}'where TID={$_SESSION["TID"]}";
																						$db->query($sql);
																						echo"<script>window.open('lecturer_home.php?success','_self');</script>";
																					}
																				} else {
																					$sql="update lecturer set PNO='{$_POST["pno"]}',MAIL='{$_POST["mail"]}',PADDR='{$_POST["addr"]}' where TID={$_SESSION["TID"]}";
																					$db->query($sql);
																					echo"<script>window.open('lecturer_home.php?success','_self');</script>";
																				}
																				
																			}
																			
																			if (isset($_GET['success'])){
																				echo "<div class='success'>Update Success</div>";
																			}
																		
																		?>

																			<form  enctype="multipart/form-data" role="form"  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
																				<label style="color: black;">  Phone No</label><br>
																				<input type="text" maxlength="10" required class="input3" name="pno" value="<?php echo $row["PNO"] ?>"><br><br>
																				<label style="color: black;">  E - Mail</label><br>
																				<input type="email"  class="input3" required name="mail" value="<?php echo $row["MAIL"] ?>"><br><br>
																				<label style="color: black;" >  Address</label><br>
																				<textarea rows="5" name="addr"><?php echo $row["PADDR"] ?></textarea><br>
																				<label style="color: black;"> Image</label><br>
																				<input type="file"  class="input3" name="img"><br><br>
																				<button type="submit" class="btn" style="background-color: blue; color: white;" name="submit">Update Profile Details</button>
																			</form>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align:left;">
                                <div class="column" style="width:50%;">
                                    <div class="rbox1">
                                        <h3 style="color: black;">Profile</h3><br>
                                        <table border="1px">
																					<tr><td colspan="2"><img src="<?php echo $row["IMG"] ?>" height="100" width="100" alt="upload Pending"></td></tr>
																					<tr><th>Name </th> <td><?php echo $row["TNAME"] ?> </td></tr>
																					<tr><th>Qualification </th> <td><?php echo $row["QUAL"] ?>  </td></tr>
																					<tr><th>Salary </th> <td> <?php echo $row["SAL"] ?>  </td></tr>
																					<tr><th>Phone No </th> <td> <?php echo $row["PNO"] ?> </td></tr>
																					<tr><th>E - Mail </th> <td> <?php echo $row["MAIL"] ?> </td></tr>
																					<tr><th>Address </th> <td> <?php echo $row["PADDR"] ?> </td></tr>
																				</table>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
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
