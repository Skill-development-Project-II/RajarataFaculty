<?php
session_start();
include "database.php";

if (!isset($_SESSION["NAME"])) {
    echo "<script>window.open('student_login.php?mes=Access Denied...','_self');</script>";
}

$sql = "SELECT * FROM student WHERE ID={$_SESSION["ID"]}";
$res = $db->query($sql);

if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
}

date_default_timezone_set('Asia/Colombo');
$date = date("Y-m-d");

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
            padding: 18px;
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
                                    <h3 style="color: black;">Update Profile</h3><br>
                                    <div class="lbox1">
                                        <?php
                                        if (isset($_POST["submit"])) {
                                            $target = "student/";
                                            $target_file = $target . basename($_FILES["SIMG"]["name"]);

                                            if ($_FILES["SIMG"]["size"] > 0) {
                                                if (move_uploaded_file($_FILES['SIMG']['tmp_name'], $target_file)) {
                                                    $sql = "UPDATE student SET PHO='{$_POST["PHO"]}', MAIL='{$_POST["MAIL"]}', ADDR='{$_POST["ADDR"]}', SIMG='{$target_file}' WHERE ID={$_SESSION["ID"]}";
                                                    $db->query($sql);
                                                    echo "<script>window.open('student_home.php?image', '_self');</script>";
                                                }
                                            } else {
                                                $sql = "UPDATE student SET PHO='{$_POST["PHO"]}', MAIL='{$_POST["MAIL"]}', ADDR='{$_POST["ADDR"]}' WHERE ID={$_SESSION["ID"]}";
                                                $db->query($sql);
                                                echo "<script>window.open('student_home.php?success', '_self');</script>";
                                            }
                                        }
                                        ?>

                                        <form enctype="multipart/form-data" role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                            <label style="color: black;">Phone No</label><br>
                                            <input type="text" maxlength="10" required class="input3" name="PHO" value="<?php echo $row["PHO"] ?>"><br><br>
                                            <label style="color: black;">E - mail</label><br>
                                            <input type="email" class="input3" required name="MAIL" value="<?php echo $row["MAIL"] ?>"><br><br>
                                            <label style="color: black;">Address</label><br>
                                            <textarea rows="5" name="ADDR"><?php echo $row["ADDR"] ?></textarea><br>
                                            <label style="color: black;">Image</label><br>
                                            <input type="file" class="input3" name="SIMG"><br><br>
                                            <button type="submit" class="btn" style="background-color: blue; color: white;" name="submit">Update Profile Details</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align:left;">
                                <div class="column" style="width:50%;">
                                    <div class="rbox1">
                                        <h3 style="color: black;">Profile</h3><br>
                                        <table border="1px" style="width:100%;">
                                            <tr><td colspan="2"><img src="<?php echo $row["SIMG"] ?>" height="100" width="100" alt="upload Pending"></td></tr>
                                            <tr><th>Name </th> <td><?php echo $row["NAME"] ?></td></tr>
                                            <tr><th>Phone No </th> <td><?php echo $row["PHO"] ?></td></tr>
                                            <tr><th>E - mail </th> <td><?php echo $row["MAIL"] ?></td></tr>
                                            <tr><th>Address </th> <td><?php echo $row["ADDR"] ?></td></tr>
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
