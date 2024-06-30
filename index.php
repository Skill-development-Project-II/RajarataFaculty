<?php
	include "database.php";
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Rajarata University of Sri Lanka.</title>
		<link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	</head>
	<body>

		<?php include "navbar.php";?>
			<h1 class="heading" style="color: blue;margin-top:5%; margin-bottom:3%;">Admin Login</h1>
			<?php
				if(isset($_POST["login"]))
				{
					 $enc_PASSWORD=md5($_POST["apass"]);
					 $sql="select * from admin where ANAME='{$_POST["aname"]}' and APASS='{$enc_PASSWORD}'";
					//$sql="select * from admin where ANAME='{$_POST["aname"]}'";
					$res=$db->query($sql);
					if($res->num_rows>0)
					{
						$ro=$res->fetch_assoc();
						$_SESSION["AID"]=$ro["AID"];
						$_SESSION["ANAME"]=$ro["ANAME"];
						echo "<script>window.open('admin_home.php','_self');</script>";
					}
					else
					{
						echo "<div class='error'>Invalid Username or Password</div>";
					}
					
				}
				if(isset($_GET["mes"]))
				{
					echo "<div class='error'>{$_GET["mes"]}</div>";
				}
				
			?>
<section style = "padding:1% 5%;padding-bottom:14%;">
	<div class="container-fluid">
		<div class="row d-flex">
			<div class="col-md-6 col-lg-6 col-xl-6 offset-xl-1">
			<img src="images/ad.jpg" width="100%">
			</div>
			<div class="col-md-6 col-lg-6 col-xl-6 offset-xl-1">
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

				<!-- Email input -->
				<div class="form-outline mb-4">
					<input type="text" name = "aname" id="form3Example3" class="form-control form-control-lg"
					placeholder="Enter an Username" />
					<label class="form-label" for="form3Example3" style = "color:#00f;">Username</label>
				</div>
					<br>
				<!-- Password input -->
				<div class="form-outline mb-3">
					<input type="password" id="form3Example4" class="form-control form-control-lg"
					placeholder="Enter password"name="apass"/>
					<label class="form-label" name="apass" for="form3Example4" style = "color:#00f;">Password</label>
				</div>
				<button type="submit" class="btn" name="login">Login Here</button>
				</form>
			</div>
		</div>
  	</div>
<div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <!--<div class="text-white mb-3 mb-md-0">
	<footer><p>Copyright &copy; Rajarata University of Sri Lanka. All Rights Reserved. </p></footer>
    </div>-->
    <!-- Copyright -->
  </div>
</section>
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