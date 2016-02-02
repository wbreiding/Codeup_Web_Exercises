<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'parks');
require "db_connect.php";
echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$query = 'TRUNCATE national_parks';
$dbc->exec($query);

$parks = array(array('name' => 'Acadia', 'location' => 'Maine', 'date'=>'1919-02-26', 'area'=>'47389.67', 'description'=>'Covering most of Mount Desert Island and other coastal islands, Acadia features the tallest mountain on the Atlantic coast of the United States, granite peaks, ocean shoreline, woodlands, and lakes. There are freshwater, estuary, forest, and intertidal habitats.'),
  array('name' => 'Amerian Samoa', 'location' => 'Amerian Samoa', 'date'=>'1988-10-31', 'area'=>'9000.00', 'description'=>'The southernmost national park is on three Samoan islands and protects coral reefs, rainforests, volcanic mountains, and white beaches. The area is also home to flying foxes, brown boobies, sea turtles, and 900 species of fish'),
  array('name' => 'Arches', 'location' => 'Utah', 'date'=>'1929-04-12', 'area'=>'76518.98', 'description'=>'This site features more than 2,000 natural sandstone arches, including the famous Delicate Arch. In a desert climate, millions of years of erosion have led to these structures, and the arid ground has life-sustaining soil crust and potholes, which serve as natural water-collecting basins. Other geologic formations are stone columns, spires, fins, and towers'),
  array('name' => 'Badlands', 'location' => 'South Dakota', 'date'=>'1978-11-10', 'area'=>'242755.94', 'description'=>"The Badlands are a collection of buttes, pinnacles, spires, and grass prairies. It has the world''s richest fossil beds from the Oligocene epoch, and the wildlife includes bison, bighorn sheep, black-footed ferrets, and swift foxes."),
  array('name' => 'Big Bend', 'location' => 'Texas', 'date'=>'1944-06-12', 'area'=>'801163.21', 'description'=>'Named for the prominent bend in the Rio Grande along the US–Mexico border, this park encompasses a large and remote part of the Chihuahuan Desert. Its main attraction is backcountry recreation in the arid Chisos Mountains and in canyons along the river. A wide variety of Cretaceous and Tertiary fossils as well as cultural artifacts of Native Americans also exist within its borders.'),
  array('name' => 'Biscayne', 'location' => 'Florida', 'date'=>'1980-06-28', 'area'=>'172924.07', 'description'=>'Located in Biscayne Bay, this park at the north end of the Florida Keys has four interrelated marine ecosystems: mangrove forest, the Bay, the Keys, and coral reefs. Threatened animals include the West Indian manatee, American crocodile, various sea turtles, and peregrine falcon.'),
  array('name' => 'Channel Islands', 'location' => 'California', 'date'=>'1980-03-05', 'area'=>'249561.00', 'description'=>"Five of the eight Channel Islands are protected, and half of the park''s area is underwater. The islands have a unique Mediterranean ecosystem originally settled by the Chumash people. They are home to over 2,000 species of land plants and animals, and 145 are unique to them, including the island fox. Professional ferry services offer transportation to the islands from the mainland."),
  array('name' => 'Crater Lake', 'location' => 'Oregon', 'date'=>'1902-05-22', 'area'=>'183224.05', 'description'=>'Crater Lake lies in the caldera of an ancient volcano called Mount Mazama that collapsed 7,700 years ago. It is the deepest lake in the United States and is famous for its vivid blue color and water clarity. There are two more recent volcanic islands in the lake, and, with no inlets or outlets, all water comes through precipitation.'),
  array('name' => 'Denali', 'location' => 'Alaska', 'date'=>'1917-02-26', 'area'=>'4740911.72', 'description'=>'Centered around Denali, the tallest mountain in North America, Denali is serviced by a single road leading to Wonder Lake. Denali and other peaks of the Alaska Range are covered with long glaciers and boreal forest. Wildlife includes grizzly bears, Dall sheep, caribou, and gray wolves.'),
  array('name' => 'Everglades', 'location' => 'Florida', 'date'=>'1934-05-30', 'area'=>'1508537.90', 'description'=>'The Everglades are the largest tropical wilderness in the United States, and it encompasses a large expanse of tropical rainforest and savanna. This mangrove ecosystem and marine estuary is home to 36 protected species, including the Florida panther, American crocodile, and West Indian manatee. Some areas have been drained and developed; restoration projects aim to restore the ecology'));

  $query2 = 'INSERT INTO national_parks (name,location,date_established,area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)';
  $stmt = $dbc->prepare($query2);

  foreach ($parks as $park) {
    $stmt->execute(array(':name'=>$park['name'], ':location'=>$park['location'], ':date_established'=>$park['date'], ':area_in_acres'=>$park['area'], ':description'=>$park['description']));
  }


 ?>
