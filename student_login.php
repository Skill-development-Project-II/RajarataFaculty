<?php
	include"database.php";
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Rajarata University of Sri Lanka.</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	</head>
	<body>
	
		<?php include "navbar.php";?>
		
		<div class="login">
			<h1 class="heading" style="color: blue;margin-top:5%; margin-bottom:3%;">Student's Login</h1>
			<div class="">
				<?php
					if(isset($_POST["login"]))
					{
						$enc_PASSWORD=md5($_POST["PASS"]);
						$sql="select * from student where NAME='{$_POST["name"]}'and PASS='{$enc_PASSWORD}'";
						$res=$db->query($sql);
						if($res->num_rows>0)
						{
							$ro=$res->fetch_assoc();
							
							$_SESSION["ID"]=$ro["ID"];
							$_SESSION["NAME"]=$ro["NAME"];
							
							echo "<script>window.open('student_home.php','_self');</script>";
						}
						else
						{
							echo "<div class='error'>Invalid Username Or Password</div>";
						}
					}
				
				
				
				?>
			
			</div>
		</div>
<section style = "padding:1% 5%;padding-bottom:14%;">
	<div class="container-fluid">
		<div class="row d-flex">
			<div class="col-md-6 col-lg-6 col-xl-6 offset-xl-1">
			<img src="images/st.png" width="100%">
			</div>
			<div class="col-md-6 col-lg-6 col-xl-6 offset-xl-1">
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

				<!-- Email input -->
				<div class="form-outline mb-4">
					<input type="text" name = "name" id="form3Example3" class="form-control form-control-lg"
					placeholder="Enter an Username" />
					<label class="form-label" for="form3Example3" style = "color:#00f;">Username</label>
				</div>
					<br>
				<!-- Password input -->
				<div class="form-outline mb-3">
					<input type="password" id="form3Example4" class="form-control form-control-lg"
					placeholder="Enter password" name="PASS"/>
					<label class="form-label" name="PASS" for="form3Example4" style = "color:#00f;">Password</label>
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
		
		
		<!--<div class="footer">
			<footer><p>Copyright &copy; Rajarata University of Sri Lanka. All Rights Reserved. </p></footer>
		</div>-->
		
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