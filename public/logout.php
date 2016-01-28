<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Authorized</title>
</head>

<body>
<?php
  function pageController() {
    $data = array();
    session_start();
    (!isset($_SESSION['logged_in_user']) ? header("Location: login.php") : '');
    clearSession();
    return $data;
  }

  extract(pageController());


  function clearSession() {
    // clear $_SESSION array
    session_unset();

    // delete session data on the server and send the client a new cookie
    session_regenerate_id(true);

    header("Location: login.php");

  }


 ?>
<h3>Logout</h3>


</body>

</html>
