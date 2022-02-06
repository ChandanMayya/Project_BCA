<?php 
session_start();

     include("../connection.php");
     include("../functions.php");
     include("../mail.php");

     $user_data = check_login($con);
     if(!($user_data['acnt_type']==='admin'))
     {
          $_SESSION['error_src'] = 'admin';  
          header("Location:../login.php");
     }
     
     $username = "";
     $id = "";
     $mail = "";
     $qualification= "";
     $select_id = "";
     $errortxt = "";


     $query6 = "SELECT num,job_num from aspirants where viewed is false";
     $result6 = $con->query($query6);

     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['notify_emp']))
     {
        while($row6=mysqli_fetch_assoc($result6)) {
            $jnum = $row6['job_num'];   
            $query7 = "SELECT eno from jobs where job_num='$jnum'";
            $result7 = mysqli_query($con,$query7); 
            $row7 = mysqli_fetch_assoc($result7);
            $eno = $row7['eno'];
            $query8 = "SELECT user_name,email from users where user_id = '$eno'";
            $result8 = mysqli_query($con,$query8); 
            $row8 = mysqli_fetch_assoc($result8);

            $mailid = $row8['email'];
            $name =$row8['user_name'];
            $sub = "You Have new Applications!";
            $bdy = "Visit our website to view the new applications for your job posting!";
            mailer($mailid,$name,$sub,$bdy);

            $query9 = "Update aspirants set viewed = b'1'";
            $result9 = mysqli_query($con,$query9);
            if($result9)
            {
                 $errortxt= "Updated";
            }else{
                 $errortxt = "I believe some error in updation!";
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

     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/owl.carousel.css">
     <link rel="stylesheet" href="../css/owl.theme.default.min.css">

     
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../css/style.css">
     <link rel="stylesheet" href="../css/table.css">
  <!--   <link rel="stylesheet" href="css/login.css">-->

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
                         <li><a href="../admin.php" class="active">Admin Home</a></li>
                       <li><a href="../account.php">Account</a></li>
                    </ul>
               </div>

          </div>
     </section>

    <!-- Main PArt-->
    <div class="container">
          <div class="imgcontainer">
               <img src="../images/aspirant.png" alt="Avatar" class="avatar">
          </div>
          <h2 style="text-align:center;">NEW ASPIRANT LIST</h2>
         <form class="formcontainer" method="POST">
         <div class="logincontainer">
         

               <form method="POST">
               <h3>New Aspirants to be notified</h3>
                <table border=2px class="styled-table">
               <tr><Th>Application Number</th>
               <th>Job Number</th>
               <th>Job Title</th>
               <th>Employer</th>
              <!-- <th>Qualifications--></th> </tr>
              <?php 
               while($row6=mysqli_fetch_assoc($result6)) {
                $jnum = $row6['job_num'];   
                $query7 = "SELECT job_title,eno from jobs where job_num='$jnum'";
                $result7 = mysqli_query($con,$query7); 
                $row7 = mysqli_fetch_assoc($result7);
                ?>
               <tr>
               <td> <?php echo $row6['num']; ?></td>
               <td> <?php echo $row6['job_num']; ?></td>
               <td> <?php echo $row7['job_title']; ?></td>
               <td> <?php echo $row7['eno']; ?></td> 
               </tr> 
               <?php } ?>
               </table>    
               <br><br>
               <div class="logincontainer" style="background-color:#f1f1f1">
                    <h5>Click the below button to send the notifications to the Employers</h5>
                    <input type="submit" name="notify_emp" class="btn btn-primary" value="Mail Details">    
                    <label for="error_msg" style="color:red;"><?php echo $errortxt; ?></label>   
               </div>
          </form>
     </div>
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


     <!-- SCRIPTS -->
     <script src="../js/jquery.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <script src="../js/owl.carousel.min.js"></script>
     <script src="../js/smoothscroll.js"></script>
     <script src="../js/custom.js"></script>

</body>
</html>