<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'parks');
require "db_connect.php";
echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$query = 'TRUNCATE national_parks';
$dbc->exec($query);

$parks = array(array('name' => 'Acadia', 'location' => 'Maine', 'date'=>'1919-02-26', 'area'=>'47389.67'),
  array('name' => 'Amerian Samoa', 'location' => 'Amerian Samoa', 'date'=>'1988-10-31', 'area'=>'9000.00'),
  array('name' => 'Arches', 'location' => 'Utah', 'date'=>'1929-04-12', 'area'=>'76518.98'),
  array('name' => 'Badlands', 'location' => 'South Dakota', 'date'=>'1978-11-10', 'area'=>'242755.94'),
  array('name' => 'Big Bend', 'location' => 'Texas', 'date'=>'1944-06-12', 'area'=>'801163.21'),
  array('name' => 'Biscayne', 'location' => 'Florida', 'date'=>'1980-06-28', 'area'=>'172924.07'),
  array('name' => 'Channel Islands', 'location' => 'California', 'date'=>'1980-03-05', 'area'=>'249561.00'),
  array('name' => 'Crater Lake', 'location' => 'Oregon', 'date'=>'1902-05-22', 'area'=>'183224.05'),
  array('name' => 'Denali', 'location' => 'Alaska', 'date'=>'1917-02-26', 'area'=>'4740911.72'),
  array('name' => 'Everglades', 'location' => 'Florida', 'date'=>'1934-05-30', 'area'=>'1508537.90'));

  foreach ($parks as $park) {
    $query2 = "INSERT INTO national_parks (name,location,date_established,area_in_acres) VALUES
    ('{$park['name']}', '{$park['location']}', '{$park['date']}', '{$park['area']}')";
    echo "$query2";
    $dbc->exec($query2);
  }

 ?>
