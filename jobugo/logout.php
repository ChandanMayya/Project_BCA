<?php

session_start();

if(isset($_SESSION['user_id']))
{
  unset($_SESSION['user_id']);
 $_SESSION['accounttype'] = '0';
}
header("Location: login.php");
die;

?>

