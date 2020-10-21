<?php
    require 'connectMySQL.php';

    session_start();
    if (isset($_POST["name"])) {
        

        // Check in DB
        $db = new MySQLDatabase();
        $db->connect();
        $email = $_SESSION["email"];
        $name = $_POST["name"];

        $phone = $_POST["phonenumber"];
		    $name_on_in = $_POST["name_on_in"];
        $bill_address = $_POST["bill_address"];
		    $home_address = $_POST["address"];
        $extra_information= $_POST["information"];


        // if ($_POST["password"] === '******'){
        //   $password = $_SESSION["password"];
        // }



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
            $query2 = "UPDATE user  SET name='$name', phone_number='$phone',extra_information='$extra_information',name_on_invoice='$name_on_in' ,bill_address='$bill_address',home_address='$home_address'   WHERE email ='$email' ";
            if ($db->query($query2) === TRUE) {
              $_SESSION["name"] = $name;
              $_SESSION['logged_in'] = TRUE;
              $_SESSION['home_address'] = $home_address;
              $_SESSION['bill_address'] = $bill_address;
              $_SESSION['phone_number'] = $phone;
              $_SESSION['name_on_in'] = $name_on_in;
              $_SESSION['extra_information'] = $extra_information;

              echo '<script language="javascript" type="text/javascript">
                  alert("Update succeed!");
                  window.location = "../web/UserProfile.html";
                </script>';
              // echo '<script>alert("Register succeed"); window.location = Signin.php</script>';
              // header("Location: Signin.php");

              // header("Location: Signin.php");

            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
              }
        } else {
          echo '<script language="javascript" type="text/javascript">
              alert("Can not find email");
              window.location = "../web/UserProfile.php";
            </script>';


        }
        $db->disconnect();

    }else{
      echo '<script language="javascript" type="text/javascript">
                  alert("Update fail!");
                  window.location = "../web/UserProfile.html";
                </script>';
    }

?>
