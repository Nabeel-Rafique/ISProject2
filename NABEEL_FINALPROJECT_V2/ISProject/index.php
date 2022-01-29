<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@1000&display=swap" rel="stylesheet">
</head>
<body>


	<?php include 'menu.php'; ?>


<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Images/info7.jpg" alt="Fight" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Fight</h3>
        <p>Stay Updated Always!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="Images/pandemic.jpg" alt="Pandemic" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Pandemic</h3>
        <p>Help Fight the Pandemic!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="Images/donate1.jpg" alt="Donate" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Donate Now</h3>
        <p>We Build as a Community!</p>
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

<section class="my-5">

	<div class="py-3">
		<h2 class="text-center">About Us</h2>
    </div>
    <div class="container-fluid"> 
     <div class="row">
       <div class="col-lg-6 col-md-6 col-12">
         <img src="Images/about.jpg" class="img-fluid aboutimg">
         </div>
          <div class="col-lg-6 col-md-6 col-12">
          <h2 class="display-4">The Funding Network</h2>
          <p class="py-3">The Funding Network is a Kenyan based digital media platform. Our aim is to amplify updated news from organizations, development agencies and government initiatives aimed at solving the challenges facing the world today.</p>
          <p class="py-3"> We are a flexible and digitally accessible community that empowers you to take immediate action</p>
          
          <a href="About.php" class="btn btn-outline-success"> About Us </a>

         </div>
      </div>  
    </div>
</section>


<section class="my-5">
  <div class="py-3">
    <h2 class="text-center">Our Work</h2>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-12">
        <div class="card">
  <img class="card-img-top" src="Images/togetherness.jpg" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">Organizational Development</h4>
    <p class="card-text">We Work to Unite Humanitarian Organizations and build as on community</p>
    <a href="#" class="btn btn-primary">See More</a>
  </div>
</div>
 </div>
 
      <div class="col-lg-4 col-md-4 col-12">
        <div class="card">
  <img class="card-img-top" src="Images/info4.jpg" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">Information Awareness</h4>
    <p class="card-text">We Work to keep the entire community updated with crucial and legitimate news</p>
    <a href="#" class="btn btn-primary">See More</a>
  </div>
</div>
</div>


      <div class="col-lg-4 col-md-4 col-12">
        <div class="card">
  <img class="card-img-top" src="Images/Donate.jpg" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">Global Fund</h4>
    <p class="card-text">Families in poverty have no safety net in times of crisis. Help provide food, medical care and support during this pandemic.</p>
    <a href="#" class="btn btn-primary">See More</a>
  </div>
</div>
</div>
      </div>   
  </div>
</section>

<section class="my-3">
  <div class="py-3">

    <h1 class="text-center">Subscribe to our Newsletters</h1>
    <p class="text-center">Sign up to receive our newsletters</p>
  </div>

  <div class="w-50 mx-auto">
    <form action="userinfo.php" method="post">
      <div class="form-group">
        <label>E-mail Address</label>
        <input type="varchar" name="email" autocomplete="off" class="form-control w-300">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</section>

<section>
  <footer>
    <p  class="p-3 bg-dark text-white text-center">@NabeelRafique</p>
  </footer>
</section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>