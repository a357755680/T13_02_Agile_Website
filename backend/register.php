<?php
    require 'connectMySQL.php';

    session_start();
    echo "adada";
    if (isset($_POST["email"]) && isset($_POST["password"])) {

        // Check in DB
        $db = new MySQLDatabase();
        $db->connect();
        $email = $_POST["email"];
        $name = $_POST["name"];
        $password = $_POST["password"];
        $phone = $_POST["phone"];
		    $extra_info = $_POST["extra_info"];
		    $name_on_in = $_POST["name_on_in"];
        $bill_address = $_POST["bill_address"];
		    $home_address = $_POST["home_address"];

        echo $name;
        echo $password;
        echo $phone;




        $query = "SELECT * FROM user WHERE email = '$email'";
        $result = $db->query($query);

        /*while($row = mysqli_fetch_array($result)) {
            print "Name: {$row['username']} has ID: {$row['userId']}";
        }*/
        if ($row = mysqli_fetch_array($result)) {
            echo '<script>alert("Email already exist")</script>';
            // if ($_POST['password'] === $row['Password']) {
            //     $_SESSION["email"] = $_POST["email"];
            //     $_SESSION["Username"] = $row['Name'];
            //     header("Location: Signin.php");
            //     echo($_POST["email"]);
        } else {
            $query2 = "INSERT INTO user (email, password, name, phone_number, extra_information,name_on_invoice ,bill_address,home_address  ) VALUES ('$email','$password','$name','$phone','$extra_info','$name_on_in','$bill_address','$home_address')";
            if ($db->query($query2) === TRUE) {
              echo '<script language="javascript" type="text/javascript">
                  alert("Register succeed");
                  window.location = "../web/login.html";
                </script>';
              // echo '<script>alert("Register succeed"); window.location = Signin.php</script>';
              // header("Location: Signin.php");

              // header("Location: Signin.php");

            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
              }

        }
        $db->disconnect();

    }

?>
