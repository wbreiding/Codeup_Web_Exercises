<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Ping</title>
  </head>

  <body>
    <?php
      function pageController() {
        $data = array();

        if (isset($_GET['action']) && isset($_GET['hits'])) {
          $data['value'] = click();
          $data['action'] = $_GET['action'];
        } else {
          $data['value'] = 0;
          $data['action'] = "New Game";
        }

        $data['hitOrMiss'] = hitOrMiss();

        return $data;
      }

      function click() {
        $hitsValue = $_GET['hits'];
        if ($_GET['action'] == 'hit') {
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
    <a href="pong.php?action=<?= $hitOrMiss ?>&hits=<?= $value ?>">Go!</a>
  </body>
</html>
