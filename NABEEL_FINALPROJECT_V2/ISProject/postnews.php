<?php
// Include config file
session_start();
require_once "mainconfig.php";


// Define variables and initialize with empty values
$title = $content = $publisher = $dateandtime = "";
$title_err = $content_err = $publisher_err = $dateandtime_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


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
        $sql = "INSERT INTO postednews (title,content,publisher,dateandtime,organizationid) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_title, $param_content,  $param_publisher,  $param_dateandtime, $user_id);

            // Set parameters
            $param_title = $title;
            $param_content = $content;
            $param_publisher = $publisher;
            $param_dateandtime = $dateandtime;
            $user_id = $_SESSION['user_id'];


            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: postednewshome.php");
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

<h1 class="heading mb-3">Post The Latest News</h1>

</div>
<div class="col-lg-6">
<figure class="illustration"></script><img src="images/xillustration.png.pagespeed.ic.qi0U5hTKMY.png" alt="Image" class="img-fluid">
</figure>
</div>
<div class="col-mb-4"></div>
</div>
</div>
</div>
<div class="container bg-light">
<div class="row align-items-center">
<div class="col-mb-3 mx-auto text-center text-lg-left">



    
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