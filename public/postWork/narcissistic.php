<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Narcissistic Number Generator</title>
</head>

<body>
  <script src="/js/jquery.js"></script>
<?php
$max = 1000000;
$sum = 0;
$narcs = [];

for ($i=1; $i<$max;$i++) {
  $array = str_split($i);
  $arrayLength = count($array);
  $equation = 0;
  for ($j=0; $j<$arrayLength;$j++) {
    $equation = $equation + pow($array[$j],$arrayLength);
  }
  if ($equation != $i) {
    continue;
  } else {
    $narcs[] = $equation;
  }
  if (count($narcs) == 25) {
    break;
  }
}

 ?>
 <div id="list" style="color:red;">
<?php foreach ($narcs as $num):?>
    <?=$num?><br />
<?php endforeach ?>
 </div>
</body>
</html>
