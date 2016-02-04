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
    #odd {background-color: #ccc;}
    #error {color: red;}
  </style>
</head>

<body>
  <?php
  require "../Input.php";

  define('DB_HOST', '127.0.0.1');
  define('DB_NAME', 'parks_db');
  define('DB_USER', 'parks_user');
  define('DB_PASS', 'parks');
  require "../db_connect.php";

  //put handling of insert here
  $errorMessage = "";
  if (isset($_REQUEST['submit'])) {
      $errorMessage = $errorMessage . (Input::has('name') ? "" : "Name is not set<br />");
      $errorMessage = $errorMessage . (Input::has('location') ? "" : "Location is not set<br />");
      $errorMessage = $errorMessage . (Input::has('date_established') ? "" : "Date Established is not set<br />");
      $errorMessage = $errorMessage . (Input::has('area_in_acres') ? "" : "Area in Acres is not set<br />");
      $errorMessage = $errorMessage . (Input::has('description') ? "" : "Description is not set<br />");
      $inputDate = htmlspecialchars(strip_tags(Input::get('date_established')));
      $inputDate = date('Y-m-d', strtotime($inputDate)); 
      $errorMessage = $errorMessage . ((bool)strtotime($inputDate) ? "" : "{$inputDate} is not a valid date.<br />");
      $errorMessage = $errorMessage . (is_numeric(Input::get('area_in_acres')) ? "" : "Area must be a valid number.<br />");
      if($errorMessage == "") {
        $dataArray = array(htmlspecialchars(strip_tags(Input::get('name'))),htmlspecialchars(strip_tags(Input::get('location'))), $inputDate, htmlspecialchars(strip_tags(Input::get('area_in_acres'))), htmlspecialchars(strip_tags(Input::get('description'))));
        $insert = 'INSERT INTO national_parks (name,location,date_established, area_in_acres, description) VALUES (?,?,?,?,?)';
        $stmt = $dbc->prepare($insert);
        $stmt->execute($dataArray);

        if ($stmt->rowCount() != 1) {
          $errorMessage = "There was an error inserting the new row.";
        } else {
          $errorMessage = "Your entry has been submitted successfully.";
        }
      }
  }
   ?>
  <div id="error"><?=$errorMessage ?></div>
  <table>
    <tr>
      <th>Park</th> <th>Location</th> <th>Date Established</th> <th>Area in Acres</th> <th>Description</th>
    </tr>
<?php

if (isset($_REQUEST['page'])) {
  $page = Input::get('page');
} else {
  $page = 1;
}

$offset = ($page-1)*4;
$previous = $page-1;
$next = $page+1;

$query = 'SELECT id, name, location, date_established, area_in_acres, description FROM national_parks LIMIT 4 OFFSET :offset';
$stmt = $dbc->prepare($query);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$count = $dbc->query("SELECT * FROM national_parks")->rowCount();

$maxPage = $count/4;
?>
<?php foreach ($stmt as $info): ?>
  <tr <?php if (!($info['id']%2)): ?>id='odd'<?php endif; ?>>
    <td><?=$info['name']?></td> <td><?=$info['location'] ?></td>  <td><?=$info['date_established']?></td> <td><?=$info['area_in_acres']?></td> <td><?=$info['description']?></td>
  </tr>
<?php endforeach ?>
</table>

<?php if ($page !=1): ?><a href='?page=<?= $previous ?>'>Previous Page</a> | <?php endif ?>
  <?php if ($page < $maxPage): ?> <a href='?page=<?= $next ?>'>Next Page</a> <?php endif ?>

<p>
  <form method="post" action="national_parks.php">
  <label for="name">Name</label> <input type="text" name="name" /><br />
  <label for="location">Location</label> <input type="text" name="location" /><br />
  <label for="date_established">Date Established</label> <input type="text" name="date_established" /><br />
  <label for="area_in_acres">Area In Acres</label> <input type="text" name="area_in_acres" /><br />
  <label for="description">Description</label><textarea name="description"></textarea><br />
  <input type="submit" name="submit" value="submit" />
</form>
</p>
</body>
</html>
