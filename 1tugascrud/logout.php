<?php
  ob_start();
  session_start();
  session_destroy();
  
  session_start();
  $_SESSION['id']="";
  header('location:index.php');
?>
