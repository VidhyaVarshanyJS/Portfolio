<?php

//localhost/My_Project/myPortfolio
include ('dbh.inc.php');
$query = "SELECT * FROM section_control";
$run4 = mysqli_query($con, $query);
$user_data = mysqli_fetch_array($run4);

?>


<!DOCTYPE html>
<html>
<head>	
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Portfolio Site</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
   <link rel="shortcut icon" href="images/portfolio.png" type="image/x-icon">
  
</head>
<body>
 <!-- Start Header -->
 <nav>
      <input type="checkbox"  id="menu-check">
      <label for="menu-check">
        <i class="fa fa-bars" id="menu-open"></i>
        <i class="fa fa-times" id="menu-close"></i>
      </label>
      <h1 class="logo"><a href="index.php">VV</a></h1>
      <ul>
            <?php if ($user_data['home_section'])
{ ?>

               <li><a href="index.php">Home</a></li>
            <?php
} ?>
                <?php if ($user_data['about_section'])
{ ?>
                       <li><a href="about.php">About</a></li>
            <?php
} ?>
                <?php if ($user_data['skills_section'])
{ ?>
                     
               <li><a href="skills.php">Skills</a></li>
            <?php
} ?>
                <?php if ($user_data['portfolio_section'])
{ ?>
           
               <li><a href="portfolio.php">Portfolio</a></li>
            <?php
} ?>
                <?php if ($user_data['contact_section'])
{ ?>
              <li><a href="contact.php">Contact</a></li>
            <?php
} ?>
      </ul>
    </nav>
  <!-- Start Portfolio -->
<!-- Works -->
  <section id="works" class="dark">
    <div class="inner-width">
      <h1 class="section-title">My Works</h1>

      <div class="works">
 <?php
$query = "SELECT * FROM portfolio";
$run4 = mysqli_query($con, $query);
while ($portfolio = mysqli_fetch_array($run4))
{ ?>

        <a href="<?=$portfolio['works_link'] ?>" class="work">
          <img src="<?=$portfolio['works_images'] ?>" alt="">
          <div class="info">
            <h3><?=$portfolio['works_title'] ?></h3>
            <div class="cat"><?=$portfolio['works_desc'] ?></div>
          </div>
        </a>
<?php
} ?> 
      
      </div>
    </div>
  </section>


 </div>
 </body>
</html>
