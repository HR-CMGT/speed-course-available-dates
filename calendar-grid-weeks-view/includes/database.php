<?php

// General settings
$host = "127.0.0.1";
$database = "planning_system";
$user = "root";
$password = "";

$db = mysqli_connect($host, $user, $password, $database) or die("Error: " . mysqli_connect_error());;
