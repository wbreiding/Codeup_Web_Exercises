<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Authorized</title>
</head>

<body>
<?php

  require_once '../Auth.php';

  function pageController() {
    session_start();
    if (Auth::check()) {
      $username = Auth::user();
    } else {
      header("Location: login.php");
    }
    $data = array();
    $data['username'] = $username;
    return $data;
  }
  extract(pageController());

 ?>
<h3>Authorized</h3>

<p>Hi, <?= $username ?>!</p>

<a href="logout.php">Logout</a>

</body>

</html>
