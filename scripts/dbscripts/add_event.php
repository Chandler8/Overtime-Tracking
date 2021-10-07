<?php
    require "db_connect.php";
    
    $title = filter_input(INPUT_POST, "title");
    $description = filter_input(INPUT_POST, "description");
    $start_date = filter_input(INPUT_POST, "start_date");
    $end_date = filter_input(INPUT_POST, "end_date");
    $start_time = filter_input(INPUT_POST, "start_time");
    $end_time = filter_input(INPUT_POST, "end_time");
    $tenant_id = 1;

    // $title = "Titled";
    // $description = "Described";
    // $start_date = "2021-10-01";
    // $end_date = "2021-11-01";
    // $start_time = "09:00:00";
    // $end_time = "17:00:00";
    // $tenant_id = 1;
    
     $start_date_time = $start_date . " " . $start_time;
     $end_date_time = $end_date . " " . $end_time;

    //Check if add shift button was clicked and add event to database
    if (isset($_POST['add_event_submit'])) {
        if (empty($start_time) || $start_time == "") {
            $start_time = "00:00:00";
        }

        if (empty($end_time) || $end_time == "") {
            $end_time = "00:00:00";
        }

        if (empty($description) || $description == "") {
            $description = "No description entered";
        }

        $query = "INSERT INTO events (title, description, start_date_time, end_date_time, tenant_id) VALUES (:title, :description, :start_date_time, :end_date_time, :tenant_id)";

        if ($title == null || $title == "" || $start_date == null || $start_date == "" || $end_date == null || $end_date == "") {
            echo "Error: Missing required field(s)";
            exit;
        }else{
            $query = "INSERT INTO events (tenant_id, title, description, start_date_time, end_date_time) VALUES (?,?,?,?,?)";
            $dbh->prepare($query)->execute([$tenant_id, $title, $description, $start_date_time, $end_date_time]);
            header("Location: ../../Scheduler/scheduler.php");
        }
    }
