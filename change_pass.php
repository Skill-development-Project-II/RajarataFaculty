<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
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

    <title>Admins' Change Password</title>

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
					
					<h3 class="py-3" style="color: black;" >Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br>
					
				<div class="content1">
					
						<h3 style="color: black;"> Change Password</h3><br>
						<?php
							if(isset($_POST["submit"]))
							{
								$enc_OLD_PASSWORD=md5($_POST["opass"]);
								$enc_NEW_PASSWORD=md5($_POST["npass"]);

								$sql="select * from admin where APASS='{$enc_OLD_PASSWORD}' and AID='{$_SESSION["AID"]}'";
								$result=$db->query($sql);
								if($result->num_rows>0)
								{
									if($_POST["npass"]==$_POST["cpass"])
									{
										$s="update admin SET APASS='{$enc_NEW_PASSWORD}' where AID='{$_SESSION["AID"]}'";
										$db->query($s);
										echo "<div class='success'>Password Changed</div>";
									}
									else
									{
										echo "<div class='error'>Password Mismatch</div>";
									}
								}
								else
								{
									echo "<div class='error'>Invalid Password</div>";
								}
							}
						
						
						?>
						
							
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<label style="color: black;">Old Password</label><br>
						<input type="text" class="input3" name="opass"><br><br>
						<label style="color: black;">New Password</label><br>
						<input type="text" class="input3" name="npass"><br><br>
						<label style="color: black;">Confirm Password</label><br>
						<input type="text" class="input3" name="cpass"><br><br>
						<button type="submit" class="btn" style="background-color: blue;color: white;" style="float:left" name="submit"> Change Password</button>
					</form>
			
				</div>	
			</div>
		
		
	</body>
</html>