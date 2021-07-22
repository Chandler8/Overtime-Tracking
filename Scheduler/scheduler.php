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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
	  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/scheduler.css">
</head>
<body>
    <main>
        <div class="container">
            <h1>Scheduler Tool <i id="shift-form-btn" class="fas fa-plus fa-xs m-3"></i><i id="show-calendar-btn" class="far fa-calendar-plus fa-xs m-3"></i></h1>
            <div class="container">
                <div id="shift-form" class="m-2">
                    <div class="row">
                        <div class="form-group col-2 m-1">
                            <label for="shift-title">Shift Title</label>
                            <input type="text" class="form-control" id="shift-title" name="title" required>
                        </div>
                        <div class="form-group col-2 m-1">
                            <label for="shift-description">Description</label>
                            <textarea class="form-control" id="shift-description" name="description"></textarea>
                        </div>
                        <div class="form-group col m-1">
                            <label for="start-date">Shift Start Date</label>
                            <input type="date" class="form-control" id="start-date" name="start_date" required>
                        </div>
                        <div class="form-group col m-1">
                            <label for="end-date">Shift End Date</label>
                            <input type="date" class="form-control" id="end-date" name="end_date" required>
                        </div>
                        <div class="form-group col m-1">
                            <label for="start-time">Shift Start Time</label>
                            <input type="time" class="form-control" id="start-time" name="start_time" required>
                        </div>
                        <div class="form-group col m-1">
                            <label for="end-time">Shift End Time</label>
                            <input type="time" class="form-control" id="end-time" name="end_time" required>
                        </div>
                        <div class="form-group col m-1">
                            <button type="submit" id="add-shift-btn" class="btn btn-primary col-1">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="container col-4">
                            <table id="shifts" class="table table-bordered">
                                <thead>
                                    <th colspan=2>AVAILABLE SHIFTS</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Shift Name</h4>
                                        <th>Shift Schedule</h4>
                                    </tr>
                                    <tr>
                                        <td>Mark Harmon's birthday party</td>
                                        <td>(July 1, 2021) 4pm - 8pm</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="calendar-container" class="container col-8">
                            <div class="m-2">
                                <div id='calendar'></div>
                            </div>
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