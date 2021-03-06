<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Profile</title>

    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <link href="./css/Userprofile.css" rel="stylesheet">

    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans'>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Alegreya+Sans:regular,italic,bold,bolditalic" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Nixie+One:regular,italic,bold,bolditalic" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Alegreya+SC:regular,italic,bold,bolditalic" />

</head>

<body>
    <span id="user" style="display:none"></span>
    <span id="admin" style="display:none">false</span>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

        <a class="navbar-brand" href="#">
            <img src="images/web_brand_icon.png" alt="Logo" style="width:50px;">
        </a>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Welcome, <span id="name1">Visitor</span> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="Booking.html">Book now</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="UserProfile.php">UserProfile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../backend/login.php?logout">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="d-flex" id="wrapper">





    </div>

    <div id="page-content-wrapper" class="tab-content">


        <div class="container-fluid">
            <form class="form-horizontal" action="../backend/updateProfile.php" method="POST" >
                <fieldset>
                    <div class="card" style="color:white;">
                        <div class="account-setting">
                            <div class="row"><span class="setting-above">Account setting</span></div>
                            <div class="row"><span class="seeting-below">View and Edit your personal information</span></div>
                        </div>
                        <hr style="border:none;border-top:2px solid; width: 1200px; color:white;margin-left:15px;" />


                        <div class="form-account">
                            <h5 style="padding-left:15px;">Personal Information</h5>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Change Email ID</label>
                                <div class="col-md-4">
                                    <input id="textinput" name="email" type="text" value=<?php echo $_SESSION["email"]; ?> class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Change Home Address</label>
                                <div class="col-md-4">
                                    <input id="textinput2" name="home_address" type="text" value=<?php echo $_SESSION["home_address"]; ?> class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Change Phone Number</label>
                                <div class="col-md-4">
                                    <input id="textinput3" name="phone_number" type="text" value=<?php echo $_SESSION["phone_number"]; ?> class="form-control input-md">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="passwordinput">New Password</label>
                                <div class="col-md-4">
                                    <input id="passwordinput" name="password" type="password" value="******" class="form-control input-md">

                                </div>
                            </div>

                            <h5 style="padding-left:15px;">Biller Information</h5>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name_on_in">Name on invoice</label>
                                <div class="col-md-4">
                                    <input id="name_on_in" name="name_on_in" type="text" value=<?php echo $_SESSION["name_on_in"]; ?> class="form-control input-md">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name_on_in">Biller email address</label>
                                <div class="col-md-4">
                                    <input id="bill_address" name="bill_address" type="email" value=<?php echo $_SESSION["bill_address"]; ?> class="form-control input-md">

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <button id="singlebutton" name="singlebutton" class="btn float-right btn">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>






</body>

</html>
