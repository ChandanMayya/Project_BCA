<?php

session_start();
include("connection.php");

$num = $_SESSION['sel_id'];

$query = "SELECT ano from aspirants where num='$num'";
$result= mysqli_query($con,$query);
if($result){
    $row = mysqli_fetch_assoc($result);
    $id = $row['ano'];

    
    $query2 = "SELECT * from users where user_id='$id'";
    $result2 = mysqli_query($con,$query2);
    if($result2){
        $row2 = mysqli_fetch_assoc($result2);
      
    ?>
       <html>
           <body>
           <object data="data:application/pdf;base64,<?php echo base64_encode($row2['conf_doc']) ?>" type="application/pdf" style="height:720px;width:100%"></object>

    </body>
    </html>
<?php 
    }else{echo $con->error;}
}

?> 