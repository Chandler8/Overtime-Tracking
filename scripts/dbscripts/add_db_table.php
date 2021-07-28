<?php
//Get database connection
require 'db_connect.php';

print_r(PDO::getAvailableDrivers());

$tbl = "users";

try {
    //Create table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS $tbl (
        id int(11) NOT NULL AUTO_INCREMENT,
        username varchar(255) NOT NULL,
        password varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        first_name varchar(255) NOT NULL,
        last_name varchar(255) NOT NULL,
        phone varchar(255) NOT NULL,
        address varchar(255) NOT NULL,
        city varchar(255) NOT NULL,
        state varchar(255) NOT NULL,
        zip varchar(255) NOT NULL,
        country varchar(255) NOT NULL,
        date_created datetime NOT NULL,
        date_modified datetime NOT NULL,
        PRIMARY KEY (id)
    );";      

    $dbh->exec($sql);
    //or die(print_r($dbh->errorInfo(), true));
    
    $dbh = null;
    
}
catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}