<?php
    require 'connectMySQL.php';
    require 'email.php';
    session_start();

    if (isset($_POST["service_id"])) {

        // Check in DB
        echo "1";
        $db = new MySQLDatabase();
        $db->connect();

        $id = $_POST["service_id"];

        $query = "SELECT * FROM user_service WHERE service_id = '$id'";
        $result = $db->query($query);
        $row = mysqli_fetch_array($result);
        $query2= "DELETE FROM user_service WHERE service_id = '$id'";
        $result2 = $db->query($query2);
        $mail = new SendEmail();
        $mail->init();
        $email = $row["user_email"];
        $name = $row["user_name"];
        $phone = $row["user_phone"];
        $home_address = $row["home_adress"];
        $service_date = $row["service_date"];
        $service_time = $row["service_timeslot"];
        if ($service_time == 1){
          $service_time = "9:00 - 10:00 AM";
        }elseif ($service_time == 2) {
          $service_time = "10:00 - 11:00 AM";
        }elseif ($service_time == 3) {
          $service_time = "11:00 - 12:00 AM";
        }elseif ($service_time == 4) {
          $service_time = "1:00 - 2:00 PM";
        }elseif ($service_time == 5) {
          $service_time = "2:00 - 3:00 PM";
        }elseif ($service_time == 6) {
          $service_time = "3:00 - 4:00 PM";
        }elseif ($service_time == 7) {
          $service_time = "4:00 - 5:00 PM";
        }
        $message = $row["message"];
        $mail->sendmail("ssen7u@gmail.com","$name has canceled an appointment booking","$name canceled an appointment booking, the specific information is as follows:<br>name: $name <br>phone number: $phone <br>Location: $home_address<br>email address: $email <br>date and time: $service_date $service_time <br>message: $message");
        $mail->sendmail("$email","You have successfully canceled an appointment booking.","You canceled an appointment, the specific information is as follows:<br>name: $name <br>phone number: $phone <br>Location: $home_address<br>email address: $email <br>date and time: $service_date $service_time <br>message: $message");



        
        // if($result=== TRUE){
        //   echo '<script language="javascript" type="text/javascript">
        //           alert("Cancel succeed!");
        //           window.location = "../web/History.html";
        //         </script>';
        // }
        /*while($row = mysqli_fetch_array($result)) {
            print "Name: {$row['username']} has ID: {$row['userId']}";
        }*/
        // if ($row = mysqli_fetch_array($result)) {
        //     // echo '<script>alert("Email already exist")</script>';
        //     // if ($_POST['password'] === $row['Password']) {
        //     //     $_SESSION["email"] = $_POST["email"];
        //     //     $_SESSION["Username"] = $row['Name'];
        //     //     header("Location: Signin.php");
        //     //     echo($_POST["email"]);
        //     $query2 = "DELETE FROM user_service WHERE service_id = '$id'";
        //     if ($db->query($query2) === TRUE) {

        //       echo '<script language="javascript" type="text/javascript">
        //           alert("Book succeed!");
        //           window.location = "../web/History.html";
        //         </script>';
        //       // echo '<script>alert("Register succeed"); window.location = Signin.php</script>';
        //       // header("Location: Signin.php");

        //       // header("Location: Signin.php");

        //     } else {
        //       echo "Error: " . $sql . "<br>" . $conn->error;
        //       echo '<script language="javascript" type="text/javascript">
        //           alert("Book failed!");
        //           window.location = "../web/Booking.html";
        //         </script>';
        //       }
        // } else {
        //   echo '<script language="javascript" type="text/javascript">
        //       alert("Can not find email");
        //       window.location = "../web/UserProfile.php";
        //     </script>';


        // }
        $db->disconnect();

    }

?>
