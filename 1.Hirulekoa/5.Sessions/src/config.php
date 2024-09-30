<?php
// Basic connection settings
$databaseHost = '10.14.0.2';
$databaseUsername = 'root';
$databasePassword = 'root';
$databaseName = 'mydatabase';

// Connect to the database
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
?>