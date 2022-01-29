<?php require_once "controllerAdminData.php"; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Login - The Funding Network</title>
    <link rel="icon" href="Images/logo.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@1000&display=swap" rel="stylesheet">
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

<h1 class="heading mb-3">Admin Login</h1>

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


                <div class="signup_form">
                    <form action="adminlogin.php" method="POST">
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
                            <img src="Images/logo.png" alt="Funding Network" class="logo img-fluid"><br>

                            <label class="label_txt">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">

                        </div>
                        <div class="form-group">
                            <label class="label_txt">Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </div>

                        <button type="submit" name="login" value="Login" class="btn btn-primary">Login</button>

                        <br>

                        <div class="link forget-pass text-center"> Forgot password?<a href="adminforgotpassword.php"> <br>Click here</a></div>




                        <br>

                        <div class="link login-link text-center">Not yet a member? Contact Administration</a></div>
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