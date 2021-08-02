<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracker</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/teststyle.css">
</head>
<body>
    <div class="main-content">
        <div class="container">
            <div class="container-fluid">
                <img id="flag" src="https://ibw21.org/wp-content/uploads/2019/01/senegal-flag-910x512.jpg" alt="">
                <p><a href="user_form.php">New user form</a> | <a href="Scheduler/scheduler.php">Scheduler</a></p>
            </div>
            <div class="container">
                <div class="row m-1 mb-2">
                    <div class="form-group col m-1 justify-content-center">
                        <label for="name">Talent Name:</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group col m-1 justify-content-center">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address">
                    </div>
                    <div class="form-group col m-1 justify-content-center">
                        <label for="phone">Phone:</label>
                        <input type="tel" class="form-control" id="phone">
                    </div>
                    <div class="form-group col m-1 justify-content-center">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                </div>
                <div class="row m-1">
                    <div class="col align-self-center">Hours to submit:</div>
                    <div class="form-group col">
                        <label for="pending">Pending</label>
                        <input type="text" class="form-control" id="pending" size="3">
                    </div>
                    <div class="form-group col ml-1">
                        <label for="booked">Booked</label>
                        <input type="text" class="form-control" id="booked" size="3">
                    </div>
                    <div class="form-group col ml-1">
                        <label for="worked">Worked</label>
                        <input type="text" class="form-control" id="worked" size="3">
                    </div>
                    <div class="form-group col ml-1">
                        <label for="ot">Overtime</label>
                        <input type="text" class="form-control" id="ot" size="3">
                    </div>
                    <div class="col m-2">
                        <div class="btn btn-success" onclick="addRow()">Submit</div>
                    </div>
                </div>
                <table id="timetable" class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" colspan=1>Hours
                                <div class="row b-0 p-1">
                                    <div class="col"><small>Pending Commit</small></div>
                                    <div class="col"><small>Booked</small></div>
                                    <div class="col"><small>Worked</small></div>
                                    <div class="col"><small>Potential OT</small></div>
                                </div>
                            </th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td colspan=1>
                                <div class="row b-0 p-1">
                                    <div class="pc col">10</div>
                                    <div class="b col">40</div>
                                    <div class="w col"></div>
                                    <div class="ot col"></div>
                                </div>
                            </td>
                            <td>Mark Jones</td>
                            <td>123 OLd Oak Tree Ln, Tuscany, GA 31032</td>
                            <td>000-111-2345</td>
                            <td>mjoootl@mymail.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="scripts/andre_script.js"></script>
</body>
</html>