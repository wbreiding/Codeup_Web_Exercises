<!DOCTYPE html>
<?php
$adjectives = array('pretty','funny','silly','cute','ugly','sweet','happy','sad','hungry','beautiful');
$nouns = array('hill','girl','boy','laptop','dollar','store','playground','computer','television','woman');

function getRandom($array) {
  $length = sizeof($array)-1;
  $random=mt_rand(0,$length);
  $item = $array[$random];
  return $item;
}

function getServerName($array1,$array2) {
  $adjective = getRandom($array1);
  $noun = getRandom($array2);
  $name = "{$adjective} {$noun}";
  return $name;
}

 ?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Server Name Generator</title>
  </head>

  <body>
    <h1>Server Name Generator</h1>

    <p>The name of the server is <?php
    $serverName = getServerName($adjectives,$nouns);
    echo "{$serverName}";
    ?>!</p>

  </body>
</html>
