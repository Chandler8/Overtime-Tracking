<?php
//Setup database connection
require 'db_connect.php';

//Add DB user fields
$user1 = filter_input(INPUT_POST,'username1');
$pass1 = filter_input(INPUT_POST,'pwd1');
$pass2 = filter_input(INPUT_POST,'pwd2');

//Delete DB user filed
$user2 = filter_input(INPUT_POST,'username2');

if(isset($_POST['add_db_user_submit'])){
    createUser();
}

if(isset($_POST['remove_db_user_submit'])){
    deleteDBUser();
}

//This function creates a new user in the database
function createDBUser() {

    //Get user input
    if(empty($user)){
        echo "Please enter a username";
        return;
    }
    
    if(empty($pass1)){
        echo "Please enter a password";
        return;
    }
    
    if(empty($pass2)){
        echo "Please confirm your password";
        return;
    }
    
    if($pass1 != $pass2){
        echo "Passwords do not match";
        return;
    }

    if(!empty($user) && $pass1 == $pass2){
        try {
            $dbh = new PDO("mysql:host=$host", $root, $root_password);

            //Create new database user
            $dbh->exec("CREATE USER IF NOT EXISTS '$user'@'localhost' IDENTIFIED BY '$pass';
                    GRANT ALL ON `$db`.* TO '$user'@'localhost';
                    FLUSH PRIVILEGES;")
            or die(print_r($dbh->errorInfo(), true));

        }
        catch (PDOException $e) {
            die("DB ERROR: " . $e->getMessage());
        }
    
    }else{
        echo "All fields are required";
    }
    
    $dbh = null;

    echo "User created successfully";

}

//This function deletes a user from the database
function deleteDBUser() {
    //Get user input
    if(empty($user)){
        echo "Please enter a username";
        return;
    }

    try {
        $dbh = new PDO("mysql:host=$host", $root, $root_password);
        $dbh->exec("DROP USER IF EXISTS'$user'@'localhost';")
        or die(print_r($dbh->errorInfo(), true));
    }
    catch (PDOException $e) {
        die("DB ERROR: " . $e->getMessage());
    }
    
    $dbh = null;
    echo "User deleted successfully";
}