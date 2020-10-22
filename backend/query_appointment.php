<?php
    require 'connectMySQL.php';

    if (isset($_POST["date"])) {

        $date = $_POST["date"];
        
        $db = new MySQLDatabase();
        $db->connect();
        $query = "SELECT * FROM user_service ";
        $result = $db->query($query);

        $ret = [];
        $count = 0;
        while ($row = mysqli_fetch_array($result)) {
            $ret[$count++] = array_merge($ret,$row);

        }

        echo json_encode($ret);

    }
    else if (isset($_POST["email"])){
        
        $email = $_POST["email"];
        $db = new MySQLDatabase();
        $db->connect();
        $query = "SELECT * FROM user_service WHERE user_email = '$email'";
        $result = $db->query($query);

        $ret = [];
        $count = 0;
        while ($row = mysqli_fetch_array($result)) {
            $ret[$count++] = array_merge($ret,$row);
        }
        echo json_encode($ret);

    }
    
?>
