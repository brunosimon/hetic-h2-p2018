<?php
require ('inc/config.php'); 
session_start();
//logoff : destroy session
//destroy cookie
//remove from db
//
if(isset($_COOKIE['auth'])) {
  unset($_COOKIE['auth']);
  setcookie('auth', '', time() - 3600);
}

session_destroy();

header("Location: ./public_html/index.php");
