<?php 

ini_set('session.cache_limiter','public');    //to prevent
session_cache_limiter(false);                 //expiring of the document when came back to this page

session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
$error_string = "";

$count = 0;

$query4 = "update jobs set selected = b'0' where selected is true";
if(!(mysqli_query($con,$query4))){
     $error_string = "Some error in updating";
}


if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['viewdetails1']))
{
     //transferring job number from job listings to display details of the selected job in job details
          if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn1'])){
               $jnum = $_POST['btn1'];
               $query2 = "UPDATE jobs set selected = b'1' where job_num='$jnum'";
               if(mysqli_query($con,$query2))
          {
               header("Location:job-details.php");
          }
          }
      }
 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['viewdetails2']))
     {
           //transferring job number from job listings to display details of the selected job in job details
          if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn2'])){
               $jnum = $_POST['btn2'];
               $query3 = "UPDATE jobs set selected = b'1' where job_num='$jnum'";
               if(mysqli_query($con,$query3))
               {
                    header("Location:job-details.php");
               }
          }
     }
     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['viewdetails3']))
     {
           //transferring job number from job listings to display details of the selected job in job details
          if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn3'])){
               $jnum = $_POST['btn3'];
               $query3 = "UPDATE jobs set selected = b'1' where job_num='$jnum'";
               if(mysqli_query($con,$query3))
               {
                    header("Location:job-details.php");
               }
          }
     }
     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['viewdetails4']))
     {
           //transferring job number from job listings to display details of the selected job in job details
          if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn4'])){
               $jnum = $_POST['btn4'];
               $query3 = "UPDATE jobs set selected = b'1' where job_num='$jnum'";
               if(mysqli_query($con,$query3))
               {
                    header("Location:job-details.php");
               }
          }
     }
     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['viewdetails5']))
     {
           //transferring job number from job listings to display details of the selected job in job details
          if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn5'])){
               $jnum = $_POST['btn5'];
               $query3 = "UPDATE jobs set selected = b'1' where job_num='$jnum'";
               if(mysqli_query($con,$query3))
               {
                    header("Location:job-details.php");
               }
          }
     }
     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['viewdetails6']))
     {
           //transferring job number from job listings to display details of the selected job in job details
          if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn6'])){
               $jnum = $_POST['btn6'];
               $query3 = "UPDATE jobs set selected = b'1' where job_num='$jnum'";
               if(mysqli_query($con,$query3))
               {
                    header("Location:job-details.php");
               }
          }
     }
     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['viewdetails7']))
     {
           //transferring job number from job listings to display details of the selected job in job details
               if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn7'])){
               $jnum = $_POST['btn7'];
               $query3 = "UPDATE jobs set selected = b'1' where job_num='$jnum'";
               if(mysqli_query($con,$query3))
               {
                    header("Location:job-details.php");
               }
          }
     }
     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['viewdetails8']))
     {
           //transferring job number from job listings to display details of the selected job in job details
          if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn8'])){
               $jnum = $_POST['btn8'];
               $query3 = "UPDATE jobs set selected = b'1' where job_num='$jnum'";
               if(mysqli_query($con,$query3))
               {
                    header("Location:job-details.php");
               }
          }
     }
     if(($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['sort_btn']))||!($_SESSION['filter'] == "0000"))
     {    
          $check11 = 0; $check12 = 0; 
          $check31 = 0; $check32 = 0;
          $jtype1 = "fu"; $jtype2 = "pa";
          $edu_level1 = "ug"; $edu_level2 = "pg";

          if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['check11']))
          {
               $check11 = 1;
          }
          if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['check12']))
          {
               $check12 = 1;
          }
          if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['check31']))
          {
               $check31 = 1;
          }
          if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['check32']))
          {
               $check32 = 1;
          }
 
          if(($check11 == 1 && $check12 == 1 && $check31 == 1 && $check32 == 1 )||($_SESSION['filter'] == "1111")){
               $sql = "SELECT * FROM jobs";   
               $cnt = mysqli_num_rows(mysqli_query($con,$sql));
               $maxcounter = ceil($cnt/8);  
               $_SESSION['filter'] = "1111";                                                                  //     1 1 1 1 

               $sql = "SELECT * FROM jobs ORDER BY job_num desc";
               $result = $con->query($sql); 
               if(!($result)){
                    $error_string = $con->error;
               }
          }

          else if(($check11 == 1 && $check12 == 1 && $check31 == 1 && $check32 == 0)||($_SESSION['filter'] == "1110")){
               $sql="select * from jobs where qualifications = '$edu_level1'";
               $cnt = mysqli_num_rows(mysqli_query($con,$sql));
               $maxcounter = ceil($cnt/8);
               $_SESSION['filter'] = "1110";

               $sql="select * from jobs where qualifications = '$edu_level1' ORDER BY job_num desc";
               $result = $con->query($sql);                                             //C11C12c31!(c32)          1 1 1 0
               if(!($result)){
                    $error_string = $con->error;
               }
          }

          else if(($check11 == 1 && $check12 == 1 && $check31 == 0 && $check32 == 1)||($_SESSION['filter'] == "1101")){
               $sql="select * from jobs where qualifications = '$edu_level2'";
               $cnt = mysqli_num_rows(mysqli_query($con,$sql));
               $maxcounter = ceil($cnt/8);
               $_SESSION['filter'] = "1101";

               $sql="select * from jobs where qualifications = '$edu_level2' ORDER BY job_num desc";
               $result = $con->query($sql);
               if(!($result)){
                    $error_string = $con->error;
               }                                                                            //C11C12!(c31)c32          1 1 0 1
          }
          
          else if(($check11 == 1 && $check12 == 1 && $check31 == 0 && $check32 == 0)||($_SESSION['filter'] == "1100")){                               
               $sql="select * from jobs";   
               $cnt = mysqli_num_rows(mysqli_query($con,$sql));
               $maxcounter = ceil($cnt/8);
               $_SESSION['filter'] = "1100";

               $sql="select * from jobs ORDER BY job_num desc"; 
               $result = $con->query($sql);
               if(!($result)){
                    $error_string = $con->error;
               }
          }

          else if(($check11 == 1 && $check12 == 0 && $check31 == 1 && $check32 == 1)||($_SESSION['filter'] == "1011")){
               $sql="select * from jobs where job_type LIKE '%$jtype1%'";
               $cnt = mysqli_num_rows(mysqli_query($con,$sql));
               $maxcounter = ceil($cnt/8);
               $_SESSION['filter'] = "1011";
              
               $sql="select * from jobs where job_type LIKE '%$jtype1%' ORDER BY job_num desc";
               $result = $con->query($sql);
               if(!($result)){
                    $error_string = $con->error;
               }
          }

          else if(($check11 == 1 && $check12 == 0 && $check31 == 1 && $check32 == 0)||($_SESSION['filter'] == "1010")){
               $sql="select * from jobs where job_type LIKE '%$jtype1%' AND qualifications = '$edu_level1'";
               $cnt = mysqli_num_rows(mysqli_query($con,$sql));
               $maxcounter = ceil($cnt/8); 
               $_SESSION['filter'] = "1010";

               $sql="select * from jobs where job_type LIKE '%$jtype1%' AND qualifications = '$edu_level1' ORDER BY job_num desc";
               $result = $con->query($sql);
               if(!($result)){
                    $error_string = $con->error;
               }
          }

          else if(($check11 == 1 && $check12 == 0 && $check31 == 0 && $check32 == 1)||($_SESSION['filter'] == "1001")){
               $sql="select * from jobs where job_type LIKE '%$jtype1%' AND qualifications = '$edu_level2'";
               $cnt = mysqli_num_rows(mysqli_query($con,$sql));
               $maxcounter = ceil($cnt/8);
               $_SESSION['filter'] = "1001";

               $sql="select * from jobs where job_type LIKE '%$jtype1%' AND qualifications = '$edu_level2' ORDER BY job_num desc";
               $result = $con->query($sql);
               if(!($result)){
                    $error_string = $con->error;
               }
          }

          else if(($check11 == 1 && $check12 == 0 && $check31 == 0 && $check32 == 0)||($_SESSION['filter'] == "1000")){
               $sql="select * from jobs where job_type LIKE '%$jtype1%'";
               $cnt = mysqli_num_rows(mysqli_query($con,$sql));
               $maxcounter = ceil($cnt/8);
               $_SESSION['filter'] = "1000";

               $sql="select * from jobs where job_type LIKE '%$jtype1%' ORDER BY job_num desc";
               $result = $con->query($sql);
          }

          else if(($check11 == 0 && $check12 == 1 && $check31 == 1 && $check32 == 1)||($_SESSION['filter'] == "0111")){
               $sql="select * from jobs where job_type LIKE '%$jtype2%'";
               $cnt = mysqli_num_rows(mysqli_query($con,$sql));
               $maxcounter = ceil($cnt/8); 
               $_SESSION['filter'] = "0111";

               $sql="select * from jobs where job_type LIKE '%$jtype2%' ORDER BY job_num desc";
               $result = $con->query($sql);
               if(!($result)){
                    $error_string = $con->error;
               }
          }

          else if(($check11 == 0 && $check12 == 1 && $check31 == 1 && $check32 == 0)||($_SESSION['filter'] == "0110")){
               $sql="select * from jobs where job_type LIKE '%$jtype2%' AND qualifications = '$edu_level1'";
               $cnt = mysqli_num_rows(mysqli_query($con,$sql));
               $maxcounter = ceil($cnt/8);
               $_SESSION['filter'] = "0110";

               $sql="select * from jobs where job_type LIKE '%$jtype2%' AND qualifications = '$edu_level1' ORDER BY job_num desc";
               $result = $con->query($sql);
               if(!($result)){
                    $error_string = $con->error;
               }
          }

          else if(($check11 == 0 && $check12 == 1 && $check31 == 0 && $check32 == 1)||($_SESSION['filter'] == "0101")){
               $sql="select * from jobs where job_type LIKE '%$jtype2%' AND qualifications = '$edu_level2'";
               $cnt = mysqli_num_rows(mysqli_query($con,$sql));
               $maxcounter = ceil($cnt/8); 
               $_SESSION['filter'] = "0101";

               $sql="select * from jobs where job_type LIKE '%$jtype2%' AND qualifications = '$edu_level2' ORDER BY job_num desc";
               $result = $con->query($sql);
               if(!($result)){
                    $error_string = $con->error;
               }
          }

          else if(($check11 == 0 && $check12 == 1 && $check31 == 0 && $check32 == 0)||($_SESSION['filter'] == "0100")){
               $sql="select * from jobs where job_type LIKE '%$jtype2%'";
               $cnt = mysqli_num_rows(mysqli_query($con,$sql));
               $maxcounter = ceil($cnt/8); 
               $_SESSION['filter'] = "0100";

               $sql="select * from jobs where job_type LIKE '%$jtype2%' ORDER BY job_num desc";
               $result = $con->query($sql);
               if(!($result)){
                    $error_string = $con->error;
               }
          }


          else if(($check11 == 0 && $check12 == 0 && $check31 == 1 && $check32 == 1)||($_SESSION['filter'] == "0011")){
               $sql="select * from jobs";
               $cnt = mysqli_num_rows(mysqli_query($con,$sql));
               $maxcounter = ceil($cnt/8);
               $_SESSION['filter'] = "0011";

               $sql="select * from jobs";
               $result = $con->query($sql);
               if(!($result)){
                    $error_string = $con->error;
               }         //!(c11c12)C31C32             0 0 1 1
          }

          else if(($check11 == 0 && $check12 == 0 && $check31 == 1 && $check32 == 0)||($_SESSION['filter'] == "0010")){
               $sql="select * from jobs WHERE qualifications = '$edu_level1'";
               $cnt = mysqli_num_rows(mysqli_query($con,$sql));
               $maxcounter = ceil($cnt/8); 
               $_SESSION['filter'] = "0010";

               $sql="select * from jobs WHERE qualifications = '$edu_level1' ORDER BY job_num desc";
               $result = $con->query($sql);
               if(!($result)){
                    $error_string = $con->error;
               }         //!(c11c12)C31!(C32)             0 0 1 0
          }
          
          else if(($check11 == 0 && $check12 == 0 && $check31 == 0 && $check32 == 1)||($_SESSION['filter'] == "0001")){
               $query = "select * from jobs WHERE qualifications = '$edu_level2'";                      //counting number of jobs available
               $cnt = mysqli_num_rows(mysqli_query($con,$query));
               $maxcounter = ceil($cnt/8);
               $_SESSION['filter'] = "0001";
          
                    $sql="select * from jobs WHERE qualifications = '$edu_level2' ORDER BY job_num desc";
                    $result = $con->query($sql);
                    if(!($result)){
                         $error_string = $con->error;
                    }
          }
     }else
     {        
          $query = "SELECT * FROM jobs";                      //counting number of jobs available
          $cnt = mysqli_num_rows(mysqli_query($con,$query));
          $maxcounter = ceil($cnt/8);
                                                          //!(c11c12C31)C32                 0 0 0 0 
               $sql = "SELECT * FROM jobs ORDER BY job_num desc";
               $result = $con->query($sql);
     }
     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['nxt_btn'])){
          if(!isset($_SESSION['already_refreshed'])){
               $_SESSION['already_refreshed'] = true;
               header("refresh: 0;");
          }
     }
     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['reset_btn'])){
          $_SESSION['filter'] = "0000";   
 
               header("Location: job-listing.php");
 
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
                         <li class="active"><a href="job-listing.php">Jobs</a></li>
                         <li><a href="about-us.php">About Us</a></li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                 <li><a href="team.php">Team</a></li>
                            </ul>
                       </li>
                       <li><a href="contact.php">Contact Us</a></li>
                       <li><a href = "account.php"><b><?php try{ echo $user_data['user_name']; }catch(Exception $e) {echo "Login";} ?></a></li>
                    </ul>
               </div>

          </div>
     </section>

     <section>
          <div class="container">
               <div class="text-center">
                    <h1>Job Listing</h1>

                    <br>

                    <p class="lead">The jobs are available under various catgories</p>
               </div>
          </div>
     </section>

     <section class="section-background">
          <div class="container">

               <div class="row">
                    <div class="col-lg-3 col-xs-12">
                         <div class="form">
                              <form method="post">
                                   <h4>Type</h4>

                                   <div>
                                        <label> 

                                             <input type="checkbox" name="check11" <?php if(($_SESSION['filter'] == "1000")||($_SESSION['filter'] == "1001")||($_SESSION['filter'] == "1010")||($_SESSION['filter'] == "1011")||($_SESSION['filter'] == "1100")||($_SESSION['filter'] == "1101")||($_SESSION['filter'] == "1110")||($_SESSION['filter'] == "1111")){ ?>checked<?php } ?>>


                                             Full time
                                        </label>
                                   </div>

                                   <div>
                                        <label>
                                             <input type="checkbox" name="check12" <?php if(($_SESSION['filter'] == "0100")||($_SESSION['filter'] == "0101")||($_SESSION['filter'] == "0110")||($_SESSION['filter'] == "0111")||($_SESSION['filter'] == "1100")||($_SESSION['filter'] == "1101")||($_SESSION['filter'] == "1110")||($_SESSION['filter'] == "1111")){ ?>checked<?php } ?>>

                                             Part time
                                             
                                        </label>
                                   </div>
                                   <br>

                                   <br>

                                   <h4>Education levels</h4>

                                   <div>
                                        <label>
                                             <input type="checkbox"name="check31" <?php if(($_SESSION['filter'] == "0010")||($_SESSION['filter'] == "0011")||($_SESSION['filter'] == "0110")||($_SESSION['filter'] == "0111")||($_SESSION['filter'] == "1010")||($_SESSION['filter'] == "1011")||($_SESSION['filter'] == "1110")||($_SESSION['filter'] == "1111")){ ?>checked<?php } ?>>

                                             Under Graduate 
                                        </label>
                                   </div>

                                   <div>
                                        <label>
                                             <input type="checkbox"name="check32" <?php if(($_SESSION['filter'] == "0001")||($_SESSION['filter'] == "0011")||($_SESSION['filter'] == "0101")||($_SESSION['filter'] == "0111")||($_SESSION['filter'] == "1001")||($_SESSION['filter'] == "1011")||($_SESSION['filter'] == "1101")||($_SESSION['filter'] == "1111")){ ?>checked<?php } ?>>

                                             Post Graduate
                                        </label>
                                   </div>

                                   

                                   <br>


                                   <button type="submit" class="btn-sm btn-info" style="border-radius:7px;" name="sort_btn"> Filter </button>
                                   <button type="submit" class="btn-sm btn-info" style="border-radius:7px;" name="reset_btn"> Reset </button>
                              </form>
                         </div>
                    </div>
                    <form method="post">
                    <div class="col-lg-9 col-xs-12">  
                    <?php 
 
                    $temploopcounter = 0;
                   if($_SESSION['loopcounter'] == 0){
                    if($_SESSION['fcounter'] < $maxcounter ){
                    $index = 0; 
                    $_SESSION['fcounter'] = $_SESSION['fcounter'] + 1;
                         while($row=mysqli_fetch_assoc($result)) {  $count++;
                         if($_SESSION['loopcounter'] < $_SESSION['flag']){                             
                    ?>
                         <div class="row">
                              <div class="col-lg-6 col-md-4 col-sm-6">
                                   <div class="courses-thumb courses-thumb-secondary">
                                        <div class="courses-top">
                                             <div class="courses-image">
                                                  <?php 
                                                       switch($index){ case 0:
                                                       ?>
                                                       <img src="images/product-1-720x480.png" class="img-responsive" alt="">
                                                  <?php     $index++; break; case 1: ?>
                                                       <img src="images/product-2-720x480.png" class="img-responsive" alt="">
                                                  <?php     $index++; break; case 2: ?>
                                                       <img src="images/product-3-720x480.png" class="img-responsive" alt="">
                                                  <?php     $index++; break; case 3: ?>
                                                       <img src="images/product-4-720x480.png" class="img-responsive" alt="">
                                                       <?php $index++; break; case 4: ?>
                                                       <img src="images/product-5-720x480.png" class="img-responsive" alt="">
                                                       <?php $index++; break; case 5: ?>
                                                       <img src="images/product-6-720x480.png" class="img-responsive" alt="">
                                                       <?php $index++; break; case 6: ?>
                                                       <img src="images/product-7-720x480.png" class="img-responsive" alt="">
                                                       <?php $index++; break; case 7: ?>
                                                       <img src="images/product-8-720x480.png" class="img-responsive" alt="">
                                                  <?php $index = 0; } ?>
                                             </div>
                                             <div class="courses-date">
                                                  <span title="Location"><i class="fa fa-map-marker"></i> <?php echo $row['location']; ?></span>
                                                  <span title="Type"><i class="fa fa-file"></i> <?php echo $row['job_type']; ?></span>
                                                  <span title="Type"><i class="fa fa-graduation-cap"></i> <?php echo $row['qualifications']; ?></span>
                                             </div>
                                        </div>

                                        <div class="courses-detail"><center>
                                             <h3><span title="title"> <?php echo $row['job_title']; ?></span></h3>

                                             <p class="lead"><strong> <?php echo $row['salary'];?></strong></p></center>
                                        </div><?php
                                             switch ($count)
                                             {
                                                  case 1: ?>
                                                  <div class="courses-info">
                                             <input type="submit" class="section-btn btn btn-primary btn-block" name="viewdetails1" value="View Details" />
                                             <input type="hidden" id="btn1" name="btn1" value="<?php echo $row['job_num'] ?>">
                                        </div><?php break;
                                        case 2: ?>
                                        <div class="courses-info">
                                             <input type="submit" class="section-btn btn btn-primary btn-block" name="viewdetails2" value="View Details" />
                                             <input type="hidden" id="btn2" name="btn2" value="<?php echo $row['job_num'] ?>">
                                        </div> <?php break;
                                        case 3: ?>
                                        <div class="courses-info">
                                             <input type="submit" class="section-btn btn btn-primary btn-block" name="viewdetails3" value="View Details" />
                                             <input type="hidden" id="btn3" name="btn3" value="<?php echo $row['job_num'] ?>">
                                        </div>
                                        <?php break;
                                        case 4: ?>
                                        <div class="courses-info">
                                             <input type="submit" class="section-btn btn btn-primary btn-block" name="viewdetails4" value="View Details" />
                                             <input type="hidden" id="btn4" name="btn4" value="<?php echo $row['job_num'] ?>">
                                        </div><?php break;
                                        case 5: ?>
                                             <div class="courses-info">
                                                  <input type="submit" class="section-btn btn btn-primary btn-block" name="viewdetails5" value="View Details" />
                                                  <input type="hidden" id="btn5" name="btn5" value="<?php echo $row['job_num'] ?>">
                                             </div><?php break;
                                        case 6: ?>
                                             <div class="courses-info">
                                                  <input type="submit" class="section-btn btn btn-primary btn-block" name="viewdetails6" value="View Details" />
                                                  <input type="hidden" id="btn6" name="btn6" value="<?php echo $row['job_num'] ?>">
                                             </div><?php break; 
                                        case 7: ?>
                                             <div class="courses-info">
                                                  <input type="submit" class="section-btn btn btn-primary btn-block" name="viewdetails7" value="View Details" />
                                                  <input type="hidden" id="btn7" name="btn7" value="<?php echo $row['job_num'] ?>">
                                             </div><?php break; 
                                        case 8: ?>
                                             <div class="courses-info">
                                                  <input type="submit" class="section-btn btn btn-primary btn-block" name="viewdetails8" value="View Details" />     
                                                  <input type="hidden" id="btn8" name="btn8" value="<?php echo $row['job_num'] ?>">
                                             </div><?php break;
                                         } ?>
                                        </div>
                              </div>
                    
                      <?php  $_SESSION['loopcounter'] =$_SESSION['loopcounter'] + 1; 
                      }
               } 
          }else{
          
               $_SESSION['fcounter'] = 0;
               $_SESSION['loopcounter'] = 0;
               $_SESSION['flag'] = 8;
          
          }
     }else{
          $temploopcounter = $_SESSION['loopcounter'];
          $_SESSION['flag'] = $_SESSION['loopcounter'] + 8;
          $_SESSION['loopcounter'] = 0;

               if($_SESSION['fcounter'] < $maxcounter ){

                    $index = 0; 
                    $_SESSION['fcounter'] = $_SESSION['fcounter'] + 1;
                    
                    while($row=mysqli_fetch_assoc($result)) {  
                         if($temploopcounter>$_SESSION['loopcounter']){

                              $_SESSION['loopcounter'] = $_SESSION['loopcounter'] + 1;
                              continue;
                         }else{
                              $count++;
                         if(!($_SESSION['loopcounter'] ==$_SESSION['flag'])){
                    ?>
                         <div class="row">
                              <div class="col-lg-6 col-md-4 col-sm-6">
                                   <div class="courses-thumb courses-thumb-secondary">
                                        <div class="courses-top">
                                             <div class="courses-image">
                                                  <?php 
                                                       switch($index){ case 0:
                                                       ?>
                                                       <img src="images/product-1-720x480.png" class="img-responsive" alt="">
                                                  <?php $index++; break; case 1: ?>
                                                       <img src="images/product-2-720x480.png" class="img-responsive" alt="">
                                                  <?php $index++; break; case 2: ?>
                                                       <img src="images/product-3-720x480.png" class="img-responsive" alt="">
                                                  <?php $index++; break; case 3: ?>
                                                       <img src="images/product-4-720x480.png" class="img-responsive" alt="">
                                                       <?php $index++; break; case 4: ?>
                                                       <img src="images/product-5-720x480.png" class="img-responsive" alt="">
                                                       <?php $index++; break; case 5: ?>
                                                       <img src="images/product-6-720x480.png" class="img-responsive" alt="">
                                                       <?php $index++; break; case 6: ?>
                                                       <img src="images/product-7-720x480.png" class="img-responsive" alt="">
                                                       <?php $index++; break; case 7: ?>
                                                       <img src="images/product-8-720x480.png" class="img-responsive" alt="">
                                                  <?php $index = 0; } ?>
                                             </div>
                                             <div class="courses-date">
                                                  <span title="Location"><i class="fa fa-map-marker"></i> <?php echo $row['location']; ?></span>
                                                  <span title="Type"><i class="fa fa-file"></i> <?php echo $row['job_type']; ?></span>
                                                  <span title="Type"><i class="fa fa-graduation-cap"></i> <?php echo $row['qualifications']; ?></span>
                                             </div>
                                        </div>

                                        <div class="courses-detail"><center>
                                             <h3><span title="title"> <?php echo $row['job_title']; ?></span></h3>

                                             <p class="lead"><strong> <?php echo $row['salary'];?></strong></p></center>
                                        </div><?php
                                             switch ($count)
                                             {
                                                  case 1: ?>
                                                  <div class="courses-info">
                                             <input type="submit" class="section-btn btn btn-primary btn-block" name="viewdetails1" value="View Details" />
                                             <input type="hidden" id="btn1" name="btn1" value="<?php echo $row['job_num'] ?>">
                                        </div><?php break;
                                        case 2: ?>
                                        <div class="courses-info">
                                             <input type="submit" class="section-btn btn btn-primary btn-block" name="viewdetails2" value="View Details" />
                                             <input type="hidden" id="btn2" name="btn2" value="<?php echo $row['job_num'] ?>">
                                        </div> <?php break;
                                        case 3: ?>
                                        <div class="courses-info">
                                             <input type="submit" class="section-btn btn btn-primary btn-block" name="viewdetails3" value="View Details" />
                                             <input type="hidden" id="btn3" name="btn3" value="<?php echo $row['job_num'] ?>">
                                        </div>
                                        <?php break;
                                        case 4: ?>
                                        <div class="courses-info">
                                             <input type="submit" class="section-btn btn btn-primary btn-block" name="viewdetails4" value="View Details" />
                                             <input type="hidden" id="btn4" name="btn4" value="<?php echo $row['job_num'] ?>">
                                        </div><?php break;
                                        case 5: ?>
                                             <div class="courses-info">
                                                  <input type="submit" class="section-btn btn btn-primary btn-block" name="viewdetails5" value="View Details" />
                                                  <input type="hidden" id="btn5" name="btn5" value="<?php echo $row['job_num'] ?>">
                                             </div><?php break;
                                        case 6: ?>
                                             <div class="courses-info">
                                                  <input type="submit" class="section-btn btn btn-primary btn-block" name="viewdetails6" value="View Details" />
                                                  <input type="hidden" id="btn6" name="btn6" value="<?php echo $row['job_num'] ?>">
                                             </div><?php break; 
                                        case 7: ?>
                                             <div class="courses-info">
                                                  <input type="submit" class="section-btn btn btn-primary btn-block" name="viewdetails7" value="View Details" />
                                                  <input type="hidden" id="btn7" name="btn7" value="<?php echo $row['job_num'] ?>">
                                             </div><?php break; 
                                        case 8: ?>
                                             <div class="courses-info">
                                                  <input type="submit" class="section-btn btn btn-primary btn-block" name="viewdetails8" value="View Details" />     
                                                  <input type="hidden" id="btn8" name="btn8" value="<?php echo $row['job_num'] ?>">
                                             </div><?php break;
                                         } ?>
                                        </div>
                              </div>
                    
                      <?php  $_SESSION['loopcounter'] =$_SESSION['loopcounter'] + 1; 
                      }
                    } 
               } 
          }else{
               
               $_SESSION['fcounter'] = 0;
          $_SESSION['loopcounter'] = 0;
          $_SESSION['flag'] = 8;
               ?><script>window.location.assign(document.URL);</script><?php

          }
          }    

     
                      
                      ?>
                      <button class="btn-grad" name="nxt_btn">Next </button> </form>
                    </div>
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