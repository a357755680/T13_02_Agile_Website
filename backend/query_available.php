<?php
    require 'connectMySQL.php';

    if (isset($_POST["date"])) {

        $date = $_POST["date"];
        
        $db = new MySQLDatabase();
        $db->connect();
        $query = "SELECT * FROM user_service WHERE service_date = '$date'";
        $result = $db->query($query);

        $slot = array(false,false,false,false,false,false,false);


        while ($row = mysqli_fetch_array($result)) {
            $slot[$row["service_timeslot"]-1] = true;
        }

        $ret = ["slot1" => $slot[0],"slot2" => $slot[1],"slot3" => $slot[2],"slot4" => $slot[3],"slot5" => $slot[4],"slot6" => $slot[5],"slot7" => $slot[6]];
        echo json_encode($ret);

    }
    // echo  'alert("Update succeed!")';
?>
