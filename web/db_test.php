<?php

$mysqli = new mysqli('localhost','p514771_ilya','Mr.ilya1999a','p514771_delivery');

if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}
else{
    echo "Работает";
}