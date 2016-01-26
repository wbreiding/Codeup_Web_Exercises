<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Server Name Generator</title>
  </head>

  <body>

    <?php

    function pageController() {
      // Initialize an empty data array.
      $adjectives = array('pretty','funny','silly','cute','ugly','sweet','happy','sad','hungry','beautiful');
      $nouns = array('hill','girl','boy','laptop','dollar','store','playground','computer','television','woman');
      $data = array();

      // Add data to be used in the html view.
      $data['serverName'] = getServerName($adjectives,$nouns);

      // Return the completed data array.
      return $data;
    }

    // Call the pageController function and extract all the returned array as local variables.
    extract(pageController());


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

    <h1>Server Name Generator</h1>

    <p>The name of the server is <?= $serverName ?>!</p>

  </body>
</html>
