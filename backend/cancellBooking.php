<?php
    require 'connectMySQL.php';

    session_start();

    if (isset($_POST["service_id"])) {

        // Check in DB
        echo "1";
        $db = new MySQLDatabase();
        $db->connect();

        $id = $_POST["service_id"];


        $query = "DELETE FROM user_service WHERE service_id = '$id'";
        $result = $db->query($query);

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
