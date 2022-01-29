<?php require_once "controllerDispatchData.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
    $sql = "SELECT * FROM dispatchtable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if ($status == "verified") {
            if ($code != 0) {
                header('Location: dispatchresetcode.php');
            }
        } else {
            header('Location: dispatch-otp.php');
        }
    }
} else {
    header('Location: dispatchlogin.php');
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

<?php include 'dispatchmenu.php' ?>

<div class="hero-v1">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 mr-auto text-center text-lg-left">

<h2 style="font-size: 50px; text-align: center;">Welcome Dispatch Unit <?php echo $fetch_info['name'] ?></h2>

</div>

<div class="col-mb-4"></div>
</div>
</div>
</div>
<div class="container bg-light">
<div class="row align-items-center">
<div class="col-mb-3 mx-auto text-center text-lg-left">



            <div class="col-sm-4">
                <div class="signup_form">
                    <form action="Dispatch.php" method="POST">
                        <img src="Images/logo.png" alt="Funding Network" class="logo img-fluid">
                        <br>

                        <a href="viewdonorfooddonations.php" class="btn btn-primary" style="display: inline-block;">View Food Donated</a>
                        <br>
                        <br>
                        <a href="viewdonoraiditemdonations.php" class="btn btn-primary" style="display: inline-block;">View Aid-Items Donated</a>


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


    <section>
        <footer>
            <p class="p-3 bg-dark text-white text-center">@NabeelRafique</p>
        </footer>
    </section>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>


</html>