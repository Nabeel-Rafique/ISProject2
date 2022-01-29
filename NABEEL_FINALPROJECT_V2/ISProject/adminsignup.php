

<?php require_once "controllerAdminData.php"; ?>
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

                    <div class="py-3">
        <h3 style="font-size: 30px; text-align: center;">Register New Admin</a></h3>

    </div>
    <div class="container">
        <div class="row">
        </div>
        <div class="row">

            <div class="col-sm-4">

            </div>

            <div class="col-sm-4">

                <div class="signup_form">
                    <form action="adminsignup.php" method="POST">


                        <img src="Images/logo.png" alt="Funding Network" class="logo img-fluid">

                        <?php
                        if (count($errors) == 1) {
                        ?>
                            <div class="mb-4 appointment-head">
                                <?php
                                foreach ($errors as $showerror) {
                                    echo $showerror;
                                }
                                ?>
                            </div>
                        <?php
                        } elseif (count($errors) > 1) {
                        ?>
                            <div class="mb-4 appointment-head">
                                <?php
                                foreach ($errors as $showerror) {
                                ?>
                                    <li><?php echo $showerror; ?></li>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>

                        <div class="form-group">

                            <label class="label_txt">Full Names</label>
                            <input class="form-control" type="text" name="name" placeholder="Full Name" required value="<?php echo $name ?>">

                        </div>

                        <div class="form-group">
                            <label class="label_txt">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">

                        </div>
                        <div class="form-group">
                            <label class="label_txt">Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label class="label_txt">Confirm Password</label>
                            <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                        </div>
                        <button type="submit" name="signup" value="Sign Up" class="btn btn-outline-success form_btn">Register</button>

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
    <br>
    <br>

                   

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





















