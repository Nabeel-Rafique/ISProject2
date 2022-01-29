<?php require_once "controllerAdminData.php"; ?>
<?php
// Include config file

require_once "mainconfig.php";


// Define variables and initialize with empty values
$name = $l_name = $email = $foodlocation = $status = "";
$name_err = $l_name_err = $email_err = $status_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$id;
    if (isset($_GET['id'])) {
        $_SESSION['edit_id'] = $_GET['id'];
    }
    // Validate itemname
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $foodname_err = "Please enter name of food type being donated.";
    } else {
        $name = $input_name;
    }
    $input_l_name = trim($_POST["l_name"]);
    if (empty($input_l_name)) {
        $l_name_err = "Please enter Last Name.";
    } else {
        $l_name = $input_l_name;
    }

    
    // Validate quantity
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter the email.";
    } else {
        $email = $input_email;
    }
    

    // Validate  status
    $input_status = trim($_POST["status"]);
    if (empty($input_status)) {
        $status_err = "Please enter the status  .";
    } else {
        $status = $input_status;
    }


    // Check input errors before inserting in database
    if (empty($name_err) && empty($l_name_err) && empty($email_err) && empty($status_err)) {
        // Prepare an insert statement
        $sql = "UPDATE donortable SET name=?,l_name=?,email=?,status=? WHERE id=?";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_name, $param_l_name, $param_email,$param_status, $_SESSION['edit_id']);

            // Set parameters
            $param_name = $name;
            $param_l_name = $l_name;
            $param_email = $email;
           $param_status = $status;
            


            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: adminviewdonors.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }
    }

  
}?>

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
        <h2 style="text-align: center;">Update The Details of the Donor Below</h3>

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



                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Donor Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err; ?></span>
                        </div>
                            <div class="form-group <?php echo (!empty($l_name_err)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <input type="number " name="l_name" class="form-control" value="<?php echo $l_name; ?>">
                            <span class="help-block"><?php echo $l_name_err; ?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($status_err)) ? 'has-error' : ''; ?>">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control" value="<?php echo $status; ?>">
                            <span class="help-block"><?php echo $status_err; ?></span>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="donate" value="Donate" class="btn btn-outline-success form_btn">Update</button>

                        </div>


                        <br>
                        <br>

                    </form>


                </div>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    
</div>   <!-- Footer -->
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

