
<?php
// Include config file

require_once "mainconfig.php";

session_start();
// Define variables and initialize with empty values
$foodname = $foodimage = $quantity = $foodlocation = $fooddescription = $foodstatus =  "";
$foodname_err = $foodimage_err = $quantity_err = $foodlocation_err = $fooddescription_err = $foodstatus_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


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
        $sql = "INSERT INTO fooddonation (foodname,foodimage,quantity,foodlocation, fooddescription,foodstatus,donorid) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_foodname, $param_foodimage, $param_quantity, $param_foodlocation,  $param_fooddescription,  $param_foodstatus, $user_id);

            // Set parameters
            $param_foodname = $foodname;
            $param_foodimage = $upload_path;
            $param_quantity = $quantity;
            $param_foodlocation = $foodlocation;
            $param_fooddescription = $fooddescription;
            $param_foodstatus = $foodstatus;
            $user_id = $_SESSION['user_id'];





            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: donordonationhome.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        // mysqli_close($stmt);
    }

    // Close connection
   // mysqli_close($con);
}

?>

<!Doctype html>
<html lang="en">
<head>
<title>The Funding Network</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="fonts,_icomoon,_style.css+css,_bootstrap.min.css+css,_jquery-ui.css+css,_owl.carousel.min.css+css,_owl.theme.default.min.css+css,_owl.theme.default.min.css+css,_jquery.fancybox.min.css+css,_bootstrap-dat.css" />
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


<div class="site-wrap">
<div class="site-mobile-menu site-navbar-target">
<div class="site-mobile-menu-header">
<div class="site-mobile-menu-close mt-3">
<span class="icon-close2 js-menu-toggle"></span>
</div>
</div>
<div class="site-mobile-menu-body"></div>
</div>

<?php include 'donormenu.php'; ?>

<div class="hero-v1">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 mr-auto text-center text-lg-left">

<h1 class="heading mb-3">Food Donation Portal</h1>

</div>
<div class="col-lg-6">
<figure class="illustration"></script><img src="images/xillustration.png.pagespeed.ic.qi0U5hTKMY.png" alt="Image" class="img-fluid" data-pagespeed-url-hash="4129439877" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
</figure>
</div>
<div class="col-mb-4"></div>
</div>
</div>
</div>



<div class="container bg-light">
<div class="row align-items-center">
<div class="col-mb-3 mx-auto text-center text-lg-left">




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
                            <button type="submit" name="donate" value="Donate" class="btn btn-outline-success form_btn">Donate</button>

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
    <br>
    <section>
        <footer>
            <p class="p-3 bg-dark text-white text-center">@NabeelRafique</p>
        </footer>
    </section>

</body>

<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/jquery.countdown.min.js'></script>
<script type='text/javascript' src='js/circle-progress.min.js'></script>
<script type='text/javascript' src='js/jquery.countTo.min.js'></script>
<script type='text/javascript' src='js/jquery.barfiller.js'></script>
<script type='text/javascript' src='js/custom.js'></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>


</html>