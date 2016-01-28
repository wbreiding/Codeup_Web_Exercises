<?php

function inputHas($key) {
  $answer = (isset($_REQUEST[$key]) ? 'true' : 'false');
  return $answer;

}

function inputGet($key) {
  $answer = (isset($_REQUEST[$key]) ? $_REQUEST[$key] : '');
  return $answer;

}

function escape($input) {
  return htmlspecialchars(strip_tags($input));
}

 ?>
