<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Authorized</title>
</head>

<body>
<?php
  require_once "../Auth.php";

  function pageController() {
    $data = array();
    session_start();
    if (Auth::check()) {
      Auth::logout();
      header("Location: login.php");
    } else {
      header("Location: login.php");
    }

    return $data;
  }

  extract(pageController());


 ?>
<h3>Logout</h3>


</body>

</html>
