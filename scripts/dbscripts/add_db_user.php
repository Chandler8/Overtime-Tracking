<?php
//Setup database connection
require 'db_connect.php';

$user = filter_input(INPUT_POST,'username');
$pass1 = filter_input(INPUT_POST,'pwd1');
$pass2 = filter_input(INPUT_POST,'pwd2');

//Get user input
if(isset($_POST['submit'])){
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
        echo "Adding user: $user";

        try {
            $dbh = new PDO("mysql:host=$host", $root, $root_password);

            //Create new database user
            $dbh->exec("CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass';
                    GRANT ALL ON `$db`.* TO '$user'@'localhost';
                    FLUSH PRIVILEGES;")
            or die(print_r($dbh->errorInfo(), true));

        }
        catch (PDOException $e) {
            die("DB ERROR: " . $e->getMessage());
        }

        echo "User created successfully";
        print_r(PDO::getAvailableDrivers());
        
    }else{
        echo "Something's missing.";
    }
    
    $dbh = null;
}
