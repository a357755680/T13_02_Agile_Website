<?php
    require 'connectMySQL.php';

    session_start();

    if (isset($_SESSION["email"])) {

        // Check in DB
        $db = new MySQLDatabase();
        $db->connect();

        $email = $_SESSION["email"];
        $service_charge = 300 ;
        // $service_id = 0 ;
        $service_type  = $_POST["service_type"];
        // $service_date  = $POST["service_date"];
        // $service_timeslot  = $POST["service_timeslot"];
        $message = $_POST["message"];
        $home_address = $_POST["home_address"];
        $service_time = $_POST["service_time"];
        $service_date = $_POST["service_date"];


        echo $service_type;
        echo $service_time;


        if ($service_time == "9:00 - 10:00 AM"){
          $service_time = 2;
        }elseif ($service_time == "10:00 - 11:00 AM") {
          $service_time = 2;
        }elseif ($service_time == "11:00 - 12:00 AM") {
          $service_time = 2;
        }elseif ($service_time == "1:00 - 2:00 PM") {
          $service_time = 2;
        }elseif ($service_time == "2:00 - 3:00 PM") {
          $service_time = 2;
        }elseif ($service_time == "3:00 - 4:00 PM") {
          $service_time = 2;
        }elseif ($service_time == "4:00 - 5:00 PM") {
          $service_time = 2;
        }


        $query = "SELECT * FROM user WHERE email = '$email'";
        $result = $db->query($query);

        /*while($row = mysqli_fetch_array($result)) {
            print "Name: {$row['username']} has ID: {$row['userId']}";
        }*/
        if ($row = mysqli_fetch_array($result)) {
            // echo '<script>alert("Email already exist")</script>';
            // if ($_POST['password'] === $row['Password']) {
            //     $_SESSION["email"] = $_POST["email"];
            //     $_SESSION["Username"] = $row['Name'];
            //     header("Location: Signin.php");
            //     echo($_POST["email"]);
            $query2 = "INSERT INTO user_service (user_email, service_type, service_charge, service_date, service_timeslot, home_adress, message) VALUES ('$email','$service_type','$service_charge','$service_date','$service_time','$home_address','$message')";
            if ($db->query($query2) === TRUE) {

              echo '<script language="javascript" type="text/javascript">
                  alert("Book succeed!");
                  window.location = "../web/History.html";
                </script>';
              // echo '<script>alert("Register succeed"); window.location = Signin.php</script>';
              // header("Location: Signin.php");

              // header("Location: Signin.php");

            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
              echo '<script language="javascript" type="text/javascript">
                  alert("Book failed!");
                  window.location = "../web/Booking.html";
                </script>';
              }
        } else {
          echo '<script language="javascript" type="text/javascript">
              alert("Can not find email");
              window.location = "../web/UserProfile.php";
            </script>';


        }
        $db->disconnect();

    }

?>
