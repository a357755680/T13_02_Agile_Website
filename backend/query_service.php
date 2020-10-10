<?php
    require 'connectMySQL.php';
    session_start();

    if (isset($_POST["sellist2"])) {

        // Check in DB
        $db = new MySQLDatabase();
        $db->connect();
        $sel2 = $_POST["sellist2"];



        $query = "SELECT * FROM service WHERE type = '$sel2'";
        $result = $db->query($query);

        /*while($row = mysqli_fetch_array($result)) {
            print "Name: {$row['username']} has ID: {$row['userId']}";
        }*/
        if ($row = mysqli_fetch_array($result)) {
            echo $row["charger"];

        }
        $db->disconnect();

    }

?>
