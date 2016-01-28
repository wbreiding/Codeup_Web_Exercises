<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Login</title>
  <style>
    #message {
      color: red;
      font-size: 16px;
    }
  </style>
</head>

<body>

<h3>User Login</h3>

<?php
require 'functions.php';
function pageController() {
  $data = array();

  (isset($_SESSION['logged_in_user']) ? header("Location: authorized.php") : '');

  $username = (inputHas('username') ? escape(inputGet('username')) : '');
  $password = (inputHas('password') ? escape(inputGet('password')) : '');
  $errorMessage = "";


  if ($username == 'guest' && $password == 'password') {
    session_start();
    $_SESSION['logged_in_user'] = $username;
    header("Location: authorized.php");
    EXIT;
  } elseif ($username == '' && $password == '') {
    //$errorMessage = "";
  } else {
    $errorMessage = "Login Failed. Please try again.";
  }

  $data['errorMessage'] = $errorMessage;

  return $data;
}

extract(pageController());
 ?>

<div id="message"><?= $errorMessage ?></div>

<form method="post" action="login.php">
  <label>Username</label>
  <input type="text" name="username" /><br />
  <label>Password</label>
  <input type="text" name="password" /><br />
  <input type="submit" name="submit" />
</form>

</body>

</html>
