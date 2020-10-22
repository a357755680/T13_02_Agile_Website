<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';
class SendEmail{
    private $mail ;

    function init(){
        $this->mail = new PHPMailer(true);
        $this->mail->CharSet ="UTF-8";                     //设定邮件编码
        $this->mail->SMTPDebug = 0;                        // 调试模式输出
        $this->mail->isSMTP();                             // 使用SMTP
        $this->mail->Host = 'smtp.gmail.com';                // SMTP服务器
        $this->mail->SMTPAuth = true;                      // 允许 SMTP 认证
        $this->mail->Username = 'spm2020unimelb@gmail.com';                // SMTP 用户名  即邮箱的用户名
        $this->mail->Password = 'melbspm2020';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
        $this->mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
        $this->mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持
        $this->mail->setFrom('spm2020unimelb@gmail.com', 'Hairdressing Centre');
    }
    function sendmail($email,$name,$title,$body){
        try{
            $this->mail->addAddress($email, $name);
            $this->mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
            $this->mail->Subject = $title;
            $this->mail->Body    = $body;

            $this->mail->send();
            echo '邮件发送成功';
        }catch (Exception $e) {
            echo '邮件发送失败: ', $mail->ErrorInfo;
        }
    }
}

?>