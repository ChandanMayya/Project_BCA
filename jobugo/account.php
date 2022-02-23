<?php 
session_start();

     include("connection.php");
     include("functions.php");

     $user_data = check_login($con);

     if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['verify_emp'])){
          $_SESSION['flag'] = 1;
          $_SESSION['selected'] = $user_data['user_id'];
          header("location:confirm/emp_conf.php");
     }
     if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['verify_asp'])){
          $_SESSION['flag'] = 1;
          $_SESSION['selected'] = $user_data['user_id'];
          header("location:confirm/asp_conf.php");
     }
     if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout_btn'])){
          header("location:logout.php");
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

               <?php if($user_data['acnt_type'] == 'aspirant') { ?>

               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="index.php">Home</a></li>
                         <li><a href="job-listing.php">Jobs</a></li>
                         <li><a href="about-us.php">About Us</a></li>
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                   <li><a href="team.php">Team</a></li>
                              </ul>
                         </li>
                         <li><a href="contact.php">Contact Us</a></li>
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
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                   <li><a href="team.php">Team</a></li>
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
               <?php } ?>
          </div> 
     </section>

    <!-- Main PArt-->
    <section>
          <div class="container " style="padding-left:250px;padding-right:250px;">
               <div class="borderr formcontainer">
               <div class="imgcontainer">
                    <img src="images/user.png" alt="Avatar" class="avatar">
               </div><br> 
               <div class="txtcentre">
                    <table align=center cellspacing="10px" class="acnttable">  
                         <tr>
                              <td colspan="2">
                                   <h2 align=center>ACCOUNT</h2><br> 
                              </td>
                         </tr>
                         <tr>
                              <td colspan="2"></td></tr>
                         <tr>
                              <td align=left>
                                   <b>User Name:</b>
                              </td>
                              <td align=right>
                                   <b><?php  
                                        if($_SESSION['accounttype'] == "admin"){
                                             echo $user_data['user_name'];
                                        }elseif($_SESSION['accounttype'] == "aspirant"){
                                             echo $user_data['user_name'];
                                        }elseif($_SESSION['accounttype'] == "employer"){
                                             echo $user_data['user_name'];
                                        }
                                   ?></b>
                              </td>
                         </tr>
                         <tr>
                              <td colspan="2"></td></tr>
                         <tr>
                              <td align=left>
                                   <b>Email ID:</b> </td>
                              <td align=right>
                                   <b> <?php echo $user_data['email']; ?></b>
                              </td>
                         </tr>
                         <tr>
                              <td colspan="2"></td></tr>
                         <tr>
                              <td align=left>
                                   <b>  Account: </b>
                              </td>
                              <td align=right> <strong>
                                   <?php
                                   if($_SESSION['accounttype'] == "admin"){
                                        echo "ADMIN";
                                   }elseif($_SESSION['accounttype'] == "aspirant"){
                                        echo "ASPIRANT";
                                   }elseif($_SESSION['accounttype'] == "employer"){
                                        echo "EMPLOYER";
                                   }?>
                                   </strong>
                              </td>
                         </tr>
                         <tr>
                              <td colspan="2"></td>
                         </tr>
                    </table>
                    <form method="post">
                         <center>
                         <h5 style="color:black;">
                         <?php 
                              if($user_data['acnt_type'] == 'aspirant'){
                                   if($user_data['valid'] == false){ ?><hr width=50%> <?php
                                        echo "You have not verified your mail-id yet. <br> Please verify by clicking the below button";
                              ?> <br>
                              <input type="submit" class="btn-grad" value="Verify" name="verify_asp" />
                         <?php
                                   }
                              }else{
                                   if($user_data['mail_verified'] == b'0'){ ?><hr width=50%> <?php
                                        echo "You have not verified your mail-id yet. <br> Please verify by clicking the below button";
                                   ?> <br>
                                   <input type="submit" class="btn-grad" value="Verify" name="verify_emp" />
                         <?php
                                   }
                              } ?>
                         </h5>
                         <hr width=50%>
                         <button class="cancelbtn" name="logout_btn">Logout</button></a>    </center>     
                         <br><br> 
                    </form>
               </div>
          </div>
     </div>
              
     <div class="logincontainer">
          <h2 ALIGN="CENTER" style="font-family: 'Nunito', sans-serif;"><b>Hello, <?php echo $user_data['user_name']; ?>  Thank you for visiting JOB-U-GO</b></h2>
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