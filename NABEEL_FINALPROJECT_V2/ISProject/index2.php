<?php
include('simple_html_dom.php'); 

$websiteURL = "https://www.worldometers.info/coronavirus/";
$websiteURL2 = "https://www.worldometers.info/coronavirus/country/kenya/";
$html = file_get_html($websiteURL);
$html1 = file_get_html($websiteURL2);
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

<?php include 'menu2.php'; ?>



<div class="hero-v1">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 mr-auto text-center text-lg-left">
<span class="d-block subheading">Covid-19 Awareness</span>
<h1 class="heading mb-3">Stay Safe. Stay Home.</h1>
<p class="mb-5">One of the best ways to avoid contract with COVID-19 and passing it on to others, is to self isolate and stay at home. Whilst at home, it is important to maintain routine and keep healthy. </p>
<p class="mb-4"><a href="prevention.php" class="btn btn-primary">How to prevent</a></p>
</div>
<div class="col-lg-6">
<figure class="illustration">
<img src="images/xillustration.png.pagespeed.ic.qi0U5hTKMY.png" alt="Image" class="img-fluid" data-pagespeed-url-hash="4129439877" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
</figure>
</div>
<div class="col-lg-6"></div>
</div>
</div>
</div>
<div class="site-section">
<div class="container">
<div class="row">

<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Images/info7.jpg" alt="Fight" width="1100" height="500">
      <div class="col-lg-7 text-center mx-auto">
<h class="section-heading">Always Stay Updated</h2>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="Images/pandemic.jpg" alt="Pandemic" width="1100" height="500">
      <div class="col-lg-7 text-center mx-auto">
<h2 class="section-heading">Help Fight the Pandemic</h2>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="Images/donate1.jpg" alt="Donate" width="1100" height="500">
      <div class="col-lg-7 text-center mx-auto">
<h2 class="section-heading">We Build as a Community</h2>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
</div>
</div>

<div class="site-section stats">
<div class="container">
<div class="row mb-3">
<div class="col-lg-7 text-center mx-auto">
<h2 class="section-heading">Coronavirus Statistics</h2>
<p>World Coronavirus update with statistics and graphs: total new cases, mortality and  recoveries</p>
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
<div class="row">
<div class="col-lg-6 mb-4 mb-lg-0">
<figure class="img-play-vid">
<img src="images/xhero_1.jpg.pagespeed.ic.9jJB__s3M_.jpg" alt="Image" class="img-fluid" data-pagespeed-url-hash="692369217" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
<div class="absolute-block d-flex">
<span class="text">Watch the Video</span>
<a href="https://www.youtube.com/watch?v=i0ZabxXmH4Y" data-fancybox class="btn-play">
<span class="icon-play"></span>
</a>
</div>
</figure>
</div>


<div class="col-lg-5 ml-auto">
<h2 class="mb-4 section-heading">What is Coronavirus?</h2>
<p>The coronavirus disease 2019 (COVID-19) is a communicable respiratory disease caused by a new strain of coronavirus that causes illness in humans.</p>
<p><a href="symptoms.php" class="btn btn-primary">Learn more</a></p>
</div>
</div>
</div>
</div>
<div class="container pb-5">
<div class="row">
<div class="col-lg-3">
<div class="feature-v1 d-flex align-items-center">
<div class="icon-wrap mr-3">
<span class="flaticon-protection"></span>
</div>
<div>
<h3>Protection</h3>
</div>
</div>
</div>
<div class="col-lg-3">
<div class="feature-v1 d-flex align-items-center">
<div class="icon-wrap mr-3">
<span class="flaticon-patient"></span>
</div>
<div>
<h3>Prevention</h3>
</div>
</div>
</div>
<div class="col-lg-3">
<div class="feature-v1 d-flex align-items-center">
<div class="icon-wrap mr-3">
<span class="flaticon-hand-sanitizer"></span>
</div>
<div>
<h3>Treatments</h3>
</div>
</div>
</div>
<div class="col-lg-3">
<div class="feature-v1 d-flex align-items-center">
<div class="icon-wrap mr-3">
<span class="flaticon-virus"></span>
</div>
<div>
<h3>Symptoms</h3>
</div>
</div>
</div>
</div>
</div>
<div class="site-section bg-primary-light">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6">
<div class="row">
<div class="col-6 col-lg-6 mt-lg-5">
<div class="media-v1 bg-1">
<div class="icon-wrap">
<span class="flaticon-stay-at-home"></span>
</div>
<div class="body">
<h3>Stay at home</h3>
<p>If you have mild symptoms. Do not go to school, to work, or to other public places until you are completely free of all symptoms.</p>
</div>
</div>
<div class="media-v1 bg-1">
<div class="icon-wrap">
<span class="flaticon-patient"></span>
</div>
<div class="body">
<h3>Wear facemask</h3>
<p>Wearing a face mask CORRECTLY, in addition to good hand hygiene practices and physical distancing can help prevent the spread of COVID-19 to others.</p>
</div>
</div>
</div>
<div class="col-6 col-lg-6">
<div class="media-v1 bg-1">
<div class="icon-wrap">
<span class="flaticon-social-distancing"></span>
</div>
<div class="body">
<h3>Keep social distancing</h3>
<p>Be a hero and break the chain of COVID-19 transmission by practicing physical distancing.
This means we keep a distance of at least 1m from each other and avoid spending time in crowded places or in groups.</p>
</div>
</div>
<div class="media-v1 bg-1">
<div class="icon-wrap">
<span class="flaticon-hand-washing"></span>
</div>
<div class="body">
<h3>Wash your hands</h3>
<p>Wash your hands regularly with
soap and water or alcohol-based
hand rub.</p>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-5 ml-auto">
<h2 class="section-heading mb-4">How to Prevent Coronavirus?</h2>
<p>Protect yourself and others around you by knowing the facts and taking appropriate precautions. Follow advice provided by your local health authority.
Check with your local health authority for the most relevant guidance for your region.
To prevent the spread of COVID-19:
</p>

<ul>
<li>Wear a mask in public, especially indoors or when physical distancing is not possible.</li>
<li>Choose open, well-ventilated spaces over closed ones. Open a window if indoors.</li>
<li>Get vaccinated when it is your turn. Follow local guidance about vaccination.</li>
<li>Cover your nose and mouth with your bent elbow or a tissue when you cough or sneeze.</li>
</ul>
<p><a href="prevention.php" class="btn btn-primary">Read more about prevention</a></p>
</div>
</div>
</div>
</div>
<div class="site-section">
<div class="container">
<div class="row mb-5">
<div class="col-lg-7 mx-auto text-center">
<span class="subheading">What you need to do</span>
<h2 class="mb-4 section-heading">How To Protect Yourself</h2>
<p>The most important way you can protect yourself from the virus, as well as others, is to get the COVID-19 vaccine and a booster shot.</p>
</div>
</div>
<div class="row">
<div class="col-lg-6 ">
<div class="row mt-5 pt-5">
<div class="col-lg-6 do ">
<h3>You should</h3>
<ul>
<li>Stay at home</li>
<li>Wear mask</li>
<li>Use Sanitizer</li>
<li>Disinfect your home</li>
<li>Wash your hands</li>
<li>Frequent self-isolation</li>
</ul>
</div>
<div class="col-lg-6 do ">
<h3>You should avoid</h3>
<ul>
<li>Avoid infected people</li>
<li>Get Vaccinated</li>
<li>Avoid handshaking</li>
<li>Aviod infected surfaces</li>
<li>Don't touch your face</li>
<li>Avoid droplets</li>
</ul>
</div>
</div>
</div>
<div class="col-lg-6">
<img src="images/xprotect.png.pagespeed.ic.GkRjI8fMoi.png" alt="Image" class="img-fluid" data-pagespeed-url-hash="1094297152" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
</div>
</div>
</div>
</div>
<div class="site-section bg-primary-light">
<div class="container">
<div class="row mb-5">
<div class="col-lg-7 mx-auto text-center">
<h2 class="mb-4 section-heading">Symptoms of Coronavirus</h2>
<p>COVID-19 affects different people in different ways. Most infected people will develop mild to moderate illness and recover without hospitalization.</p>
</div>
</div>
<div class="row">
<div class="col-mb-6 mb-4">
<div class="symptom d-flex">
<div class="img">
<img src="images/xsymptom_high-fever.png.pagespeed.ic.CCWRTcaReB.png" alt="Image" class="img-fluid" data-pagespeed-url-hash="1544114268" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
</div>
<div class="text">
<h3>High Fever</h3>
</div>
</div>
</div>
<div class="col-mb-6 mb-4 mx-auto">
<div class="symptom d-flex">
<div class="img">
<img src="images/xsymptom_cough.png.pagespeed.ic.WAg8MrrDsc.png" alt="Image" class="img-fluid" data-pagespeed-url-hash="3923605453" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
</div>
<div class="text">
<h3>Coughing</h3>
</div>
</div>
</div>
<div class="col-mb-6 mb-4">
<div class="symptom d-flex">
<div class="img">
<img src="images/xsymptom_sore-troath.png.pagespeed.ic.ATrMtqJztP.png" alt="Image" class="img-fluid" data-pagespeed-url-hash="3087865185" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
</div>
<div class="text">
<h3>Sore Troat</h3>
</div>
</div>
</div>
<div class="col-mb-6 mb-4">
<div class="symptom d-flex">
<div class="img">
<img src="images/xsymptom_headache.png.pagespeed.ic.FxqGG3zmJf.png" alt="Image" class="img-fluid" data-pagespeed-url-hash="9264282" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
</div>
<div class="text">
<h3>Headaches</h3>
</div>
</div>
</div>
</div>
<div class="row justify-content-md-center">
<div class="col-lg-10">
<div class="note row">
<div class="col-lg-8 mb-4 mb-lg-0"><strong>Stay at home and call your doctor:</strong></div>
<div class="col-lg-4 text-lg-right">
<a href="index.php#" class="btn btn-primary"><span></span>Help line</a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="site-section">
<div class="container">
<div class="row mb-5">
<div class="col-lg-7 mx-auto text-center">
<h2 class="mb-4 section-heading">News &amp; Articles</h2>
<p>The coronavirus pandemic has affected our lives, our economy and nearly every corner of the globe</p>
</div>
</div>
<div class="row">
<div class="col-lg-4">
<div class="post-entry">
<a href="index2.php#" class="thumb">
<span class="date">30 Jul, 2020</span>
<img src="images/xhero_1.jpg.pagespeed.ic.9jJB__s3M_.jpg" alt="Image" class="img-fluid" data-pagespeed-url-hash="692369217" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
</a>
<div class="post-meta text-center">
</div>
<h3><a href="index2.php#">How Coronavirus Is Very Contigous</a></h3>
</div>
</div>
<div class="col-lg-4">
<div class="post-entry">
<a href="index2.php#" class="thumb">
<span class="date">30 Jul, 2020</span>
<img src="images/xhero_2.jpg.pagespeed.ic.mN6fnV51vK.jpg" alt="Image" class="img-fluid" data-pagespeed-url-hash="986869138" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
</a>
<div class="post-meta text-center">
</div>
<h3><a href="index2.php#">How Coronavirus is Very Contigous</a></h3>
</div>
</div>
<div class="col-lg-4">
<div class="post-entry">
<a href="index2.php#" class="thumb">
<span class="date">30 Jul, 2020</span>
<img src="images/xhero_1.jpg.pagespeed.ic.9jJB__s3M_.jpg" alt="Image" class="img-fluid" data-pagespeed-url-hash="692369217" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
</a>
<div class="post-meta text-center">

</div>
<h3><a href="index2.php#">How Coronavirus Very Contigous</a></h3>
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

</body>
</html>




