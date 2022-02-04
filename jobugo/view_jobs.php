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

     $username = "";
     $id = "";
     $mail = "";
     $qualification= "";
     $select_id = "";
     $errortxt = "";

     $sql = "SELECT job_title,job_num,eno FROM jobs";
     $result = $con->query($sql);

     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['del_id'])) 
     { $select_id =  $_POST['del_id'];     }

     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['del_acnt'])){
          $sql2 = "SELECT * from aspirants where job_num = '$_POST[del_id]'";
          $result2 = mysqli_query($con,$sql2);
          if(mysqli_num_rows($result2) != 0){
               $sql4 = "SELECT * from jobs WHERE job_num='$_POST[del_id]'";
                    $result4 = mysqli_query($con,$sql4);
                    if(mysqli_num_rows($result4) != 0) {
                 $sql3 = "DELETE FROM aspirants WHERE job_num = '$_POST[del_id]'";
               if (mysqli_query($con, $sql3)) {        
                    $sql = "DELETE FROM jobs WHERE job_num='$_POST[del_id]'"; 
                    if (mysqli_query($con, $sql)) {
                         $errortxt = "Record deleted successfully";
                    }else{   $errortxt = "Error deleting record: " . $con->error;      }
               }else{$errortxt= "No Such Records!";}
               }else{echo "error in deleting aspirants..".$con->error;}
          }else{
               $sql4 = "SELECT * from jobs WHERE job_num='$_POST[del_id]'";
               $result4 = mysqli_query($con,$sql4);
               if(mysqli_num_rows($result4) != 0) {
                    $sql = "DELETE FROM jobs WHERE job_num='$_POST[del_id]'"; 
                    if (mysqli_query($con, $sql)) {
                         $errortxt = "Record deleted successfully";
                    }else{  $errortxt = "Error deleting record: " . $con->error;   }
               }else{$errortxt= "No Such Records!";}
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
               <img src="images/vacancy.png" alt="Avatar" class="avatar">
          </div>
          <h2 style="text-align:center;">JOBS LIST</h2>
         <form class="formcontainer" method="POST">
         <div class="logincontainer">
         <p align=center>Click once upon the <span style="color:#2bcaff"> job number</span> to copy</p>
          <table border=2px class="styled-table">
               <tr><Th>Job Num</th>
               <th>Name</th>
               <th>Company</th></tr>
               <tr><?php   while($row=mysqli_fetch_assoc($result)) { ?>
                    <td onclick="copy(this)"><?php echo $row['job_num']; ?></td>
                    <td><?php echo $row['job_title']; ?></td>
                    <td><?php $query="SELECT user_name FROM users where user_id='$row[eno]'"; $res=mysqli_query($con,$query); $ro = mysqli_fetch_assoc($res); echo $ro['user_name']; ?></td>
               </tr> <?php } ?>
               </table>
               <br><br>
               <h3>Enter the ID of the Job to delete record </h3>
               <input type="text" name="del_id" required  />
               <input type="submit" name="del_acnt" class="btn btn-primary" value="Delete"><label for="error_msg" style="color:red;"><?php echo $errortxt; ?></label>
               <p style="color:blue;">Once you delete the job, you wont be able to access the aspirant list of that job you deleted, so think twice before deleting the job</p>
               
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