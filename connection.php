<?php
session_start();

$server = 'localhost:3306';
$user = 'root';
$pass = '';
$dbname = 'app_chat';

$connection  = mysqli_connect($server, $user, $pass, $dbname);
