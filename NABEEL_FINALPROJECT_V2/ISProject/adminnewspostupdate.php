<?php require_once "controllerAdminData.php"; ?>
<?php
// Include config file

require_once "mainconfig.php";

// Define variables and initialize with empty values
$title = $content = $publisher = $dateandtime = "";
$title_err = $content_err = $publisher_err = $dateandtime_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {




    //$id;
    if (isset($_GET['id'])) {
        $_SESSION['edit_id'] = $_GET['id'];
    }
    // Validate title
    $input_title = trim($_POST["title"]);
    if (empty($input_title)) {
        $title_err = "Please enter the title of the news.";
    } else {
        $title = $input_title;
    }


    // Validate content
    $input_content = trim($_POST["content"]);
    if (empty($input_content)) {
        $content_err = "Please enter the content of the news.";
    } else {
        $content = $input_content;
    }



    // Validate  publisher
    $input_publisher = trim($_POST["publisher"]);
    if (empty($input_publisher)) {
        $publisher_err = "Please enter the name of the publisher .";
    } else {
        $publisher = $input_publisher;
    }

    // Validate  dateandtime
    $input_dateandtime = trim($_POST["dateandtime"]);
    if (empty($input_dateandtime)) {
        $dateandtime_err = "Please enter the date and time of publication .";
    } else {
        $dateandtime = $input_dateandtime;
    }


    // Check input errors before inserting in database
    if (empty($title_err) && empty($content_err) && empty($publisher_err) && empty($dateandtime_err)) {
        // Prepare an insert statement

        $sql = "UPDATE postednews SET title=?,content=?,publisher=?,dateandtime=? WHERE id=?";

        //$sql = "INSERT INTO postednews (title,content,publisher,dateandtime,organizationid) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_title, $param_content,  $param_publisher,  $param_dateandtime,  $_SESSION['edit_id']);

            // Set parameters
            $param_title = $title;
            $param_content = $content;
            $param_publisher = $publisher;
            $param_dateandtime = $dateandtime;
            // $user_id = $_SESSION['user_id'];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: adminviewpostednews.php ");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }
    }
}
?>

<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
    $sql = "SELECT * FROM admintable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if ($status == "verified") {
            if ($code != 0) {
                header('Location: adminresetcode.php');
            }
        } else {
            header('Location: admin-otp.php');
        }
    }
} else {
    header('Location: adminlogin.php');
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome Page - The Funding Network</title>
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adminwelcome.php">

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
                <a class="nav-link" href="adminwelcome.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Admin Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Entities
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Applications</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="adminsignup.php">Register an Admin</a>
                        <a class="collapse-item" href="hosignup.php">View Applications</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Users</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Subscribed Users:</h6>
                        <a class="collapse-item" href="adminviewdonors.php">Donors</a>
                        <a class="collapse-item" href="vieworganization.php">Relief Organizations</a>
                        <a class="collapse-item" href="viewdispatch.php">Dispatch Units</a>

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
                <a class="nav-link" href="adminviewdonations.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>View Food Donations</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="adminviewreliefdonations.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>View Aid-Relief Donations</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="adminviewpostednews.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>View News Posted</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminviewdispatchstatus.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>View Dispatch-Center Status</span></a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> Admin <?php echo $fetch_info['name'] ?></span>
                                <img class="img-profile rounded-circle" src="images/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
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
                        <h1 class="h3 mb-0 text-gray-800">Welcome Admin <?php echo $fetch_info['name'] ?></h1>
                        
                    </div>

                    <div class="py-2">
        <h2 style="text-align: center;">Update Post of the news today</h3>

    </div>
    <div class="container">
        <div class="row">

            <div class="col-sm-4">

            </div>
            <div class="col-sm-4"></div>

        </div>
        <div class="row">

            <div class="col-sm-4">

            </div>

            <div class="col-sm-4">

                <div class="signup_form">
                    <form action="" enctype="multipart/form-data" method="POST">


                        <img src="Images/logo.png" alt="Funding Network" class="logo img-fluid">



                        <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                            <label>News Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
                            <span class="help-block"><?php echo $title_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($content_err)) ? 'has-error' : ''; ?>">
                            <label>Content</label>
                            <input type="textarea" name="content" class="form-control" value="<?php echo $content; ?>">
                            <span class="help-block"><?php echo $content_err; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($publisher_err)) ? 'has-error' : ''; ?>">
                            <label>Publisher</label>
                            <input type="text " name="publisher" class="form-control" value="<?php echo $publisher; ?>">
                            <span class="help-block"><?php echo $publisher_err; ?></span>
                        </div>




                        <div class="form-group <?php echo (!empty($dateandtime_err)) ? 'has-error' : ''; ?>">
                            <label>Date and Time</label>
                            <input type="datetime-local" name="dateandtime" class="form-control" value="<?php echo $dateandtime; ?>">
                            <span class="help-block"><?php echo $dateandtime_err; ?></span>
                        </div>



                        <div class="form-group">
                            <button type="submit" name="donate" value="Donate" class="btn btn-outline-success form_btn">Post News</button>

                        </div>


                        <br>
                        <br>

                    </form>


                </div>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
    </div>
    <div class="col-sm-4">
    </div>
    </div>
    <div class="col-sm-4">
    </div>
    </div>
    </div>
    <br>
    <br>  <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; @NabeelRafique 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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