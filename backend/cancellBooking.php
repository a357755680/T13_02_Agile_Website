<?php
    require 'connectMySQL.php';

    session_start();

    if (isset($_SESSION["email"])) {

        // Check in DB
        $db = new MySQLDatabase();
        $db->connect();

        $email = $_SESSION["email"];
        $service_charge = 300 ;
        $service_id = 0 ;
        $service_type  = $POST["service_type"];
        $service_date  = $POST["service_date"];
        $service_timeslot  = $POST["service_timeslot"];


        echo $name;
        echo $password;
        echo $phone;




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
            $query2 = "DELETE FROM user_service WHERE service_id = '$service_id'";
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
