<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Authorized</title>
</head>

<body>
<?php
  function pageController() {
    session_start();
    $username = $_SESSION['logged_in_user'];
    (!isset($_SESSION['logged_in_user']) ? header("Location: login.php") : '');
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
