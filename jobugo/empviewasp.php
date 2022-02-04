<?php 
session_start();

     include("connection.php");
     include("functions.php");

     $ano;
     $job_num;
     $count = 1;
     $errortxt = "";
 
     $user_data = check_login($con);
     if(!($user_data['acnt_type']==='employer'))
     { 
          $_SESSION['error_src'] = 'emp'; 
          header("Location:noaccountalert.php");    
     }

     if($user_data['valid'] == false){
          header("Location:empnotverified.php");
     }         
     
     $eno = $user_data['user_id'];
     $sql1 = "SELECT job_num,job_title from jobs where eno='$eno'";
     $result1 = mysqli_query($con,$sql1);     
    
     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['del_id']))      {
          $select_id =  $_POST['del_id'];
          $_SESSION['sel_id'] = $select_id;
     }

     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['del_acnt']))     {
          $sql4 = "SELECT * from aspirants WHERE num='$_POST[del_id]'";
          $result4 = mysqli_query($con,$sql4);
          if(mysqli_num_rows($result4) != 0) {
               $sql = "DELETE FROM aspirants WHERE num='$_POST[del_id]'"; 
               if (mysqli_query($con, $sql)) {  $errortxt = "Record deleted successfully";
               } else {  $errortxt = "Error deleting record: " . $con->error;         }
          }else{$errortxt= "No Such Records!";}
     }

     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['view_doc']))
     {   
          $sql4 = "SELECT * from aspirants WHERE num='$_POST[del_id]'";
          $result4 = mysqli_query($con,$sql4);
          if(mysqli_num_rows($result4) != 0) {
               header("Location:view.php");     
          }else{$errortxt= "No Such Records!";}
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

     <script>
     function copy(that){
          var inp =document.createElement('input');
          document.body.appendChild(inp)
          inp.value =that.textContent
          inp.select();
          document.execCommand('copy',false);
         
          inp.remove();
          
     }
     </script>

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
                         <li><a href="ajobs.php">Add Jobs</a></li>
                         <li><a href="yjobs.php">Your Jobs</a></li>
                         <li class="active"><a href="empviewasp.php">View Aspirants</a></li>
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
    <div class="container">
          <div class="imgcontainer">
               <img src="images/aspirant.png" alt="Avatar" class="avatar">
          </div>
          <h2 style="text-align:center;">ASPIRANTS APPLIED FOR YOUR JOB</h2>
          <form class="formcontainer" method="POST">
               <div class="logincontainer">
                    <p align=center>Click once upon the <span style="color:#2bcaff">aspirant number</span> to copy</p>
                    <table border=2px class="styled-table">
                         <tr>
                              <th>Sl No.</th>
                              <Th>Job Num</th>
                              <th>Job Name</th>
                              <th>Aspirant  Num</th>
                              <th>Aspirant  Name</th>
                              <th>Email ID</th>
                         </tr>
                          <tr>
                              <?php   
                                   if($result1){
                                        while($row1=mysqli_fetch_assoc($result1)){
                                             $job_num = $row1['job_num'];
                                             $sql2 = "SELECT ano,num,job_num FROM aspirants where job_num='$job_num'";
                                             $result2 = $con->query($sql2);
                                             while($row2=mysqli_fetch_assoc($result2)){
                                                  $ano = $row2['ano'];
                                                  $sql3="SELECT user_name,email,conf_doc from users where user_id='$ano'";
                                                  $result3=mysqli_query($con,$sql3);
                                                  $row3=mysqli_fetch_assoc($result3);  ?>
                                                  <td><?php echo $count;  ?></td>
                                                  <td ><?php echo $row1['job_num']; ?></td>
                                                  <td><?php echo $row1['job_title']; ?></td>
                                                  <td onclick="copy(this)"><?php echo $row2['num']; ?></td>
                                                  <td><?php echo $row3['user_name']; ?></td>
                                                  <td><?php echo $row3['email']; ?></td>
                 
                          </tr> <?php 
                                                   $count++;
                                             }
                                        }               
                                   }?>
                    </table>
                    <br><br>
                    <h3>Enter the aspirant number View CV/resume or delete record </h3>
                    <input type="text" name="del_id" required id="disp_id" />
                    <input type="submit" name="del_acnt" class="btn btn-primary" value="Delete">
                    <input type="submit" name="view_doc" class="btn btn-primary" value="View CV / Resume" id="view_doc">  
                    <label for="error_msg" style="color:red;"><?php echo $errortxt; ?></label>
               </div>  
          </form> 
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