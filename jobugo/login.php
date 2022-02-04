<?php 

session_start();

  include("connection.php");
  include("functions.php");

  $error_string = "";

  $_SESSION['loopcounter'] = 0;
  $_SESSION['flag'] = 8;
  $_SESSION['fcounter'] = 0;
  $_SESSION['filter'] = "0000"; 
  $user_data['acnt_type'] = "Null";     //these 4 session variables will be used in job listing page

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted
    $user_name = $_POST['uname'];
    $password = $_POST['psw'];
    $acnt_type = $_POST['accnt_select'];
    $error_string;
    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {

      $_SESSION['accounttype'] = $acnt_type;
      if($acnt_type == 'admin')
          {
      //read from database
      $query = "select * from users where user_name = '$user_name' limit 1";                 // ADMIN table name is users
      $result = mysqli_query($con, $query);

      if($result)
      {
        if($result && mysqli_num_rows($result) > 0)
        {

          $user_data = mysqli_fetch_assoc($result);
          
          if($user_data['password'] === $password && $user_data['acnt_type'] === $acnt_type)
          {

            $_SESSION['user_id'] = $user_data['user_id'];
            header("Location: admin.php");
            die;
          }else{ $error_string = "Wrong Username or Password";}
        }
      }if ($user_data['acnt_type'] != $acnt_type) {
          $error_string = "wrong type";
     } else {
          $error_string ="Wrong User name or password";
     }
    } else if($acnt_type == 'aspirant') {
          $query = "select * from users where user_name = '$user_name' limit 1";
          $result = mysqli_query($con, $query);
    
          if($result)
          {
            if($result && mysqli_num_rows($result) > 0)
            {
    
              $user_data = mysqli_fetch_assoc($result);
              
              if($user_data['password'] === $password && $user_data['acnt_type'] === $acnt_type)
              {
    
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");
                die;
              }else{ $error_string = "Wrong Username or Password";} 
            }
          }
          if ($user_data['acnt_type'] != $acnt_type) {
               $error_string = "wrong type";
          } else {
            $error_string="Wrong User name or password!";
          }
              
         } else if($acnt_type == 'employer') {
          $query = "select * from users where user_name = '$user_name' limit 1";
          $result = mysqli_query($con, $query);
    
          if($result)
          {
            if($result && mysqli_num_rows($result) > 0)
            {
    
              $user_data = mysqli_fetch_assoc($result);
              
              if($user_data['password'] === $password && $user_data['acnt_type'] === $acnt_type)
              {    
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: employerh.php");
                die;
              } else{ $error_string = "Wrong Username or Password";}
            }
          }
          if ($user_data['acnt_type'] != $acnt_type) {
               $error_string="Wrong type!";
          } else {
            $error_string="Wrong User name or password!";
         }
          
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
    <section>
          <div class="container" style="padding-top:-100px;">
            <form method="post" class="formcontainer">
                <div class="imgcontainer">
                  <img src="images/user.png" alt="Avatar" class="avatar">
                </div>
              
                <div class="logincontainer">
                    <h2 ALIGN="CENTER" style="font-family: 'Nunito', sans-serif;">LOGIN</h2>
                  <label for="uname"><b>User Name</b></label>
                  <input type="text" placeholder="Enter User Name" name="uname" required value="<?php if(!empty($_POST['uname'])) echo $_POST['uname'];?>">
              
                  <label for="psw"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="psw" required>
              

                  <br><br>

                  <label for="accnt_select">Select the Account Type:</label> &nbsp;
                  <select name="accnt_select" id="accnt_type" required>
                    <option value="">--Click Here--</option>
                    <option value="admin">Admin</option>
                    <option value="aspirant">Aspirant</option>
                    <option value="employer">Employer</option>
                  </select>
                  <br><br>
                  <br>
                  
                </div>

                <div class="logincontainer" style="background-color:#f1f1f1">
                
              
                  <button type="submit" class="btn-grad">Login</button>
                  <input class="cancelbtn" type="button" value="cancel" onClick="document.location.href='index.html'" />
                  <label for="error_msg" style="color:red;"><?php echo $error_string; ?></label>
                  <span class="psw">|<a href="reception.php">&nbsp;Create Account </a></span>
                  <span class="psw">&nbsp; <a href="forgot_psw_account_select.php">Forgot password?&nbsp;</a></span>                  
                </div>
              </form>
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
                                        <li><a href="index.html">Home</a></li>
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