<?php
    require 'connectMySQL.php';

    session_start();


    if (isset($_POST["inputEmail"]) && isset($_POST["inputPassword"])) {


        if (isset($_POST["remember"])) {
            setcookie("email", $_POST["email"], time() + 60*60*24, "/");
            $_COOKIE["email"] = $_POST["inputEmail"];
        } else {
            setcookie("inputEmail", null, -1, "/");
        }

        // Check in DB
        $db = new MySQLDatabase();
        $db->connect();
        $email = $_POST["inputEmail"];
        $query = "SELECT * FROM user WHERE email = '$email'";
        $result = $db->query($query);
        /*while($row = mysqli_fetch_array($result)) {
            print "Name: {$row['username']} has ID: {$row['userId']}";
        }*/
        if ($row = mysqli_fetch_array($result)) {
            echo $row['password'];
            if ($_POST['inputPassword'] == $row['password']) {
                $_SESSION["email"] = $_POST["inputEmail"];
                $_SESSION["password"] = $row['password'];
                $_SESSION['logged_in'] = TRUE;
                $_SESSION['home_address'] = $row['home_address'];
                $_SESSION['bill_address'] = $row['bill_address'];
                $_SESSION['phone_number'] = $row['phone_number'];
                $_SESSION['name_on_in'] = $row['name_on_invoice'];


                echo '<script language="javascript" type="text/javascript">
              alert("Login Succeed!!!");
              window.location = "../web/HomePage.php" ;
            </script>';
                // echo '<script>alert("Login Succeed")</script>';
                // header("Location: ../web/Register.html");
            } else {
                echo '<script>alert("Incorrect Password!")</script>';
            }
        } else {
            echo '<script>alert("Email not found")</script>';
        }
        $db->disconnect();

    }

    if (isset($_GET["logout"])) {
        session_destroy();
        echo '<script language="javascript" type="text/javascript">
      alert("Logout Succeed!!!");
      window.location = "../web/HomePage.php" ;
    </script>';
        // header("Location: ../web/HomePage.php");
    }

    // if (isset($_GET["logout"])) {
    //     session_destroy();
    //     header("Location: index-done.php");
    // }

?>
