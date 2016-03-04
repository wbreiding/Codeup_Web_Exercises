<?php
var_dump($_POST);
?>
<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>
    <form method="POST" action="">
    <!--<form method="POST action="form-results.php">-->
        <label>Name</label>
        <input type="text" name="name"><br>
        <label>Number</label>
        <input type="text" name="number"><br>
        <input type="submit">
    </form>
</body>
</html>

<!--<?php
$items = array('Item One', 'Item Two', 'Item Three');
$allItems = array_merge($items, $_POST);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Alternative Syntax</title>
</head>
<body>
    <h1>List of Items</h1>
    <ul>
    <?php foreach ($allItems as $item): ?>
        <li><?php echo htmlspecialchars(strip_tags($item)); ?></li>
    <?php endforeach; ?>
    </ul>

    <form method="POST" action="/form-example.php">
        <input type="text" id="newitem" name="newitem" placeholder="Add new todo item">
        <input type="submit" value="add">
    </form>
</body>
</html>-->
