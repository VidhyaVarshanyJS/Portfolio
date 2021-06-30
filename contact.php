<?php

include ('dbh.inc.php');
$query = "SELECT * FROM section_control";
$run = mysqli_query($con, $query);
$user_data = mysqli_fetch_array($run);

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    mysqli_query($con, "INSERT INTO contact_me(name,email,phone,message) VALUES('$name','$email','$phone','$message')");

    //libraries of swiftmailer
    require_once 'vendor/autoload.php';
    require_once 'credentials.php';

    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))->setUsername(EMAIL)
        ->setPassword(PASS);

    //connects the mail_smtp
    $mailer = new Swift_Mailer($transport);

    // Create a message
    $message = (new Swift_Message('New User, Sent a Message!!!'))->setFrom(['vvshomespot@gmail.com' => 'My_Portfolio_Webserver']) //sender
    
        ->setTo(['websiteportfolio797@gmail.com' => 'Vidhya_Varshany']) //receiver
    
        ->setBody('Hey! Vidhya Varshany,you got a new message from your Portfolio Website' . "\r\n\n Name : " . $name . "\r\n Email : " . $email . "\r\n PhoneNumber : " . $phone . "\r\n Message : " . $message);
    // Send the message
    $mail = $mailer->send($message);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Me</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet"  />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <link rel="shortcut icon" href="images/portfolio.png" type="image/x-icon">
    
  </head>

  <body>
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
    <section id="contact">
         <div class="inner-width">
            <h1 class="section-title">Get in touch</h1>
            <div class="contact-info">
               <div class="item">
                  <i class="fas fa-mobile-alt"></i>
                  +4999946903
               </div>
               <div class="item">
                  <i class="fas fa-envelope"></i>
                  <a style="color: white;" href="mailto:vidhyavarshany03@gmail.com">
                  vidhyavarshany03@gmail.com</a>
               </div>
               <div class="item">
                  <i class="fas fa-map-marker-alt"></i>
                  <a style="color: white;"href="https://www.google.com/maps/place/Coimbatore,+Tamil+Nadu/@11.0116775,76.8971862,12z/data=!4m5!3m4!1s0x3ba859af2f971cb5:0x2fc1c81e183ed282!8m2!3d11.0168445!4d76.9558321">  Coimbatore ,TamilNadu, India</a>
                
               </div>
            </div>


        <form  name="contact-form"  id="contact-form" method="post" >
      <div class="form-control">
        <label class="names">Full Name</label>
        <input name="name" id="name" 
          placeholder="First and Last Name" pattern="[a-zA-Z]+" />
        <div class="error hide">Name is required</div>
      </div>

      <div class="form-control">
        <label class="names">Email</label>
        <input
          name="email" id = "email"
          placeholder="e.g. your_email@example.com"
        />
        <div class="error hide">Email is invalid</div>
      </div>

      <div class="form-control">
        <label class="names">Phone</label>
        <input name="phone" id="phone" placeholder="+91xxxxxxxxxx"
        ></input>
        <div class="error hide">Phone is invalid</div>
      </div>

      <div class="form-control">
        <label class="names">Message</label>
        <textarea name="message" id = "message" placeholder="Type your message here..."></textarea>
        <div class="error hide">Message is required</div>
      </div>


      <button class="btn" id="submit" name="submit" >Send Message</button>


    </form>
        <form action="index.php"><button style="position: absolute; top: 163.7%; left :25%; " class="btn"  type ="submit" >Go to HOME</button></form>

 
      <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125323.40217965248!2d76.89702288216769!3d11.011870040963258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba859af2f971cb5%3A0x2fc1c81e183ed282!2sCoimbatore%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1623910022322!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

  <footer style="padding: 0;">
         <div class="inner-width">
            <div class="copyright">
               &copy; 2021 | Created & Designed By <a href="#">vidhyavarshany</a>
            </div>
            <div class="sm">
               <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
               <a href="https://twitter.com/vv72609395?s=08"><i class="fab fa-twitter"></i></a> 
               <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>    
               <a href="https://in.pinterest.com/"><i class="fab fa-pinterest"></i></a>     
               <a href="https://github.com"><i class="fab fa-github"></i></a>
            </div>
         </div>
      </footer>
     </section>
      <!-- Go Top BTN -->
      <a href="index.php"><button class="goTop fas fa-arrow-up"></button></a>

    <script src="script.js"></script>
  </body>
</html>
