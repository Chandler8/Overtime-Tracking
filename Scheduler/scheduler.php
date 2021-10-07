<?php
    require "../scripts/dbscripts/db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduler</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Crimson+Pro">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href='package/main.css' rel='stylesheet' />
    <script src='package/main.js'></script>
    <link rel="stylesheet" href="styles/scheduler.css">
</head>
<body>
    <main>
        <div class="container-fluid">
            <p><a href="../user_form.php">New user form</a> | <a href="../ot_tracker.php">OT Tracker</a></p>
            <h1>Scheduler Tool <i id="shift-form-btn" class="fas fa-plus fa-xs clickable m-3"></i><i id="show-calendar-btn" class="far fa-calendar-plus fa-xs clickable m-3"></i></h1>
            <div class="container-fluid">
                <!-- <form action="../scripts/dbscripts/db_tester.php" method="POST">
                    <button name="submit">Submit</button>
                </form> -->
                <div id="shift-form" class="container">
                    <form action="../scripts/dbscripts/add_event.php" method="POST">
                        <div class="row">
                            <div class="form-group col col-md-12 col-sm-12 col-xs-12">
                                <label for="shift-title">Shift Title</label>
                                <input type="text" class="form-control" id="shift-title" name="title" required>
                            </div>
                            <div class="form-group col col-md-12 col-sm-12 col-xs-12">
                                <label for="shift-description">Description <i>(Optional)</i></label>
                                <textarea class="form-control" id="shift-description" name="description"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col col-lg col-md-12 col-sm-6 col-xs-12">
                                <label for="start-date">Shift Start Date</label>
                                <input type="date" class="form-control" id="start-date" name="start_date" required>
                            </div>
                            <div class="form-group col col-lg col-md-12 col-sm-6 col-xs-12">
                                <label for="end-date">Shift End Date</label>
                                <input type="date" class="form-control" id="end-date" name="end_date" required>
                            </div>
                            <div class="form-group col col-lg col-md-12 col-sm-6 col-xs-12">
                                <label for="start-time">Shift Start Time</label>
                                <input type="time" class="form-control" id="start-time" name="start_time"><small><em>(Defaults to 12 AM)</em></small>
                            </div>
                            <div class="form-group col col-lg col-md-12 col-sm-6 col-xs-12">
                                <label for="end-time">Shift End Time</label>
                                <input type="time" class="form-control" id="end-time" name="end_time"><small><em>(Defaults to 12 AM)</em></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <button name="add_event_submit" class="btn btn-primary col col-lg-2 col-md-12">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="shift-table-container" class="container-fluid">
                    <div class="row">
                        <div id="shifts-container" class="container col-2  col-md-2 ml-1">
                            <div class="col-12">
                                <table id="shifts" class="table table-bordered">
                                    <thead>
                                        <th colspan=5>AVAILABLE SHIFTS</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Shift Name</th>
                                            <th>Shift Schedule</th>
                                            <th>Add</th>
                                            <th>Delete</th>
                                        </tr>
                                        <?php
                                            $sql = "SELECT * FROM events;";
                                            $result = $dbh->query($sql);
                                            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            foreach($rows as $row) {
                                                $start_dt = explode(" ", $row['start_date_time']);
                                                $end_dt = explode(" ", $row['end_date_time']);
                                                $start_date = $start_dt[0];
                                                $start_time = $start_dt[1];
                                                $end_date = $end_dt[0];
                                                $end_time = $end_dt[1];

                                                $start_time_parts = explode(":", $start_time);
                                                $start_hour = $start_time_parts[0];
                                                $start_min = $start_time_parts[1];
                                                $start_sec = $start_time_parts[2];

                                                if($start_hour > 12) {
                                                    $start_hour -= 12;
                                                    $start_time = $start_hour . ":" . $start_min . " PM";
                                                } 
                                                else if($start_hour == "00"){
                                                    $start_time = "12:" . $start_min . " AM";
                                                }
                                                else {
                                                    $start_time = $start_hour . ":" . $start_min . " AM";
                                                }

                                                $end_time_parts = explode(":", $end_time);
                                                $end_hour = $end_time_parts[0];
                                                $end_min = $end_time_parts[1];
                                                $end_sec = $end_time_parts[2];

                                                if($end_hour > 12) {
                                                    $end_hour -= 12;
                                                    $end_time = $end_hour . ":" . $end_min . " PM";
                                                } 
                                                else if($end_hour == "00"){
                                                    $end_time = "12:" . $end_min . " AM";
                                                }
                                                else {
                                                    $end_time = $end_hour . ":" . $end_min . " AM";
                                                }

                                                $start_date_time = $start_date . ", " . $start_time;
                                                $end_date_time = $end_date . ", " . $end_time;

                                                echo "<tr>";
                                                echo "<td>" . $row['id'] . "</td>";
                                                echo "<td>" . $row['title'] . "</td>";
                                                echo "<td>" . $start_date_time . " | " . $end_date_time . "</td>";
                                                echo "<td><i class='fas fa-plus add-event-btn clickable'></i></td>";
                                                echo "<td><a href='../scripts/dbscripts/delete_event.php?event_id=". $row['id']. "'><i class='fas fa-minus delete-event-btn clickable' name='delete_event'></i></a></td>";
                                                // echo "<td><button class='add-event-btn btn btn-primary' data-id='" . $row['id'] . "'>Add</button></td>";
                                                // echo "<td><button class='delete-event-btn btn btn-danger' data-id='" . $row['id'] . "'>Delete</button></td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                        <!-- <td><i class="fas fa-plus add-event-btn clickable"></i></td>
                                        <td><i class="fas fa-minus delete-event-btn clickable"></i></td> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="calendar-container" class="containter col col-8 col-md-8">
                            <div id='calendar' class="col-12"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="scripts/scheduler_script.js"></script>
</body>
</html>