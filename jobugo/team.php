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
                    <li class="active"><a href="team.php">Team</a></li>
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
          <li><a href="about-us.php">About Us</a></li>
          <li class="dropdown active">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
               <ul class="dropdown-menu">
                    <li class="active"><a href="team.php">Team</a></li>
               </ul>
          </li>
          <li><a href="contact.php">Contact Us</a></li>
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
                         <li><a href="about-us.php">About Us</a></li>
                        <!--<li><a href="blog-posts.html">Blog</a></li>-->
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                              
                              <ul class="dropdown-menu">
                                   <li class="active"><a href="team.php">Team</a></li>
                              </ul>
                         </li>
                         <li><a href="contact.php">Contact Us</a></li>
                         <li><a href="login.php">Login</a></li>
                         <li><a href="reception.php">SignUp</a></li>
                    </ul>
               </div>

          
     <?php }?>
     </div>
     </section> 
    <!-- Main PArt-->

     <section>
          <div class="container">
               <div class="text-center">
                    <h1>T&nbsp;E&nbsp;A&nbsp;M</h1>
                    <p>Together Everyone Achieves More</p>
                    <br>

                    <p class="lead">“A team is not a group of people who work together. A team is a group of people who trust each other.” </p>
               </div>
          </div>
     </section>

     <section id="team" class="section-background">
          <div class="container">
               <div class="row">
                    <div class="col-md-3 col-sm-6 tpad">
                         <div class="team-thumb">
                              <div class="tgrad">
                              <div class="team-image">
                                   <img src="images/author-image-1-646x680.jpg" class="img-responsive" alt="">
                              </div>
                              <div class="team-info">
                                   <h3>Chandan M</h3>
                              </div>
                              <ul class="social-icon">
                                   <li><a href="https://www.facebook.com/chandan.maiya/" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="https://www.instagram.com/chandan_mayya" class="fa fa-instagram"></a></li>
                                   <li><a href="mailto:chandanmogral@gmail.com" class="fa fa-envelope-o"></a></li>
                              </ul>
                              </div>
                         </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                         <div class="team-thumb">
                              <div class="tgrad">
                              <div class="team-image">
                                   <img src="images/author-image-2-646x680.jpg" class="img-responsive" alt="">
                              </div>
                              <div class="team-info">
                                   <h3>Soorya Kumar M H</h3>
                              </div>
                              <ul class="social-icon">
                                   <li><a href="https://www.facebook.com/soorya.sooryagowda" class="fa fa-facebook-square"></a></li>
                                   <li><a href="mailto:msooryakumar8@gmail.com" class="fa fa-envelope-o"></a></li>
                                   
                              </ul>
                         </div>
                         </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                         <div class="team-thumb">
                              <div class="tgrad">
                              <div class="team-image">
                                   <img src="images/author-image-3-646x680.jpg" class="img-responsive" alt="">
                              </div>
                                   <div class="team-info">
                                        <h3>Puneethraj K</h3>
                                   </div>
                                   <ul class="social-icon">
                                        <li><a href="https://www.facebook.com/puneeth.shettygaar    " class="fa fa-facebook-square"></a></li>
                                        <li><a href="https://www.instagram.com/pr_she_t_gar0811/" class="fa fa-instagram"></a></li>
                                        <li><a href="#" class="fa fa-envelope-o"></a></li>
                                   </ul>
                                   </div>

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