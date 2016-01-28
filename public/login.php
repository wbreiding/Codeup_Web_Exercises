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
require_once '../Input.php';
require_once '../Auth.php';

function pageController() {
  $data = array();

  session_start();
  if (Auth::check()) {
    header("Location: authorized.php");
  }

  $username = (Input::has('username') ? escape(Input::get('username')) : '');
  $password = (Input::has('password') ? Input::get(inputGet('password')) : '');
  $errorMessage = "";


  if ($username == '' && $password == '') {

  } elseif (Auth::attempt($username,$password)) {
    header("Location: authorized.php");
    EXIT;
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
