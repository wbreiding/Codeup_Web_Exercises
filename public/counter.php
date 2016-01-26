<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Counter</title>
</head>

<body>
<?php
  function pageController() {
    $data = array();
    if (isset($_GET['action']) && isset($_GET['counter'])) {
      $data['value'] = click();
    } else {
      $data['value'] = 0;
    }
    return $data;
  }

  function click() {
    $action = $_GET['action'];
    $current = $_GET['counter'];
    switch ($action) {
      case 'up':
        $current++;
        break;
      case 'down':
        $current--;
        break;
      default:
        $current;
    }
    return $current;

  }


  extract(pageController());

  ?>
  <h3><?= $value ?></h3>
  <a href="?counter=<?=$value ?>&action=up">Up</a> | <a href="?counter=<?=$value ?>&action=down">Down</a>
</body>

</html>
