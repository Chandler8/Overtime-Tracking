<?php
//Get database connection
require 'db_connect.php';

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

//Check if which submit button is pressed and call the appropriate function
if(isset($_POST['add_new_user_submit'])) {
    add_new_user();
}

//This function adds a new user to the database
function add_new_user() {
    global $dbh;
    global $username;
    global $password;
    global $email;
    global $first_name;
    global $last_name;
    global $phone;
    global $address;
    global $city;
    global $state;
    global $zip;
    global $country;
    global $dob;
    
    try {
        $sql = "INSERT INTO users (username, password, email, ".
            "first_name, last_name, dob, phone, address, city, state, zip, country) ".
            "VALUES ('$username', '$password', '$email', ".
            "'$first_name', '$last_name', '$dob', '$phone', ".
            "'$address', '$city', '$state', '$zip', '$country');";
        
        $dbh->exec($sql);
    }
    catch (PDOException $e) {
        die("DB ERROR: " . $e->getMessage());
    }

    $dbh = null;
    header("Location: ../user_form.php");
}
