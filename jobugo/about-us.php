<?php
session_start();

include("connection.php");
include("functions.php");
error_reporting(0);

if($_SESSION['user_id'])
{
    $user_data = check_login($con);
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
               <?php if($_SESSION['user_id'])
{if($user_data['acnt_type'] == 'aspirant') { ?>

<div class="collapse navbar-collapse">
     <ul class="nav navbar-nav navbar-nav-first">
          <li><a href="index.php">Home</a></li>
          <li><a href="job-listing.php">Jobs</a></li>
          <li class="active"><a href="about-us.php">About Us</a></li>
          <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
               <ul class="dropdown-menu">
                    <li><a href="team.html">Team</a></li>
               </ul>
          </li>
          <li class="active"><a href="contact.php">Contact Us</a></li>
          <li><a href="logout.php">logout</a></li>
     </ul>
</div>

<?php }else if($user_data['acnt_type'] == 'employer') { ?>

     <div class="collapse navbar-collapse">
     <ul class="nav navbar-nav navbar-nav-first">
          <li><a href="employerh.php">Home</a></li>
          <li><a href="ajobs.php">Add Jobs</a></li>
          <li><a href="yjobs.php">Your Jobs</a></li>
          <li><a href="empviewasp.php">View Aspirants</a></li>
          <li class="active"><a href="about-us.php">About Us</a></li>
          <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
               <ul class="dropdown-menu">
                    <li><a href="team.php">Team</a></li>
               </ul>
          </li>
          <li class="active"><a href="contact.php">Contact Us</a></li>
          <li><a href="logout.php">logout</a></li>
     </ul>
</div>

<?php }else if($user_data['acnt_type'] == 'admin') { ?>

     <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-nav-first">
               <li><a href="admin.php" class="active">Admin Home</a></li>
               <li><a href="logout.php">logout</a></li>
          </ul>
     </div>
<?php }} else{?>


               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="index.html">Home</a></li>
                         <li><a href="job-listing.php">Jobs</a></li>
                         <li class="active"><a href="about-us.php">About Us</a></li>
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                   <li><a href="team.php">Team</a></li>
                              </ul>
                         </li>
                         <li><a href="contact.php">Contact Us</a></li>
                         <li><a href="login.php">Login</a></li>
                         <li><a href="reception.php">SignUp</a></li>
                    </ul>
               </div>

          </div>
     </section> 
     <?php }?>

     <!-- Main Part -->
     <section>
          <div class="container">
               <div class="text-center">
                    <h1>About Us</h1>

                    <br>

                    <p class="lead">Individually, we are one drop. Together, we are an ocean.</p>
               </div>
          </div>
     </section>

     <section class="section-background">
          <div class="container">
               <div class="row">
                    <div class="col-md-offset-1 col-md-4 col-xs-12 pull-right">
                         <img src="images/about-1-720x720.jpg" class="img-responsive img-circle" alt="">
                    </div>

                    <div class="col-md-7 col-xs-12">
                         <div class="about-info">
                              <h2>Who are we?</h2>

                              <figure>
                                   <figcaption>
                                        <p> We are students of Vivekananda Degree College, Puttur persuing final year BCA.</p>
                                        <p>This web application is built as a part of the project work in the final semester. </p>    
                                        </figcaption>
                              </figure>
                         </div>
                    </div>
               </div>
          </div>
     </section>

     <section>
          <div class="container">
               <div class="row">
                    <div class="col-md-4 col-xs-12">
                         <img src="images/about-2-720x720.jpg" class="img-responsive img-circle" alt="">
                    </div>

                    <div class="col-md-offset-1 col-md-7 col-xs-12">
                         <div class="about-info">
                              <h2>What is the purpose of this web app</h2>

                              <figure>
                                   <figcaption>
                                   <UL>
                                        <li><p>Making easy the hiring process</p></li>
                                        <LI><p>To bring the dream jobs of the aspirants in their hands</p></li>
                                        <li><p>Simple UI to enhance productivity</p></li>
                                        <li><p>Making the hiring process less cumbersome</p></li>
                                   </ul>
                                   </figcaption>
                              </figure>
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
                                        <li><a href="index.php">Home</a></li>
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