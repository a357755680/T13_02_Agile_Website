<?php
	$now = date('Y-m-d h:i:s');
	$from_name = 'Yojiaku';//你的名字
	$from_email = 'spm2020unimelb@gmail.com'; //你用来发邮件的邮箱，即你刚刚在sendmail.ini中填写的邮箱
	$headers = "From: $from_name ";
	$to = 'ssen7u@gmail.com';  //收件人邮件地址
	$body = "hello！这是一份来自 $from_name 的测试邮件 .";
	$subject = "[$now] 测试邮件发送";
	if (mail($to, $subject, $body, $headers)) {
	    echo '发送成功！';
	} else {
	    echo '发送失败，去debug.log或者error.log文件中查找错误原因';
	}
?>