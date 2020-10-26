<?php
    require 'connectMySQL.php';

    session_start();


    if (isset($_POST["inputEmail"]) && isset($_POST["inputPassword"])) {


        if (isset($_POST["remember"])) {
            setcookie("email", $_POST["inputEmail"], time() + 60*60*24, "/");
            setcookie("passowrd", $_POST["inputPassword"], time() + 60*60*24, "/");
            // $_COOKIE["email"] = $_POST["inputEmail"];
        } else {
            setcookie("email", $_POST["inputEmail"], time() + 60*60*24, "/");
            setcookie("passowrd", "", time() - 60*60*24, "/");
            // setcookie("inputEmail", null, -1, "/");
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
                $_SESSION["name"] = $row['name'];
                $_SESSION['logged_in'] = TRUE;
                $_SESSION['home_address'] = $row['home_address'];
                $_SESSION['bill_address'] = $row['bill_address'];
                $_SESSION['phone_number'] = $row['phone_number'];
                $_SESSION['name_on_in'] = $row['name_on_invoice'];
                $_SESSION['extra_information'] = $row['extra_information'];

                if($_SESSION["email"]=="ssen7u@gmail.com" || $_SESSION["email"]=="1563451327@qq.com" || $_SESSION["email"]=="yanjunm1@student.unimelb.edu.au"){
                    echo '<script language="javascript" type="text/javascript">
                      alert("Login Succeed!!!");
                      window.location = "../web/Business_View.html" ;
                    </script>';
                }else{
                    echo '<script language="javascript" type="text/javascript">
                      alert("Login Succeed!!!");
                      window.location = "../web/HomePage.php" ;
                    </script>';
                }
                // echo '<script>alert("Login Succeed")</script>';
                // header("Location: ../web/Register.html");
            } else {
                echo '<script>alert("Incorrect Password!");window.location = "../web/Login.html";</script>';
            }
        } else {
            echo '<script>alert("Email not found");window.location = "../web/Login.html";</script>';
        }
        $db->disconnect();

    }

    if (isset($_GET["logout"])) {
        session_destroy();
        
    //     echo '<script language="javascript" type="text/javascript">
    //   alert("Logout Succeed!!!");
    //   window.location = "../web/HomePage.php" ;
    // </script>';
        // header("Location: ../web/HomePage.php");
    }

    // if (isset($_GET["logout"])) {
    //     session_destroy();
    //     header("Location: index-done.php");
    // }

?>
