<?php
// Include config file
session_start();
require_once "mainconfig.php";


// Define variables and initialize with empty values
$itemname = $itemimage = $itemdescription = $location = $itemquantity = $itemstatus =  "";
$itemname_err = $itemimage_err = $itemdescription_err = $location_err = $itemquantity_err = $itemstatus_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Validate itemname
    $input_itemname = trim($_POST["itemname"]);
    if (empty($input_itemname)) {
        $itemname_err = "Please enter name of item being donated.";
    } else {
        $itemname = $input_itemname;
    }


    $input_image = null;
    if (isset($_FILES['itemimage'])) {
        // echo  "called";
        $input_image = $_FILES['itemimage'];
    } else {

        // echo "not called";
    }

    // Validate carimage

    if (empty($input_image)) {

        $itemimage_err = "Please enter the donation image.";
    } else {


        $imagename = pathinfo($input_image["name"], PATHINFO_FILENAME);
        $imageFileType = pathinfo($input_image["name"], PATHINFO_EXTENSION);
        $imagename = $imagename . "." . $imageFileType;
        $upload_path = "donationimages/" . $imagename;
        move_uploaded_file($input_image["tmp_name"], $upload_path);
    }



    // Validate itemdescription
    $input_itemdescription = trim($_POST["itemdescription"]);
    if (empty($input_itemdescription)) {
        $itemdescription_err = "Please enter the description of item .";
    } else {
        $itemdescription = $input_itemdescription;
    }

    // Validate  location
    $input_location = trim($_POST["location"]);
    if (empty($input_location)) {
        $location_err = "Please enter your location .";
    } else {
        $location = $input_location;
    }



    // Validate itemquantity
    $input_itemquantity = trim($_POST["itemquantity"]);
    if (empty($input_itemquantity)) {
        $itemquantity_err = "Please enter the item quantity.";
    } else {
        $itemquantity = $input_itemquantity;
    }



    // Validate  itemstatus
    $input_itemstatus = trim($_POST["itemstatus"]);
    if (empty($input_itemstatus)) {
        $itemstatus_err = "Please enter the item status  .";
    } else {
        $itemstatus = $input_itemstatus;
    }


    // Check input errors before inserting in database
    if (empty($itemname_err) && empty($itemimage_err) && empty($itemdescription_err) && empty($location_err) && empty($itemquantity_err) && empty($itemstatus_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO Aiddonations (itemname,itemimage, itemdescription,location,itemquantity,itemstatus,donorid) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_itemname, $param_itemimage, $param_itemdescription, $param_location, $param_itemquantity, $param_itemstatus, $user_id);

            // Set parameters
            $param_itemname = $itemname;
            $param_itemimage = $upload_path;
            $param_itemdescription = $itemdescription;
            $param_location = $location;
            $param_itemquantity = $itemquantity;
            $param_itemstatus = $itemstatus;
            $user_id = $_SESSION['user_id'];





            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: donorreliefdonationhome.php");
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

<h1 class="heading mb-3">Equipment Donation Portal</h1>

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



                        <div class="form-group <?php echo (!empty($itemname_err)) ? 'has-error' : ''; ?>">
                            <label>Relief Item Name</label>
                            <input type="text" name="itemname" class="form-control" value="<?php echo $itemname; ?>">
                            <span class="help-block"><?php echo $itemname_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($itemimage_err)) ? 'has-error' : ''; ?>">
                            <label>Relief Item Image</label>
                            <input type="file" name="itemimage" class="form-control" value="<?php echo $itemimage; ?>">
                            <span class="help-block"><?php echo $itemimage_err; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($itemdescription_err)) ? 'has-error' : ''; ?>">
                            <label>Relief Item description</label>
                            <input type="text" name="itemdescription" class="form-control" value="<?php echo $itemdescription; ?>">
                            <span class="help-block"><?php echo $itemdescription_err; ?></span>
                        </div>




                        <div class="form-group <?php echo (!empty($location_err)) ? 'has-error' : ''; ?>">
                            <label>Location</label>
                            <!--<input type="text" name="location" class="form-control" value="<?php echo $location; ?>">-->
                            <select class="form-control" name="location">

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
                            <span class="help-block"><?php echo $location_err; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($itemquantity_err)) ? 'has-error' : ''; ?>">
                            <label>Relief Item Quantity</label>
                            <input type="number " name="itemquantity" class="form-control" value="<?php echo $itemquantity; ?>">
                            <span class="help-block"><?php echo $itemquantity_err; ?></span>
                        </div>




                        <div class="form-group <?php echo (!empty($itemstatus_err)) ? 'has-error' : ''; ?>">
                            <label>Relief Item Status</label>
                            <!--<input type="text" name="itemstatus" class="form-control" value="<?php echo $itemstatus; ?>">-->
                            <select class="form-control" name="itemstatus">

                                <option option=""></option>
                                <option option="Brand New">Brand New</option>
                                <option option="Refurbished">Refurbished</option>


                            </select>
                            <span class="help-block"><?php echo $itemstatus_err; ?></span>
                        </div>

                        
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