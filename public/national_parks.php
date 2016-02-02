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
      <th>Park</th> <th>Location</th> <th>Date Established</th> <th>Area in Acres</th> <th>Description</th>
    </tr>
<?php
require "../Input.php";

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'parks');
require "../db_connect.php";

if (isset($_REQUEST['page'])) {
  $page = Input::get('page');
} else {
  $page = 1;
}

$offset = ($page-1)*4;
$previous = $page-1;
$next = $page+1;

$query = "SELECT id, name, location, date_established, area_in_acres, description FROM national_parks LIMIT 4 OFFSET ?";
$stmt = $dbc->prepare($query);
$stmt->execute(array($offset))->fetchAll(PDO::FETCH_ASSOC);
$count = $dbc->query("SELECT * FROM national_parks")->rowCount();

$maxPage = $count/4;
?>
<?php foreach ($stmt as $info): ?>
  <tr <?php if (!($info['id']%2)): ?>id='odd'<?php endif; ?>>
    <td><?=$info['name']?></td> <td><?=$info['location'] ?></td>  <td><?=$info['date_established']?></td> <td><?=$info['area_in_acres']?></td> <td><?=$info['description']?></td>
  </tr>
<?php endforeach ?>

<?php if ($page !=1): ?><a href='?page=<?= $previous ?>'>Previous Page</a> | <?php endif ?>
  <?php if ($page < $maxPage): ?> <a href='?page=<?= $next ?>'>Next Page</a> <?php endif ?>
</body>
</html>
