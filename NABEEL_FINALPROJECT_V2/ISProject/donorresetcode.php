<?php require_once "controllerDonorData.php"; ?>

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

<?php include 'menu2.php'; ?>

<div class="hero-v1">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 mr-auto text-center text-lg-left">

<h1 class="heading mb-3">Donor Reset Code</h1>

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
                    <form action="donorresetcode.php" method="POST">

                        <img src="Images/logo.png" alt="Funding Network" class="logo img-fluid">
                        <?php
                        if (isset($_SESSION['info'])) {
                        ?>
                            <div class="mb-4 appointment-head" style="padding: 0.4rem 0.4rem">
                                <?php echo $_SESSION['info']; ?>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if (count($errors) > 0) {
                        ?>
                            <div class="mb-4 appointment-head">
                                <?php
                                foreach ($errors as $showerror) {
                                    echo $showerror;
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="form-group">

                            <input class="form-control" type="number" name="otp" placeholder="Verification Code" required>

                        </div>

                        <button type="submit" name="check-reset-otp" value="Submit" class="btn btn-primary">Login Now</button>


<br>
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