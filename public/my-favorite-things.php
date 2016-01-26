<!DOCTYPE html>
<?php
$favoriteThings = array('Jade', 'Maxwell', 'Jeremy', 'Disney', 'musicals');
sort($favoriteThings);
 ?>
<html>
<head>
  <title>My Favorite Things</title>
  <meta charset="utf-8" />
  <style>
    table {
      border-width: 1px;
      border-color: black;
      border-style: solid;
      padding: 0px;
    }
    #odd {background-color: #ccc};
  </style>
</head>

<body>

  <h1>My Favorite Things</h1>

  <table>
    <?php foreach ($favoriteThings as $key=>$favorites) { ?>
      <tr <?php if(!($key%2)) {echo "id='odd'";} ?>>
        <td><?php echo $favorites; ?></td>
      </tr>
    <?php } ?>
  </table>


</body>
</html>
