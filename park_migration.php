<?php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'parks');
require "db_connect.php";
echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$query = 'DROP TABLE IF EXISTS national_parks';
$dbc->exec($query);
$query2 = 'CREATE TABLE national_parks (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(100),
  location varchar(100),
   date_established date,
   area_in_acres double,
   description text,
   PRIMARY KEY (id)
 )';
 $dbc->exec($query2);
 ?>
