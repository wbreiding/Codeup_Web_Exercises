<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Authorized</title>
</head>

<body>
<?php
  (!isset($_SESSION['logged_in_user']) ? header("Location: login.php") : '');
 ?>
<h3>Logout</h3>


</body>

</html>
