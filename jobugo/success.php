<?php 
session_start();
error_reporting(0);
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
     <link rel="stylesheet" href="css/img.css">

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
                         
                         <?php if($_SESSION['user_id']){
                         if($_SESSION['accounttype']=='employer'){     ?>

                         <li><a href="employerh.php">Home</a></li>
                         <li><a href="ajobs.php">Add Jobs</a></li>
                         <li><a href="yjobs.php">Your Jobs</a></li>
                         <li><a href="empviewasp.php">View Aspirants</a></li>
                         
                         <?php }

                         else if($_SESSION['accounttype']=='aspirant'){ ?>

                         <li><a href="index.php">Home</a></li>
                         <li><a href="job-listing.php">Jobs</a></li>

                         <?php }
                         
                         else if($_SESSION['accounttype']=='admin'){  ?>

                         <li><a href="admin.php">Home</a></li>
                          <?php } }else{?>
                              <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="index.html">Home</a></li>
                         <li><a href="job-listing.php">Jobs</a></li>
                         <?php } ?>

                         <li><a href="about-us.php">About Us</a></li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                            
                            <ul class="dropdown-menu">
                                 <li><a href="team.php">Team</a></li>
                            </ul>
                       </li>
                       <li><a href="contact.php">Contact Us</a></li>
                       <li><a href = "account.php">Account</a></li>
                    </ul>
               </div>
</div>
          </div>
     </section>

    <!-- Main PArt-->

    <div class="container">
        <br>
    <h1 style="text-align:center;">Woohoo!</h1>
    <div class="imgcontainer">
                  <img src="images/yes.png" alt="Avatar" style=" width: 35%;" >
                </div><?php
                if($_SESSION['source'] == 'acnt'){ ?>
                <h3 style="text-align:center;">Your Account has been added!</h3>

                <br>

                <h5 style="text-align:center;">Click below button to Login</h5> <center>
               <a href="login.php"><button class="btn-grad" name="login_btn">Login</button></a></center>

                <?php }else if($_SESSION['source'] == 'jadded'){ ?>
                    <h3 style="text-align:center;">Your Job has been added!</h3>
                    <br>
                    <?php }else if($_SESSION['source'] == 'japplied'){ ?>
                    <h3 style="text-align:center;">You have Successfully applied for this job!</h3>
                    <p style="text-align:center;">The employer will contact you soon..</p>
                    <br>
                    
                <?php }else if($_SESSION['source'] == 'reset'){ ?>
                    <h3 style="text-align:center;">Your password have been reset successfully</h3>
                    <br>
                 
                <h5 style="text-align:center;">Click below button to Login</h5><center>
               <a href="login.php"><button class="btn-grad" name="login_btn">Login</button></a></center>
               <?php } ?>



  <br>
  <br>
               
     </div>

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