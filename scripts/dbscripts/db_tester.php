<?php

require "db_connect.php";

// $title = "Title";
// $description = "Description";
// $start_date = "2021-10-06";
// $end_date = "2021-10-06";
// $start_time = "00:30:05";
// $end_time = "00:50:05";
// $tenant_id = 1;

// $start_date_time = $start_date . " " . $start_time;
// $end_date_time = $end_date . " " . $end_time;

//Check if add shift button was clicked and add event to database

// $event_id = '8';

// if (isset($_POST['delete_event_submit'])) {
//     $query = "DELETE FROM events WHERE id = ?";
//     $dbh->prepare($query)->execute([$event_id]);
//     header("Location: ../../Scheduler/scheduler.php");
   
//     echo "<script>console.log('Adding event to database...');</script>";
// }

if (isset($_POST['add_event_submit'])){
    echo "<script>console.log('Adding event to database...');</script>";
}