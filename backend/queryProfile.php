<?php
    require 'connectMySQL.php';

    session_start();

    if (isset($_POST["email"])) {

        
        $phone = $_SESSION['phone_number'];
        $home_address = $_SESSION['home_address'];
        $name_on_in = $_SESSION['name_on_in'];
        $bill_address = $_SESSION['bill_address'];
        $name = $_SESSION["name"];
        $information = $_SESSION['extra_information'];

        $ret = ["phone" => $phone,"adress" => $home_address,"bill_address" => $bill_address, "name_on_in" => $name_on_in, "name" => $name, "information" => $information];
        echo json_encode($ret);

    }

?>
