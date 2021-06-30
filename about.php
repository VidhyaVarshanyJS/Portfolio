<?php

include ('dbh.inc.php');

$query = "SELECT * FROM section_control,about";
$run2 = mysqli_query($con, $query);
$user_data = mysqli_fetch_array($run2);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="shortcut icon" href="images/portfolio.png" type="image/x-icon">
    <style type="text/css">
        .section-title {
            color: #2c0921eb;
        }
    </style>
</head>

<body>
    <!-- Start Header -->
    <nav>
        <input type="checkbox" id="menu-check">
        <label for="menu-check"> <i class="fa fa-bars" id="menu-open"></i> <i class="fa fa-times" id="menu-close"></i>
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
        </ul>
    </nav>
    <!-- Start About -->
    <div class="about">
        <h1 class="section-title"><br><br>About</h1>

        <div class="profile"> <img align="left" class="girl" src="images/girl.png">
            <p class="title"><?=$user_data['about_title'] ?></p> <br>
            <p class="stat"><?=$user_data['about_subtitle1'] ?><br><br> <?=$user_data['about_subtitle2'] ?></p><br>
            <p>Welcome to my Portfolio!<br><br>Every person has their own unique story.Here is a glimpse into mine.</p>
        </div>


        <div class="aboutme"><span class="description"><br>
                <p><?=$user_data['about_desc'] ?></p>
            </span></div><br>
        <iframe style="left: 135px;"class="embedpdf" align="left" frameborder="0" scrolling="no" width="640" height="480"
            src="cv/Curriculum Vitae.pdf">
        </iframe>
        <hr width="100%" color="white" noshade="">
    </div>
    <!-- End About -->
    <!-- Education -->
    <?php if ($user_data['show_education'])
{ ?>
    <section id="education">
        <div class="inner-width">
            <h1 class="section-title education">Education & Experiences</h1>
            <div class="time-line">

                <?php
    $query = "SELECT * FROM education_details";
    $run2 = mysqli_query($con, $query);

    while ($edu_details = mysqli_fetch_array($run2))
    {
?>
                <div class="block">
                    <h4><?=$edu_details['edu_year'] ?></h4>
                    <h3><?=$edu_details['edu_name'] ?></h3>
                    <p><?=$edu_details['edu_desc'] ?></p>
                </div>
                <?php
    } ?>
            </div>
        </div>
    </section>
    <?php
} ?>
    <!-- End Education -->
</body>

</html>
