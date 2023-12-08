<?php
$hostname = 'localhost';
$dbname = 'db_wp_login';
$user = 'root';
$password = 'root';

$conn = new mysqli($hostname, $user, $password, $dbname);

if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}
