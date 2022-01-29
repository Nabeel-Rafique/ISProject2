<?php require_once "controllerDonorData.php"; ?>

<?php
// Include config file

require_once "mainconfig.php";


// Define variables and initialize with empty values
$name = $dateandtime = $amount = $phonenumber = "";
$name_err = $dateandtime_err = $amount_err = $phonenumber_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Validate title
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter the title of the news.";
    } else {
        $name = $input_name;
    }

// Validate  dateandtime
$input_dateandtime = trim($_POST["dateandtime"]);
if (empty($input_dateandtime)) {
    $dateandtime_err = "Please enter the date and time of publication .";
} else {
    $dateandtime = $input_dateandtime;
}

    // Validate content
    $input_amount = trim($_POST["amount"]);
    if (empty($input_amount)) {
        $amount_err = "Please enter the content of the news.";
    } else {
        $amount = $input_amount;
    }



    // Validate  publisher
    $input_phonenumber = trim($_POST["phone-number"]);
    if (empty($input_phonenumber)) {
        $phonenumber_err = "Please enter the name of the publisher .";
    } else {
        $phonenumber = $input_phonenumber;
    }

    


    // Check input errors before inserting in database
    if (empty($name_err) && empty($dateandtime_err) && empty($amount_err) && empty($phonenumber_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO cashdonations (name,dateandtime,amount,phonenumber,donorid) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_name, $param_dateandtime, $param_amount,  $param_phonenumber, $user_id);

            // Set parameters
            $param_name = $name;
            $param_foodimage = $upload_path;
            $param_dateandtime = $input_dateandtime;
            $param_amount = $amount;
            $param_phonenumber = $phonenumber;
            $user_id = $_SESSION['user_id'];





            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: donatemoney.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        //mysqli_close($stmt);
    }

    // Close connection
    //mysqli_close($link);
}
?>

<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
  $sql = "SELECT * FROM donortable WHERE email = '$email'";
  $run_Sql = mysqli_query($con, $sql);
  if ($run_Sql) {
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $status = $fetch_info['status'];
    $code = $fetch_info['code'];
    if ($status == "verified") {
      if ($code != 0) {
        header('Location: donorresetcode.php');
      }
    } else {
      header('Location: donor-otp.php');
    }
  }
} else {
  header('Location: donorlogin.php');
}
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <title>Welcome Page - The Funding Network</title>
    <link rel="icon" href="Images/logo.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="donorwelcome.php">

                <nav class="sidebar-brand d-flex align-items-center justify-content-center ">

                    <img src="Images/logo.png" alt="Funding Network" class="logo img-fluid">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <br>
                        <br>
                    </button>
                </nav>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="donorwelcome.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Donor Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Actions
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Donate</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="donate.php">Donate Food</a>
                        <a class="collapse-item" href="donatemoney.php">Donate Cash</a>
                        <a class="collapse-item" href="donateequip.php">Donate Aid Items</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Overview
            </div>

            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="donorviewdonations.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>View My Food Donations</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="donorviewfooddonationstatus.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>View My Food Donations Status</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="donorviewreliefdonations.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>View My Aid Items Donations</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="donorviewreliefdonationstatus.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>View My Donated Aid Items Status</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> Donor <?php echo $fetch_info['name'] ?></span>
                                <img class="img-profile rounded-circle" src="images/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Welcome Donor <?php echo $fetch_info['name'] ?></h1>
                    </div>
					<?php

if (isset($_POST['submit'])) {

    $name = ($_POST["name"]);
    $input_dateandtime = ($_POST["dateandtime"]);
    $amount = $_POST['amount']; //Amount to transact 
    $phonenumber = $_POST['phone-number']; // Phone number paying

    $Account_no = 'The Funding Network'; // Enter account number optional
    $url = 'https://tinypesa.com/api/v1/express/initialize';

    $data = array(
        'amount' => $amount,
        'msisdn' => $phonenumber,
        'account_no' => $Account_no
    );


    $headers = array(
        'Content-Type: application/x-www-form-urlencoded',
        'ApiKey: Mvhn9uTLue1' // PLEASE CHECK THE TILL NUMBER THAT YOU ENTERED IN TINYPESA IF IS CORRECT
    );
    $info = http_build_query($data);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $resp = curl_exec($curl);
    $msg_resp = json_decode($resp);
    $sql = "INSERT INTO cashdonations (name,dateandtime,amount,phonenumber,donorid) VALUES (?, ?, ?, ?, ?)";

    if ($msg_resp->success == 'true') {
        
        

    if ($stmt = mysqli_prepare($con, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Records deleted successfully. Redirect to landing page
            header("location: adminviewreliefdonations.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
        echo "WAIT FOR  STK POP UP🔥";
       
    } else {
        echo "Transaction Failed";
    }
}



?>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="container mt-5 d-flex justify-content-center">
    

        <div class="card p-3">
        <h1 class="h3 mb-0 text-gray-800">Donate with M-Pesa</h1>
            <div class="d-flex flex-row align-items-center justify-content-between text-white">
                <div class="d-flex flex-row align-items-center"> <i class="fa fa-angle-left"></i> <span class="ml-2">Contactless Payment</span> </div>
                
            </div>
            <div class="mt-5 mb-5 d-flex align-items-center justify-content-center">
            <img src="Images/mpesa2.jpg" alt="Funding Network" class="logo img-fluid">
                       </div>

            <form action="#" method="POST">
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Donor Name</label>
                            <input type="text " name="name" class="form-control" value="<?php echo $name; ?>">
                            
                        </div>

                        <div class="form-group <?php echo (!empty($dateandtime_err)) ? 'has-error' : ''; ?>" required>
                            <label>Date and Time</label>
                            <input type="datetime-local" name="dateandtime" class="form-control" value="<?php echo $dateandtime; ?>" required>
                            
                        </div>
                <div class="form-group">
                    <label>Enter Amount</label>
                    <input type="number" name="amount" class="form-control" required>
                    <span class="help-block"></span>
                </div>

                <br>
                <div class="px-5">
                    <input class=" d-block custom2 form-control mt-3 bg-white " type="text" name="phone-number" placeholder="Phone number" required>
                </div>

                <div class="mt-5 align-items-center d-flex justify-content-center"><button class="btn btn-success  custom bg-lg" type="submit" name="submit">Lipa na Mpesa</button> </div>

        </div>
        </form>
    </div>
   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <a class="btn btn-secondary" href="adminlogout.php">Log Out<span class="sr-only">(current)</span></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>







