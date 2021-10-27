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
            <div class="row">

                <!--Uncomment below to add new tables to show a button to trigger the process.-->
                <!-- <form action="../scripts/dbscripts/add_db_tables.php" method="POST">
                    <button name="submit">Submit</button>
                </form> -->
                <div id="shift-form" class="container-fluid m-2">
                    <form action="../scripts/dbscripts/handle_event.php" method="POST">
                        <div class="row">
                            <div class="form-group col col-md-12 col-sm-12 col-xs-12">
                                <label for="shift-title">Shift Title</label>
                                <input type="text" class="form-control" id="shift-title" name="title" required>
                            </div>
                            <div class="form-group col col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-8">
                                        <label for="shift-description">Description <i>(Optional)</i></label>
                                        <textarea class="form-control" id="shift-description" name="description"></textarea>
                                    </div>
                                    <div class="col">
                                        <label for="color">Select a color to identify the event.</label>
                                        <input type="color" id="event_color" value="#669900"> <small><em>(Defaults to Senegal green)</em></small>
                                    </div>
                                </div>
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
                        <div id="new-fields-container"></div>
                        <div class="row">
                            <p class="col">Want to add a new field to the form, click <a id="add-new-field-link" href="#">here.</a></p>
                        </div>
                        <br>
                        <div class="row d-none" id="new-field-form">
                            <div class="form-group col col-lg col-md-12 col-sm-6 col-xs-12">
                                <label for="new-label"><em>Enter a label for this new field</em></label>
                                <input type="text" class="form-control" id="new-label" name="">
                            </div>
                            <div class="form-group col col-lg col-md-12 col-sm-6 col-xs-12">
                                <textarea name="" id="new-field-description" cols="30" rows="4" placeholder="Describe the use of this new form field."></textarea>
                            </div>
                            <div class="form-group col-2">
                                <button class="btn btn-sm" id="add-field-btn">Add field</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <button name="add_event_submit" class="btn btn-primary col col-lg-2 col-md-12">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="list-view-container" class="container-fluid">
                    <div class="row">
                        <div id="shifts-container" class="container col-2  col-md-2 ml-1">
                            <div class="col-12">
                                <table id="shifts" class="table table-bordered">
                                    <thead>
                                        <th colspan=10>AVAILABLE SHIFTS</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Shift Name</th>
                                            <th>Position Type</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Shift Start</th>
                                            <th>Shift End</th>
                                            <th>Assigned/Unassigned</th>
                                            <th>Assign Talent</th>
                                            <th>Add</th>
                                            <th>Delete</th>
                                        </tr>
                                        <?php
                                            $events_sql = "SELECT * FROM events;";
                                            $result = $dbh->query($events_sql);
                                            $events_rows = $result->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            $users_sql = "SELECT * FROM users;";
                                            $result = $dbh->query($users_sql);
                                            $users_rows = $result->fetchAll(PDO::FETCH_ASSOC);
                                            $talent_str = "<option value='none'>Select talent</option>";

                                            $positions_sql = "SELECT * FROM positions;";
                                            $result = $dbh->query($positions_sql);
                                            $positions_rows = $result->fetchAll(PDO::FETCH_ASSOC);
                                            $position_str = "<option value='none'>Select position</option>";

                                            foreach($positions_rows as $position) {
                                                $position_str .= "<option value='".$position['color']."'>".$position['position_name']."</option>";
                                            }

                                            foreach($users_rows as $user){
                                                $talent_fname = $user['first_name'];
                                                $talent_lname = $user['last_name'];
                                                $talent_name = $talent_fname . " " . $talent_lname;
                                                
                                                $talent_str .= "<option value='".$talent_name."'>".$talent_name."</option>";
                                            }

                                            foreach($events_rows as $row) {
                                                $start_dt = explode(" ", $row['start_date_time']);
                                                $end_dt = explode(" ", $row['end_date_time']);
                                                $start_date = $start_dt[0];
                                                $start_time = $start_dt[1];
                                                $end_date = $end_dt[0];
                                                $end_time = $end_dt[1];

                                                /*$start_time_parts = explode(":", $start_time);
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
                                                }*/

                                                // $start_date_time = $start_date . ", " . $start_time;
                                                // $end_date_time = $end_date . ", " . $end_time;
                                                // $shift_sched = $start_time . " - " . $end_time;
                                                $assignment_status = $row['assigned'] == 1 ? "Assigned" : "Unassigned";

                                                echo "<tr>";
                                                echo "<td>" . $row['id'] . "</td>";
                                                echo "<td>" . $row['title'] . "</td>";
                                                echo "<td><select class='position_select' name='position_select' style='width:120px;'>" . $position_str . "</select></td>";
                                                echo "<td>" . $start_date . "</td>";
                                                echo "<td>" . $end_date . "</td>";
                                                echo "<td>" . $start_time . "</td>";
                                                echo "<td>" . $end_time . "</td>";
                                                echo "<td>" . $assignment_status . "</td>";
                                                
                                                //Get the user assigned to this shift
                                                if($row['assigned'] == 1) {
                                                    echo "<td>" . $row['assigned_to'] . "</td>";
                                                }
                                                else {
                                                    echo "<td><select class='talent_select' name='talent_select' style='width:120px;'>" . $talent_str . "</select></td>";
                                                }
                                                // echo "<td><a onclick=\"javascript: return confirm('Confirm update to assigned for ". $row['title'] . "');\" href='../scripts/dbscripts/handle_event.php?event_status=true&event_id=". $row['id']. "' name='event_status'>" . $assignment_status . "</a></td>";
                                                echo "<td><i class='fas fa-plus add-event-btn'></i></td>";
                                                echo "<td><a href='../scripts/dbscripts/delete_event.php?event_id=". $row['id']. "'><i class='fas fa-trash-alt delete-event-btn clickable' name='delete_event'></i></a></td>";
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
                        <!-- <div id="calendar-container" class="containter col col-8 col-md-8">
                            <div id='calendar' class="col-12"></div>
                        </div> -->
                    </div>
                </div>
                <div id="calendar-view-container" class="container-fluid">
                    <div class="row">
                        <div id="left-sidebar-container" class="container col-2 col-md-3 col-sm-3">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="btn-group col" role="group">
                                            <button type="button" class="btn">
                                                <h4>Publish & Notify</h4>
                                                <p>Entire Schedule</p>
                                            </button>
                                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle col" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></button>
                                            <!-- <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item" href="#">Dropdown link</a>
                                                <a class="dropdown-item" href="#">Dropdown link</a>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="btn-group col" role="group" aria-label="options-buttons">
                                            <button type="button" class="btn btn-secondary">Shifts</button>
                                            <button type="button" class="btn btn-secondary">Positions</button>
                                            <button type="button" class="btn btn-secondary">Site</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="btn-group col" role="group">
                                            <button type="button" class="btn col-8">
                                                St. Paul
                                            </button>
                                            <button id="btnGroupDrop2" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></button>
                                            <!-- <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item" href="#">Dropdown link</a>
                                                <a class="dropdown-item" href="#">Dropdown link</a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <table id="positions" class="table table-bordered">
                                        <thead>
                                            <th>Positions</th>
                                            <th>All</th>
                                            <th>+</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT * FROM positions;";
                                                $result = $dbh->query($sql);
                                                $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                                                
                                                foreach($rows as $row) {
                                                    echo "<tr>";
                                                    echo "<td><i class='fas fa-check-square fa-2x' style='color:" . $row['color'] . ";'></i></td>";
                                                    echo "<td colspan=2>" . $row['position_name'] . "</td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                            <!-- <td><i class="fas fa-plus add-event-btn clickable"></i></td>
                                            <td><i class="fas fa-minus delete-event-btn clickable"></i></td> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <table id="job_sites" class="table table-bordered">
                                        <thead>
                                            <th>Job Sites</th>
                                            <th>All</th>
                                            <th>+</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan=3><div class="row"><div class="col-1"><i class="fas fa-map-marker-alt"></i></div><div class="col">Downtown 1st Ave</div></div></td>
                                            </tr>
                                            <tr>
                                                <td colspan=3><div class="row"><div class="col-1"><i class="fas fa-map-marker-alt"></i></div><div class="col">Uptown 3rd Ave</div></div></td>
                                            </tr>
                                            <tr>
                                                <td colspan=3><div class="row"><div class="col-1"><i class="fas fa-map-marker-alt"></i></div><div class="col">Convention Center</div></div></td>
                                            </tr>
                                            <?php
                                                /*$sql = "SELECT * FROM positions;";
                                                $result = $dbh->query($sql);
                                                $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                                                
                                                foreach($rows as $row) {
                                                    echo "<tr>";
                                                    echo "<td><i class='fas fa-check-square fa-2x' style='color:" . $row['color'] . ";'></i></td>";
                                                    echo "<td colspan=2>" . $row['position_name'] . "</td>";
                                                    echo "</tr>";
                                                }*/
                                            ?>
                                            <!-- <td><i class="fas fa-plus add-event-btn clickable"></i></td>
                                            <td><i class="fas fa-minus delete-event-btn clickable"></i></td> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="talent-container" class="container col-2">
                            <div class="row">
                                <div class="col-12">
                                    <table id="shifts" class="table table-bordered">
                                        <thead>
                                            <th colspan=5>AVAILABLE TALENT</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th colspan=4>
                                                    <div class="btn btn-lg btn-success col">Publish</div>
                                                </th>
                                            </tr>
                                            <?php
                                                $sql = "SELECT * FROM users;";
                                                $result = $dbh->query($sql);
                                                $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                                                
                                                foreach($rows as $row) {
                                                    $fname = trim($row['first_name']);
                                                    $lname = trim($row['last_name']);
                                                    $name = $fname . " " . $lname;
                                                    
                                                    echo "<tr>";
                                                    echo "<td>" . $row['id'] . "</td>";
                                                    echo "<td>" . $name . "</td>";
                                                    echo "<td><i class='fas fa-plus add-event-btn clickable'></i></td>";
                                                    // echo "<td><a href='../scripts/dbscripts/delete_event.php?event_id=". $row['id']. "'><i class='fas fa-minus delete-event-btn clickable' name='delete_event'></i></a></td>";
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
                        </div>
                        <div id="calendar-container" class="col">
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