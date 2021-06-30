<?php
//localhost/My_Project/myPortfolio
include ('dbh.inc.php');
$query = "SELECT * FROM home,section_control,social_media";
$run = mysqli_query($con, $query);
$user_data = mysqli_fetch_array($run);

?>

<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?=$user_data['title'] ?></title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
      <link rel="shortcut icon" href="images/portfolio.png" type="image/x-icon">

   </head>
   <body>
      <!-- Start Header -->
     
      <header>
         <nav>
            <input type="checkbox"  id="menu-check">
            <label for="menu-check">
            <i class="fa fa-bars" id="menu-open"></i>
            <i class="fa fa-times" id="menu-close"></i>
            </label>
            <h1  class="logo"><a href="index.php">VV</a></h1>
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
         <!-- End Header -->
         <!-- Start Home -->
         <div class="content">
         <div class="text-content">
         <div class="text">Hello, It's Me </div>

         <div class="name"><?=$user_data['title'] ?><br><p class="subtitle" style= "color:deepblue"><?=$user_data['subtitle'] ?></p></div>  <!-- /*php*/ -->
         <div class="job">
            <div class="job">
               <span>And I'm a</span>
               <div class="typing-text">
                  <span class="one">Student,</span>
                  <span class="two">Fast Learner.</span>
               </div>
            </div>
         </div>

      <?php
if ($user_data['showicons'])
{
?>

         <div class="media-icons">
         <?php if ($user_data['facebook'] != '')
    { ?>
            <a href="https://www.facebook.com/<?=$user_data['facebook'] ?>"><i class="fab fa-facebook-f"></i></a>
         <?php
    } ?>
            <a href="https://twitter.com/<?=$user_data['twitter'] ?>"><i class="fab fa-twitter"></i></a> 
            <a href="https://www.linkedin.com/in/<?=$user_data['linkedin'] ?>"><i class="fab fa-linkedin-in"></i></a>    
            <a href="https://in.pinterest.com/<?=$user_data['pinterest'] ?>"><i class="fab fa-pinterest"></i></a>     
            <a href="https://github.com/<?=$user_data['github'] ?>"><i class="fab fa-github"></i></a>
         </div>

      <?php
}
?>
      </header>
       <div class="buttons">   <a href="contact.php"> <button  style="margin: 30px; left: 70px;"class="btn-grad first" type="button"> <font face="arial" size="5"> Hire Me </font> </button></a> <a href="cv/Curriculum Vitae.pdf"> <button  style="margin: 30px; left: 18%;"class="btn-grad second" type="button"> <font face="arial" size="5"> Download&nbsp;CV </font> </button></a>
    </div>
      <!-- End Home -->
   </body>
</html>
