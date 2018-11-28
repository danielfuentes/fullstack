<?php require_once('./global.php') ?>

 <?php
 unset($_SESSION['user']);

 session_destroy();

 setcookie('user', '', time()) * -1);

 header('location: login.php');
 exit;
