<?php

$con = new mysqli('host', 'username', 'password', 'database');

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}