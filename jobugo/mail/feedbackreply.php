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

if(!$_SESSION['accounttype'] === 'admin'){
     header("Location: noaccountalert.php");
}
$username = "";
$id = "";
$mail = "";
$qualification= "";
$select_id = "";
$errortxt = "";
$ano;
$deftxt = "Your response means a lot.. Thank You!";

$sql = "SELECT * FROM feedback";
$result = $con->query($sql);

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['send_tq'])){
     if(isset($_POST['emailer']))     {
          $num = $_POST['emailer'];                    
          $query3="SELECT ano,emailid FROM feedback where num='$num'";
          $result3=mysqli_query($con,$query3); 
          $row3 = mysqli_fetch_assoc($result3);
          if(mysqli_num_rows($result3) != 0) {
               $ano = $row3['ano'];
               $mailid = $row3['emailid'];
               $query4 = "select user_name,email from users where user_id ='$ano'";
               $result4 = mysqli_query($con,$query4);
               if($result4)          {
                    $row4 = mysqli_fetch_assoc($result4); 

                    $name = $row4['user_name'];
                    $sub = "Thank You for your Feedback!";
                    if(isset($_POST['reply_content'])){
                         $bdy = $_POST['reply_content'];
                    }
                    mailer($mailid,$name,$sub,$bdy);
                    $query5 = "update feedback set viewed = b'1' where num='$num'";
                    $result5 = mysqli_query($con,$query5);
                    if($result5){
                         header("Location:feedbackreply.php");
                    }else{ $errortxt = "Some error in updating!";    }
               }else{ $errortxt = "No Resords with provided ID";   }
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

     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/owl.carousel.css">
     <link rel="stylesheet" href="../css/owl.theme.default.min.css">

     
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../css/style.css">
     <link rel="stylesheet" href="../css/table.css">
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
                         <li><a href="../admin.php" class="active">Admin Home</a></li>
                       <li><a href="../account.php">Account</a></li>
                    </ul>
               </div>

          </div>
     </section>

    <!-- Main PArt-->
    <div class="container">
          <div class="imgcontainer">
               <img src="../images/feedbacks.png" alt="Avatar" class="avatar">
          </div>
          <h2 style="text-align:center;">NEW FEEDBACKS LIST</h2>
         <form class="formcontainer" method="POST">
         <div class="logincontainer">
         <p align=center>Click once upon the  FeedBack Number<span style="color:#2bcaff"> (FD Number)</span> to copy</p>
          <table border=2px class="styled-table">
               <tr><Th>FD Number</th>
               <th>Account Number</th>
               <th>Name</th>
               <th>Email-ID</th>
               <th>FeedBack</th>
               <th>New</th></tr>
               <tr><?php   while($row=mysqli_fetch_assoc($result)) { ?>
                    <td  onclick="copy(this)"><?php echo $row['num']; ?></td>
                    <td><?php echo $row['ano']; ?></td>
                    <td><?php $query="SELECT user_name FROM users where user_id='$row[ano]'"; $res=mysqli_query($con,$query); $ro = mysqli_fetch_assoc($res); echo $ro['user_name']; ?></td>
                 
                    <td><?php echo $row['emailid']; ?></td>
                    <td><?php echo $row['fdcontent']; ?></td>
                    <td><?php if($row['viewed'] == b'0'){ echo "Yes";}else{echo "No";} ?></td></tr>
                    <?php } ?>
                  
               </table>
               <br><br>
               <div class="logincontainer" style="background-color:#f1f1f1;">
                    <h3>Enter the FD Number to send Response </h3>
                    <input type="text" name="emailer" required  />
                    <textarea id="reply_content" name="reply_content" rows="2" cols="126"><?php echo $deftxt; ?></textarea>
                    <br><br>
                    <input type="submit" name="send_tq" class="btn btn-primary" value="sendtq">
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