<?php
   include __DIR__ . './config.php';
   session_start();
   $user_check = $_SESSION['LoggedInUser'];
   if(!isset($_SESSION['LoggedInUser'])){
      header("location: /index.php");
      die();
   }
?>