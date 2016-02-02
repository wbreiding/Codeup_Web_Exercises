<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>National Parks List</title>
  <style>
    table, th, td {
      border-style: solid;
      border-width: 1px;
      border-color: black;
      border-collapse: collapse;
    }
    #odd {background-color: #ccc};
  </style>
</head>

<body>
  <table>
    <tr>
      <th>Park</th> <th>Location</th> <th>Date Established</th> <th>Area in Acres</th>
    </tr>
<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'parks');
require "../db_connect.php";

$stmt = $dbc->query('SELECT id, name, location, date_established, area_in_acres FROM national_parks')->fetchAll(PDO::FETCH_ASSOC);

?>
<?php foreach ($stmt as $info): ?>
  <tr <?php if (!($info['id']%2)): ?>id='odd'<?php endif; ?>>
    <td><?=$info['name']?></td> <td><?=$info['location'] ?></td>  <td><?=$info['date_established']?></td> <td><?=$info['area_in_acres']?></td>
  </tr>
<?php endforeach ?>
</body>
</html>
