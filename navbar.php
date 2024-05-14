<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
        .navbar {
        background: #1c13cf;
        height: 60px;
        width: 100%;
				display: block;
        margin-bottom: 0px !important;
        }
        .list {
            list-style: none;
            text-align: right;
            }
            .list li {
            display: inline;
            }

            .list li a {
            text-decoration: none;
            color: white;
            line-height: 50px;
            padding: 20px;
            }
    </style>
</head>
<body>

<div class="navbar" >

			<ul class="list">
				<b style="color:white;float:left;line-height:50px;font-family:Cooper Black; font-size:18px;">
				Rajarata University of Sri Lanka</b>
			<?php
				if(isset($_SESSION["AID"]))
				{
					echo'
				
						<li><a href="admin_home.php">Admin Home</a></li>
						<li><a href="change_pass.php">Settings</a></li>
						<li><a href="logout.php">Logout</a></li>
					 ';
				}
				elseif(isset($_SESSION["ID"]))
				{
					echo'
				
						<li><a href="Student_home.php">Student Home</a></li>
						<li><a href="student_change_pass.php">Settings</a></li>
						<li><a href="logout.php">Logout</a></li>
					';
				}
				elseif(isset($_SESSION["TID"]))
				{
					echo'
				
						<li><a href="lecturer_home.php">Lecturer Home</a></li>
						<li><a href="lecturer_change_pass.php">Settings</a></li>
						<li><a href="logout.php">Logout</a></li>
					';
				}
				elseif(isset($_SESSION["NAID"])) 
				{
					echo'
				
						<li><a href="staff_home.php">Staff Home</a></li>
						<li><a href="staff_change_pass.php">Settings</a></li>
						<li><a href="logout.php">Logout</a></li>
					';
				}
				else{
					echo'
					
						<li style="font-size:18px;"><a href="index.php">Admin</a></li>
						<li style="font-size:18px;"><a href="student_login.php">Student</a></li>
						<li style="font-size:18px;"><a href="lecturer_login.php">Lecturer</a></li>
						<li style="font-size:18px;"><a href="about_us.php">About Us</a></li>
					';
				}
			?>
				
			</ul>
		</div>
		