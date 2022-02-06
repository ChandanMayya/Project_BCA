<?php 
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);
if(!($user_data['acnt_type']==='employer'))     {
     $_SESSION['error_src'] = 'emp'; 
     header("Location:noaccountalert.php");
}

$name = "";
$email = "";
$fdcontent = "";
$error_txt = "";
$uno = $_SESSION['user_id'];

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['send'])){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $fdcontent = $_POST['message'];
     if(!empty($name) && !empty($email) && !empty($fdcontent))     {
          $query = "insert into feedback (ano,emailid,fdcontent) values ('$uno','$email','$fdcontent')";
          $result = mysqli_query($con,$query);
          if(!($result)) {
               $error_txt = "Error: " . $query . "<br>" . $con->error;
          }
     }
}
     
?>



<!DOCTYPE html>
<html lang="en">
<head>

     <title>The Online Job Protal</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">Jobugo</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li class="active"><a href="employerh.php">Home</a></li>
                         <li><a href="ajobs.php">Add Jobs</a></li>
                         <li><a href="yjobs.php">Your Jobs</a></li>
                         <li><a href="empviewasp.php">View Aspirants</a></li>
                         
                         <li><a href="about-us.php">About Us</a></li>
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                   <li><a href="team.php">Team</a></li>
                              </ul>
                         </li>
                         <li><a href="contact.php">Contact Us</a></li>
                         <li><a href = "account.php"><b>Hello <?php echo $user_data['user_name']; ?></a></li>
                    </ul>
               </div>
          </div>
     </section>

    <!-- Main PArt-->
    <section id="home">
          <div class="row">
               <div class="owl-carousel owl-theme home-slider">
                    <div class="item item-first">
                         <div class="caption">
                              <div class="container">
                                   <div class="col-md-6 col-sm-12">
                                        <h1>Welcome To Jobugo </h1>
                                        <h3>The online Job Hiering Portal!</h3>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="item item-second">
                         <div class="caption">
                              <div class="container">
                                   <div class="col-md-6 col-sm-12">
                                        <h1>Aspirants from Worldwide</h1>
                                        <h3>Our Job portal is open all over the world enabling us to provide you more Aspiants</h3>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="item item-third">
                         <div class="caption">
                              <div class="container">
                                   <div class="col-md-6 col-sm-12">
                                        <h1>We here host all kinds of job openings</h1>
                                        <h3>Based on your reqiurements we keep our web portal open for all kinds of your job openings!</h3>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <main>
          <section>
               <div class="container">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                              <div class="text-center">
                                   <h2>About us</h2>

                                   <br>

                                   <p class="lead">We are the final year students of Vivekananda degree college and we are a group of three developing this wonderfull JOB-U-GO, one of the easiest online job portal.</p>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                   <div class="text-center">
                                        <br>
                                        <h2>Why should you be opting US?</h2>
                                        <br>
                                        <p class="lead">We at Jobugo provide you a wide range of aspirants from experienced to newbies! Your data is stored in a secured database which is inaccessible ot others. </p>
                                        <p>Click the below button to add your job opening</p>
                                        <br>
                                        <a href="ajobs.php" class="btn-lg btn-info active" role="button" aria-pressed="true">Add Vacancy</a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </section>



     <!-- CONTACT -->
     <section id="contact">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <form id="contact-form" role="form" action="" method="post">
                              <div class="col-md-12 col-sm-12"><?php $user = ""; if(isset($_SESSION['user_id'])){$user = $user_data['user_name']; $mail = $user_data['email'];} ?>
                                   <input type="text" class="form-control" placeholder="Enter full name" name="name" required value="<?php echo $user; ?>">
                    
                                   <input type="email" class="form-control" placeholder="Enter email address" name="email" required value="<?php echo $mail; ?>">

                                   <textarea class="form-control" rows="6" placeholder="Tell us about your message" name="message" required></textarea>
                                   <label for="error_msg" style="color:red;" name="error_txt"><?php echo $error_txt; if(!empty($_POST['error_txt'])) echo $_POST['error_txt'];?> </label>
                
                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="send" value="Send Message">
                              </div>

                         </form>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                              <img src="images/contact-1-600x400.jpg" class="img-responsive" alt="">
                         </div>
                    </div>

               </div>
          </div>
     </section>    


    <!-- FOOTER -->
    <footer id="footer">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Headquarter</h2>
                              </div>
                              <address>
                                   <p>KrishnaNagar <br>Puttur, Bharath(India)- 574203</p>
                              </address>

                              <ul class="social-icon">
                                   <li><a href="http://www.facebook.com/" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="http://www.twitter.com/" class="fa fa-twitter"></a></li>
                                   <li><a href="http://www.instagram.com/" class="fa fa-instagram"></a></li>
                              </ul>

                              <div class="copyright-text"> 
                                   <p>Copyright &copy;2021 Jobugo</p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Contact Info</h2>
                              </div>
                              <address>
                                   <p>+91 9482737543</p>
                                   <p><a href="mailto:contact.jobugo@gmail.com">contact.jobugo@gmail.com</a></p>
                              </address>

                              <div class="footer_menu">
                                   <h2>Quick Links</h2>
                                   <ul>
                                        <li><a href="employerh.php">Home</a></li>
                                        <li><a href="about-us.php">About Us</a></li>
                                        <li><a href="contact.php">Contact Us</a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                         <div class="footer-info newsletter-form">
                              <div class="section-title">
                                   <h2>Quick Contact</h2>
                              </div>
                              <div>
                                   <div class="form-group">
                                        <form action="contact.php" method="get">
                                             <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email">
                                             <a href="contact.php"><input type="submit" class="form-control" name="submit" value="Submit"/></a>
                                        </form>
                                        <span><sup>*</sup> Please note - we do not spam your email.</span>
                                   </div>
                              </div>
                         </div>
                    </div>
                </div>
                <br>
                <div>
                         <pre>
                    <p style="text-align: center;">Made&nbsp;with&nbsp;<p class="heartbeat">&#128151;</p><p class="txtcentre">&nbsp;in&nbsp;Bharath</p></p></pre> 
               </div>
               
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>