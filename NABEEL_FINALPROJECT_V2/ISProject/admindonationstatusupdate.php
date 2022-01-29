<?php require_once "controllerAdminData.php"; ?>
<?php
// Include config file
require_once "mainconfig.php";


// Define variables and initialize with empty values
$selecteddestination = $foodoritemdonated  = $dispatchdestination = "";
$selecteddestination_err = $foodoritemdonated_err  = $dispatchdestination_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {



    //$id;
    if (isset($_GET['id'])) {
        $_SESSION['edit_id'] = $_GET['id'];
    }




    // Validate selecteddestination
    $input_selecteddestination = trim($_POST["selecteddestination"]);
    if (empty($input_selecteddestination)) {
        $selecteddestination_err = "Please enter the status of item delivered to area stated.";
    } else {
        $selecteddestination = $input_selecteddestination;
    }



    // Validate  foodoritemdonated
    $input_foodoritemdonated = trim($_POST["foodoritemdonated"]);
    if (empty($input_foodoritemdonated)) {
        $foodoritemdonated_err = "Please enter the food or aid-item to be donated.";
    } else {
        $foodoritemdonated = $input_foodoritemdonated;
    }




    // Validate  dispatchdestination
    $input_dispatchdestination = trim($_POST["dispatchdestination"]);
    if (empty($input_dispatchdestination)) {
        $dispatchdestination_err = "Please enter the status of the item delivered to the dispatch center.";
    } else {
        $dispatchdestination = $input_dispatchdestination;
    }


    // Check input errors before inserting in database
    if (empty($selecteddestination_err) && empty($foodoritemdonated_err)  && empty($dispatchdestination_err)) {
        // Prepare an insert statement

        $sql = "UPDATE foodoritemdonationstatus SET selecteddestination=?,foodoritemdonated=?,dispatchdestination=?   WHERE id=?";

        //$sql = "INSERT INTO foodoritemdonationstatus (selecteddestination,foodoritemdonated,dispatchdestination,donorid) VALUES ( ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_selecteddestination, $param_foodoritemdonated, $param_dispatchdestination, $_SESSION['edit_id']);

            // Set parameters
            //$param_donorname = $_SESSION['username'];
            $param_selecteddestination = $selecteddestination;
            $param_foodoritemdonated = $foodoritemdonated;
            $param_dispatchdestination = $dispatchdestination;
            // $user_id = $_POST['donorid'];






            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: adminviewdispatchstatus.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
                echo  $_POST['donorid'];
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

<?php include 'adminmenu.php' ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Welcome Admin <?php echo $fetch_info['name'] ?></h1>
                        
                    </div>
                    <div class="py-2">
        <h2 style="text-align: center;">Update the status of donor donation Below</h3>

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


                        <!--<input type="text" id="donorid" name="donorid" style="display:none;" value="<?php echo $_GET['id']; ?>">-->

                        <div class="form-group <?php echo (!empty($selecteddestination_err)) ? 'has-error' : ''; ?>">
                            <label>Destination Status</label>
                            <!--<input type="text" name="selecteddestination" class="form-control" value="<?php echo $selecteddestination; ?>">-->
                            <select class="form-control" name="selecteddestination">

                                <option option=""></option>
                                <option option="Delivered on Time">Delivered on Time</option>
                                <option option="Pending Delivery">Pending Delivery</option>


                            </select>
                            <span class="help-block"><?php echo $selecteddestination_err; ?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($foodoritemdonated_err)) ? 'has-error' : ''; ?>">
                            <label>Food Or Item Donated</label>
                            <input type="text" name="foodoritemdonated" class="form-control" value="<?php echo $foodoritemdonated; ?>">
                            <span class="help-block"><?php echo $foodoritemdonated_err; ?></span>
                        </div>



                        <div class="form-group <?php echo (!empty($dispatchdestination_err)) ? 'has-error' : ''; ?>">
                            <label>Dispatch Status</label>
                            <!--<input type="text" name="dispatchdestination" class="form-control" value="<?php echo $dispatchdestination; ?>">-->
                            <select class="form-control" name="dispatchdestination">

                                <option option=""></option>
                                <option option="Delivered on Time">Delivered on Time</option>
                                <option option="Pending Delivery">Pending Delivery</option>


                            </select>
                            <span class="help-block"><?php echo $dispatchdestination_err; ?></span>
                        </div>


                        <div class="form-group">
                            <button type="submit" name="donate" value="Donate" class="btn btn-outline-success form_btn">Status</button>

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
    
                    
      <!-- Footer -->
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