<?php 
session_start();

include("connection.php");
include("functions.php");
include("mail.php");

$length = 5;
$error_string = "";
$otp_send = random_num($length);
$selected = $_SESSION['selected'];

$query1 = "select * from users where user_id='$selected'";
$result1 = mysqli_query($con,$query1);
if($result1){
     $row = mysqli_fetch_assoc($result1);
     $name = $row['user_name'];
     $mailid = $row['email'];
     $sub = "Reset Password!";
     $bdy = "It happens. We are always busy with our own work and so sometimes we forget our passwords.<br>The OTP reset your password is: $otp_send";
     if($_SESSION['flag'] == 1){
          $_SESSION['flag'] = 0;
          $_SESSION['otp'] = $otp_send;
          mailer($mailid,$name,$sub,$bdy);
     }
}

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['validate'])){
    $otp_receive = $_POST['otp_val'];
    $_SESSION['flag'] = 0;
    if($otp_receive === $_SESSION['otp']){
        header("Location:forgot_psw_reset.php");
    }
    else{ $error_string = "Wrong OTP!";     }
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
     <link rel="stylesheet" href="css/table.css">

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
                         <li><a href="index.html">Home</a></li>
                         <li><a href="job-listing.php">Jobs</a></li>
                         <li><a href="about-us.php">About Us</a></li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>                          
                            <ul class="dropdown-menu">
                                 <li><a href="team.php">Team</a></li>
                            </ul>
                       </li>
                       <li><a href="contact.php">Contact Us</a></li>
                       <li class="active"><a href="login.php">login</a></li>
                       <li><a href="reception.php">SignUp</a></li>
                    </ul>
               </div>

          </div>
     </section>

    <!-- Main PArt-->
    <div class="container">
         
          <section>
          <div class="container">
            <form method = "post" class="formcontainer">
                      <div class="logincontainer">
                      <div class="imgcontainer">
               <img src="images/user.png" alt="Avatar" class="avatar">
          </div>
          <h2 style="text-align:center;">Reset Password</h2>
                  <hr>
                  <br>
              
                  <h4>User Name: <?php echo $row['user_name'];?>

                  <br>

                  Email: <?php echo $row['email'];?> </h4><br>
                  <p>An OTP has been sent to your mail id. Please enter the same below to confirm</p>


<br>
                  <input type="text" placeholder="Enter OTP" name="otp_val" required>
               <br><br><br>                  
                </div>
              
              <div class="logincontainer" style="background-color:#f1f1f1">
                <input type = "submit" class = "btn-grad" value = "validate" name ="validate">
                <label for="error_msg" style="color:red;"><?php echo $error_string; ?></label>
                </form>
               </div>
               </div>         
               </div>
               </div>
     </section>
         
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