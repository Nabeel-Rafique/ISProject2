<?php require_once "controllerAdminData.php"; ?>
<?php
include('simple_html_dom.php'); 

$websiteURL = "https://www.worldometers.info/coronavirus/";
$html = file_get_html($websiteURL);


$websiteURL2 = "https://www.worldometers.info/coronavirus/country/kenya/";
$html1 = file_get_html($websiteURL2);

?>




<!doctype html>
<html lang="en">
<head>
<title>The Funding Network</title>
<link rel="icon" href="Images/logo.png" type="image/x-icon">
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
<div class="row align-items-center justify-content-center">
<div class="col-lg-6 text-center mx-auto">
<span class="d-block subheading">Updates</span>
<h1 class="heading mb-3">Blog Posts</h1>
<p class="mb-5">Do you have questions about COVID-19? Learn healthy tips, get expert advice or read stories about COVID-19 on the Banner Health blog</p>
</div>
</div>
</div>
</div>


<div class="site-section stats">
<div class="container">
<div class="row mb-3">
<div class="col-lg-7 text-center mx-auto">
<h2 class="section-heading">Coronavirus Statistics</h2>
<p>Kenya Coronavirus update with statistics and graphs: total new cases, mortality and  recoveries</p>
</div>
</div>
<div class="row">
<div class="col-lg-4">
<div class="data">
<span class="icon text-primary">
<span class="flaticon-virus"></span>
</span>
<h2 style="font-size: 50px; text-align: center;"><?php echo $html->find('#maincounter-wrap span',0)->plaintext; ?></h2>


<span class="label">Total Cases</span>
</div>
</div>
<div class="col-lg-4">
<div class="data">
<span class="icon text-primary">
<span class="flaticon-virus"></span>
</span>
<h2 style="font-size: 50px; text-align: center;"><?php echo $html->find('#maincounter-wrap span',1)->plaintext; ?></h2>
<span class="label">Deaths</span>
</div>
</div>
<div class="col-lg-4">
<div class="data">
<span class="icon text-primary">
<span class="flaticon-virus"></span>
</span>
<h2 style="font-size: 50px; text-align: center;"><?php echo $html->find('#maincounter-wrap span',2)->plaintext; ?></h2>
<span class="label">Recovered Cases</span>
</div>
</div>
</div>
</div>
</div>


<div class="site-section stats">
<div class="container">
<div class="row mb-3">
<div class="col-lg-7 text-center mx-auto">
<h2 class="section-heading">Kenya Coronavirus Statistics</h2>
<p>Kenya Coronavirus update with statistics and graphs: total new cases, mortality and  recoveries</p>
</div>
</div>
<div class="row">
<div class="col-lg-4">
<div class="data">
<span class="icon text-primary">
<span class="flaticon-virus"></span>
</span>
<h2 style="font-size: 50px; text-align: center;"><?php echo $html1->find('#maincounter-wrap span',0)->plaintext; ?></h2>


<span class="label">Total Cases</span>
</div>
</div>
<div class="col-lg-4">
<div class="data">
<span class="icon text-primary">
<span class="flaticon-virus"></span>
</span>
<h2 style="font-size: 50px; text-align: center;"><?php echo $html1->find('#maincounter-wrap span',1)->plaintext; ?></h2>
<span class="label">Deaths</span>
</div>
</div>
<div class="col-lg-4">
<div class="data">
<span class="icon text-primary">
<span class="flaticon-virus"></span>
</span>
<h2 style="font-size: 50px; text-align: center;"><?php echo $html1->find('#maincounter-wrap span',2)->plaintext; ?></h2>
<span class="label">Recovered Cases</span>
</div>
</div>
</div>
</div>
</div>


<div class="site-section">
<div class="container">
<div class="row mb-5">
<div class="col-lg-7 mx-auto text-center">
<h2 class="mb-4 section-heading">Latest News &amp; Articles</h2>
</div>
</div>
<?php
                                    // Include config file
                                    require_once "mainconfig.php";

                                    //$userId = $_SESSION['user_id'];


                                    // Attempt select query execution
                                    $sql = "SELECT * FROM postednews ";
                                    if ($result = mysqli_query($con, $sql)) {
                                        if (mysqli_num_rows($result) > 0) {
                                            // echo "<table class='table-responsive table-responsive-data2'>";
                                            echo "<div class='table-responsive table-responsive-data2'>";
                                            echo "<table class='table table-data2'>";
                                            // echo "<table class='tr-shadow'>";
                                            // echo "<table class='table-data-feature'>";
                                            echo "<thead>";
                                            echo "<tr>";
                                            echo "<th>No</th>";
                                            echo "<th>Title</th>";
                                            echo "<th>Content</th>";
                                            echo "<th>Publisher</th>";
                                            echo "<th>Date and Time</th>";
                                            
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";

                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . " <span class='block-email'>" . $row['id'] . "</span></td>";
                                                echo "<td>" . $row['title'] . "</td>";
                                                echo "<td>" . $row['content'] . "</td>";
                                                echo "<td>" . $row['publisher'] . "</td>";
                                                echo "<td>" . $row['dateandtime'] . "</td>";

                                                echo "<td>";
                                                echo "<div class='table-data-feature'>";
                                               


                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                            echo "</tbody>";
                                            echo "</table>";
                                            // Free result set
                                            mysqli_free_result($result);
                                        } else {
                                            echo "<p class='lead'><em>No records were found.</em></p>";
                                        }
                                    } else {
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                                    }


                                   
                                  
                                    $content = ($_SESSION["content"]);
                                    $string=strip_tags($content);
                                    if(strlen($string) > 200):
                                    $strinCut=substr($string,0,200);
                                    $endPoint=strrpos($stringCut,' 0');
                                    $string=$endPoint?substr($stringCut,0,$endPoint):substr($stringCut,0);
                                    $string.='...<a href = "postednewshome.php">Read More</a>';
                                endif;
                                echo $string;
 // Close connection
                                mysqli_close($con);

                                    ?>
                                    

</div>
</div>
<div class="row">
<div class="col-lg-12 text-center">
<div class="custom-pagination">
<a href="blog.html#">1</a>
<a href="blog.html#" class="active">2</a>
<a href="blog.html#">3</a>
<a href="blog.html#">4</a>
</div>
</div>
</div>
</div>
</div>

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
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"6cdd52645e0760bb","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}' crossorigin="anonymous"></script>
</body>
</html>