<?php
session_start();
if (!isset($_SESSION["AID"])) {
    // Redirect or handle access denied
    // echo "<script>window.open('index.php?mes=Access Denied..','_self');</script>";
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

                <div class="container-fluid" style="color: black;">
                
                <h5 class="text my-3" style="color: black;font-size: 25px;">Welcome <?php echo $_SESSION["ANAME"]; ?></h5>
                <h3 style="color: black; text-align: center; font-weight: bold;">University Information</h3><br>


                <table width="100%">
                    <tbody>
                    <tr>
                    <td width="50%" style="text-align:left;">
                        <center><img src="img/raja.png" class="imgs" style="width:200px;"></center>
                    </td>
                    <td style="text-align:left;">
                        <p class="mt-3 para" style="font-size: 18px;">
                        Rajarata University of Sri Lanka , located in the historic city of Mihintale, which is situated 14 kilometres away from the east of Anuradhapura, was established on 31st  of January, 1996. It envisages to highlight the city, Mihintale, which marks the inception of the Sri Lankan social development, as one of the most prominent centre of the present academic arena in the Sri Lankan history. Through this, it is expected to produce virtuous, intellectual and competent citizens for the needs of the 21st century.
                        </p>
                    </td>
                    </tr>
                    </tbody>
                </table><br>
                

                    

                    <p class="para">
                    Sirimavo Bandaranayake, then Prime Minister, Hon. Speaker K.B. Rathnayake,
                            Minister of Higher Education Richard Pathirana, Deputy Minister of Higher Education Wishwa Warnapala,
                            Governor NCP Maithripala Senanayake, Chairman UGC Prof. S. Thilakaratne,
                            The first Vice Chancellor of RUSL Prof. W.I. Siriweera graced the inaugural ceremony Dr. Jayantha Kelegama
                            was the first chancellor of RUSL. It is quite
                            significant that the RUSL was established in Mihintale, a sacred land a few kilometers away from the Historical Kingdom of Anuradhapura.
                    </p>

                    <p class="para">
                    It is not an exaggeration to introduce Mihintale as the cradle of Buddhism,
                        15 km to the East of the Ancient Kingdom, Anuradhapura, a land gifted with ancient architecture and
                        irrigation which paved the way through Buddhism for an admirable lifestyle and scholars of the Rajarata University of Sri Lanka are fortunate to receive education in this seat of learning.
                    </p>

                </div>
                <!-- /.container-fluid -->

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
