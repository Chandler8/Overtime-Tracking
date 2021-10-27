<?php
    require "db_connect.php";
    
    $title = filter_input(INPUT_POST, "title");
    $description = filter_input(INPUT_POST, "description");
    $start_date = filter_input(INPUT_POST, "start_date");
    $end_date = filter_input(INPUT_POST, "end_date");
    $start_time = filter_input(INPUT_POST, "start_time");
    $end_time = filter_input(INPUT_POST, "end_time");
    $tenant_id = 1;
    //$event_id = $_GET['event_id'];

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
        if (empty($start_time) || $start_time == NULL) {
            $start_time = "00:00:00";
        }

        if (empty($end_time) || $end_time == NULL) {
            $end_time = "11:59:59";
        }

        if (empty($description) || $description == NULL) {
            $description = "No description entered";
        }

        $query = "INSERT INTO events (title, description, start_date_time, end_date_time, tenant_id) VALUES (:title, :description, :start_date_time, :end_date_time, :tenant_id)";

        if ($title == null || empty($title) || $start_date == null || empty($start_date) || $end_date == null || empty($end_date)) {
            echo "Error: Missing required field(s)";
            exit;
        }else{
            $query = "INSERT INTO events (tenant_id, title, description, start_date_time, end_date_time) VALUES (?,?,?,?,?)";
            $dbh->prepare($query)->execute([$tenant_id, $title, $description, $start_date_time, $end_date_time]);
            header("Location: ../../Scheduler/scheduler.php");
        }
    }

    //Delete event from database
    if(isset($_GET['delete_event'])){
        $event_id = $_GET['event_id'];
    
        $query = "DELETE FROM events WHERE id = ?";
        $dbh->prepare($query)->execute([$event_id]);
        header("Location: ../../Scheduler/scheduler.php");
    }

    //Update event in database
    if(isset($_GET['update_ready'])){
        $event_id = $_GET['event_id'];
        $event_status = $_GET['event_status'];
        $talent_assigned = $_GET['talent_assigned'];

        $query = "SELECT * FROM events WHERE id = $event_id;";
        $result = $dbh->query($query);
        $event_rows = $result->fetchAll(PDO::FETCH_ASSOC);

        if(count($event_rows) > 0){
            foreach($event_rows as $event_row){
                $sql = "UPDATE events SET assigned = ?, talent_assigned = ? WHERE id = ?";
                $dbh->prepare($sql)->execute([$event_status, $talent_assigned, $event_id]);
                header("Location: ../../Scheduler/scheduler.php");
            }
        }
        else{
            echo "Error: Event not found";
            exit;
        }
    }