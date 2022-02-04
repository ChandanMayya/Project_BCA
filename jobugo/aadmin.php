<?php 
session_start();

	include("connection.php");
	include("functions.php");
     //error_reporting(0);

     $user_data = check_login($con);
     if(!($user_data['acnt_type']==='admin'))
     {   
          $_SESSION['error_src'] = 'admin';  
          header("Location:../login.php");     
     }
     $error_string = "";
     $uid;
     $query4 = "SELECT user_id from users order by user_id desc LIMIT 1";
     $result4 = mysqli_query($con,$query4);
     if($result4){
          do{
               $row4=mysqli_fetch_assoc($result4); 
               $uid=(int)$row4['user_id'];
          }while(0);
     }else{$error_string = $con->error;}
     $uid++;

     if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = ($_POST['uname']);
		$password = ($_POST['psw']);
          $password_rep = ($_POST['psw-repeat']);
          $mail = ($_POST['email']);
          $acnt_type = 'admin';

          if($acnt_type == 'admin')
          {
               $query = "SELECT user_name FROM users WHERE user_name='$user_name'";
               $junga = mysqli_query($con, $query);
               if (mysqli_num_rows($junga) != 0) {
                    $error_string = "Username already exists";
               } else if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
                    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                         if(strlen($password)>5){
                              if( preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $password) ) { 
                                   if($password == $password_rep){
                                        if(strlen($user_name)>4){
                                             $query = "insert into users (user_id,user_name,email,password,repeat_password,acnt_type) values ('$uid','$user_name','$mail','$password','$password_rep','$acnt_type')";
                                             $res = mysqli_query($con, $query);
                                             if($res){ $error_string="Account Added Successfully";   
                                             }else{$error_string="Some error in inserting..";}
                                        }else{    $error_string = "Username must contain at least 5 characters!";} 
                                   }else{    $error_string = "Passwords DoNot Match!";    }
                              }else{     $error_string =  "The password doesnot contain both alphabets and numbers!";}
                         }else{   $error_string =  "Password less than 5 characters";     }
                    }else{    $error_string =  "Please Enter Valid Email ID!<br>";     }
               }else{    $error_string = "Please enter some valid information!";    }
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
                         <li><a href="admin.php" class="active">Admin Home</a></li>
                         <li><a href="account.php">Account</a></li>
                    </ul>
               </div>

          </div>
     </section>

    <!-- Main PArt-->
    <section>
          <div class="container">
               <form method = "post" class="formcontainer">
                    <div class="imgcontainer">
                        <img src="images/user.png" alt="Avatar" class="avatar">
                    </div>
                    <div class="logincontainer">
                         <h2 style="text-align: center;">ADD NEW ADMIN</h2>
                         <p>Please fill in this form to add a new Admin.</p>
                         <hr>
                         <br>
                         
                         <label for = "uname"><b>User Name</b></label>
                         <input type = "text" placeholder = "Enter new admin User Name" name = "uname" required>
               
                         <label for="email"><b>Email</b></label>
                         <input type="text" placeholder="Enter Email" name="email" required>
                         
                         <label for="psw"><b>Password</b></label>
                         <input type="password" placeholder="Enter Password" name="psw" required>
                         
                         <label for="psw-repeat"><b>Repeat Password</b></label>
                         <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
                         <br><br><br>
                         
                         <div class="logincontainer" style="background-color:#f1f1f1">              
                              <button type="submit" class="btn-grad"> Create Account </button>
                              <input class="cancelbtn" type="button" value="cancel" onClick="document.location.href='admin.php'" />
                              <label for="error_msg" style="color:red;"><?php echo $error_string; ?></label>
                         </div>
                    </div>
               </form>
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