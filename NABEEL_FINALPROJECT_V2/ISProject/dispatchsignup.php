<?php require_once "controllerDispatchData.php"; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign Up - The Funding Network</title>
    <meta charset="utf-8">
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

<h1 class="heading mb-3">Sign Up As A Dispatch Unit</h1>

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
                    <form action="dispatchsignup.php" method="POST">


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

                        <label class="label_txt">Unit Name</label>
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
                        
                        <button type="submit" name="signup" value="Sign Up" class="btn btn-primary">Sign Up</button>

                        <br>
                       <br>
                        <div class="link login-link text-center">Already have an Account?<a href="dispatchlogin.php">  Login here</a></div>
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


    <?php include 'footer.php'; ?>
    <script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js+popper.min.js.pagespeed.jc.acXMFdRqXJ.js"></script><script>eval(mod_pagespeed_aFAchZtUsU);</script>
<script>eval(mod_pagespeed_ZOlM0Hbpgf);</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js+jquery.countdown.min.js+jquery.easing.1.3.js+aos.js.pagespeed.jc.TI7JXj-sqZ.js"></script><script>eval(mod_pagespeed_GkjDTgElXa);</script>
<script>eval(mod_pagespeed_EmRUzT82LI);</script>
<script>eval(mod_pagespeed_MPWlnU3298);</script>
<script>eval(mod_pagespeed_3UPz6kHU$m);</script>
<script src="js/jquery.fancybox.min.js+jquery.sticky.js.pagespeed.jc.CR6JanjFCT.js"></script><script>eval(mod_pagespeed_L0vGjcfl4Y);</script>
<script>eval(mod_pagespeed_mrXAoyqryH);</script>
<script src="js/isotope.pkgd.min.js+main.js.pagespeed.jc.6sHy-LxsA5.js"></script><script>eval(mod_pagespeed_IOLpstlzdC);</script>
<script>eval(mod_pagespeed_dRNAz0sfPP);</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"6cdd5265f82b60bb","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}' crossorigin="anonymous"></script>
</body>
</html>