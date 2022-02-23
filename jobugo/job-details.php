<?php 

session_start();

  include("connection.php");
  include("functions.php");

  $error_txt = "";

  $user_data = check_login($con);
  $title = "No Data";   $loc = "No Data";  $sal = "0";   $details = "No Data";     $id = 0;

  $query1 = "select * from jobs where selected is true";
  $result1 = mysqli_query($con,$query1);

  if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['apply_btn']))
  {
     $uname = $user_data['user_name'];
     $query3 = "select user_id from users where user_name='$uname'";
     $result3 = mysqli_query($con,$query3);
     $row3 = mysqli_fetch_assoc($result3);
     $uid = $row3['user_id'];

     $query4= "select job_num from jobs where selected is true";
     $result4 = mysqli_query($con,$query4);
     $row4 = mysqli_fetch_assoc($result4);
     $jno = $row4['job_num'];

     $query7 = "SELECT * from aspirants where ano='$uid' AND job_num='$jno'";
     $result7 = mysqli_query($con,$query7);
     if(mysqli_num_rows($result7) != 0){ $error_txt = "You have already applied for this job"; 

     }else{
          $query5 = "insert into aspirants (ano,job_num) values ('$uid','$jno')";
          $result5 = mysqli_query($con,$query5);
          if($result5){
               echo "DONE!";
                    $_SESSION['source'] = 'japplied';
                    header("Location:success.php");
          }else{
               $error_txt = "Some error in inserting!";
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
                         <li><a href="index.php">Home</a></li>
                         <li class="active"><a href="job-listing.html">Jobs</a></li>
                         <li><a href="about-us.php">About Us</a></li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                            
                            <ul class="dropdown-menu">
                                 <li><a href="team.php">Team</a></li>
                            </ul>
                       </li>
                       <li><a href="contact.php">Contact Us</a></li>
                       <li><a href="account.php">Account</a></li>
                    </ul>
               </div>

          </div>
     </section>
<?php $row = $result1->fetch_assoc(); ?>
     <section>
          <div class="container">
               <div class="row">
                    <div class="col-lg-3 col-md-3 col-xs-12">
                         <div>
                              <br>

                              <img src="images/product-1-720x480.png " alt="" class="img-responsive wc-image">

                              <br>
                         </div>
                    </div>

                    <div class="col-lg-9 col-md-9 col-xs-12">
                         <form  method="post" class="form">
                              <h2><?php echo $row['job_title']; ?></h2>

                              <p class="lead"><strong class="text-primary"><?php echo $row['salary']; ?></strong> <small> per month</small></p>

                              <p class="lead">
                                 
                                   <i class="fa fa-map-marker"></i><?php echo $row['location']; ?>&nbsp;&nbsp;
                                  
                                   <i class="fa fa-file"></i> <?php echo $row['job_type']; ?>
                              </p>

                              
                         </form>
                    </div>
               </div>

               <div class="panel panel-default">
                    <div class="panel-heading">
                         <h4>Job Description</h4>
                    </div>

                    <div class="panel-body">
                         <p><?php echo $row['job_details']; ?> </p>
                       

                         <h4>Qualifications:</h4>
                         <p><?php echo $row['graduation']; ?><br>
                         <?php echo $row['spex']; ?></p>

                         <h5>Last Date to Apply:</h5>
                         <p><?php echo $row['last_date']; ?><br>
                    </div>
               </div>

               <div class="panel panel-default">
                    <div class="panel-heading">
                         <h4>About Company</h4>
                    </div>

                    <div class="panel-body">
                         <p><?php echo $row['about_comp']; ?></p> 

                         <div class="row">
                              <div class="col-lg-6">
                                   
                              </div>

                              <div class="col-lg-6">
                                   
                              </div>
                         </div>
<?php   
$uid = $row['eno'];
$query2 = "SELECT user_name,email,blog from users where user_id = '$uid'";
$result2 = mysqli_query($con,$query2);
if($result2)
               {
                    
                    $row2 = mysqli_fetch_assoc($result2);         
     ?>

                         <div class="row">
                              <div class="col-md-6">
                                   <p>
                                        <span> Company Name: </span>

                                        <br>

                                        <strong><?php echo $row2['user_name']; ?></strong>
                                   </p>
                              </div>


                         <div class="row">
                              <div class="col-md-6">
                                   <p>
                                        <span>Email</span>

                                        <br>

                                        <strong><a href="mailto:<?php echo $row2['email']; ?>"><?php echo $row2['email']; ?></a></strong>
                                   </p>
                              </div>
                             
                              <div class="col-md-6" >
                              <p>
                                        <span style="padding-left:15px">    Website</span>

                                        <br>

                                        <strong><a style="padding-left:15px" href="http://<?php echo $row2['blog']; ?>"><?php echo $row2['blog']; ?></a></strong>
                                   </p>
                              </div>
                         </div>
<?php   }else {
                    echo "Fail!";
                    echo "Error: " . $query . "<br>" . $con->error;
               } ?>
                         <p style="padding-left:15px">
                              <span >City</span>

                              <br>

                              <strong><?php echo $row['location']; ?></strong>
                         </p>
                    </div>
               </div>
          </div><form method="post">
               <div class="clearfix">
                    <input type="submit" class="section-btn btn btn-primary pull-left" name="apply_btn" value="Apply for this job"></input></form>
                <br>    <label for="error_msg" style="color:red;" name="error_txt"><?php echo $error_txt; if(!empty($_POST['error_txt'])) echo $_POST['error_txt'];?> </label>
                
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