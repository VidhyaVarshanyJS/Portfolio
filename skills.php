<?php

include ('dbh.inc.php');

$query = "SELECT * FROM section_control";
$run3 = mysqli_query($con, $query);

$user_data = mysqli_fetch_array($run3)

?>


<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio Site</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
   <link rel="shortcut icon" href="images/portfolio.png" type="image/x-icon">
 
</head>

<style>
  @media all and (max-width:900px) {
    .place {
      display: flex;
    }
  }
</style>

<body>
  <!-- Start Header -->
  <nav>
    <input type="checkbox" id="menu-check">
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
  <!-- ======= Skills  ======= -->


  <div class="inner-width skills container">

    <h1 class="section-title"><br><br>Skills</h1>

    <div class="row skills-content">
       <div class="col-lg-6">

  <?php

$query = "SELECT * FROM skills";
$run3 = mysqli_query($con, $query);

while ($skill = mysqli_fetch_array($run3))
{ ?>
        <div class="progress">
          <span class="skill"><?=$skill['skill_name'] ?><i class="val"><?=$skill['skill_level'] ?>%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="<?=$skill['skill_level'] ?>" aria-valuemin="0" aria-valuemax="100">
            </div>
          </div>
        </div>
<?php
} ?>
      </div>
      </div>
<!-- End Skills -->

 <!-- Vendor JS Files -->
 
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="skills.js"></script>

</body>

</html>
