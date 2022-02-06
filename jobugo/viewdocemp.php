<?php

session_start();
include("connection.php");
include("functions.php");
include("mail.php");

$user_data = check_login($con);
$errortxt = "";
if(!($user_data['acnt_type']==='admin'))
{
    $_SESSION['error_src'] = 'admin';  
    header("Location:noaccountalert.php");
}

$num = $_SESSION['sel_id'];
  
    $query2 = "SELECT * from users where user_id='$num'";
    $result2 = mysqli_query($con,$query2);
    if($result2){
        $row2 = mysqli_fetch_assoc($result2);
      
    ?>
<html>
    <head>
    <title>The Online Job Protal</title>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<style>
    .btn-grad {background-image: linear-gradient(to right, #314755 0%, #26a0da  51%, #314755  100%)}
  .btn-grad {
     margin: 10px;
     padding: 14px 24px;
     text-align: center;
     text-transform: uppercase;
     transition: 0.5s;
     background-size: 200% auto;
     color: white;            
     box-shadow: 0 0 20px #eee;
     border-radius: 10px;
     display:inline-block;
     cursor: pointer; 
   }
   .btn-grad:hover {
     background-position: right center; /* change the direction of the change here */
     color: #fff;
     text-decoration: none;
   }
   form {
   display:inline;
   margin:0;
   padding:0;
}
   </style>
</head>
           <body>
           <object data="data:application/pdf;base64,<?php echo base64_encode($row2['conf_doc']) ?>" type="application/pdf" style="height:650px;width:100%"></object>
           <div style=" display: inline-block;">
           <form method="post">
            <?php if($row2['valid'] == false){ ?>
              
               <input  type="submit" class="btn-grad" name="confirm_btn" value="Confirm" /></form>
               <?php } ?>
               <label for="error_msg" style="color:red;"><?php echo $errortxt; ?></label></div>
    </body>
    </html>
<?php

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['confirm_btn'])){
    $sql4 = "update users set valid = b'1' where user_id='$num'";
          if (mysqli_query($con, $sql4)) {
                $errortxt = "Record validated successfully";
                $sub = "Welocme to Jobugo!";
                $bdy = "Congrats, your account have been activated!";
                $mailid = $row2['email'];
                $name = $row2['user_name'];
                mailer($mailid,$name,$sub,$bdy);
               //header("Location:view_employers.php"); 
          } else 
          { $errortxt = "Error in validation.. Try again";  }
        }
}
?> 