<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Pong</title>
  </head>

  <body>
    <?php
    require 'functions.php';
    require_once '../Input.php';
    function pageController() {
      $data = array();

      if (Input::has('action') && Input::has('hits')) {
        $data['value'] = click();
        $data['action'] = Input::get('action');
      } else {
        $data['value'] = 0;
        $data['action'] = "New Game";
      }

      $data['hitOrMiss'] = hitOrMiss();

      return $data;
    }

    function click() {
      $hitsValue = Input::get('hits');
      if (inputGet('action') == 'hit') {
        $hitsValue++;
      } else {
        $hitsValue = 0;
      }
      return $hitsValue;
    }

    function hitOrMiss() {
      $random = rand(0,1);
      if ($random == 0) {
        $display = "hit";
      } else {
        $display = "miss";
      }
      return $display;
    }
    extract(pageController());

    ?>
    <h3><?= $action ?>! Hit Count: <?= $value ?></h3>
    <a href="ping.php?action=<?= $hitOrMiss ?>&hits=<?= $value ?>">Go!</a>

  </body>
</html>
