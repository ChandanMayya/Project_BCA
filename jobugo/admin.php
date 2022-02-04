<?php 
session_start();

     include("connection.php");
     include("functions.php");

     $user_data = check_login($con);
     if(!($user_data['acnt_type']==='admin'))
     {
          $_SESSION['error_src'] = 'admin';  
          header("Location:noaccountalert.php");
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
                         <li class="active"><a href="admin.php" class="active">Admin Home</a></li>
                         <li><a href="account.php">Account</a></li>
                    </ul>
               </div>
          </div> 
     </section>

    <!-- Main PArt-->

    <div class="container">
    <div class="imgcontainer">
                  <img src="images/admin.png" alt="Avatar" class="avatar">
                </div>
                <h2 style="text-align:center;">ADMIN PANEL</h2>
                <div style="padding-left:50px;">
                <a href="view_aspirants.php"><div class="square">
                <h3><i class="fa fa-user" aria-hidden="true"></i>
                <br> Aspirants <br> Accounts</h3>
                </a>
                              
             </div>
  
                  <a href="view_employers.php"><div class="square">
                  <h3><i class="fa fa-industry" aria-hidden="true"></i>
                  <br> Employers <br> Accounts</h3>
                  </a> 
             </div>

                    <a href="view_jobs.php"><div class="square">
                    <h3><i class="fa fa-briefcase" aria-hidden="true"></i>
                    <br>Manage <br> Jobs</h3>
                    </a> 
               </div>

                    <a href="view_admin.php"><div class="square" style="float:">
                    <h3><i class="fa fa-shield" aria-hidden="true"></i>
                    <br>
                    View <br> Admins</h3>  </a>
               </div>
         
                    <a href="aadmin.php"><div class="square" style="float:">
                    <br>
                    <h3><i class="fa fa-plus-circle" aria-hidden="true"></i>
                    <br> Add new <br> Admin</h3>
                    </a>
               </div>
                    <div style="padding-left:400px;">
                    <a href="mailto.php"><div class="square" style="float:">
                    <br>
                    <h3><i class="fa fa-envelope" aria-hidden="true"></i>
                    <br> Send<br> Mail</h3>
                    </a>
               </div>
          </div>
     </div></div>

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
                                        <li><a href="admin.php">Home</a></li>
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