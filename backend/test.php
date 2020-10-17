<?php
    require 'email.php';
    
    $mail = new SendEmail();
    $mail->init();
    $mail->sendmail("ssen7u@gmail.com","123","456");
?>