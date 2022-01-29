<?php require_once "controllerAdminData.php"; ?>
<?php
// Include config file

require_once "mainconfig.php";


// Define variables and initialize with empty values
$foodname = $foodimage = $quantity = $foodlocation = $fooddescription = $foodstatus =  "";
$foodname_err = $foodimage_err = $quantity_err = $foodlocation_err = $fooddescription_err = $foodstatus_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$id;
    if (isset($_GET['id'])) {
        $_SESSION['edit_id'] = $_GET['id'];
    }
    // Validate itemname
    $input_foodname = trim($_POST["foodname"]);
    if (empty($input_foodname)) {
        $foodname_err = "Please enter name of food type being donated.";
    } else {
        $foodname = $input_foodname;
    }


    $input_image = null;
    if (isset($_FILES['foodimage'])) {
        // echo  "called";
        $input_image = $_FILES['foodimage'];
    } else {

        // echo "not called";
    }
    if (empty($input_image)) {

        $foodimage_err = "Please enter the actual food image.";
    } else {


        $imagename = pathinfo($input_image["name"], PATHINFO_FILENAME);
        $imageFileType = pathinfo($input_image["name"], PATHINFO_EXTENSION);
        $imagename = $imagename . "." . $imageFileType;
        $upload_path = "donationimages/" . $imagename;
        move_uploaded_file($input_image["tmp_name"], $upload_path);
    }

    // Validate quantity
    $input_foodquantity = trim($_POST["quantity"]);
    if (empty($input_foodquantity)) {
        $quantity_err = "Please enter the food unit quantity.";
    } else {
        $quantity = $input_foodquantity;
    }
    // Validate itemdescription
    $input_fooddescription = trim($_POST["fooddescription"]);
    if (empty($input_fooddescription)) {
        $fooddescription_err = "Please enter the description of food being donated .";
    } else {
        $fooddescription = $input_fooddescription;
    }

    // Validate  location
    $input_location = trim($_POST["foodlocation"]);
    if (empty($input_location)) {
        $foodlocation_err = "Please enter your location .";
    } else {
        $foodlocation = $input_location;
    }

    // Validate  status
    $input_foodstatus = trim($_POST["foodstatus"]);
    if (empty($input_foodstatus)) {
        $foodstatus_err = "Please enter the food status  .";
    } else {
        $foodstatus = $input_foodstatus;
    }


    // Check input errors before inserting in database
    if (empty($foodname_err) && empty($foodimage_err) && empty($fooddescription_err) && empty($foodlocation_err) && empty($quantity_err) && empty($foodstatus_err)) {
        // Prepare an insert statement
        $sql = "UPDATE fooddonation SET foodname=?,foodimage=?,quantity=?,foodlocation=?,fooddescription=?,foodstatus=?   WHERE id=?";

        // $sql = "INSERT INTO fooddonation (foodname,foodimage,quantity,foodlocation, fooddescription,foodstatus,donorid) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_foodname, $param_foodimage, $param_quantity, $param_foodlocation,  $param_fooddescription,  $param_foodstatus, $_SESSION['edit_id']);

            // Set parameters
            $param_foodname = $foodname;
            $param_foodimage = $upload_path;
            $param_quantity = $quantity;
            $param_foodlocation = $foodlocation;
            $param_fooddescription = $fooddescription;
            $param_foodstatus = $foodstatus;
            


            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: adminviewdonations.php");
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
        <h2 style="text-align: center;">Update The Details of the Foods Donated By Donors Below</h3>

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



                        <div class="form-group <?php echo (!empty($foodname_err)) ? 'has-error' : ''; ?>">
                            <label>Food Name</label>
                            <input type="text" name="foodname" class="form-control" value="<?php echo $foodname; ?>">
                            <span class="help-block"><?php echo $foodname_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($foodimage_err)) ? 'has-error' : ''; ?>">
                            <label>Food Image</label>
                            <input type="file" name="foodimage" class="form-control" value="<?php echo $foodimage; ?>">
                            <span class="help-block"><?php echo $foodimage_err; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($quantity_err)) ? 'has-error' : ''; ?>">
                            <label>Food Quantity</label>
                            <input type="number " name="quantity" class="form-control" value="<?php echo $quantity; ?>">
                            <span class="help-block"><?php echo $quantity_err; ?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($foodlocation_err)) ? 'has-error' : ''; ?>">
                            <label>Food Location</label>
                            <!--<input type="text" name="foodlocation" class="form-control" value="<?php echo $foodlocation; ?>">-->
                            <select class="form-control" name="foodlocation">

                                <option option=""></option>
                                <option value="baringo">Baringo</option>
                                <option value="bomet">Bomet</option>
                                <option value="bungoma">Bungoma</option>
                                <option value="busia">Busia</option>
                                <option value="elgeyo marakwet">Elgeyo Marakwet</option>
                                <option value="embu">Embu</option>
                                <option value="garissa">Garissa</option>
                                <option value="homa bay">Homa Bay</option>
                                <option value="isiolo">Isiolo</option>
                                <option value="kajiado">Kajiado</option>
                                <option value="kakamega">Kakamega</option>
                                <option value="kericho">Kericho</option>
                                <option value="kiambu">Kiambu</option>
                                <option value="kilifi">Kilifi</option>
                                <option value="kirinyaga">Kirinyaga</option>
                                <option value="kisii">Kisii</option>
                                <option value="kisumu">Kisumu</option>
                                <option value="kitui">Kitui</option>
                                <option value="kwale">Kwale</option>
                                <option value="laikipia">Laikipia</option>
                                <option value="lamu">Lamu</option>
                                <option value="machakos">Machakos</option>
                                <option value="makueni">Makueni</option>
                                <option value="mandera">Mandera</option>
                                <option value="meru">Meru</option>
                                <option value="migori">Migori</option>
                                <option value="marsabit">Marsabit</option>
                                <option value="mombasa">Mombasa</option>
                                <option value="muranga">Muranga</option>
                                <option value="nairobi">Nairobi</option>
                                <option value="nakuru">Nakuru</option>
                                <option value="nandi">Nandi</option>
                                <option value="narok">Narok</option>
                                <option value="nyamira">Nyamira</option>
                                <option value="nyandarua">Nyandarua</option>
                                <option value="nyeri">Nyeri</option>
                                <option value="samburu">Samburu</option>
                                <option value="siaya">Siaya</option>
                                <option value="taita taveta">Taita Taveta</option>
                                <option value="tana river">Tana River</option>
                                <option value="tharaka nithi">Tharaka Nithi</option>
                                <option value="trans nzoia">Trans Nzoia</option>
                                <option value="turkana">Turkana</option>
                                <option value="uasin gishu">Uasin Gishu</option>
                                <option value="vihiga">Vihiga</option>
                                <option value="wajir">Wajir</option>
                                <option value="pokot">West Pokot</option>


                            </select>
                            <span class="help-block"><?php echo $foodlocation_err; ?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($fooddescription_err)) ? 'has-error' : ''; ?>">
                            <label>Food description</label>
                            <input type="text" name="fooddescription" class="form-control" value="<?php echo $fooddescription; ?>">
                            <span class="help-block"><?php echo $fooddescription_err; ?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($foodstatus_err)) ? 'has-error' : ''; ?>">
                            <label>Food Status</label>
                            <!--<input type="text" name="foodstatus" class="form-control" value="<?php echo $foodstatus; ?>">-->
                            <select class="form-control" name="foodstatus">

                                <option option=""></option>
                                <option option="Processed">Processed</option>
                                <option option="Dry">Dry</option>
                                <option option="Perishable">Perishable</option>


                            </select>
                            <span class="help-block"><?php echo $foodstatus_err; ?></span>
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

