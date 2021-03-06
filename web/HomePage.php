<?php
  session_start();
?>
<!DOCTYPE html>
<html class="noIE" lang="en-US">


<head>
    <title>Home Page</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans'>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Alegreya+Sans:regular,italic,bold,bolditalic" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Nixie+One:regular,italic,bold,bolditalic" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Alegreya+SC:regular,italic,bold,bolditalic" />

    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css" media="screen" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <span id="user" style="display:none"></span>
    <span id="admin" style="display:none">false</span>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

        <a class="navbar-brand" href="#">
            <img src="images/web_brand_icon.png" alt="Logo" style="width:50px;">
        </a>



        <?php
        if(!isset($_SESSION['logged_in'])){?>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="Login.html">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="Register.html">Registration</a>
            </li>
        </ul>
        <?php }


        else{?>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Welcome, <span id="name1"><?php echo $_SESSION["name"] ?> </span> <span class="sr-only">(current)</span></a>
            </li>
             <li class="nav-item">
                <a class="nav-link active" href="Booking.html">Book now</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="History.html">Booking History </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="UserProfile.html">UserProfile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  onclick="logout()" href="#">Logout</a>
            </li>
        </ul>
        <?php } ?>

    </nav>
    <script type="text/javascript">
        function logout(){

            $.get("../backend/login.php", { logout:"out" });
            alert("Logout Succeed!!!");
            window.location.href="HomePage.php";
        }
    </script>

    <div id="wrapper">
        <div id="header" class="content-block header-wrapper">
            <div class="header-wrapper-inner">

                <div class="slogan">
                    Hairdressing Centre
                </div>
                <div class="secondary-slogan">
                    Booking System For Hairdressing Centre
                </div>

            </div>
        </div>


    </div>


</body>
</html>
