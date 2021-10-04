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
                <div id="shift-form" class="container">
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
                            <input type="time" class="form-control" id="start-time" name="start_time" required>
                        </div>
                        <div class="form-group col col-lg col-md-12 col-sm-6 col-xs-12">
                            <label for="end-time">Shift End Time</label>
                            <input type="time" class="form-control" id="end-time" name="end_time" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <button type="submit" id="add-shift-btn" class="btn btn-primary col col-lg-2 col-md-12">Submit</button>
                        </div>
                    </div>
                </div>
                <div id="shift-table-container" class="container-fluid">
                    <div class="row">
                        <div class="container col-4">
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
                                        <tr>
                                            <td>1</td>
                                            <td>Mark Harmon's birthday party</td>
                                            <td>7/1/2021 - 7/1/2021, 4pm - 8pm</td>
                                            <td><i class="fas fa-plus add-event-btn clickable"></i></td>
                                            <td><i class="fas fa-minus delete-event-btn clickable"></i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="calendar-container" class="container col-8">
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