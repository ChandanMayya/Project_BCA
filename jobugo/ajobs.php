<?php 
session_start();

	include("connection.php");
	include("functions.php");

     $error_string = "";
     $user_data = check_login($con);
     if(!($user_data['acnt_type']==='employer'))
     {  
          $_SESSION['error_src'] = 'emp';  
          header("Location:noaccountalert.php"); 
     }
     if($user_data['valid'] == false){
          header("Location:empnotverified.php");
     }

     if($_SERVER['REQUEST_METHOD'] == "POST")
	{                   
		$jtitle = $_POST['jtitle'];                       
          $location = $_POST['loc']; 
          $jtype;                  
          if($_POST['jtype'] == "full_time"){$jtype="full_time";}else if($_POST['jtype'] == "part_time"){$jtype="part_time";}
          $qual = $_POST['qualification'];
          $graduation = $_POST['degree'];
          $specialisation = $_POST['spex'];
          $salary = $_POST['sal'];
          $jdetails = $_POST['jdetails'];
          $date = $_POST['ldate'];
          $comp_details = $_POST['comp_details'];

          if(!empty($jtitle) && !empty($location) && !empty($jdetails) && is_numeric($salary)){
               $eno = $_SESSION['user_id'];
               $query = "insert into jobs (ENO,JOB_TITLE,JOB_DETAILS,LOCATION,SALARY,job_type,qualifications,graduation,spex,last_date,about_comp) values ('$eno','$jtitle','$jdetails','$location','$salary','$jtype','$qual','$graduation','$specialisation','$date','$comp_details')";
               if($res = mysqli_query($con, $query)){
                    echo "DONE";
                    $_SESSION['source'] = 'jadded';
		          header("Location: success.php");
               }else{echo $con->error;}
          }else{$error_string = "Please enter some valid information!";}
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
                         <li><a href="employerh.php">Home</a></li>
                         <li class="active"><a href="ajobs.php">Add Jobs</a></li>
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
                         <li><a href = "account.php"><b>Hello <?php echo $user_data['user_name']; ?></a></li>
                    </ul>
               </div>
          </div>
     </section>

    <!-- Main PArt-->
    <section>
          <div class="container">
               <form class="formcontainer" method="POST">
                    <div class="imgcontainer" > 
                        <img src="images/vacancy.png" alt="Avatar" class="avatar">
                    </div>
                    <div class="logincontainer">
                         <h2 style="text-align: center;">ADD JOB</h2>
                         <hr>
                         <label for="jtitle"><b></b>Job Title: </b></label><br>
                         <input type="text" placeholder="Enter Job Title" name="jtitle" required>   
                         <br>

                         <label for="loc"><b>Location</b></label>
                         <input type="text" placeholder="Enter location" name="loc" required>
                         <br><br>

                         <label for="jtype">Select the Job Type:</label> &nbsp;
                         <select name="jtype" id="jtype" required>
                              <option value="">--Click Here--</option>
                              <option value="full_time">Full Time</option>
                              <option value="part_time">Part Time</option>
                         </select>         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                         <label for="qualification">Select the Qualifications:</label> &nbsp;
                         <select name="qualification" id="qualification" required>
                              <option value="">--Click Here--</option>
                              <option value="ug">Under Graduate</option>
                              <option value="pg">Post Graduate</option>
                         </select>       &nbsp;&nbsp;
               
                         <label for="degree">Select the Graduation:</label> &nbsp;
                         <select name="degree" id="degree" required>
                              <option value="">--Click Here--</option>
                              <option value="BCA">BCA</option>
                              <option value="BSc">BSc</option>
                              <option value="BCom">BCom</option>
                              <option value="BBA">BBA</option>
                              <option value="BE">BE</option>
                              <option value="MCA">MCA</option>
                              <option value="MSc">MSc</option>
                              <option value="MCom">MCom</option>
                              <option value="MBA">MBA</option>
                              <option value="BTec">BTec</option>
                              <option value="MTec">MTec</option>
                         </select>           
                         <br><br>    

                         <label for="specx"><b>Any other specifications for Graduation</b></label>
                         <input type="text" placeholder="Enter educational specialisations if necessary (Example: BCA Cloud Computing)" name="spex">

                         <label for="sal"><b>Salary (Per month)</b></label>
                         <input type="text" placeholder="Enter Salary" name="sal" required>

                         <br>
                         <label for="jdetails"><b>Job Details</b></label><br>
                         <textarea id="jdetails" name="jdetails" rows="2" cols="131" placeholder="Enter Details of your job vacancy" required></textarea>

                         <br>
                         
                         <br>
                         <label for="comp_details"><b>Company Details</b></label><br>
                         <textarea id="comp_details" name="comp_details" rows="2" cols="131" placeholder="Enter Details of your job vacancy" required></textarea>
                         
                         <br><br>

                         <label for="ldate"><b>Last Date to Apply:</b></label>&nbsp; &nbsp;   
                         <input type="date" id="lastdatetoaply" name="ldate" required>

                         <br><br>
                    </div>
                    <div class="logincontainer" style="background-color:#f1f1f1">             
                         <button type="submit" class="btn-grad"> Submit </button>
                         <input class="cancelbtn" type="button" value="cancel" onClick="document.location.href='employerh.php'" />
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
                                        <li><a href="employerh.php">Home</a></li>
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