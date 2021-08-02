<?php
//Setup database connection
$host = "localhost";

$root = "root";
$root_password = "";
$db = "senegal_dummy_db";

/*
$username = filter_input($_POST,'username');
$password = filter_input($_POST,'password');
$email = filter_input($_POST,'email');
$first_name = filter_input($_POST,'first_name');
$last_name = filter_input($_POST,'last_name');
$phone = filter_input($_POST,'phone');
$address = filter_input($_POST,'address');
$city = filter_input($_POST,'city');
$state = filter_input($_POST,'state');
$zip = filter_input($_POST,'zip');
$country = filter_input($_POST,'country');
$dob = filter_input($_POST,'dob');
*/

try {
    $dbh = new PDO("mysql:host=$host", $root, $root_password);
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    //Create database if it doesn't exist
    $dbh->exec("CREATE DATABASE IF NOT EXISTS `$db`;");

    //Select database to use
    $dbh->exec("USE `$db`;");

}
catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}
