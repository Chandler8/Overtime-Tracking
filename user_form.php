<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/teststyle.css">
</head>
<body>
    <div class="container">
        <form action="scripts/process_request.php" method="POST">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col col-md-offset-3">
                        <div class="card">
                            <div class="card-header">
                                <h3>Add New User Form</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password1">Password</label>
                                        <input type="password" class="form-control" id="password1" name="pwd1" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password2">Confirm Password</label>
                                        <input type="password" class="form-control" id="password2" name="pwd2" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="City">
                                    </div>
                                    <div class="form-group col">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="State">
                                    </div>
                                    <div class="form-group col">
                                        <label for="zip">Zip</label>
                                        <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip">
                                    </div>
                                    <div class="form-group col">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" id="country" name="country" placeholder="Country">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="notes">Notes</label>
                                    <textarea class="form-control" rows="3" id="notes" name="notes" placeholder="Notes"></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="add_new_user_submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>