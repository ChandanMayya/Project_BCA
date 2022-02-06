<?php 
session_start();

     include("connection.php");
     include("functions.php");
  
     $user_data = check_login($con);
     if(!($user_data['acnt_type']==='admin'))
     {    
          $_SESSION['error_src'] = 'admin';  
          header("Location:noaccountalert.php");   }
     
     $username = "";
     $id = "";
     $mail = "";
     $count = 1;
     $qualification= "";
     $select_id = "";
     $errortxt = "";

     $sql = "SELECT user_name,user_id,email,valid FROM users where acnt_type='employer' AND viewed = 1";
     $result = $con->query($sql);

     $sql2 = "SELECT user_name,user_id,email,valid FROM users where acnt_type='employer' AND viewed = 0";
     $result2 = $con->query($sql2);

     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['del_id'])) 
     {    $select_id =  $_POST['del_id'];     }

     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['del_acnt'])) {
          $sql6 = "SELECT * from jobs where eno='$_POST[del_id]'";
          $result6 = mysqli_query($con,$sql6);
          if(mysqli_num_rows($result6) != 0){
               $errortxt = "Error! Delete the Job posted to this account and then delete account.";
          }else{  
               $sql4 = "SELECT * from users WHERE user_id='$_POST[del_id]'";
               $result4 = mysqli_query($con,$sql4);
               if(mysqli_num_rows($result4) != 0) {
                    $sql = "DELETE FROM users WHERE user_id='$_POST[del_id]'";
                    if (mysqli_query($con, $sql)) {
                         $errortxt = "Record deleted successfully";
                    } else  {  $errortxt =  "Error deleting record: ";    }
               }else{$errortxt= "No Such Records!";}
           }
     }
     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['view_btn'])){
          $_SESSION['sel_id'] = $select_id;
          $sql4 = "SELECT * from users WHERE user_id='$_POST[del_id]'";
          $result4 = mysqli_query($con,$sql4);
          if(mysqli_num_rows($result4) != 0) {
               header("Location:viewdocemp.php"); 
               $sql5 = "UPDATE users set viewed = b'1' where acnt_type='employer' AND viewed = 0";
               if (mysqli_query($con,$sql5)) {    $errortxt =  "Updated";
               } else 
               {    $errortxt =  "Error updating: ";     }
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
                         <li><a href="admin.php" class="active">Admin Home</a></li>
                       <li><a href="account.php">Account</a></li>
                    </ul>
               </div>
          </div>
     </section>

    <!-- Main PArt-->
    <div class="container">
          <div class="imgcontainer">
               <img src="images/employer.png" alt="Avatar" class="avatar">
          </div>
          <h2 style="text-align:center;">EMPLOYER ACCOUNTS</h2>
         <form class="formcontainer" method="POST">
         <div class="logincontainer">
         <p align=center>Click once upon the <span style="color:#2bcaff"> employer number</span> to copy</p>
          <table border=2px class="styled-table">
               <tr>
                    <th>Sl No.</th>
               <Th>Employer ID</th>
               <th>Name</th>
               <th>Mail ID</th>
               <th>New</th>
               <th>Confirmed</th>
              </tr>
               <tr><?php   while($row=mysqli_fetch_assoc($result)) {   ?>
                    <td><?php echo $count; ?>
                    <td onclick="copy(this)"><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                    <td><?php if($row['valid'] == b'1'){ echo "Yes";}else{echo "No";} ?></td>
               </tr> <?php $count++; } ?>
               <tr><?php   while($row2=mysqli_fetch_assoc($result2)) { ?>
                    <td><?php echo $count; ?>
                    <td onclick="copy(this)"><?php echo $row2['user_id']; ?></td>
                    <td><?php echo $row2['user_name']; ?></td>
                    <td><?php echo $row2['email']; ?></td>            
                    <td>YES</td>               
                    <td><?php if($row2['valid'] == b'1'){ echo "Yes";}else{echo "No";} ?></td>                        <!-- Also impliment the read the blob file -->
               </tr> <?php } ?>                                         <!-- Impliment view aspirants for employer with read blob file.. try to make it downloadable  -->
               </table>
               <br><br>
               <h3>Enter the ID of the Employer to Admit or Delete record </h3>
               <input type="text" name="del_id" required  />
               <input type="submit" name="del_acnt" class="btn btn-primary" value="Delete">
               <input type="submit" name="view_btn" class="btn btn-primary" value="View Document">
               <label for="error_msg" style="color:red;" name="errortxt"><?php echo $errortxt; if(!empty($_POST['errortxt'])) echo $_POST['errortxt'];?> </label>  
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