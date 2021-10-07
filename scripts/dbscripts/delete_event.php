<?php
    require "/db_connect.php";

    $event_id = $_GET['event_id'];
    echo "<script>console.log('".$event_id."')</script>";

    // //Delete event from database
    // if (isset($_GET['delete_event'])) {
    //     $query = "DELETE FROM events WHERE id = ?";
    //     $dbh->prepare($query)->execute([$event_id]);
    //     header("Location: ../../Scheduler/scheduler.php");
    // }
?>