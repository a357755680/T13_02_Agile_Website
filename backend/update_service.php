<?php
    require 'connectMySQL.php';
    session_start();

    if (isset($_POST["sellist2"])&&isset($_POST["charger"])) {

        // Check in DB
        $db = new MySQLDatabase();
        $db->connect();
        $sel2 = $_POST["sellist2"];
        $charger = $_POST["charger"];


        $query = "UPDATE service SET charger = $charger WHERE type = '$sel2'";

        /*while($row = mysqli_fetch_array($result)) {
            print "Name: {$row['username']} has ID: {$row['userId']}";
        }*/
        if ($db->query($query) === TRUE) {
            echo '<script type="text/javascript">
                alert("success!");
            </script>';

        }
        $db->disconnect();

    }

?>
